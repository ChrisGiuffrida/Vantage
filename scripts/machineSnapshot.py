#!/usr/bin/env python
import paramiko
import sys
import base64
import MySQLdb


# Add any machines we want to pull data from
hosts = ["student00.cse.nd.edu",
	"student01.cse.nd.edu",
	"student02.cse.nd.edu",
	"student04.cse.nd.edu" ]
port=22
username='bfite'

#Please do not decode this
password='QnJhbnRoZW1hbjgz'


# Open a database connection
db = MySQLdb.connect("localhost", "cgiuffri", "Vantage2017", "sqlsneverbetter")

# Instantiate a cursor
cursor = db.cursor()

for host in hosts:
	print(host)
	print
	client = paramiko.SSHClient()
	client.set_missing_host_key_policy(paramiko.AutoAddPolicy())
	client.connect(host, port, username, base64.b64decode(password))

	# Execute the uptime command
	up_data = 0
	stdin, stdout, stderr = client.exec_command('uptime')
	for line in stdout.readlines():
	    # Split the data by spaces
	    up_data = line.split()
            up_data[9] = up_data[9][:-1]
        
        # Exeecute the free command
        data = []
	stdin, stdout, stderr = client.exec_command('free')
	for line in stdout.readlines():
	    # Split the data by spaces
	    data.append(line.split())
        free_data = data[1]

	#Insert into the machine table in the database
	sql_command = "INSERT INTO MachineSnapshots VALUES(\"" +  host + "\", now(), " + str(up_data[9]) + ", " + str(free_data[3]) + ", " + str(free_data[2]) + ", " + str(free_data[1]) + ", " + str(up_data[2]) + ", " + str(up_data[5]) + ")"
	cursor.execute(sql_command)
	db.commit()

	
client.close()

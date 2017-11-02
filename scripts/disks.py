#!/usr/bin/env python
import paramiko
import sys
import base64
import MySQLdb

paramiko.util.log_to_file("./paramiko.log")

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

	# Execute df command
	df_data = []
	stdin, stdout, stderr = client.exec_command('df')
	for line in stdout.readlines():
	    # Split the data by spaces
	    df_data.append(line.split())

        for row in df_data[1:]:
		sql_command = "INSERT INTO Disks  VALUES (\"" + row[5] + "\" , now(), \"" + host + "\", \"" + row[1] + "\", \"" + row[2] + "\", \"" + row[3] + "\", \"" + row[4][:-1] + "\")"
                cursor.execute(sql_command)
                db.commit()
	#Insert into the disc table in the database

	
client.close()

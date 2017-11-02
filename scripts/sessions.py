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

	# Execute who command
	who_data = []
	stdin, stdout, stderr = client.exec_command('who')
	for line in stdout.readlines():
	    # Split the data by spaces
	    who_data.append(line.split())

	
	#Insert into the session table in the database
	# Mostly working with the 'who' command
	# netid, data, login timestamp, sttudent machine (host), iphost
	# We need to make sure this specific session isnt in the table already
	# Login time is given in the datetime format, need to concatenate
	for line in who_data:
		logtime = line[2] + " " +  line[3]

		sql_command = "INSERT INTO Sessions (netid, timestamp, logintime, machine, host) VALUES (\"" + line[0] + "\" , now(), '" + logtime + "', \"" + host + "\", \"" + line[4] + "\")"
		try:
			cursor.execute(sql_command)
			db.commit()
		except:
			print('Error' + sql_command)


	
        client.close()

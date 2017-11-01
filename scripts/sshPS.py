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

	# Execute ps aux command
	ps_data = []
	stdin, stdout, stderr = client.exec_command('ps aux')
	for line in stdout.readlines():
	    # Split the data by spaces
	    data = line.split()
	    # Join the last elements as they construct the command that was run
	    data[10:] = [' '.join(data[10:])]
	    ps_data.append(data)

	# Execute who command
	who_data = []
	stdin, stdout, stderr = client.exec_command('who')
	for line in stdout.readlines():
	    # Split the data by spaces
	    who_data.append(line.split())
	    

	# Execute df command
	df_data = []
	stdin, stdout, stderr = client.exec_command('df')
	for line in stdout.readlines():
	    # Split the data by spaces
	    df_data.append(line.split())

	# Execute w command
	w_data = []
	stdin, stdout, stderr = client.exec_command('w')
	for line in stdout.readlines():
	    # Split the data by spaces
	    data = line.split()
	    # Join the last elements as they construct the command that was run
	    data[7:] = [' '.join(data[7:])]
	    w_data.append(data)

	# Execute the uptime command
	up_data = 0
	stdin, stdout, stderr = client.exec_command('uptime')
	# Split the data by spaces
	up_data = (int(stdout.readlines()[0].split()[2]))
	  
	#Calculate CPU% and Mem%
	total_cpu_percent = 0
	total_mem_percent = 0
	for row in ps_data[1:]:
	    total_cpu_percent += float(row[2])
	    total_mem_percent += float(row[3])

	print host + " " + str(total_cpu_percent) + " " + str(total_mem_percent) + " " + str(up_data)


	'''
	
	#Insert into the machine table in the database
	sql_command = "INSERT INTO MachineSnapshots VALUES(\"" +  host + "\", now(), " + str(total_cpu_percent) + ", " + str(total_mem_percent) + ", " + str(up_data) + ")"
	cursor.execute(sql_command)
	db.commit()

	#Insert into the process table in the database
	for row in ps_data[1:]:
		sql_command = "INSERT INTO Processes VALUE(" + str(row[1]) + ", now(), \"" + host + "\", " + str(row[2]) + ", " + str(row[3]) + ", " + str(row[5]) + ", " + str(row[4]) + ", \"" +  str(row[0]) + "\", \"" +  str(row[10]) + "\", \"" + str(row[8]) + "\")"
		cursor.execute(sql_command)
		db.commit()	
	'''
	#Insert into the session table in the database
	# Mostly working with the 'who' command
	# netid, data, login timestamp, sttudent machine (host), iphost
	# We need to make sure this specific session isnt in the table already
	# Login time is given in the datetime format, need to concatenate
	for line in who_data:
		logtime = line[2] + " " +  line[3]
		sql_command = "INSERT INTO Sessions VALUE(\"" + line[0] + "\" , now(), '" + logtime + "', \"" + host + "\", \"" + line[4] + "\")"
		print sql_command	


	#Insert into the disc table in the database

	
client.close()

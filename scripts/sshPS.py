#!/usr/bin/env python
import paramiko
import sys
import base64

paramiko.util.log_to_file("./paramiko.log")

# Add any machines we want to pull data from
hosts = ["student00.cse.nd.edu",
	"student01.cse.nd.edu",
	"student02.cse.nd.edu" ]
port=22
username='bfite'

#Please do not decode this
password='QnJhbnRoZW1hbjgz'


for host in hosts:
	print(host)
	print
	client = paramiko.SSHClient()
	client.set_missing_host_key_policy(paramiko.AutoAddPolicy())
	client.connect(host, port, username, base64.b64decode(password))

	# Execute ps aux command
	stdin, stdout, stderr = client.exec_command('ps aux')
	for line in stdout.readlines():
	    # Split the data by spaces
	    data = line.split()
	    # Join the last elements as they construct the command that was run
	    data[10:] = [' '.join(data[10:])]
	    print(data)


	#Insert into the database that matches the machine name	

	client.close()

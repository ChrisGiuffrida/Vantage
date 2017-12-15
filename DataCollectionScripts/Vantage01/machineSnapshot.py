#!/usr/bin/env python2.7
import sys
import base64
import MySQLdb
import os

HOST = "dsg1.virtual.crc.nd.edu"
PORT = 3306
USER = "cgiuffri"
PASSWORD = "Vantage2017"
DB = "sqlsneverbetter"

host = "student01.cse.nd.edu"

# Open a database connection
try:
    db = MySQLdb.connect(host=HOST, port=PORT, user=USER, passwd=PASSWORD, db=DB)
    # Instantiate a cursor
    cursor = db.cursor()

    up_data = 0
    pipe = os.popen('uptime', 'r')
    for line in pipe:
        # Split the data by spaces
        up_data = line.split()
        up_data[9] = up_data[9][:-1]
    
    # Exeecute the free command
    data = []
    pipe = os.popen('free', 'r')
    for line in pipe:
        # Split the data by spaces
        data.append(line.split())
    free_data = data[1]
    
    sql_command = "INSERT INTO MachineSnapshots VALUES(\"" +  host + "\", now(), " + str(up_data[9]) + ", " + str(free_data[3]) + ", " + str(free_data[2]) + ", " + str(free_data[1]) + ", " + str(up_data[2]) + ", " + str(up_data[5]) + ")"
    cursor.execute(sql_command)
    db.commit()

except Exception as e:
    print e

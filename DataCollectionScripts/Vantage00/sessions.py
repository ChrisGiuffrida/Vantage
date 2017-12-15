#!/usr/bin/env python
import sys
import base64
import MySQLdb
import os
import time

HOST = "dsg1.virtual.crc.nd.edu"
PORT = 3306
USER = "cgiuffri"
PASSWORD = "Vantage2017"
DB = "sqlsneverbetter"

host = "student00.cse.nd.edu"

# Open a database connection
while True:
    try:
        db = MySQLdb.connect(host=HOST, port=PORT, user=USER, passwd=PASSWORD, db=DB)
        # Instantiate a cursor
        cursor = db.cursor()

        # Execute who command
        who_data = []
        pipe = os.popen('who', 'r')
        for line in pipe:
            # Split the data by spaces
            who_data.append(line.split())
    
        # Insert into the session table in the database
        # Mostly working with the 'who' command
        # netid, data, login timestamp, sttudent machine (host), iphost
        # We need to make sure this specific session isnt in the table already
        # Login time is given in the datetime format, need to concatenate
        for line in who_data:
            print line
            logtime = line[2] + " " +  line[3]

            sql_command = "INSERT INTO Sessions (netid, timestamp, logintime, machine, host) VALUES (\"" + line[0] + "\" , now(), '" + logtime + "', \"" + host + "\", \"" + line[4] + "\")"
            try:
                cursor.execute(sql_command)
                db.commit()
            except:
                print('Error' + sql_command)  
        cursor.close()
        db.close()
        time.sleep(1)

    except Exception as e:
        print e


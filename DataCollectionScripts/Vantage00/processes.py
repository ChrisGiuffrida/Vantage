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

    # Execute ps aux command
        ps_data = []
        pipe = os.popen('ps aux', 'r')
        for line in pipe:
            # Split the data by spaces
            data = line.split()
            # Join the last elements as they construct the command that was run
            data[10:] = [' '.join(data[10:])]
            ps_data.append(data)

        # Execute who command
        who_data = []
        pipe = os.popen('who', 'r')
        for line in pipe:
            # Split the data by spaces
            who_data.append(line.split())
            

        # Execute df command
        df_data = []
        pipe = os.popen('df', 'r')
        for line in pipe:
            # Split the data by spaces
            df_data.append(line.split())

        # Execute w command
        w_data = []
        pipe = os.popen('w', 'r')
        for line in pipe:
            # Split the data by spaces
            data = line.split()
            # Join the last elements as they construct the command that was run
            data[7:] = [' '.join(data[7:])]
            w_data.append(data)

        # Execute the uptime command
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
        
        #Insert into the process table in the database
        for row in ps_data[1:]:
            if row[8][0].isdigit():
                if (row[10] == 'ps aux' or row[10] == 'who' or row[10] == '[who] <defunct>') and row[0] == 'cgiuffri':
                    pass
                else:
                    sql_command = "INSERT INTO Processes VALUE(" + str(row[1]) + ", curdate(), curtime(), \"" + host + "\", " + str(row[2]) + ", " + str(row[3]) + ", " + str(row[5]) + ", " + str(row[4]) + ", \"" +  str(row[0]) + "\", \"" +  str(row[10]) + "\", \"" + str(row[8]) + "\")"
                    try:
                        cursor.execute(sql_command)
                        db.commit()	
                    except:
                        print("not unique")

        cursor.close()
        db.close()
        time.sleep(1)

    except Exception as e:
        print e


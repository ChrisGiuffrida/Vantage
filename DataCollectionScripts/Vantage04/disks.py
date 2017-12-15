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

host = "student04.cse.nd.edu"

# Open a database connection
while True:
    try:
        db = MySQLdb.connect(host=HOST, port=PORT, user=USER, passwd=PASSWORD, db=DB)
        # Instantiate a cursor
        cursor = db.cursor()

        # Execute df command
        df_data = []
        pipe = os.popen('df', 'r')
        for line in pipe:
            # Split the data by spaces
            df_data.append(line.split())

        for row in df_data[1:]:
            sql_command = "INSERT INTO Disks  VALUES (\"" + row[5] + "\" , now(), \"" + host + "\", \"" + row[1] + "\", \"" + row[2] + "\", \"" + row[3] + "\", \"" + row[4][:-1] + "\")"
            cursor.execute(sql_command)
            db.commit()

    except Exception as e:
        print e
    cursor.close()
    db.close()
    time.sleep(300)

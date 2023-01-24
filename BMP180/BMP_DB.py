import bmpsensor
import time
import mysql.connector
from datetime import datetime

mydb= mysql.connector.connect(
    host="localhost",
    user="admin",
    password="wetterstation22",
    database="DHT11"
    )
while True:
    temp, pressure, altitude = bmpsensor.readBmp180()
    
now=datetime.now()
datetime =now.strftime ("%Y-%m-%d %H:%M:%S")
command=mydb.cursor()

sql = ("INSERT INTO Daten (Zeitpunkt,Temperatur, Luftfeuchtigkeit) VALUE (%s, %s, %s)")
data = (datetime, temp, 70)
command.execute(sql,data)
mydb.commit()
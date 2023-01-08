
while True:
    import Adafruit_DHT
    import bmpsensor
    import time                 #Importieren der nötigen Module
    import mysql.connector
    from datetime import datetime

    mydb= mysql.connector.connect(
        host="localhost",
        user="admin",
        password="wetterstation22",   #Verbindung zur DB herstellen
        database="wetterstation"
        )
     
    DHT_SENSOR = Adafruit_DHT.DHT11
    DHT_PIN = 21  #GPIO Pin des DHT Sensors

    humidity, temperature = Adafruit_DHT.read(DHT_SENSOR, DHT_PIN) #Daten auslesen und in Variablen speichern (DHT-11)
    temp, pressure, altitude = bmpsensor.readBmp180()  #Daten auslesen und in Variablen speichern (BMP-180)
    if humidity is not None:
        now=datetime.now()
        datetime =now.strftime ("%Y-%m-%d %H:%M:%S") #Den jetzigen Zeitpunkt auslesen und in einer Variable speichern
        
        command=mydb.cursor()
        sql = ("INSERT INTO Daten (Zeitpunkt,Temperatur, Luftfeuchtigkeit, Luftdruck) VALUE (%s, %s, %s, %s)") #Insert Command
        data = (datetime, temp, humidity, pressure)
        command.execute(sql,data) #Insert Befehl + Values executen
        mydb.commit(); #Insert Befehl + Values commiten
        if command.execute:
            print ("Erfolgreich in die Datenbank eingefügt");
        else:
            print ("Fehler");
        time.sleep(21600); #Erneute ausführung des Scripts in 12 Stunden
    else:
        now=datetime.now()
        datetime =now.strftime ("%Y-%m-%d %H:%M:%S")
        Befehl=mydb.cursor()
        Befehl.execute= ("SELECT MAX(LAST_INSERT_ID(Luftfeuchtigkeit)) FROM Daten")
        for humidity in Befehl:
            print (humidity)
  

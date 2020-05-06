"""import RPi.GPIO as GPIO"""
# -*- coding: latin-1 -*-
#!/usr/bin/env python
import RPi.GPIO as GPIO
import os
import time
import MySQLdb

class Principal:
    def __init__(self):
        pass
   
    def verificar(self):
        """GPIO.setmode(GPIO.BOARD"""
        db = MySQLdb.connect("localhost","root","root","housemanager")
        cursor = db.cursor()
        sql = "SELECT ligado, num, nome FROM dispositivos d INNER JOIN pinos p ON p.idPino = d.idPino"
        try:
            resultados = 0
            cursor.execute(sql)
            resultado = cursor.fetchall()
            for dados in resultado:
                ligado = dados[0]
                pino = int(dados[1])
                descricao = dados[2]
                """GPIO.setup(pino, GPIO.OUT)"""
                """PINO 7"""
                print pino
                if(ligado==0):
                    print "Pino ligado"
                    GPIO.setmode(GPIO.BOARD)
                    GPIO.setwarnings(False)
                    GPIO.setup(pino, GPIO.OUT)
                    GPIO.setup(pino, GPIO.HIGH)
                        
                elif(ligado==1):
                    print " pino desligado"
                    GPIO.setmode(GPIO.BOARD)
                    GPIO.setwarnings(False)
                    GPIO.setup(pino, GPIO.OUT)
                    GPIO.setup(pino, GPIO.LOW)
                    
        except MySQLdb.Error, e:
            print "Erro: " + sql
            print e

a = Principal()
a.verificar()

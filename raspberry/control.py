from ftplib import FTP
import time
import sys
import os
import RPi.GPIO as gpio
gpio.setwarnings(False)
gpio.setmode(gpio.BCM)
gpio.setup(18, gpio.OUT)
pwm = gpio.PWM(18, 100)
pwm.start(2.5)

ftp = FTP('gator3236.hostgator.com')
ftp.login(user='', passwd = '')


def grabFile():

	filename = 'direction.txt'
	localfile = open(filename, 'wb')
	ftp.retrbinary('RETR ' + filename, localfile.write, 1024)
	
	localfile.close()
	
def placeFile():
    filename = 'direction.txt'
    ftp.storbinary('STOR '+filename, open(filename, 'rb'))
num = 0;


while num < 30 :
	time.sleep(6) # 6 second wait for each loop iteration
	grabFile()
	filet1 = open('direction.txt', 'r')
	
	directioncontent = filet1.read()
	filet1.close()
	filet = open('direction.txt', 'w')
	pwm.start(2.5)
	
	if directioncontent == 'right':
		#turn motor right
                k = float(200)/10+2.5
		pwm.ChangeDutyCycle(k)
		print "right"
		time.sleep(1)
		filet.write("done")
		filet.close()
		placeFile()
	if directioncontent == 'left':
		#turn motor left
                j = float(20)/10+2.5
		pwm.ChangeDutyCycle(j)
		print "left"
		time.sleep(1)
		filet.write("done")
		filet.close()
		placeFile()
	if directioncontent == 'up':
		#turn motor up
                print "up"
                time.sleep(1)
		filet.write("done")
		filet.close()
		placeFile()
	if directioncontent == 'down':
		#turn motor down
                print "down"
                time.sleep(1)
		filet.write("done")
		filet.close()
		placeFile()
	
	num += 1
	print "No control signal received"
	
	os.remove('direction.txt')
ftp.quit()
pwm.stop()
gpio.cleanup()

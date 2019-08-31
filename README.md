# SoofaSMS
SoofaSMS is a web Interface for the Nexmo SMS Service.

# Prerequisites:
* MYSQL
* Web server with PHP support (Apache2 in the installation example).
* Nexmo User (https://www.nexmo.com)

*This build has been tested only on **Debian** and **Ubuntu** environments, but should work on other distributions and xmapp if configured correctly.*

# Installation:
1. Download the project:
```
sudo git clone  https://github.com/Deathstars/SoofaSMS
```

2. Move the "www" directory into your apache2 'www' directory:

```
sudo mv SoofaSMS/www /var/
```

3. Import the database into MYSQL and config user permissions:

    Replace *'root'* and *'toor'* with your username and password: 
    Starting MYSQL and Apache2 services:
```
sudo service apache2 start && service mysql start
```

4. Creating the database that contains the password for the application:
```
mysql -u root -p
create database soofasms;
mysql -u root -p mypass < soofasms.sql
GRANT ALL PRIVILEGES ON SoofaSMS.* TO 'root'@'%' IDENTIFIED BY 'toor';
exit
```

5. Config the **PHP Database Connection File** with your Database information:
```
nano /var/www/html/SoofaSMS/maria.php
```
Change the following:

```
//User configuration:
$hostname = "127.0.0.1"; //webserver where the sql is stored.
$username = "root"; //username for MYSQL
$password = "toor"; //password for MYSQL
$db = "soofasms"; //database name
$path_to_send = "/var/www/send/delay.php"; //This should not be accessible from outside for security reasons.
//end of user configuration
```

6. Config the **NEXMO API** Secret and Key:
```
nano /var/www/send/delay.php
```

Change the following:
```
//User configuration:
//you can get this from the nexmo website.
$apt_key = "PUT YOUR API KEY HERE"
$api_secret = "PUT YOUR API SECRET HERE";  

//end of user configuration
```

# Usage:
Access with your browser to "http://localhost/SoofaSMS".

# Android Application:
The Android application allows you to connect the mobile application to your server.
it makes the API easier to use because it can choose the phone numbers directly from your contacts and autofill your password.

The app can be downloaded from the Play Store:
https://play.google.com/store/apps/details?id=appinventor.ai_Saab95DIY.SofasSMS


# Instruction for the application:
On the first run it will ask you to URI for the web server, type the URI and click update.
if you want to change it just click on the "Settings" button inside the app.

Website_Information_System
==========================
Background:
--------------------------
There are hundreds of new students from China to University of Florida every year, as a member of Chinese Student Association of UF,
we try to help these new students smoothly begin their life in United States. Gainesville is a small city and public 
trasportation is not as good as big cities. We provide free airport pickup service and free temporary accommodation for new Students
, so this Information system's purpose is to better communicate among new students, volunteers and managers.

System:
--------------------------
This information system provides 3 different users: new student, volunteer and manager.

Function:
--------------------------
1. New students fill their basic personal information, flights time and arrive airport, if need temporary housing.
2. Volunteer can see the information of new students, and they can select certain new students to pick up from airport
   based on new students' flights and other information. But volunteer need to apply it through this system.
3. Manager reviews the applications from vounteers and approve or not the volunter's application; manger can delete account
   of new students or volunteers; manger can rearrange the map relationship between new students and volunteer.

Technology utilized:
--------------------------
1. Linus service on Godaddy
2. MySQL database/Ajax/Php support the back-end of website.
3. HTML/CSS/Javascript/Jquery support the front-end of website.


Setup database:
--------------------------
The code do not include the database contants, which used to connect MySQL database.
There is two files need to set up before use this system, "ROOT\includes\constants.php" and "ROOT\sandbox\includes\constants.php"
in  following format:
<?php
define("DB_SERVER","");
define("DB_USER","");
define("DB_PASS","");
define("DB_NAME","");
?>


Table for new student user:

CREATE TABLE customer_beta(
ID int(10) NOT NULL AUTO_INCREMENT,
UserId varchar(50) NOT NULL UNIQUE,
psw varchar(50) NOT NULL,
lastname varchar(50) NOT NULL,
firstname varchar(50) NOT NULL,
Gender tinyint NOT NULL,
Email varchar(50) NOT NULL,
QQ varchar(50),
Telephone varchar(50),
PreviousSchool varchar(50),
CurrentCity varchar(50),
hometown varchar(50),
Major varchar(50),
Status varchar(50),
flightno_1 varchar(80),
leave_1 DATETIME,
leave_city_1 varchar(80),
leave_airport_1 varchar(80),
arrive_1 DATETIME,
arrive_city_1 varchar(80),
arrive_airport_1 varchar(80),
flightno_2 varchar(80),
leave_2 DATETIME,
leave_city_2 varchar(80),
leave_airport_2 varchar(80),
arrive_2 DATETIME,
arrive_city_2 varchar(80),
arrive_airport_2 varchar(80),
flightno_3 varchar(80),
leave_3 DATETIME,
leave_city_3 varchar(80),
leave_airport_3 varchar(80),
arrive_3 DATETIME,
arrive_city_3 varchar(80),
arrive_airport_3 varchar(80),
flightno_4 varchar(80),
leave_4 DATETIME,
leave_city_4 varchar(80),
leave_airport_4 varchar(80),
arrive_4 DATETIME,
arrive_city_4 varchar(80),
arrive_airport_4 varchar(80),
flightno_5 varchar(80),
leave_5 DATETIME,
leave_city_5 varchar(80),
leave_airport_5 varchar(80),
arrive_5 DATETIME,
arrive_city_5 varchar(80),
arrive_airport_5 varchar(80),
FamilyMember int(2),
LugBag int(1),
LugBox int(1),
LugBin int(1),
NeedTemp tinyint,
NeedRoommate tinyint,
TempApart varchar(50),
otherneed TEXT,
AddTempApart varchar(50),
PickupID int(10),
admin varchar(50),
whetherpickup tinyint,
usaTEL varchar(50),
BbqPeoNum varchar(50),
villegename varchar(50),
address varchar(50),
PRIMARY KEY (ID)
);

CREATE TABLE trash_customer_beta{**same above**} //this table for recovery data by mangers.


Table for volunteer user:

CREATE TABLE volunteer_beta(
ID int(10) NOT NULL AUTO_INCREMENT,
username varchar(50) NOT NULL UNIQUE,
psw varchar(50) NOT NULL,
lastname varchar(50) NOT NULL,
firstname varchar(50) NOT NULL,
gender varchar(50) NOT NULL,
email varchar(50) NOT NULL,
telephone varchar(50) NOT NULL,
emailornot varchar(50),
approvednum INT,
helpornot varchar(50),
hometown varchar(50),
PreviousSchool varchar(50),
supplement TEXT,
admin varchar(50),
PRIMARY KEY (ID)
);

CREATE TABLE trash_volunteer_beta{**same above**} //this table for recovery data by mangers.

Table for manger user:

CREATE TABLE admin_beta(
ID int(10) NOT NULL AUTO_INCREMENT,
username varchar(50) NOT NULL UNIQUE,
psw varchar(50) NOT NULL,
lastname varchar(50) NOT NULL,
firstname varchar(50) NOT NULL,
gender varchar(50) NOT NULL,
email varchar(50) NOT NULL,
invitnumber varchar(50) NOT NULL,
PRIMARY KEY (ID)
);


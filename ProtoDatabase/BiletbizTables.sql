DROP DATABASE BiletbizDatabase;
CREATE DATABASE BiletbizDatabase;
USE BiletbizDatabase;

CREATE TABLE LoginType(
loginEmail varChar(45) NOT NULL,

loginPassword varChar(120),
isCompany BOOLEAN,
PRIMARY KEY(loginEmail)
);

CREATE TABLE User(
email varChar(45) NOT NULL,

username varChar(45) NOT NULL,
isBanned Boolean default false,
isAdminstrator Boolean default false,
PRIMARY KEY(email),
FOREIGN KEY(email) REFERENCES LoginType(loginEmail)
);


CREATE TABLE Company(
CompanyEmail VarChar(45) NOT NULL,

ApprovedCompany Boolean,
CompanyName VarChar(100) NOT NULL,
CompanyAdress VarChar(200) NOT NULL,
CompanyPhone VarChar(11) NOT NULL,
PRIMARY KEY(CompanyEmail),
FOREIGN KEY(CompanyEmail) REFERENCES LoginType(loginEmail));


CREATE TABLE Event(
idEvent INT NOT NULL AUTO_INCREMENT,

VipAvailability BOOLEAN,
SeatAvailability BOOLEAN,
TicketPrice double NOT NULL,
VIPTicketPrice double,
EventHour TIME,
ECompanyEmail varChar(45) NOT NULL,
EventName VarChar(45) NOT NULL,
EventDate date NOT NULL,
EventDescription VarChar(1500) NOT NULL,
EventLocation VarChar(250) NOT NULL,
EventNoLongerPurchasable BOOLEAN,
EventCapacity INTEGER,
VIPEventCapacity INTEGER,

PRIMARY KEY(idEvent),
FOREIGN KEY(ECompanyEmail) REFERENCES Company(CompanyEmail));



CREATE TABLE Ticket(
TicketID INTEGER NOT NULL AUTO_INCREMENT,
seat INTEGER,
TUserEmail varChar(45) NOT NULL,
idEventID INTEGER NOT NULL,



PRIMARY KEY(TicketID),
FOREIGN KEY (TUserEmail) REFERENCES User(email),
FOREIGN KEY (idEventID) REFERENCES Event(idEvent),
UNIQUE KEY SeatEvent (seat,idEventID));



CREATE TABLE Reservation(
Reserved BOOLEAN DEFAULT true,
RTicketID INTEGER NOT NULL,
RUserEmail varChar(45) NOT NULL,
REventID INTEGER NOT NULL,
PRIMARY KEY(RTicketID,RUserEmail,REventID),
FOREIGN KEY(RTicketID) REFERENCES Ticket(TicketID),
FOREIGN KEY(RUserEmail) REFERENCES User(email),
FOREIGN KEY(REventID) REFERENCES Event(idEvent));






CREATE TABLE News(
NewsTitle varChar(200),
NewsDescription varChar(1500),

PRIMARY KEY(NewsTitle));





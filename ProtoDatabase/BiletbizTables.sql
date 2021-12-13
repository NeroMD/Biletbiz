
DROP DATABASE BiletbizDatabase;
CREATE DATABASE BiletbizDatabase;
USE BiletbizDatabase;


CREATE TABLE User(
UserID varChar(10) NOT NULL,
username varChar(45) NOT NULL,
email varChar(45) NOT NULL,
fname varChar(40) NOT NULL,
lname varChar(40) NOT NULL,
password varChar(20) NOT NULL,
isBanned Boolean default false,
isAdminstrator Boolean default false,
PRIMARY KEY(UserID,username,email));





CREATE TABLE Company(
CompanyID varChar(10) NOT NULL,
CompanyName VarChar(45) NOT NULL,
CompanyAdress VarChar(45) NOT NULL,
CompanyPhone VarChar(11) NOT NULL,
CompanyEmail VarChar(45) NOT NULL,
CompanyPassword VarChar(20) NOT NULL,
PRIMARY KEY(CompanyID,CompanyEmail));


CREATE TABLE LoginType(
loginEmail varChar(45) NOT NULL,
loginPassword varChar(20) NOT NULL,
AccountType VarChar(4) CHECK (AccountType IN ('USER','COMP')),
UID varChar(10) NOT NULL,
PRIMARY KEY(loginEmail,loginPassword,AccountType,UID),
FOREIGN KEY(UID) REFERENCES User(UserID),
FOREIGN KEY(UID) REFERENCES Company(CompanyID));


CREATE TABLE Event(
idEvent varChar(10) NOT NULL,
idCompanyID varChar(10) NOT NULL,
EventName VarChar(45) NOT NULL,
EventPrice double NOT NULL,
EventDate date NOT NULL,
EventDescription VarChar(300) NOT NULL,
EventLocation VarChar(50) NOT NULL,
EventNoLongerPurchasable BOOLEAN,
EventCapacity INTEGER,
PRIMARY KEY(idEvent,idCompanyID,EventName,EventPrice,EventDate));

CREATE TABLE Ticket(
TicketID varChar(12) NOT NULL,
TUserID varChar(10) NOT NULL,
idEventID varChar(10) NOT NULL,
seat INTEGER,
PRIMARY KEY(TicketID),
FOREIGN KEY (TUserID) REFERENCES User(UserID),
FOREIGN KEY (idEventID) REFERENCES Event(idEvent));



CREATE TABLE Reservation(
Reserved BOOLEAN DEFAULT true,
RTicketID varChar(12) NOT NULL,
RUserID varChar(10) NOT NULL,
REventID varChar(10) NOT NULL,
PRIMARY KEY(RTicketID,RUserID,REventID),
FOREIGN KEY(RTicketID) REFERENCES Ticket(TicketID),
FOREIGN KEY(RUserID) REFERENCES User(UserID),
FOREIGN KEY(REventID) REFERENCES Event(idEvent));



CREATE TABLE Receipt(
ReceiptID varChar(15) NOT NULL,
ReceiptDate date NOT NULL,
ReceiptPayment DOUBLE NOT NULL,

PurchaserID VarChar(10) NOT NULL,
PurchaserUsername VarChar(45) NOT NULL,
PurchaserEmail VarChar(45) NOT NULL,

ReceiptTicketID varChar(12) NOT NULL,

ReceiptEventID varChar(10) NOT NULL,
OrganizatorCompanyID VarChar(10) NOT NULL,
ReceiptEventName VarChar(45) NOT NULL,
ReceiptEventPrice double NOT NULL,
ReceiptEventDate date NOT NULL,


PRIMARY KEY(ReceiptID,ReceiptDate,ReceiptPayment,PurchaserID,PurchaserUsername,PurchaserEmail,ReceiptTicketID,OrganizatorCompanyID,ReceiptEventName,ReceiptEventID,ReceiptEventPrice,ReceiptEventDate),

FOREIGN KEY(PurchaserID,PurchaserUsername,PurchaserEmail) REFERENCES User(UserID,username,email),

FOREIGN KEY(ReceiptTicketID) REFERENCES Ticket(TicketID),

FOREIGN KEY(ReceiptEventID,OrganizatorCompanyID,ReceiptEventName,ReceiptEventPrice,ReceiptEventDate) REFERENCES Event(idEvent,idCompanyID,EventName,EventPrice,EventDate)

);


CREATE TABLE CompanyRequest(
RequestDescription VarChar(400),
PRIMARY KEY(RequestDescription));

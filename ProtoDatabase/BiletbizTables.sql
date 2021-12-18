
DROP DATABASE BiletbizDatabase;
CREATE DATABASE BiletbizDatabase;
USE BiletbizDatabase;

CREATE TABLE LoginType(
loginEmail varChar(45) NOT NULL,

loginPassword varChar(20),
isCompany BOOLEAN,
PRIMARY KEY(loginEmail)
);

CREATE TABLE User(
email varChar(45) NOT NULL,

username varChar(45) NOT NULL,
fname varChar(40) NOT NULL,
lname varChar(40) NOT NULL,
isBanned Boolean default false,
isAdminstrator Boolean default false,
PRIMARY KEY(email),
FOREIGN KEY(email) REFERENCES LoginType(loginEmail)
);


CREATE TABLE Company(
CompanyEmail VarChar(45) NOT NULL,

CompanyName VarChar(45) NOT NULL,
CompanyAdress VarChar(45) NOT NULL,
CompanyPhone VarChar(11) NOT NULL,
PRIMARY KEY(CompanyEmail),
FOREIGN KEY(CompanyEmail) REFERENCES LoginType(loginEmail)
);


CREATE TABLE Event(
idEvent varChar(10) NOT NULL,
ECompanyEmail varChar(45) NOT NULL,
EventName VarChar(45) NOT NULL,
EventPrice double NOT NULL,
EventDate date NOT NULL,
EventDescription VarChar(300) NOT NULL,
EventLocation VarChar(50) NOT NULL,
EventNoLongerPurchasable BOOLEAN,
EventCapacity INTEGER,
PRIMARY KEY(idEvent,ECompanyEmail,EventName,EventPrice,EventDate),
FOREIGN KEY(ECompanyEmail) REFERENCES Company(CompanyEmail));

CREATE TABLE Ticket(
TicketID varChar(12) NOT NULL,
seat INTEGER,
idEventID varChar(10) NOT NULL,

TUserEmail varChar(45) NOT NULL,


PRIMARY KEY(TicketID),
FOREIGN KEY (TUserEmail) REFERENCES User(email),
FOREIGN KEY (idEventID) REFERENCES Event(idEvent),
UNIQUE KEY SeatEvent (seat,idEventID));


CREATE TABLE Reservation(
Reserved BOOLEAN DEFAULT true,
RTicketID varChar(12) NOT NULL,
RUserEmail varChar(45) NOT NULL,
REventID varChar(10) NOT NULL,
PRIMARY KEY(RTicketID,RUserEmail,REventID),
FOREIGN KEY(RTicketID) REFERENCES Ticket(TicketID),
FOREIGN KEY(RUserEmail) REFERENCES User(email),
FOREIGN KEY(REventID) REFERENCES Event(idEvent));



CREATE TABLE Receipt(
ReceiptID varChar(15) NOT NULL,
ReceiptDate date NOT NULL,
ReceiptPayment DOUBLE NOT NULL,

PurchaserEmail VarChar(45) NOT NULL,

ReceiptTicketID varChar(12) NOT NULL,

ReceiptEventID varChar(10) NOT NULL,
OrganizatorCompanyEmail VarChar(45) NOT NULL,
ReceiptEventName VarChar(45) NOT NULL,
ReceiptEventPrice double NOT NULL,
ReceiptEventDate date NOT NULL,


PRIMARY KEY(ReceiptID,ReceiptDate,ReceiptPayment,PurchaserEmail,ReceiptTicketID,OrganizatorCompanyEmail,ReceiptEventName,ReceiptEventID,ReceiptEventPrice,ReceiptEventDate),

FOREIGN KEY(PurchaserEmail) REFERENCES User(email),

FOREIGN KEY(ReceiptTicketID) REFERENCES Ticket(TicketID),

FOREIGN KEY(ReceiptEventID,OrganizatorCompanyEmail,ReceiptEventName,ReceiptEventPrice,ReceiptEventDate) REFERENCES Event(idEvent,ECompanyEmail,EventName,EventPrice,EventDate)

);


CREATE TABLE CompanyRequest(
RequestDescription VarChar(400),
PRIMARY KEY(RequestDescription));
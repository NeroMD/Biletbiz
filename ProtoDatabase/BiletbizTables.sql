
DROP DATABASE BiletbizDatabase;
CREATE DATABASE BiletbizDatabase;
USE BiletbizDatabase;


CREATE TABLE User(
username varChar(45) NOT NULL,
fname varChar(40) NOT NULL,
lname varChar(40) NOT NULL,
password varChar(20) NOT NULL,
isBanned Boolean default false,
isAdminstrator Boolean,
PRIMARY KEY(username));



CREATE TABLE AdministatorUser(
AdminUsername varChar(45) NOT NULL,
AdminPassword varChar(20) NOT NULL,
AdminFname varChar(40) NOT NULL,
AdminLname varChar(40) NOT NULL,
AdminNormalUsername varChar(45),
PRIMARY KEY(AdminUsername),
FOREIGN KEY(AdminNormalUsername) REFERENCES User(username));

CREATE TABLE emails(
EmailUsername varChar(45), 
email varChar(45) NOT NULL,
PRIMARY KEY(EmailUsername,email),
FOREIGN KEY(EmailUsername) REFERENCES User(username));

CREATE TABLE Company(
idCompany varChar(7) NOT NULL,
CompanyName VarChar(45) NOT NULL,
CompanyAdress VarChar(45) NOT NULL,
CompanyPhone VarChar(11) NOT NULL,
CompanyEmail VarChar(45) NOT NULL,
CompanyPassword VarChar(20) NOT NULL,
PRIMARY KEY(idCompany));

CREATE TABLE Event(
idEvent varChar(10) NOT NULL,
idCompanyID varChar(7) NOT NULL,
EventName VarChar(45),
EventDescription VarChar(300) NOT NULL,
EventDate date NOT NULL,
EventLocation VarChar(50) NOT NULL,
EventisCancelled BOOLEAN,
EventPrice double NOT NULL,
EventCapacity INTEGER,
EventExpired VarChar(3) CHECK (EventExpired IN ('YES','NOT')),
EventOutOfSale BOOLEAN,
PRIMARY KEY(idEvent,idCompanyID,EventName,EventDescription,EventDate,EventLocation,EventisCancelled,EventPrice,EventCapacity,EventExpired,EventOutOfSale));

CREATE TABLE Ticket(
TicketID varChar(10) NOT NULL,
TUsername varChar(7) NOT NULL,
idEventID varChar(10) NOT NULL,
seat INTEGER,
PRIMARY KEY(TicketID),
FOREIGN KEY (TUsername) REFERENCES User(username),
FOREIGN KEY (idEventID) REFERENCES Event(idEvent));



CREATE TABLE Reservation(
Reserved BOOLEAN DEFAULT true,
RTicketID varChar(10) NOT NULL,
RUsername varChar(45) NOT NULL,
REventID varChar(10) NOT NULL,
PRIMARY KEY(RTicketID,RUsername,REventID),
FOREIGN KEY(RTicketID) REFERENCES Ticket(TicketID),
FOREIGN KEY(RUsername) REFERENCES User(username),
FOREIGN KEY(REventID) REFERENCES Event(idEvent));



CREATE TABLE Receipt(
InvoiceNo INTEGER(10) NOT NULL,
ReceiptDate date NOT NULL,
PurchaserEmail VarChar(45) NOT NULL,
PurchaserUsername VarChar(45) NOT NULL,
OrganizatorCompanyID VarChar(7) NOT NULL,
PRIMARY KEY(InvoiceNo,ReceiptDate,PurchaserEmail,PurchaserUsername,OrganizatorCompanyID),
FOREIGN KEY(PurchaserUsername,PurchaserEmail) REFERENCES emails(EmailUsername,email),
FOREIGN KEY(OrganizatorCompanyID) REFERENCES Company(idCompany));


CREATE TABLE CompanyRequest(
RequestDescription VarChar(200),
PRIMARY KEY(RequestDescription));

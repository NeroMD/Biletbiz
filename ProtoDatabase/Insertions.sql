


INSERT INTO LoginType(loginEmail,loginPassword,isCompany)
VALUES('ugurkaya@hotmail.com','12241212',False),
	  ('kayalar@hotmail.com', '3151355',True);

INSERT INTO User(email,username,fname,lname,isBanned,isAdminstrator)
VALUES('ugurkaya@hotmail.com','Ugur97','Ugur','Kucukkaptan',False,False);


INSERT INTO Company(CompanyEmail,CompanyName,CompanyAdress,CompanyPhone)
VALUES('kayalar@hotmail.com','adasdaqq','dasdas','asdasdas');

INSERT INTO Event(idEvent,ECompanyEmail,EventName,EventPrice,EventDate,EventDescription,EventLocation,EventNoLongerPurchasable,EventCapacity)
VALUES('123124','kayalar@hotmail.com','aefaf',15,24/12/1990,'aaaaaaaa','aaaaaa',False,5);
	  
INSERT INTO Event(idEvent,ECompanyEmail,EventName,EventPrice,EventDate,EventDescription,EventLocation,EventNoLongerPurchasable,EventCapacity)
VALUES('123125','kayalar@hotmail.com','aefaf',15,24/12/1990,'aaaaaaaa','aaaaaa',False,5);

INSERT INTO Ticket(TicketID,seat,TUserEmail,idEventID)
VALUES('123123',52,'ugurkaya@hotmail.com',123124);

INSERT INTO Ticket(TicketID,seat,TUserEmail,idEventID)
VALUES('123124',52,'ugurkaya@hotmail.com',123124);

INSERT INTO Ticket(TicketID,seat,TUserEmail,idEventID)
VALUES('123125',52,'ugurkaya@hotmail.com',123125);

SELECT * FROM LoginType;
SELECT * FROM User;
SELECT * FROM Company;
SELECT * FROM Event;
SELECT * FROM Ticket;
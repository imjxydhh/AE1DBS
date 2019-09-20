CREATE TABLE Guests(
	Username VARCHAR(15) PRIMARY KEY,
	Password VARCHAR(20),
	RealName VARCHAR(255),
	PassportID VARCHAR(20) UNIQUE,
	TelNumber VARCHAR(20),
	Email VARCHAR(255)
);

CREATE TABLE RoomTypeInfo(
	RoomID INTEGER(2) PRIMARY KEY,  
	Roomtype CHAR(3)
);

CREATE TABLE Rooms(
	RoomID INTEGER(2),
	Stairs INTEGER(2),
	CONSTRAINT PK
	PRIMARY KEY (RoomID, Stairs),
	CONSTRAINT IDFK
	FOREIGN KEY
	(RoomID)
	REFERENCES
	RoomTypeInfo (RoomID)
);

CREATE TABLE BookInfo(
	bookID INT AUTO_INCREMENT PRIMARY KEY,
	Username VARCHAR(15),
	RoomID INTEGER(2),
	Stairs INTEGER(2),
	startDate DATE DEFAULT NULL,
	endDate DATE DEFAULT NULL,
	CONSTRAINT bookER
	FOREIGN KEY
	(Username)
	REFERENCES 
	Guests (Username),
	CONSTRAINT roomID
	FOREIGN KEY
	(RoomID, Stairs)
	REFERENCES
	Rooms (RoomID, Stairs)
);

CREATE TABLE Staffs(
    StaffID  INT AUTO_INCREMENT PRIMARY KEY,
	Username VARCHAR(15) UNIQUE,
	Password VARCHAR(20),
	RealName VARCHAR(255),
	TelNumber VARCHAR(20)
);

INSERT INTO RoomTypeInfo
	VALUES 
	(1,'ldb'),
	(2,'ldb'),
	(11,'ldb'),
	(12,'ldb'),
	(3,'lsb'),
	(4,'lsb'),
	(9,'lsb'),
	(10,'lsb'),
	(5,'ssb'),
	(6,'ssb'),
	(7,'ssb'),
	(8,'ssb'),
	(13,'vip');

INSERT INTO Rooms
	(RoomID, Stairs)
	VALUES
	(1, 1),
	(2, 1),
	(3, 1),
	(4, 1),
	(5, 1),
	(6, 1),
	(7, 1),
	(8, 1),
	(9, 1),
	(10, 1),
	(11, 1),
	(12, 1),
	(13, 1),
	(1, 2),
	(2, 2),
	(3, 2),
	(4, 2),
	(5, 2),
	(6, 2),
	(7, 2),
	(8, 2),
	(9, 2),
	(10, 2),
	(11, 2),
	(12, 2),
	(13, 2),
	(1, 3),
	(2, 3),
	(3, 3),
	(4, 3),
	(5, 3),
	(6, 3),
	(7, 3),
	(8, 3),
	(9, 3),
	(10, 3),
	(11, 3),
	(12, 3),
	(13, 3),
	(1, 4),
	(2, 4),
	(3, 4),
	(4, 4),
	(5, 4),
	(6, 4),
	(7, 4),
	(8, 4),
	(9, 4),
	(10, 4),
	(11, 4),
	(12, 4),
	(13, 4),
	(1, 5),
	(2, 5),
	(3, 5),
	(4, 5),
	(5, 5),
	(6, 5),
	(7, 5),
	(8, 5),
	(9, 5),
	(10, 5),
	(11, 5),
	(12, 5),
	(13, 5),
	(1, 6),
	(2, 6),
	(3, 6),
	(4, 6),
	(5, 6),
	(6, 6),
	(7, 6),
	(8, 6),
	(9, 6),
	(10, 6),
	(11, 6),
	(12, 6),
	(13, 6),
	(1, 7),
	(2, 7),
	(3, 7),
	(4, 7),
	(5, 7),
	(6, 7),
	(7, 7),
	(8, 7),
	(9, 7),
	(10, 7),
	(11, 7),
	(12, 7),
	(13, 7),
	(1, 8),
	(2, 8),
	(3, 8),
	(4, 8),
	(5, 8),
	(6, 8),
	(7, 8),
	(8, 8),
	(9, 8),
	(10, 8),
	(11, 8),
	(12, 8),
	(13, 8),
	(1, 9),
	(2, 9),
	(3, 9),
	(4, 9),
	(5, 9),
	(6, 9),
	(7, 9),
	(8, 9),
	(9, 9),
	(10, 9),
	(11, 9),
	(12, 9),
	(13, 9),
	(1, 10),
	(2, 10),
	(3, 10),
	(4, 10),
	(5, 10),
	(6, 10),
	(7, 10),
	(8, 10),
	(9, 10),
	(10, 10),
	(11, 10),
	(12, 10),
	(13, 10);
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
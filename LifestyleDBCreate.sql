CREATE DATABASE LifestyleDB;

CREATE TABLE users (
	userID INT(6) AUTO_INCREMENT PRIMARY KEY,
	userName VARCHAR(32) NOT NULL,
	userPass VARCHAR(16) NOT NULL,
	currentTimestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
        
CREATE TABLE lists (
	listID INT(6) AUTO_INCREMENT PRIMARY KEY,
	listDate DATETIME NOT NULL,
	listDesc VARCHAR(128) NOT NULL
);
        
CREATE TABLE passwords (
	passID INT(6) AUTO_INCREMENT PRIMARY KEY,
	passName VARCHAR(32) NOT NULL,
	passDesc VARCHAR(64) NOT NULL
);
        
CREATE TABLE notes (
	notesID INT(6) AUTO_INCREMENT PRIMARY KEY,
	notesDesc VARCHAR(256) NOT NULL
);
        
INSERT INTO users (userName, userPass) VALUES ('Steve', 'Captain99');
INSERT INTO lists (listDate, listDesc) VALUES ('1/1/01', 'This is an example of describing your todo');
INSERT INTO passwords (passName, passDesc) VALUES ('Falcon66', 'Gmail');
INSERT INTO notes (notesDesc) VALUES ('This field has a maximum of two-hundred-fifty-six characters.');
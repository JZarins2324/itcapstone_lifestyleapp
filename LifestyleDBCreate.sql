CREATE DATABASE IF NOT EXISTS LifestyleDB;

CREATE TABLE IF NOT EXISTS users (
          userID INT AUTO_INCREMENT,
          userName VARCHAR(128) NOT NULL,
          userPass VARCHAR(128) NOT NULL,
          currentTimestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
          PRIMARY KEY (userID)
        );
        
CREATE TABLE IF NOT EXISTS tasks (
          taskID INT NOT NULL AUTO_INCREMENT,
          taskDate DATETIME NOT NULL,
          taskDesc VARCHAR(128) NOT NULL,
          userID INT,
          PRIMARY KEY (taskID),
          FOREIGN KEY (userID) REFERENCES users(userID)
        );
        
CREATE TABLE IF NOT EXISTS passwords (
          passID INT NOT NULL AUTO_INCREMENT,
          passName VARCHAR(32) NOT NULL,
          passDesc VARCHAR(64) NOT NULL,
          userID INT,
          PRIMARY KEY (passID),
          FOREIGN KEY (userID) REFERENCES users(userID)
        );
        
CREATE TABLE IF NOT EXISTS notes (
          notesID INT NOT NULL AUTO_INCREMENT,
          notesDesc VARCHAR(256) NOT NULL,
          userID INT,
          PRIMARY KEY (notesID),
          FOREIGN KEY (userID) REFERENCES users(userID)
        );
<?php // Author: Samuel Schmitz ?>

<!DOCTYPE html>
<html>
  <body>
    <header>This is used to create the database.</header>
    <?PHP
      $connectionRequestedByApp = true;
      include "includes/dbconnect.php";
      // Create Connection
      $conn = new mysqli($host, $user, $pass, $dbname);
      // Check Connection
      if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
      }
      echo "Connected Successfully";
      // Create Tables
      $createLifestyleDB = "CREATE DATABASE IF NOT EXISTS LifestyleDB;";
      
      $createUsers = "CREATE TABLE IF NOT EXISTS users (
          userID INT(6) AUTO_INCREMENT,
          userName VARCHAR(128) NOT NULL,
          userPass VARCHAR(128) NOT NULL,
          currentTimestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
          PRIMARY KEY (userID)
        );";
        
        $createTasks = "CREATE TABLE IF NOT EXISTS tasks (
          taskID INT(6) NOT NULL AUTO_INCREMENT,
          taskName VARCHAR(32) NOT NULL,
          taskDesc VARCHAR(128) NOT NULL,
          taskDate DATETIME NOT NULL,
          taskCreate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
          taskModify TIMESTAMP,
          userID INT(6),
          PRIMARY KEY (taskID),
          FOREIGN KEY (userID) REFERENCES users(userID)
        );";
        
        $createPasswords = "CREATE TABLE IF NOT EXISTS passwords (
          passID INT(6) NOT NULL AUTO_INCREMENT,
          passName VARCHAR(32) NOT NULL,
          passDesc VARCHAR(128) NOT NULL,
          passCreate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
          passModify TIMESTAMP,
          userID INT(6),
          PRIMARY KEY (passID),
          FOREIGN KEY (userID) REFERENCES users(userID)
        );";
        
        $createNotes = "CREATE TABLE IF NOT EXISTS notes (
          noteID INT(6) NOT NULL AUTO_INCREMENT,
          noteName VARCHAR(32) NOT NULL,
          noteDesc VARCHAR(256) NOT NULL,
          noteCreate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
          noteModify TIMESTAMP,
          userID INT(6),
          PRIMARY KEY (noteID),
          FOREIGN KEY (userID) REFERENCES users(userID)
        );";


        // Create Checks
        if ($conn->query($createLifestyleDB) === true) {
          echo "SQL running successfully";
        } else {
          echo "Error in SQL: " . $conn->error;
        };

        if ($conn->query($createUsers) !== true) {
          echo "Error in SQL: " . $conn->error;
        };

        if ($conn->query($createTasks) !== true) {
          echo "Error in SQL: " . $conn->error;
        };

        if ($conn->query($createPasswords) !== true) {
          echo "Error in SQL: " . $conn->error;
        };

        if ($conn->query($createNotes) !== true) {
          echo "Error in SQL: " . $conn->error;
        };

        // Close connection
        $conn->close();
    ?>
  </body>
</html>

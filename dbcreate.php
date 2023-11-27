<?php // Author: Samuel Schmitz ?>

<!DOCTYPE html>
<html>
  <body>
    <header>This is used to create the database.</header>
    <?PHP
      // $connectionRequestedByApp = true;
      // include "includes/dbconnect.php";
      // Create Connection
      $conn = new mysqli($host, $user, $pass, $dbname);
      // Check Connection
      if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
      }
      echo "Connected Successfully";
      // Create Tables
      $createLifestyleDB = "CREATE DATABASE IF NOT EXISTS LifestyleDB;";
      
			if ($conn->query($createLifestyleDB) === true) {
				echo "database LifestyleDB created successfully<br>";
			} else {
				echo "Error creating database: " . $conn->error . "<br>";
			}

			$conn->select_db("LifestyleDB");

      $createUsers = "CREATE TABLE IF NOT EXISTS users (
          userID INT(6) AUTO_INCREMENT,
          userName VARCHAR(128) NOT NULL,
          userPass VARCHAR(128) NOT NULL,
          currentTimestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
          PRIMARY KEY (userID)
        );";
        
        $createTasks = "CREATE TABLE IF NOT EXISTS tasks (
          taskID INT(6) NOT NULL AUTO_INCREMENT,
          taskDate DATETIME NOT NULL,
          taskDesc VARCHAR(128) NOT NULL,
          userID INT(6),
          PRIMARY KEY (taskID),
          FOREIGN KEY (userID) REFERENCES users(userID)
        );";
        
        $createPasswords = "CREATE TABLE IF NOT EXISTS passwords (
          passID INT(6) NOT NULL AUTO_INCREMENT,
          passName VARCHAR(32) NOT NULL,
          passDesc VARCHAR(64) NOT NULL,
          userID INT(6),
          PRIMARY KEY (passID),
          FOREIGN KEY (userID) REFERENCES users(userID)
        );";
        
        $createNotes = "CREATE TABLE IF NOT EXISTS notes (
          notesID INT(6) NOT NULL AUTO_INCREMENT,
          notesDesc VARCHAR(256) NOT NULL,
          userID INT(6),
          PRIMARY KEY (notesID),
          FOREIGN KEY (userID) REFERENCES users(userID)
        );";
        
        $userData = "INSERT INTO users (userName, userPass) VALUES ('Steve', 'Captain99');";
        $taskData = "INSERT INTO tasks (taskDate, taskDesc) VALUES ('1/1/01', 'This is an example of describing your todo');";
        $passwordData = "INSERT INTO passwords (passName, passDesc) VALUES ('Falcon66', 'Gmail');";
        $notesData = "INSERT INTO notes (notesDesc) VALUES ('This field has a maximum of two-hundred-fifty-six characters.');";
        
        if ($conn->query($createLifestyleDB) !== true) {
          $userData = "INSERT INTO users (userName, userPass) VALUES ('Steve', 'Captain99');";
          $listData = "INSERT INTO lists (listDate, listDesc) VALUES ('1/1/01', 'This is an example of describing your todo');";
          $passwordData = "INSERT INTO passwords (passName, passDesc) VALUES ('Falcon66', 'Gmail');";
          $notesData = "INSERT INTO notes (notesDesc) VALUES ('This field has a maximum of two-hundred-fifty-six characters.');";

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

          if ($conn->query($userData) !== true) {
            echo "Error in SQL: " . $conn->error;
          };

          if ($conn->query($taskData) !== true) {
            echo "Error in SQL: " . $conn->error;
          };

          if ($conn->query($passwordData) !== true) {
            echo "Error in SQL: " . $conn->error;
          };

          if ($conn->query($notesData) !== true) {
            echo "Error in SQL: " . $conn->error;
          };
        }

        // Close connection
        $conn->close();
    ?>
  </body>
</html>
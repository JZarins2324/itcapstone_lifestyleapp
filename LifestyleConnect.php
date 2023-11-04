<!DOCTYPE html>
<html>
  <body>
    <header>This is used to create the database.</header>
    <?php
      $serverName = "localhost";
      $username = "root";
      $password = "mysql";
      $dbname = "LifestyleDB";

      // Create Connection
      $conn = new mysqli($serverName, $username, $password, $dbname);
      // Check Connection
      if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
      }
      echo "Connected Successfully";

      // Create Tables
      $createLifestyleDB = "CREATE DATABASE LifestyleDB;";
      
      $createUsers = "CREATE TABLE users (
          userID INT(6) AUTO_INCREMENT,
          userName VARCHAR(16) NOT NULL,
          userPass VARCHAR(16) NOT NULL,
          currentTimestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
          PRIMARY KEY (userID)
        );";
        
        $createLists = "CREATE TABLE lists (
          listID INT(6) NOT NULL AUTO_INCREMENT,
          listDate DATETIME NOT NULL,
          listDesc VARCHAR(128) NOT NULL,
          userID INT(6),
          PRIMARY KEY (listID),
          FOREIGN KEY (userID) REFERENCES users(userID)
        );";
        
        $createPasswords = "CREATE TABLE passwords (
          passID INT(6) NOT NULL AUTO_INCREMENT,
          passName VARCHAR(32) NOT NULL,
          passDesc VARCHAR(64) NOT NULL,
          userID INT(6),
          PRIMARY KEY (passID),
          FOREIGN KEY (userID) REFERENCES users(userID)
        );";
        
        $createNotes = "CREATE TABLE notes (
          notesID INT(6) NOT NULL AUTO_INCREMENT,
          notesDesc VARCHAR(256) NOT NULL,
          userID INT(6),
          PRIMARY KEY (notesID),
          FOREIGN KEY (userID) REFERENCES users(userID)
        );";
        
        $userData = "INSERT INTO users (userName, userPass) VALUES ('Steve', 'Captain99');";
        $listData = "INSERT INTO lists (listDate, listDesc) VALUES ('1/1/01', 'This is an example of describing your todo');";
        $passwordData = "INSERT INTO passwords (passName, passDesc) VALUES ('Falcon66', 'Gmail');";
        $notesData = "INSERT INTO notes (notesDesc) VALUES ('This field has a maximum of two-hundred-fifty-six characters.');";

        if ($conn->query($createLifestyleDB) === true) {
          echo "SQL running successfully";
        } else {
          echo "Error in SQL: " . $conn->error;
        };

        if ($conn->query($createUsers) === true) {
          echo "SQL running successfully";
        } else {
          echo "Error in SQL: " . $conn->error;
        };

        if ($conn->query($createLists) === true) {
          echo "SQL running successfully";
        } else {
          echo "Error in SQL: " . $conn->error;
        };

        if ($conn->query($createPasswords) === true) {
          echo "SQL running successfully";
        } else {
          echo "Error in SQL: " . $conn->error;
        };

        if ($conn->query($createNotes) === true) {
          echo "SQL running successfully";
        } else {
          echo "Error in SQL: " . $conn->error;
        };

        if ($conn->query($userData) === true) {
          echo "SQL running successfully";
        } else {
          echo "Error in SQL: " . $conn->error;
        };

        if ($conn->query($listData) === true) {
          echo "SQL running successfully";
        } else {
          echo "Error in SQL: " . $conn->error;
        };

        if ($conn->query($passwordData) === true) {
          echo "SQL running successfully";
        } else {
          echo "Error in SQL: " . $conn->error;
        };

        if ($conn->query($notesData) === true) {
          echo "SQL running successfully";
        } else {
          echo "Error in SQL: " . $conn->error;
        };

        $conn->close();
    ?>

  </body>
</html>
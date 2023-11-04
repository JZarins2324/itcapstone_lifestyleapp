<!DOCTYPE html>
<html>
  <body>

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
      $sql = "CREATE DATABASE LifestyleDB;
      
        CREATE TABLE users (
        userID INT(6) AUTO_INCREMENT PRIMARY KEY,
        userName VARCHAR(16) NOT NULL,
        userPass VARCHAR(16) NOT NULL,
        currentTimestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        );
        
        CREATE TABLE lists (
        listID INT(6) AUTO_INCREMENT PRIMARY KEY,
        userID INT(6) AUTO_INCREMENT FOREIGN KEY,
        listDate DATETIME NOT NULL,
        listDesc VARCHAR(128) NOT NULL
        );
        
        CREATE TABLE passwords (
        passID INT(6) AUTO_INCREMENT PRIMARY KEY,
        userID INT(6) AUTO_INCREMENT FOREIGN KEY,
        passName VARCHAR(32) NOT NULL,
        passDesc VARCHAR(64) NOT NULL
        );
        
        CREATE TABLE notes (
        notesID INT(6) AUTO_INCREMENT PRIMARY KEY,
        userID INT(6) AUTO_INCREMENT FOREIGN KEY,
        notesDesc VARCHAR(256) NOT NULL
        );
        
        INSERT INTO users (userName, userPass) VALUES ('Example Name: Steve', 'Example Password: Captain99');
        INSERT INTO lists (listDate, listDesc) VALUES ('Example Date: 1/1/01', 'This is an example of describing your todo');
        INSERT INTO passwords (passName, passDesc) VALUES ('Example Password: Falcon66', 'Example Website: Gmail');
        INSERT INTO notes (notesDesc) VALUES ('Example: This field has a maximum of two-hundred-fifty-six characters.";

        if ($conn->query($sql) === true) {
          echo "SQL running successfully";
        } else {
          echo "Error in SQL: " . $conn->error;
        }

        $conn->close();
    ?>

  </body>
</html>
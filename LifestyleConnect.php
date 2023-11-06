<!DOCTYPE html>
<html>
  <body>
    <header>This is used to create the database.</header>
    <?php
      include "../includes/dbconnect.php";

      // Create Connection
      $conn = new mysqli($host, $user, $pass, $dbname);
      // Check Connection
      if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
      }
      echo "Connected Successfully";

      // Create Tables
      $createLifestyleDB = "CREATE DATABASE LifestyleDB;";
      
      $createUsers = "CREATE TABLE users (
          userID INT(6) AUTO_INCREMENT,
          userName VARCHAR(128) NOT NULL,
          userPass VARCHAR(128) NOT NULL,
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

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully or already exists\n";
} else {
    echo "Error creating database: " . $conn->error;
    $conn->close();
    exit;
}

// Select the database
$conn->select_db($dbname);

// SQL to create table
$createUsers = "CREATE TABLE IF NOT EXISTS users (
	userID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	userName VARCHAR(30) NOT NULL,
	userPass VARCHAR(255) NOT NULL,
	currentTimestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";


// Check and create table if it doesn't exist
if ($conn->query($createUsers) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Close connection
$conn->close();
?>

<?php
$serverName = "localhost";
$username = "root"; // It's recommended to use a username other than 'root' for applications
$password = "mysql";
$dbname = "LifestyleDB";

try {
	// Create a new PDO instance
	$pdo = new PDO("mysql:host=$serverName;dbname=$dbname;charset=utf8mb4", $username, $password);
	// Set the PDO error mode to exception
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	// If you reach this point, the connection was successful
	echo "Connected successfully";
} catch (PDOException $e) {
	// If an exception occurs, handle it here
	echo "Connection failed: " . $e->getMessage();
	exit; // Stop the script if the connection fails
}

// Create connection
$conn = new mysqli($serverName, $username, $password);

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

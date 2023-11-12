<?php // Author: Samuel Schmitz ?>
<?php
// Create Connection
  // Database Variables
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
  
  //$taskData = array($conn->query("SELECT taskDate, taskDesc FROM tasks;"));
?>
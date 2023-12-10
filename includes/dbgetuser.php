<?php
  include "../includes/dbconnect.php";

  if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
  }

  // Get User Data
  $userData = $conn->query("SELECT userID, userName, currentTimestamp FROM users ORDER BY userID ASC;");
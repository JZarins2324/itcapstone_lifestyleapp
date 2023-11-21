<?php
  include "../includes/dbconnect.php";

  $conn = new mysqli($host, $user, $pass, $dbname);

  if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
  }

  $userData = $conn->query("SELECT userID, userName, currentTimestamp FROM users;");
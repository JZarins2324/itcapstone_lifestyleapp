<?php // Author: Samuel Schmitz ?>
<?php
include "../includes/dbconnect.php";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
  die("Connection Failed: " . $conn->connect_error);
}

$userData = $conn->query("SELECT userID, userName, currentTimestamp FROM users;");
$taskData = $conn->query("SELECT taskID, taskDate, taskDesc, userID, userName FROM users INNER JOIN tasks USING (userID);");
$noteData = $conn->query("SELECT notesID, notesDesc, userID, userName FROM users INNER JOIN notes USING (userID);");

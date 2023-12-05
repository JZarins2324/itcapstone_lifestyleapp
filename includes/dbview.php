<?php // Author: Samuel Schmitz ?>
<?php include "../includes/dbconnect.php";

  if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
  }

  // Get userID for SQL Queries
  $userID = $_SESSION['user_id'];

  $taskData = $conn->query("SELECT taskID, taskName, taskDesc, taskDate FROM tasks WHERE userID = $userID ORDER BY taskDate ASC;");
  $passData = $conn->query("SELECT passID, passName, passDesc FROM passwords WHERE userID = $userID;");
  $noteData = $conn->query("SELECT noteID, noteName, noteDesc FROM notes WHERE userID = $userID;");

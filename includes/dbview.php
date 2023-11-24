<?php // Author: Samuel Schmitz ?>
<?php include "../includes/dbconnect.php";

  $conn = new mysqli($host, $user, $pass, $dbname);

  if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
  }

  $userID = $_SESSION['user_id'];

  $userData = $conn->query("SELECT userID, userName, currentTimestamp FROM users;");
  $taskData = $conn->query("SELECT taskID, taskDate, taskDesc, userID, userName FROM users INNER JOIN tasks USING (userID) WHERE userID = $userID;");
  $passData = $conn->query("SELECT passID, passName, passDesc, userID, userName FROM users INNER JOIN passwords USING (userID) WHERE userID = $userID;");
  $noteData = $conn->query("SELECT notesID, notesDesc, userID, userName FROM users INNER JOIN notes USING (userID) WHERE userID = $userID;");

?>
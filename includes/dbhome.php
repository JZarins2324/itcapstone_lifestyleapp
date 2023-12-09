<?php // Author: Samuel Schmitz ?>
<?php
  // Create Connection
  $connectionRequestedByApp = true;
  include "../includes/dbconnect.php";

  $userID = $_SESSION['user_id'];

  // Recent Data?
  $recentTask = $conn->query("SELECT taskID, taskName, taskDesc, taskDate, taskCreate, taskModify, userID, userName FROM users INNER JOIN tasks USING (userID) WHERE userID = $userID ORDER BY taskModify DESC LIMIT 1;");
 

  // New Data?
  $newTask = $conn->query("SELECT taskID, taskName, taskDesc, taskDate, taskCreate, taskModify, userID, userName FROM users INNER JOIN tasks USING (userID) WHERE userID = $userID ORDER BY taskCreate DESC LIMIT 1;");
 
  // Old Data?
  $oldTask = $conn->query("SELECT taskID, taskName, taskDesc, taskDate, taskCreate, taskModify, userID, userName FROM users INNER JOIN tasks USING (userID) WHERE userID = $userID ORDER BY taskCreate ASC LIMIT 1;");

?>
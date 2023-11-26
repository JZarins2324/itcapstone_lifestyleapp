<?php // Author: Samuel Schmitz ?>
<?php

  // Create Connection
  $serverName = "localhost";
  $username = "root";
  $password = "mysql";
  $dbname = "LifestyleDB";
  $conn = new mysqli($serverName, $username, $password, $dbname);

  // Recent Data?
  if (isset($recentData)) {
  $recentTask = $conn->query("SELECT taskID, taskDate, taskDesc, userID, userName FROM users INNER JOIN tasks USING (userID) ORDER BY taskDate WHERE taskDate = $recentData;");
  }

  // New Data?
  $newTask = $conn->query("SELECT taskID, taskDate, taskDesc, userID, userName FROM users INNER JOIN tasks USING (userID) ORDER BY taskDate DESC LIMIT 3;");

  // Old Data?
  $oldTask = $conn->query("SELECT taskID, taskDate, taskDesc, userID, userName FROM users INNER JOIN tasks USING (userID) ORDER BY taskDate ASC LIMIT 3;");
?>
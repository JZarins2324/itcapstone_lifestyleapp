<?php // Author: Samuel Schmitz ?>
<?php

  // Create Connection
  $serverName = "localhost";
  $username = "root";
  $password = "mysql";
  $dbname = "LifestyleDB";
  $conn = new mysqli($serverName, $username, $password, $dbname);

  // Recent Data?
  $recentTask = $conn->query("SELECT taskID, taskName, taskDesc, taskDate, taskCreate, taskModify, userID, userName FROM users INNER JOIN tasks USING (userID) ORDER BY taskModify DESC LIMIT 1;");
 

  // New Data?
  $newTask = $conn->query("SELECT taskID, taskName, taskDesc, taskDate, taskCreate, taskModify, userID, userName FROM users INNER JOIN tasks USING (userID) ORDER BY taskCreate DESC LIMIT 1;");
 
  // Old Data?
  $oldTask = $conn->query("SELECT taskID, taskName, taskDesc, taskDate, taskCreate, taskModify, userID, userName FROM users INNER JOIN tasks USING (userID) ORDER BY taskCreate ASC LIMIT 1;");

?>
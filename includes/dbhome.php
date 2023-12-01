<?php // Author: Samuel Schmitz ?>
<?php

  // Create Connection
  $serverName = "localhost";
  $username = "root";
  $password = "mysql";
  $dbname = "LifestyleDB";
  $conn = new mysqli($serverName, $username, $password, $dbname);

  // Recent Data?
  $recentTask = $conn->query("SELECT taskID, taskName, taskDesc, taskDate, taskCreate, taskModify, userID, userName FROM users INNER JOIN tasks USING (userID);");
  // $recentNote = $conn->query("SELECT noteID, noteName, noteDesc, noteCreate, noteModify, userID, userName FROM users INNER JOIN notes USING (userID) ORDER BY noteCreate WHERE noteCreate = $recentData;");

  // New Data?
  $newTask = $conn->query("SELECT taskID, taskName, taskDesc, taskDate, taskCreate, taskModify, userID, userName FROM users INNER JOIN tasks USING (userID) ORDER BY taskCreate DESC LIMIT 3;");
  // $newNote = $conn->query("SELECT noteID, noteName, noteDesc, noteCreate, noteModify, userID, userName FROM users INNER JOIN notes USING (userID) ORDER BY noteCreate DESC LIMIT 3;");

  // Old Data?
  $oldTask = $conn->query("SELECT taskID, taskName, taskDesc, taskDate, taskCreate, taskModify, userID, userName FROM users INNER JOIN tasks USING (userID) ORDER BY taskCreate ASC LIMIT 3;");
  // $oldNote = $conn->query("SELECT noteID, noteName, noteDesc, noteCreate, noteModify, userID, userName FROM users INNER JOIN notes USING (userID) ORDER BY noteCreate ASC LIMIT 3;");
?>
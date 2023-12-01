<?php // Author: Samuel Schmitz ?>
<?php 
  $connectionRequestedByApp = true;
  include("dbconnect.php");

  // Set taskId
  $taskId = $_POST['taskId'];

  // Delete Check
  if (isset($_POST['Delete'])) {
    include('dbdelete.php');
  }

  // Edit Task
  $updatedDesc = $_POST['hiddenName'];
  $editTask = $conn->query("UPDATE tasks SET taskDesc = '$updatedDesc' WHERE taskID = $taskId;");
?>
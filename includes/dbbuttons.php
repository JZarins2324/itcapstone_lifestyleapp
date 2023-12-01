<?php // Author: Samuel Schmitz ?>
<?php 
  $connectionRequestedByApp = true;
  include("dbconnect.php");

  // Task Edit/Delete
    // Edit Task
    $taskId = $_POST['taskId'];
    $updatedDesc = $_POST['hiddenName'];
    $editTask = $conn->query("UPDATE tasks SET taskDesc = '$updatedDesc' WHERE taskID = $taskId;");

    // Delete Task
    // $deleteTask = $conn->query("DELETE FROM tasks WHERE taskID = $taskId;");
?>
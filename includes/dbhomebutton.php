<?php // Author: Samuel Schmitz ?>
<?php
  // Edit Button SQL
  $editedDate = "";
  $editedDesc = "";
  $editTask = "UPDATE tasks SET taskDate = $editedDate, taskDesc = $editedDesc WHERE taskDesc = $editedValue;";

  // Delete Button SQL
  $deletedValue = "";
  $deleteTask = "DELETE FROM tasks WHERE taskDesc = $deletedValue;";
?>
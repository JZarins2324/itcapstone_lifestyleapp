<?php // Author: Samuel Schmitz ?>
<?php
  if (!($_SERVER['REQUEST_METHOD'] == 'POST')) {
    header('Location: ../pages/home.php');
    exit();
  }
  // Task Edit/Delete
    // Edit Task
    $editedTaskValue = "";
    $editedTaskDate = "";
    $editedTaskDesc = "";
    $editTask = "UPDATE tasks SET taskDate = $editedTaskDate, taskDesc = $editedTaskDesc WHERE taskDesc = $editedTaskValue;";

    // Delete Task
    $deletedTaskValue = "";
    $deleteTask = "DELETE FROM tasks WHERE taskDesc = $deletedTaskValue;";

  // Password Edit/Delete
    // Edit Pass
    $editedPassValue = "";
    $editedPassName = "";
    $editedPassDesc = "";
    $editTask = "UPDATE passwords SET passDate = $editedPassName, passDesc = $editedPassDesc WHERE passDesc = $editedPassValue;";

    // Delete Pass
    $deletedPassValue = "";
    $deletePass = "DELETE FROM passwords WHERE passDesc = $deletedPassValue;";

  // Note Edit/Delete
    // Edit Note
    $editedNoteValue = "";
    $editedNoteDesc = "";
    $editNote = "UPDATE notes SET noteDesc = $editedNoteDesc WHERE noteDesc = $editedNoteValue;";

    // Delete Note
    $deletedNoteValue = "";
    $deleteNote = "DELETE FROM notes WHERE noteDesc = $deletedNoteValue;";
?>
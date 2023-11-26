<?php // Author: Samuel Schmitz ?>
<?php
  // Task Edit/Delete
    // Edit Task
    $editedTaskValue = "";
    $editedTaskDate = "";
    $editedTaskDesc = "";
    $editTask = $conn->query("UPDATE tasks SET taskDate = $editedTaskDate, taskDesc = $editedTaskDesc WHERE taskDesc = $editedTaskValue;");

    // Delete Task
    $deletedTaskValue = "";
    $deleteTask = $conn->query("DELETE FROM tasks WHERE taskDesc = $deletedTaskValue;");

  // Password Edit/Delete
    // Edit Pass
    $editedPassValue = "";
    $editedPassName = "";
    $editedPassDesc = "";
    $editTask = $conn->query("UPDATE passwords SET passDate = $editedPassName, passDesc = $editedPassDesc WHERE passDesc = $editedPassValue;");

    // Delete Pass
    $deletedPassValue = "";
    $deletePass = $conn->query("DELETE FROM passwords WHERE passDesc = $deletedPassValue;");

  // Note Edit/Delete
    // Edit Note
    $editedNoteValue = "";
    $editedNoteDesc = "";
    $editNote = "UPDATE notes SET noteDesc = $editedNoteDesc WHERE noteDesc = $editedNoteValue;";

    // Delete Note
    $deletedNoteValue = "";
    $deleteNote = "DELETE FROM notes WHERE noteDesc = $deletedNoteValue;";
?>
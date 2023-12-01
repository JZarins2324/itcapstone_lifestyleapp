<?php
  // Delete Task
  $deleteTask = $conn->query("DELETE FROM tasks WHERE taskID = $taskId;");
?>
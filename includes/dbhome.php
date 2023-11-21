<?php // Author: Samuel Schmitz ?>
<?php
  // Recent Data?
  // Most recent piece of data the user interacted with?

  // New Data?
  $newData = "SELECT taskID, taskDate, taskDesc, userID, userName FROM users INNER JOIN tasks USING (userID) ORDER BY taskDate ASC;";

  // Old Data?
  $oldData = "SELECT taskID, taskDate, taskDesc, userID, userName FROM users INNER JOIN tasks USING (userID) ORDER BY taskDate DESC;";
?>
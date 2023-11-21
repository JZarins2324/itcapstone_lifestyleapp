<?php include "../includes/dbview.php";
session_start();

// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["username"])){
    header("location: login.php");
    exit;
}

?> <link rel="stylesheet" type="text/css" href="../assets/css/table.css"> <?php

// The view page for displaying user information

    // The view page for displaying user information

    echo "<h1>Your Entries</h1>";

    ?> <h2>Tasks:</h2> <?php

    // Display Task Data
    if ($taskData->num_rows > 0) {
      echo "<table><tr><th> Task Date </th><th> Task Description </th></tr>";
      while ($data = $taskData->fetch_assoc()) {
        echo "<tr><td>" .$data["taskDate"]. "</td><td> " .$data["taskDesc"]. "</td></tr>";
      }
      echo "</table>";
    }
    ?> <br> <?php

    ?> <h2>Passwords:</h2> <?php

    // Display Note Data
    if ($passData->num_rows > 0) {
      echo "<table><tr><th> Password </th><th> Description </th></tr>";
      while ($data = $passData->fetch_assoc()) {
        echo "<tr><td>" .$data["passName"]. "</td><td>" .$data["passDesc"]. "</td></tr>";
      }
      echo "</table>";
    }
    ?> <br> <?php

    ?> <h2>Notes:</h2> <?php

    // Display Note Data
    if ($noteData->num_rows > 0) {
        echo "<table>";
        while ($data = $noteData->fetch_assoc()) {
          echo "<tr><td>" .$data["notesDesc"]. "</td></tr>";
        }
        echo "</table>";
      }

?>
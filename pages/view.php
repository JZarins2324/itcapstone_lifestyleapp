<?php include "../includes/tabledata.php";
session_start();

// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["username"])){
    header("location: login.php");
    exit;
}

?> <link rel="stylesheet" type="text/css" href="../assets/css/table.css"> <?php

// The view page for displaying user information

    // The view page for displaying user information

    echo "<h1>View Your Entries</h1>";

    ?> <h2>Your Tasks:</h1> <?php

    // Display Task Data
    if ($taskData->num_rows > 0) {
      echo "<table>";
      while ($data = $taskData->fetch_assoc()) {
        echo "<tr><th> Task Date </th><th> Task Description </th></tr>";
        echo "<tr>";
        echo "<td>" .$data["taskDate"]. "</td>"; 
        echo "<td> " .$data["taskDesc"]. "</td>";
        echo "</tr>";
      }
      echo "</table>";
    }
    ?> <br> <?php

    ?> <h2>Your Notes:</h1> <?php

    // Display Note Data
    if ($noteData->num_rows > 0) {
        echo "<table>";
        while ($data = $noteData->fetch_assoc()) {
          echo "<tr><td>";
          echo "Note Description: " .$data["notesDesc"]. "";
          echo "</td></tr>";
        }
        echo "</table>";
      }

?>
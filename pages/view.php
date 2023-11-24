<?php session_start();
include "../includes/dbview.php";

// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["username"])){
    header("location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to Lifestyle Companion</title>
    <!-- <link rel="stylesheet" type="text/css" href="../assets/css/app.css"> -->
		<link rel="stylesheet" type="text/css" href="../assets/css/home.css">
</head>
<body>
 
<header class="site-header">
    <h1>Welcome, <?= $_SESSION["username"] ?></h1>
    <h3>Lifestyle Companion<br>Home Page</h3>
    <h4>
        <div id="links">
            <a href='home.php'>Home Page</a> | 
            <a href='input.php'>New Entry</a> | 
            <a href='../server/logout.php'>Logout</a>
        </div>
    </h4>
</header>
</body>

<link rel="stylesheet" type="text/css" href="../assets/css/table.css"> 
<?php

// The view page for displaying user information

    // The view page for displaying user information

    echo "<h1>Your Entries</h1>";

    ?> <div id="dataTasks"> <h2>Tasks:</h2> <?php

    // Display Task Data
    if ($taskData->num_rows > 0) {
      echo "<table><tr><th> Task Date </th><th> Task Description </th></tr>";
      while ($data = $taskData->fetch_assoc()) {
        echo "<tr><td>" .$data["taskDate"]. "</td><td> " .$data["taskDesc"]. "</td></tr>";
      }
      echo "</table>";
    }

		

    ?> </div> <br> <?php

    ?> <div id="dataPasswords"> <h2>Passwords:</h2> <?php

    // Display Password Data
    if ($passData->num_rows > 0) {
      echo "<table><tr><th> Password </th><th> Description </th></tr>";
      while ($data = $passData->fetch_assoc()) {
        echo "<tr><td>" .$data["passName"]. "</td><td>" .$data["passDesc"]. "</td></tr>";
      }
      echo "</table>";
    }
    ?> </div> <br> <?php

    ?> <div id="dataNots"> <h2>Notes:</h2> <?php

    // Display Note Data
    if ($noteData->num_rows > 0) {
        echo "<table>";
        while ($data = $noteData->fetch_assoc()) {
          echo "<tr><td>" .$data["notesDesc"]. "</td></tr>";
        }
        echo "</table>";
      }
?> </div>



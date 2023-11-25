<?php
session_start();

// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["username"])){
  header("location: login.php");
  exit;
}

$connectionRequestedByApp= true;
include "../includes/dbview.php";
?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../assets/css/table.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/view.css">
		<title>LC - View</title>
  </head>
  <body>
    <header class="site-header">
      <h1>Welcome, <?= $_SESSION["username"] ?></h1>
      <h3>Lifestyle Companion<br>View Entry</h3>
      <h4><div id="links"><a href='input.php'>New Entry</a><span class="separator">|</span><a href='home.php'>Home Page</a><span class="separator">|</span><a href='../server/logout.php'>Logout</a></div></h4>
    </header>

    <h1>Your Entries</h1>

    <h2 class="dropdown-trigger">Tasks:</h2>
    <div class="dropdown"><?php
        // Display Task Data
        if ($taskData->num_rows > 0) {
        ?> 
      <table>
        <tr>
          <th>Task Date</th>
          <th>Task Description</th>
        </tr><?php
          while ($data = $taskData->fetch_assoc()) {
        ?> 
        <tr>
          <td><?= $data['taskDate']; ?></td>
          <td><?= $data['taskDesc']; ?></td>
        <tr><?php
          }
        ?> 
      </table>
      <br><?php
        }
      ?> 
    </div>
    
    <h2 class="dropdown-trigger">Passwords:</h2>
    <div class="dropdown"><?php
        // Display Note Data
        if ($passData->num_rows > 0) {
      ?> 
      <table>
        <tr>
          <th>Password</th>
          <th>Description</th>
        </tr><?php
          while ($data = $passData->fetch_assoc()) {
        ?> 
        <tr>
          <td><?= $data['passName']; ?></td>
          <td><?= $data['passDesc']; ?></td>
        <tr><?php
          }
        ?> 
      </table>
      <br><?php
        }
      ?> 
    </div>

    <h2 class="dropdown-trigger">Notes:</h2>
    <div class="dropdown"><?php
        // Display Note Data
        if ($noteData->num_rows > 0) {
        ?> 
      <table><?php
          while ($data = $noteData->fetch_assoc()) {
      ?> 
        <tr>
          <td><?= $data["notesDesc"]; ?></td>
        </tr><?php
          }
        ?> 
      </table><?php
        }
      ?> 
    </div>

    <script
      src="https://code.jquery.com/jquery-3.7.1.min.js"
      integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
      crossorigin="anonymous"></script>
      <script src='../assets/js/jquery.dropdown.js'></script>
  </body>
</html>
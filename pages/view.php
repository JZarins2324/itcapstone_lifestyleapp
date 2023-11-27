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


	<?php
	$currentPage = 'view';
	$pageTitle = "View Entries";
include '../includes/header.php';
?>


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
            <td><?= $data['taskName']; ?></td>
            <td><?= $data['taskDesc']; ?></td>
            <td><?= $data['taskDate']; ?></td>
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
        <td><?= $data["noteName"]; ?></td>
          <td><?= $data["noteDesc"]; ?></td>
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
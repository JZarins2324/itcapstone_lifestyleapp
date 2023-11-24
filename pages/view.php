<?php session_start();
include "../includes/dbview.php";

// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["username"])){
  header("location: login.php");
  exit;
}

include "../includes/dbview.php";
?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../assets/css/table.css">
    <title>LC - View</title>
  </head>
  <body>
    <h1>Your Entries</h1>

    <h2>Tasks:</h2><?php
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
    
    <h2>Passwords:</h2><?php
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

    <h2>Notes:</h2><?php
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
  </body>
</html>

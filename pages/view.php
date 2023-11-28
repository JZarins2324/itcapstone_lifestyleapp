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
    <title>Lifestyle Companion - View</title>
  </head>
  <body>


	<?php
	$currentPage = 'view';
	$pageTitle = "View Entries";
include '../includes/header.php';
?>


    <h1>Your Entries</h1>

    <h2 class="dropdown-trigger">To Do List</h2>
    <div class="dropdown"><?php
      // Display Task Data
      if ($taskData->num_rows > 0) {
        ?> 
        <table>
          <tr>
            <th>Task Name</th>
            <th>Task Description</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr><?php
            while ($data = $taskData->fetch_assoc()) {
          ?> 
          <form action="edit.php" method="post">
            <input type="hidden" name="table" value="task">
            <input type="hidden" name="id" value="<?= $data['taskID']; ?>">
            <input type="hidden" name="name" value="<?= $data['taskName']; ?>">
            <input type="hidden" name="desc" value="<?= $data['taskDesc']; ?>">
            <input type="hidden" name="date" value="<?= $data['taskDate']; ?>">
            <tr>
              <td><?= $data['taskName']; ?></td>
              <td><?= $data['taskDesc']; ?></td>
              <td><input type="submit" name="Edit" value="Edit"></td>
              <td><input type="submit" name="Delete" value="Delete"></td>
            <tr>
          </form><?php
            }
          ?> 
        </table>
        <br><?php
      }
      ?> 
    </div>
    
    <h2 class="dropdown-trigger">Passwords</h2>
    <div class="dropdown"><?php
        // Display Note Data
        if ($passData->num_rows > 0) {
      ?> 
      <table>
        <tr>
          <th>Account</th>
          <th>Password</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr><?php
          while ($data = $passData->fetch_assoc()) {
        ?> 
        <form action="edit.php" method="post">
        <input type="hidden" name="table" value="pass">
            <input type="hidden" name="id" value="<?= $data['passID']; ?>">
            <input type="hidden" name="name" value="<?= $data['passName']; ?>">
            <input type="hidden" name="desc" value="<?= $data['passDesc']; ?>">
          <tr>
            <td><?= $data['passDesc']; ?></td>
            <td><?= $data['passName']; ?></td>
            <td><input type="submit" name="Edit" value="Edit"></td>
            <td><input type="submit" name="Delete" value="Delete"></td>
          <tr>
        </form><?php
          }
        ?> 
      </table>
      <br><?php
        }
      ?> 
    </div>

    <h2 class="dropdown-trigger">Notes</h2>
    <div class="dropdown"><?php
        // Display Note Data
        if ($noteData->num_rows > 0) {
        ?> 
      <table>
        <tr>
          <th>Name</th>
          <th>Description</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr><?php
          while ($data = $noteData->fetch_assoc()) {
        ?> 
        <form action="edit.php" method="post">
          <input type="hidden" name="table" value="note">
          <input type="hidden" name="id" value="<?= $data["noteID"]; ?>">
          <input type="hidden" name="name" value="<?= $data["noteName"]; ?>">
          <input type="hidden" name="desc" value="<?= $data["noteDesc"]; ?>">
          <tr>
            <td><?= $data["noteName"]; ?></td>
            <td><?= $data["noteDesc"]; ?></td>
            <td><input type="submit" name="Edit" value="Edit"></td>
            <td><input type="submit" name="Delete" value="Delete"></td>
          </tr>
        </form><?php
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
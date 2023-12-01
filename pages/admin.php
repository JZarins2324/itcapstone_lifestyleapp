<?php
session_start();

// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["username"])) {
  header("location: login.php");
  exit;
}

if (!($_SESSION["username"] == "admin")) {
  header("location: home.php");
  exit;
}

$connectionRequestedByApp = true;
include "../includes/dbgetuser.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='../assets/css/table.css'>
    <title>Admin Page</title>
  </head>
  <body><?php
      if ($userData->num_rows > 0) {
    ?> 
    <table>
      <tr>
        <th>User ID</th>
        <th>Username</th>
        <th>Date Created</th>
        <th>Action</th>
      </tr><?php
        while ($data = $userData->fetch_assoc()) {
        ?> 
      <form action="edit.php" method="post">
        <input type="hidden" name="id" value="<?= $data['userID']; ?>">
        <input type="hidden" name="table" value="user">
        <tr>
          <td><?= $data['userID']; ?></td>
          <td><?= $data['userName']; ?></td>
          <td><?= $data['currentTimestamp']; ?></td>
          <td><input type="submit" name="Delete" value="Delete"></td>
        </tr>
      <form><?php
        }
      ?> 
    </table><?php
      }
    ?> 
  </body>
</html>
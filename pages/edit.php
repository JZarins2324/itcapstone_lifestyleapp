<?php
  session_start();

  // Check if the user is logged in, if not then redirect to login page
  if(!isset($_SESSION['username'])) {
    header('location: login.php');
    exit;
  }

  if (!isset($_POST['table'])) {
    header('location: home.php');
    exit;
  }

  // Get Proper Table Name
  $tableName = "";

  if ($_POST['table'] == 'task') {
    $tableName = 'tasks';
  } else if ($_POST['table'] == 'pass') {
    $tableName = 'passwords';
  } else if ($_POST['table'] == 'note') {
    $tableName = 'notes';
  } else if ($_POST['table'] == 'user') {
    $tableName = 'users';
  }


  if (isset($_POST['Edit'])) {
    // Populate Form
?> 
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/edit.css">
    <title>Edit</title>
  </head>
  <body>
    <div class=container>
      <h1>Edit Entry</h1>
      <form action="../server/viewupdatehandler.php" method="post">
        <input type="hidden" name="table" value="<?= $_POST['table']; ?>">
        <input type="hidden" name="id" value="<?= $_POST['id']; ?>">
        <input type="hidden" name="redirect" value="<?= $_SERVER['HTTP_REFERER']; ?>"><?php

        if ($tableName == "passwords") {
            ?> 
        <label for="name">Password: </label>
        <input type="text" name="name" value="<?= $_POST['name']; ?>" required><br><br>

        <label for="desc">Account Info: </label>
        <input type="text" name="desc" value="<?= $_POST['desc']; ?>" required><br><br><?php
        } else {
            ?> 
        <label for="name">Name: </label>
        <input type="text" name="name" value="<?= $_POST['name']; ?>" required><br><br>

        <label for="desc">Description: </label>
        <input type="text" name="desc" value="<?= $_POST['desc']; ?>" required><br><br><?php
        }

        
          // Display Date feild
          if ($tableName == 'tasks') {
            // Populate date feild with default value
            list($day, $time) = explode(" ", $_POST['date']);
        ?> 
        <label for="date">Date: </label>
        <input type="date" name="date" value="<?= $day; ?>"><br><br><?php
          }
        ?> 
        <input type="submit" name="submit" value="Submit">
        <a href="<?= $_SERVER['HTTP_REFERER']; ?>">Back</a>
      </form>
    </div>
  </body>
  </html>
<?php
  } else if (isset($_POST['Delete'])) {
    include "../server/viewdeletehandler.php";
  }
?>
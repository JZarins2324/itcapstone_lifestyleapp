<?php
  session_start();

  if(!isset($_SESSION["username"])){
    header("location: login.php");
    exit;
  }

  // Error Message  
  $errorMessage = '';

  if (isset($_SESSION['error'])) {
    $errorMessage = htmlspecialchars($_SESSION['error']);
    // Unset the error message after displaying it so it doesn't persist
    $_SESSION['error'] = '';
  }
?> 

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../assets/css/input.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/header.css">
  <title>Add Entry</title>
</head>
<body><?php

$pageTitle = "New Entry";
$currentPage = 'input';

include '../includes/header.php';
?> 
  <br>
  <div id="container" class="input-container">
    <form action="../includes/inputhandler.php" method="post">
      <label for="inputLabel">Add new</label>
      <select name="userInput" id="userInput">
        <option value="password">Password</option>
        <option value="note">Note</option>
        <option value="task">Task</option>
      </select><br>

      <h4><?php echo $errorMessage; ?></h4>
      <br>
      <label id="lblName" for="name">Password</label><br>
      <input type="text" name="name" id="name" placeholder="Password" required>
      <small>*For password protection only place password in the 'Name' field</small><br>

      <label id="lblDesc" for="desc">Account Info</label><br>
      <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Account Info..." required></textarea><br><br>

      <label id="dateLabel" for="date" style="display:none">Date</label>
      <input type="date" name="date" id="date" style="display:none">

      <small>*Password only partially stored for protection</small><br><br>

      <input type="hidden" name="isValidRequest" value="true">

      <input id="submit" type="submit" value="Add">
    </form>
  </div>
  <?= '<script src="../assets/js/input.js"></script>'; ?>
</body>
</html>

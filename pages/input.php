<?php
session_start();

if(!isset($_SESSION["username"])){
  header("location: login.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../assets/css/home.css">

  <link rel="stylesheet" type="text/css" href="../assets/css/input.css">
  <title>Lifestyle Companion - Add</title>
</head>
<body>

<header class="site-header">
    <h1>Welcome, <?= $_SESSION["username"] ?></h1>
    <h3>Lifestyle Companion<br>Home Page</h3>
    <h4>
        <div id="links">
            <a href='home.php'>Home Page</a> | 
            <a href='view.php'>View Entries</a> | 
            <a href='../server/logout.php'>Logout</a>
        </div>
    </h4>
</header>

  <div id="container">
    <form action="../includes/inputhandler.php" method="post">
      <label for="inputLabel">Add new</label>
      <select name="userInput" id="userInput">
        <option value="note">Note</option>
        <option value="password">Password</option>
        <option value="task">Task</option>
      </select>
      <br><br>

      <label for="name">Name</label><br>
      <input type="text" name="name" id="name" placeholder="Name"><br><br>

      <label for="desc">Description</label><br>
      <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Description..."></textarea><br><br>

      <label id="dateLabel" for="date" style="display:none">Date</label>
      <input type="date" name="date" id="date" style="display:none"><br><br>

      <input type="hidden" name="isValidRequest" value="true">

      <input id="submit" type="submit" value="Add">
    </form>
  <div>
  <?= '<script src="../assets/js/input.js"></script>'; ?>
</body>
</html>
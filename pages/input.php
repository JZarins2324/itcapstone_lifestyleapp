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
  <title>Lifestyle Companion - Add</title>
</head>
<body>
  <form action="../includes/addhandler.php" method="post">
    <label for="new">Add new</label>
    <select name="new" id="new">
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

    <input type="submit" value="Add">
  </form>
  <?= '<script src="../assets/js/input.js"></script>'; ?>
</body>
</html>
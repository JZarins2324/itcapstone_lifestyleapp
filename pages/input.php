<?php
  session_start();

  if(!isset($_SESSION["username"])){
    header("location: login.php");
    exit;
  }
?>

    <link rel="stylesheet" type="text/css" href="../assets/css/input.css">

<?php
	$pageTitle = "New Entry";
	$currentPage = 'input';

  include '../includes/header.php';
?>

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
    <h5>*Password name should be the password itself<br>*Password only partially stored for protection</h5>
    <?= '<script src="../assets/js/input.js"></script>'; ?>
  </body>
</html>
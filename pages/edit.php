<?php
  session_start();

  // Check if the user is logged in, if not then redirect to login page
  if(!isset($_SESSION["username"])) {
    header("location: login.php");
    exit;
  }

  foreach ($_POST as $key => $value) {
      echo "<p>$key => $value</p>";
  }

  // echo $_SERVER['HTTP_REFERER'];

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

<form action="../server/updatehandler.php" method="post">
    <input type="hidden" name="table" value="<?= $_POST['table']; ?>">
    <input type="hidden" name="id" value="<?= $_POST['id']; ?>">
    <input type="hidden" name="redirect" value="<?= $_SERVER['HTTP_REFERER']; ?>">

    <label for="name">Name: </label>
    <input type="text" name="name" value="<?= $_POST['name']; ?>"><br><br>

    <label for="desc">Description: </label>
    <input type="text" name="desc" value="<?= $_POST['desc']; ?>"><br><br>
    <?php
      // Display Date feild
      if ($tableName == 'tasks') {
        // Populate date feild with default value
        list($day, $time) = explode(" ", $_POST['date']);
    ?> 
        <label for="date">Date: </label>
        <input type="date" name="date" value="<?= $day; ?>"><br><br>
    <?php
      }
    ?> 
  <input type="submit" name="submit" value="Submit">
</form>
<?php
  } else if (isset($_POST['Delete'])) {
    include "../server/deletehandler.php";
  }
?>
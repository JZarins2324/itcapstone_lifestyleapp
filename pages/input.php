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

    <link rel="stylesheet" type="text/css" href="../assets/css/input.css">

<?php

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
        </select>
        <br><br>

        <h4><?php echo $errorMessage; ?></h4>
        <br>
        <label for="name">Name</label><br>
        <input type="text" name="name" id="name" placeholder="Name">
        <h5>*For password protection only place password in the 'Name' field</h5>
        <br>

        <label for="desc">Description</label><br>
        <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Description..."></textarea><br><br>

        <label id="dateLabel" for="date" style="display:none">Date</label>
        <input type="date" name="date" id="date" style="display:none"><br><br>

        <input type="hidden" name="isValidRequest" value="true">

        <input id="submit" type="submit" value="Add">
      </form>
    </div>
      <?= '<script src="../assets/js/input.js"></script>'; ?>
  </body>
</html>
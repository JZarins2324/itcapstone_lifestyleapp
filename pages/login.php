<?php
session_start();

// Check if we have an error message in the session
$errorMessage = '';
if (isset($_SESSION['error'])) {
  $errorMessage = htmlspecialchars($_SESSION['error']);
  // Unset the error message after displaying it so it doesn't persist
  unset($_SESSION['error']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login/Register</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/login.css">
</head>
<body>
  <div class="login-container">
    <h1 id="formTitle">Login or Register</h1>
    <form method="post" action="../server/authenticate.php">
      <?= $errorMessage ?>
      <input type="text" name="username" placeholder="Username" required />
      <input type="password" name="password" placeholder="Password" required />
      <small>*Password must contain uppercase and number</small><br><br>
      <input id="firstSubmit" name="login" type="submit" value="Login" />
      <p style="text-align:center">or</p>
      <input name="create" type="submit" value="Register">
    </form>
  </div>
</body>
</html>
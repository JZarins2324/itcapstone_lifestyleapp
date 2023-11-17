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
    <title>Login</title>
    <!-- <link rel="stylesheet" type="text/css" href="../assets/css/app.css"> -->
	<link rel="stylesheet" type="text/css" href="../assets/css/login.css">
</head>
<body>
<div class="login-container">
    <h1 id="formTitle">Login</h1>
    <form method="post" action="../server/authenticate.php">
        <input type="text" name="username" placeholder="Username" required />
        <input type="password" name="password" placeholder="Password" required />
        <input id="submit" name="Login" type="submit" value="Login" />
    </form>
    <p style="text-align:center">or click below to</p>
    <button id="change">Create Account</button>
    <!-- <h1>Sign Up</h1>
    <form method="post" action="../server/authenticate.php">
        <input type="text" name="newUsername" placeholder="Username" required />
        <input type="password" name="newPassword" placeholder="Password" required />
        <input type="submit" value="signup" />
    </form> -->
    <?php
        echo '<script src="../assets/js/login.js"></script>';
        ?><br><br><?php
        echo "*Password must contain a number";
    ?>
</div>
</body>
</html>

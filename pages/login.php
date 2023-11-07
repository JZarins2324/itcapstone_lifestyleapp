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
		<link rel="stylesheet" type="text/css" href="../assets/css/stylesheet.css">
</head>
<body>
<div class="login-container">
    <h1>Login</h1>
    <form method="post" action="../server/authenticate.php">
        <input type="text" name="username" placeholder="Username" required />
        <input type="password" name="password" placeholder="Password" required />
        <input type="submit" value="Login" />
    </form>
    <h1>Sign Up</h1>
    <form method="post" action="../server/authenticate.php">
        <input type="text" name="newUsername" placeholder="Username" required />
        <input type="password" name="newPassword" placeholder="Password" required />
        <input type="submit" value="Login" />
    </form>
</div>
</body>
</html>

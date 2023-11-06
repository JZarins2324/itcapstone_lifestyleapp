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
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .login-container {
            width: 300px;
            padding: 20px;
            margin: 100px auto;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #5C85AD;
            color: white;
            cursor: pointer;
        }
        .error-message {
            color: red;
            text-align: center;
        }
    </style>
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

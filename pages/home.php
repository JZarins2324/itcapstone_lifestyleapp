<?php
session_start();

// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["username"])){
    header("location: login.php");
    exit;
}

// Include database connection
require_once __DIR__ . '/../LifestyleConnect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to Lifestyle Companion</title>
    <!-- Add link to CSS file if needed -->
</head>
<body>
    <h1>Welcome to Lifestyle Companion</h1>
    <p>This is the home page. Here you can manage your to-dos, notes, and other information.</p>
    <a href='view.php'>View Entries</a> | 
    <a href='logout.php'>Logout</a>
</body>
</html>

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
    <title>Welcome to Lifestyle Companion</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/app.css">
		<link rel="stylesheet" type="text/css" href="../assets/css/home.css">
</head>
<body>
    <h1>Welcome to Lifestyle Companion, <?= $_SESSION["username"] ?></h1>
    <p>This is the home page. Here you can manage your to-dos, notes, and other information.</p>
		<div class="links-container">
    <a href='view.php'>View Entries</a> | 
    <a href='../server/logout.php'>Logout</a>
		</div>
</body>
</html>

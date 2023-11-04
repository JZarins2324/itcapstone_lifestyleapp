<?php
// Home page content after successful login
session_start();
if (!isset($_SESSION['user_id'])) {
    // If not logged in, redirect to login page
    header('Location: login.php');
    exit();
}

echo "<h1>Welcome to Lifestyle Companion</h1>";
echo "<p>This is the home page. Here you can manage your to-dos, notes, and other information.</p>";
echo "<a href='view.php'>View Entries</a> | ";
echo "<a href='logout.php'>Logout</a>";
?>

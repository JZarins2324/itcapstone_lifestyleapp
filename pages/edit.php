<?php
session_start();

// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["username"])) {
  header("location: login.php");
  exit;
}

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
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lifestyle Companion - Edit</title>
    </head>
    <body>
        <form action="../server/viewupdatehandler.php" method="post">
            <input type="hidden" name="table" value="<?= $_POST['table']; ?>">
            <input type="hidden" name="id" value="<?= $_POST['id']; ?>">
            <input type="hidden" name="redirect" value="<?= $_SERVER['HTTP_REFERER']; ?>"><?php
            $nameTitle = "Name: ";
            $descTitle = "Description: ";

            if ($_POST['table'] == 'pass') {
                $nameTitle = "Password: ";
                $descTitle = "Account: ";
            }
                
            ?> 

            <label for="name"><?= $nameTitle; ?></label>
            <input type="text" name="name" value="<?= $_POST['name']; ?>"><br><br>

            <label for="desc"><?= $descTitle; ?></label>
            <input type="text" name="desc" value="<?= $_POST['desc']; ?>"><br><br><?php
            // Display Date feild
            if ($tableName == 'tasks') {
                // Populate date feild with default value
                list($day, $time) = explode(" ", $_POST['date']);
            ?> 
            <label for="date">Date: </label>
            <input type="date" name="date" value="<?= $day; ?>"><br><br><?php

            }
            ?> 

            <input type="submit" name="submit" value="Submit">
        </form>
    </body>
</html><?php
} else if (isset($_POST['Delete'])) {
    include "../server/viewdeletehandler.php";
}
?> 
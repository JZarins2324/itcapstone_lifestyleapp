<?php
if (!isset($_POST['Delete'])) {
    header("Location: ../pages/home.php");
    exit();
}

// Get id Column name
$idColumn = '';
if ($tableName == 'tasks') {
    $idColumn = 'taskID';
} else if ($tableName == 'passwords') {
    $idColumn = 'passID';
} else if ($tableName == 'notes') {
    $idColumn = 'noteID';
} else if ($tableName == 'users') {
    $idColumn = 'userID';
} else {
    // Table name invalid
    header("Location: ../pages/home.php");
    exit();
}

$connectionRequestedByApp = true;
include "../includes/dbconnect.php";

$conn = new mysqli($host, $user, $pass, $dbname);

$query = $conn->prepare("DELETE FROM $tableName WHERE $idColumn = ?");
$query->bind_param("i", $_POST['id']);
$query->execute();

header("Location: " . $_SERVER['HTTP_REFERER']);
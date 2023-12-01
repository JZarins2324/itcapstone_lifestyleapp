<?php
// foreach ($_POST as $key => $value) {
//     echo "<p>$key => $value</p>";
// }

if (!isset($_POST['submit'])) {
    header("Location: ../pages/home.php");
    exit();
}

// Get Real Table Name
$tableName = "";

if ($_POST['table'] == 'task') {
    $tableName = 'tasks';
} else if ($_POST['table'] == 'pass') {
    $tableName = 'passwords';
} else if ($_POST['table'] == 'note') {
    $tableName = 'notes';
} else {
    // Table name invalid
    header("Location: ../pages/home.php");
    exit();
}

$idColumn = $_POST['table'] . "ID";

$sql = "";

// Sanitize User Input
$id = filter_var(trim($_POST['id']), FILTER_SANITIZE_NUMBER_INT);
$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$desc = filter_var(trim($_POST['desc']), FILTER_SANITIZE_STRING);

// Get Correct UPDATE Statement
if ($tableName == "tasks") {
    // Sanitize date
    $date = filter_var(trim($_POST['date']), FILTER_SANITIZE_STRING);

    $sql = "UPDATE $tableName SET taskName = '$name', taskDesc = '$desc', taskDate = '$date', taskModify = CURRENT_TIMESTAMP WHERE $idColumn = $id";
    echo $sql;
} else if ($tableName == "passwords") {
    // TODO asterisks
    $sql = "UPDATE $tableName SET passName = '$name', passDesc = '$desc', passModify = CURRENT_TIMESTAMP WHERE $idColumn = $id";
    echo $sql;
} else if ($tableName == "notes") {
    $sql = "UPDATE $tableName SET noteName = '$name', noteDesc = '$desc', noteModify = CURRENT_TIMESTAMP WHERE $idColumn = $id";
    echo $sql;
}

// Query the DB
$connectionRequestedByApp = true;
include "../includes/dbconnect.php";

$conn = new mysqli($host, $user, $pass, $dbname);

$conn->query($sql);
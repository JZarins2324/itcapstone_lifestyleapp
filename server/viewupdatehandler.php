<?php
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

  $sql = "UPDATE $tableName SET taskName = '$name', taskDesc = '$desc', taskDate = '$date', taskModify = NOW() WHERE $idColumn = $id";
} else if ($tableName == "passwords") {
  // Asterisks
  $characters = str_split($name);
  $asteriskPassword = "";

  for ($i = 0; $i < count($characters); $i++) {
    // Reveal the first 2 and last 2 characters
    if ($i < 2  || $i > count($characters) - 3) {
      $asteriskPassword .= $characters[$i];
    } else {
      $asteriskPassword .= "*";
    }
  }

  $sql = "UPDATE $tableName SET passName = '$asteriskPassword', passDesc = '$desc' WHERE $idColumn = $id";
} else if ($tableName == "notes") {
  $sql = "UPDATE $tableName SET noteName = '$name', noteDesc = '$desc' WHERE $idColumn = $id";
}

// Query the DB
$connectionRequestedByApp = true;
include "../includes/dbconnect.php";

$conn->query($sql);

header("Location: " . $_POST['redirect']);
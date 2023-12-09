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

    $connectionRequestedByApp = true;
    include "../includes/dbconnect.php";

    // Delete notes
    $query = $conn->prepare("DELETE FROM notes WHERE $idColumn = ?");
    $query->bind_param("i", $_POST['id']);
    $query->execute();

    // Delete tasks
    $query = $conn->prepare("DELETE FROM tasks WHERE $idColumn = ?");
    $query->bind_param("i", $_POST['id']);
    $query->execute();

    // Delete passwords
    $query = $conn->prepare("DELETE FROM passwords WHERE $idColumn = ?");
    $query->bind_param("i", $_POST['id']);
    $query->execute();

    // Delete Users
    $query = $conn->prepare("DELETE FROM users WHERE $idColumn = ?");
    $query->bind_param("i", $_POST['id']);
    $query->execute();

    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();

  } else {
    // Table name invalid
    header("Location: ../pages/home.php");
    exit();
  }

  $connectionRequestedByApp = true;
  include "../includes/dbconnect.php";

  // Delete from table
  $query = $conn->prepare("DELETE FROM $tableName WHERE $idColumn = ?");
  $query->bind_param("i", $_POST['id']);
  $query->execute();

  header("Location: " . $_SERVER['HTTP_REFERER']);
?>
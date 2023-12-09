<?php
  // Check username for empty
  if (empty($username)) {
    $_SESSION['error'] = "Name is empty";
    header('Location: ../pages/login.php');
    exit();
  }

  // Check password for empty
  if (empty($password)) {
    $_SESSION['error'] = "Password is empty";
    header('Location: ../pages/login.php');
    exit();
  }

  // Check for number
  $passChars = str_split($password);
  $passwordHasNumber = false;

  foreach ($passChars as $char) {
    if (is_numeric($char)) {
      $passwordHasNumber = true;
      break;
    }
  }

  if (!$passwordHasNumber) {
    $_SESSION['error'] = 'Password must include a number';
    header('Location: ../pages/login.php');
    exit();
  }

  // Check for uppercase
  if (strtolower($password) == $password) {
    $_SESSION['error'] = 'Password must include an uppercase letter';
    header('Location: ../pages/login.php');
    exit();
  }
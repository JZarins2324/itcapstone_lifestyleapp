<?php // Author: Samuel Schmitz ?>

<?php
  session_start();

  if (isset($_POST['isValidRequest'])) {
    $connectionRequestedByApp = $_POST['isValidRequest'];
  }

  include "dbconnect.php";

  if (isset($_POST['userInput'])) {
    $inputValue = $_POST['userInput'];
  }
  if (isset($_POST['name'])) {
    $nameValue = $_POST['name'];
  }
  if (isset($_POST['desc'])) {
    $descValue = $_POST['desc'];
  }
  if (isset($_POST['date'])) {
    $dateValue = $_POST['date'];
  }

  $userID = $_SESSION['user_id'];
  $sql = '';

  if ($inputValue == 'task') {
    // Store Task
    $sql = "INSERT INTO tasks (taskName, taskDesc, taskDate, userID) VALUES ('$nameValue', '$descValue', $dateValue, '$userID')";
  } else if ($inputValue == 'password') {
    // Check Password is 5 or greater
    if (strlen($nameValue) < 5) {
      $_SESSION['error'] = 'Password must be more than 4 characters.';
	    header('Location: ../pages/input.php');
	    exit();
    }

    // Password Safety
    $safePass = '';
    $i = 0;
    $hintChars = str_split($nameValue);

    // Print first 2 characters
    foreach ($hintChars as $frontChar) {
      $i++;
      if ($i < 3) {
        $safePass .= $frontChar;
      }
    }
    
    // Print asterisk
    $astLength = strlen($nameValue) - 4;
    for ($i = 0; $i < $astLength; $i++) {
      $safePass .= '*';
    }

    // Print last 2 characters
    $i = 0;
    $passLength = strlen($nameValue);
    foreach ($hintChars as $backChar) {
      $i++;
      if ($i > ($passLength - 2)) {
        $safePass .= $backChar;
      }
    }

    // Store Safe Password
    $sql = "INSERT INTO passwords (passName, passDesc, userID) VALUES ('$safePass', '$descValue', '$userID')";
    
  } else if ($inputValue == 'note') {
    // Store Note
    $sql = "INSERT INTO notes (noteName, noteDesc, userID) VALUES ('$nameValue', '$descValue', '$userID')";
  } else {
    $_SESSION['error'] = "Entry type note selected";
    header("locaiton: ../pages/input.php");
    exit();
  }

  try {
    $conn->query($sql);
  } catch (Exception $e) {
    $_SESSION['error'] = "Failed to add entry to database";
    header("location: ../pages/input.php");
    exit();
  }
  

  header("location: ../pages/view.php");
?>
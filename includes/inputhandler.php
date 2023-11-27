<?php // Author: Samuel Schmitz ?>

<?php
  session_start();

  if (isset($_POST['isValidRequest'])) {
    $connectionRequestedByApp = $_POST['isValidRequest'];
  }
  include "dbconnect.php";
  $conn = new mysqli($host, $user, $pass, $dbname);

    $inputValue = $_POST['userInput'];
    $nameValue = $_POST['name'];
    $descValue = $_POST['desc'];
    $dateValue = $_POST['date'];

    $userID = $_SESSION['user_id'];

    if ($inputValue == 'task') {
      $insertTask = $conn->query("INSERT INTO tasks (taskName, taskDesc, taskDate, userID) VALUES ('$nameValue', '$descValue', '$dateValue', '$userID')");
      echo "Task Values Entered.";
    } else if ($inputValue == 'password') {
      // Password Safety
      $safePass = '';
      $i = 0;
      $hintChars = str_split($nameValue);
      foreach ($hintChars as $frontChar) {
        $i++;
        if ($i < 3) {
          $safePass .= $frontChar;
        }
      }
      $astLength = strlen($nameValue) - 4;
      for ($i = 0; $i < $astLength; $i++) {
        $safePass .= '*';
      }
      $i = 0;
      $passLength = strlen($nameValue);
      foreach ($hintChars as $backChar) {
        $i++;
        if ($i > ($passLength - 2)) {
          $safePass .= $backChar;
        }
      }
      $insertTask = $conn->query("INSERT INTO passwords (passName, passDesc, userID) VALUES ('$safePass', '$descValue', '$userID')");
      echo "Pass Values Entered.";
    } else if ($inputValue == 'note') {
      $insertTask = $conn->query("INSERT INTO notes (noteName, noteDesc, userID) VALUES ('$nameValue', '$descValue', '$userID')");
      echo "Note Values Entered.";
    } else {
      echo "Type not selected.";
    }

  foreach ($_POST as $key => $value) {
    echo "$key => #$value";?><br><?php
  }

  header("location: home.php");
?>
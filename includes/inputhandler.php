<?php // Author: Samuel Schmitz ?>

<?php
  session_start();

  if (isset($_POST['isValidRequest'])) {
    $connectionRequestedByApp = $_POST['isValidRequest'];
  }
  include "dbconnect.php";
  $conn = new mysqli($host, $user, $pass, $dbname);

    $inputValue = $_POST['userInput'];
    $descValue = $_POST['desc'];
    $nameValue = $_POST['name'];
    $dateValue = $_POST['date'];

    $userID = $_SESSION['user_id'];

    if ($inputValue == 'task') {
      $insertTask = $conn->query("INSERT INTO tasks (taskDate, taskDesc, userID) VALUES ('$dateValue', '$descValue', '$userID')");
      echo "Task Values Entered.";
    } else if ($inputValue == 'pass') {
      $insertTask = $conn->query("INSERT INTO passwords (passName, passDesc, userID) VALUES ('$nameValue', '$descValue', '$userID')");
      echo "Pass Values Entered.";
    } else if ($inputValue == 'note') {
      $insertTask = $conn->query("INSERT INTO notes (notesDesc, userID) VALUES ('$descValue', '$userID')");
      echo "Note Values Entered.";
    } else {
      echo "Type not selected.";
    }

  foreach ($_POST as $key => $value) {
    echo "$key => #$value";?><br><?php
  }

  header("location: ../pages/view.php");
?>
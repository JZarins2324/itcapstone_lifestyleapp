<?php // Author: Samuel Schmitz ?>

<?php
  $serverName = "localhost";
  $username = "root";
  $password = "mysql";
  $dbname = "LifestyleDB";
  $conn = new mysqli($serverName, $username, $password, $dbname);

    $inputValue = $_POST['userInput'];
    $descValue = $_POST['desc'];
    $nameValue = $_POST['name'];
    $dateValue = $_POST['date'];

    if ($inputValue == 'task') {
      $insertTask = $conn->query("INSERT INTO tasks (taskDate, taskDesc) VALUES ('$dateValue', '$descValue')");
      echo "Task Values Entered.";
    } else if ($inputValue == 'pass') {
      $insertTask = $conn->query("INSERT INTO passwords (passName, passDesc) VALUES ('$nameValue', '$descValue')");
      echo "Pass Values Entered.";
    } else if ($inputValue == 'note') {
      $insertTask = $conn->query("INSERT INTO notes (notesDesc) VALUES ('$descValue')");
      echo "Note Values Entered.";
    } else {
      echo "Type not selected.";
    }

  foreach ($_POST as $key => $value) {
    echo "$key => #$value";?><br><?php
  }
?>
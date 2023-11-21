<?php // Author: Samuel Schmitz ?>

<html>
  <body>

    <?php
      // Initialize Variables
      $userName = '';
      $userPass = '';

      //Login Variables Set
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // collect value of input field
        $userName = $_POST['username'];
        if (empty($userName)) {
          echo "Name is empty";
        } else {
          echo $userName;
        }
      }

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // collect value of input field
        $userPass = $_POST['password'];
        if (empty($userPass)) {
          echo "Password is empty";
        } else {
          echo $userPass;
        }
      }

      // Check for length
      /*if (strlen($userPass) <= 9 && strlen($userPass) >= 16) {
        header('Location: ../pages/login.php');
        exit();
      };*/

      // Check for number
      $passChars = str_split($userPass);
      foreach ($passChars as $passChar) {
        for ($i = 0; $i < 10; $i++) {
          if ($passChar = $i) {
            break;
          }
          else {
            header('Location: ../pages/login.php');
          }
        }
      }

      // Check for uppercase
      if (strtolower($userPass) == $userPass) {
        header('Location: ../pages/login.php');
        exit();
      }

      // Restrict special characters
      /*foreach ($passChars as $passChar) {
        if ($passChar = "," ||
            $passChar == "." ||
            $passChar == "/" ||
            $passChar == "|" ||
            $passChar == "<" ||
            $passChar == ">" ||
            $passChar == "{" ||
            $passChar == "}" ||
            $passChar == "?" ||
            $passChar == ";" ||
            $passChar == ":" ||
            $passChar == "'" ||
            $passChar == "`" ||
            $passChar == "~" ||
            $passChar == "@" ||
            $passChar == "#" ||
            $passChar == "%" ||
            $passChar == "^" ||
            $passChar == "&" ||
            $passChar == "*" ||
            $passChar == "+" ||
            $passChar == "=") {
              header('Location: ../pages/login.php');
              exit();
            }
      }*/

      // Check Login or Create Account
      if (isset($_POST["Login"])) {

        // Generate Queries
        $names = array($conn->query("SELECT userName FROM users WHERE userName = $userName"));
        $passwords = array($conn->query("SELECT userPass FROM users WHERE userPass = $userPass"));
        
        $nameCount = count($names);
        $passCount = count($passwords);

        // Compare Username and Password
        if ($nameCount > 1 && $passCount = 1) {
          // Redirect to home page
          header('Location: pages/home.php');
          exit();
        }
        else {
          echo "Username and/or Password is incorrect.";
        }
      
      } else if (isset($_POST["Create Account"])) {

        // Create Connection
        $serverName = "localhost";
        $username = "root";
        $password = "mysql";
        $dbname = "LifestyleDB";
        $conn = new mysqli($serverName, $username, $password, $dbname);

        // Insert New User SQL
        $addUser = "INSERT INTO users SET userName = '$newUser', userPass = '$newPass'";

      }
    ?>

  </body>
</html>
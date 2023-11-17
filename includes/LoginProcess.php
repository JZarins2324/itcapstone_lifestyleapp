<?php // Author: Samuel Schmitz ?>

<html>
  <body>

    <?php
      // Initialize Variables
      $userName = '';
      $userPass = '';
      $newUser = '';
      $newPass = '';

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
          echo "Name is empty";
        } else {
          echo $userPass;
        }
      }

      // Check for number
      $passChars = str_split($userPass);

      foreach ($passChars as $passChar) {
        for ($i = 0; $i < 10; $i++) {
          if ($passChar = $i) {
            break;
          }
          else {
            $_SESSION['numberMessage'] = "Password requires number.";
          }
        }
      }

      // Check for uppercase letter
      if ($strtolower($userPass) == $userPass) {
        $_SESSION['upperCaseMessage'] = "Password requires an uppercase letter.";
      }

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

        // Database Variables
        $serverName = "localhost";
        $username = "root";
        $password = "mysql";
        $dbname = "LifestyleDB";

        // Create Connection
        $conn = new mysqli($serverName, $username, $password, $dbname);

        // Check Connection
        if ($conn->connect_error) {
          die("Connection Failed: " . $conn->connect_error);
        }
        echo "Connected Successfully";

        // Insert New User SQL
        $addUser = "INSERT INTO users SET userName = '$newUser', userPass = '$newPass'";

        // Insert New User
        if ($conn->query($addUser) === true) {
          echo "SQL running successfully";
        } else {
          echo "Error in SQL: " . $conn->error;
        };

      }
    ?>

  </body>
</html>
<?php
// Authenticate.php to handle login or account creation

// Start the session
session_start();
include "../includes/dbconnect.php";

// Create a new PDO instance
$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get username and password from form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare a statement for execution
    $stmt = $pdo->prepare("SELECT * FROM users WHERE userName = ?");
    $stmt->execute([$username]);

        // Check username for empty
        if (empty($username)) {
          echo "Name is empty";
        } else {
          echo $userName;
        }

        // Check password for empty
        if (empty($username)) {
          echo "Name is empty";
        } else {
          echo $username;
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
    
    if ($stmt->rowCount() === 0) {
        // Username does not exist, create a new account
        // Hash the password before storing it
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $createAccount = $pdo->prepare("INSERT INTO users (userName, userPass) VALUES (?, ?)");
        $createAccount->execute([$username, $hashedPassword]);
        
        // Set session variables
        $_SESSION['user_id'] = $pdo->lastInsertId();
        $_SESSION['username'] = $username;
        
        // Redirect to home page
        header('Location: ../pages/home.php');
        exit();
    } else {
        // Username exists, verify the password
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if (password_verify($password, $user['userPass'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['userID'];
            $_SESSION['username'] = $username;
            
            // Regenerate session ID
            session_regenerate_id();

            // Admin Redirect
            if ($_SESSION['username'] == 'admin') {
                header('Location: ../pages/admin.php');
                exit();
            }
            
            // Redirect to home page
            header('Location: ../pages/home.php');
            exit();
        } else {
            // Password is incorrect
            // Handle the error appropriately
            $_SESSION['error'] = 'Incorrect username or password.';
			header('Location: ../pages/login.php');
			exit();
        }
    }
}
?>

<?php
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  include "../includes/dbconnect.php";

  // Create a new PDO instance
  $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);

  // Get username and password from form
  $username = $_POST['username'];
  $password = $_POST['password'];

  include "../includes/passwordChecks.php";

  $stmt = $pdo->prepare("SELECT * FROM users WHERE userName = ?");
  $stmt->execute([$username]);

  if (isset($_POST["Create_Account"])) {
    if ($stmt->rowCount() === 0) {
      // Username does not exist, create a new account
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
      // Username already in use
      $_SESSION['error'] = 'Username alrady in user';
      header('Location: ../pages/login.php');
      exit();
    }
  } else if (isset($_POST['Login'])) {
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
} else {
  header('Location: ../pages/home.php');
  exit();
}
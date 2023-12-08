<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $connectionRequestedByApp = true;
}

include "../includes/dbconnect.php";

// Get username and password from form
$username = filter_var(trim($_POST['username']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

include "../includes/passwordChecks.php";

// Create a new mysqli instance

// Check for database connection error
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("SELECT * FROM users WHERE userName = ?");
$stmt->bind_param("s", $username);
$stmt->execute();

if (isset($_POST["create"])) {
  $result = $stmt->get_result();
	if ($result->num_rows === 0) {
    // Username does not exist, create a new account
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $createAccount = $conn->prepare("INSERT INTO users (userName, userPass) VALUES (?, ?)");
    $createAccount->bind_param("ss",$username, $hashedPassword);      
		$createAccount->execute();
      
    // Set session variables
    $_SESSION['user_id'] = $conn->insert_id;
    $_SESSION['username'] = $username;
          
    // Redirect to home page
    header('Location: ../pages/home.php');
    exit();
  } else {
    // Username already in use
    $_SESSION['error'] = 'Username alrady in use';
    header('Location: ../pages/login.php');
    exit();
  }
} else if (isset($_POST['login'])) {
  $result = $stmt->get_result();
	if ($user = $result->fetch_assoc()) {
    if (password_verify($password, $user['userPass'])) {
      // Set session variables
      $_SESSION['user_id'] = $user['userID'];
      $_SESSION['username'] = $username;
            
      session_regenerate_id();

      // Admin Redirect
      if ($_SESSION['username'] == 'admin') {
        header('Location: ../pages/admin.php');
        exit();
      }
              
      // User Redirect
      header('Location: ../pages/home.php');
      exit();
    }
  }
  
  // Password is incorrect
  $_SESSION['error'] = 'Incorrect username or password.';
	header('Location: ../pages/login.php');
	exit();
}

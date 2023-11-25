<?php
session_start();

// Check if the form is submitted
if (!$_SERVER['REQUEST_METHOD'] === 'POST') {
  header('Location: ../pages/home.php');
  exit();
}

// Get username and password from form
$username = $_POST['username'];
$password = $_POST['password'];

include "../includes/passwordChecks.php";

include "../includes/dbconnect.php";

// Create a new mysqli instance
$mysqli = new mysqli($host, $user, $pass, $dbname);

// Check for database connection error
if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}

$stmt = $mysqli->prepare("SELECT * FROM users WHERE userName = ?");
$stmt->bind_param("s", $username);
$stmt->execute();

if (isset($_POST["Create_Account"])) {
  $result = $stmt->get_result();
	if ($result->num_rows === 0) {
    // Username does not exist, create a new account
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $createAccount = $mysqli->prepare("INSERT INTO users (userName, userPass) VALUES (?, ?)");
    $createAccount->bind_param("ss",$username, $hashedPassword);      
		$createAccount->execute();
      
    // Set session variables
    $_SESSION['user_id'] = $mysqli->insert_id;
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
} else if (isset($_POST['Login'])) {
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
  } else {
    // Password is incorrect
    $_SESSION['error'] = 'Incorrect username or password.';
		header('Location: ../pages/login.php');
		exit();
  }
}
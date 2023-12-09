<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $connectionRequestedByApp = true;
}

include "../includes/dbconnect.php";

// Get username and password from form
$username = filter_var(trim($_POST['username']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

// Create a new mysqli instance
$mysqli = new mysqli($host, $user, $pass, $dbname);

// Check for database connection error
if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}

$stmt = $mysqli->prepare("SELECT * FROM users WHERE userName = ?");
$stmt->bind_param("s", $username);
$stmt->execute();

if (isset($_POST["create"])) {
  $result = $stmt->get_result();
  if ($result->num_rows === 0) {
    include "../includes/passwordChecks.php"; 
		// Include the password validation script

    if (empty($passwordErrors)) { // Proceed only if there are no password errors
      // Username does not exist, create a new account
      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
      $createAccount = $mysqli->prepare("INSERT INTO users (userName, userPass) VALUES (?, ?)");
      $createAccount->bind_param("ss", $username, $hashedPassword);      
      $createAccount->execute();
      
      // Set session variables
      $_SESSION['user_id'] = $mysqli->insert_id;
      $_SESSION['username'] = $username;
          
      // Redirect to home page
      header('Location: ../pages/home.php');
      exit();
    } else {
      // Handle password validation errors
      $_SESSION['error'] = implode("\n", $passwordErrors);
      header('Location: ../pages/login.php');
      exit();
    }
  } else {
    // Username already in use
    $_SESSION['error'] = 'Username already in use';
    header('Location: ../pages/login.php');
    exit();
  }
} else if (isset($_POST['login'])) {
	$result = $stmt->get_result();
	if ($user = $result->fetch_assoc()) {
			// First, verify if the entered password matches the one in the database
			if (password_verify($password, $user['userPass'])) {
					// Password is correct, now include passwordChecks.php to perform additional checks
					include "../includes/passwordChecks.php";

					if (empty($passwordErrors)) {
							// If there are no additional password errors
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
					} else {
							// Handle additional password validation errors
							$_SESSION['error'] = implode("\n", $passwordErrors);
							header('Location: ../pages/login.php');
							exit();
					}
			} else {
					// Password is incorrect
					$_SESSION['error'] = 'Incorrect username or password.';
					header('Location: ../pages/login.php');
					exit();
			}
	} else {
			// Username not found
			$_SESSION['error'] = 'Incorrect username or password.';
			header('Location: ../pages/login.php');
			exit();
	}
}

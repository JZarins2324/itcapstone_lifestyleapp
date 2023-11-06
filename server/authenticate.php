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
    $password = $_POST['password']; // In a real application, this should be hashed!

    // Prepare a statement for execution
    $stmt = $pdo->prepare("SELECT * FROM users WHERE userName = ?");
    $stmt->execute([$username]);
    
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
        // Username exists, start the session
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Set session variables
        $_SESSION['user_id'] = $user['userID'];
        $_SESSION['username'] = $username;
        
        // Redirect to home page
        header('Location: ../pages/home.php');
        exit();
    }
}
?>
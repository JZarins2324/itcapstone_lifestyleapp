<?php // Author: Samuel Schmitz ?>
<?php 
$connectionRequestedByApp = true;
include("dbconnect.php");

// Check if the taskId is set
if (isset($_POST['taskId'])) {
    $taskId = $_POST['taskId'];
}

// Delete Check
if (isset($_POST['Delete'])) {
    include('dbdelete.php');
}
        
// Hidden Value Check
if (isset($_POST['hiddenName'])) {
    $updatedDesc = $_POST['hiddenName'];
}

// Prepare the SQL statement to update taskDesc and taskModify
$stmt = $conn->prepare("UPDATE tasks SET taskDesc = ?, taskModify = NOW() WHERE taskID = ?");
$stmt->bind_param("si", $updatedDesc, $taskId);

// Execute and check for errors
if ($stmt->execute()) {
    // Success, redirect to home.php
    header("Location: ../pages/home.php");
    exit();
} else {
    // Handle error, maybe redirect to an error page or show an error message
    echo "Error: " . $conn->error;
}

// Close the statement
$stmt->close();



// Close the database connection
$conn->close();

header("Location: ../pages/home.php");
?>

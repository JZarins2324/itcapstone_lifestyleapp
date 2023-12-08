<?php // dbdelete.php Author: Samuel Schmitz

include("dbconnect.php"); // Include the connection script

// Check if taskId is set and the Delete button was clicked
if (isset($_POST['taskId']) && isset($_POST['Delete'])) {
  $taskId = $_POST['taskId'];

  // Prepare the delete statement
  $stmt = $conn->prepare("DELETE FROM tasks WHERE taskID = ?");
  $stmt->bind_param("i", $taskId);

  // Execute and check for errors
  if ($stmt->execute()) {
    // Redirect to home page if successful
    header("Location: ../pages/home.php");
    exit;
  } else {
    // If something goes wrong, let's just show an error message
    echo "Oops, couldn't delete: " . $conn->error;
  }

  // Close the statement
  $stmt->close();
} else {
  // Redirect to home page if taskId or Delete is not set
  header("Location: ../pages/home.php");
  exit;
}

// Close the database connection
$conn->close();
?>

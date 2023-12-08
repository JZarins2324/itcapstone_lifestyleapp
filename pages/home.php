<?php
session_start();

if (!isset($_SESSION["username"])) {
	header("location: login.php");
	exit;
}

include("../includes/dbhome.php");
?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../assets/css/home.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/header.css">
  <title>Lifestyle Companion</title>
</head>
<body><?php
$pageTitle = "Home Page";
$currentPage = 'home';
include '../includes/header.php';
?> 

<div class="layout">
	<main class="main-content">
		<div id="contentSelection">
			<div class="task-section">
				<div class="flex-container">
					<div class="selectable-text" contenteditable="false"><?php
						// Recent Tasks
						// Initialize taskId
						$taskId = '';

						if ($recentTask->num_rows > 0) {
							$data = $recentTask->fetch_assoc();
							if ($data) {
								$taskId = $data['taskID']; ?>
						<table>
							<tr>
								<th>Task Name</th>
								<th>Task Date</th>
								<th>Recently Modified Task Description</th>
							</tr>
							<tr>
								<td><?= $data['taskName']; ?></td>
								<td><?= (new DateTime($data['taskDate']))->format('Y-m-d'); ?></td>
								<td id="recentTaskDesc-<?= $taskId; ?>" class="task-desc" contenteditable="false"><?= $data['taskDesc']; ?></td>
							</tr>
						</table><?php 
							} else {
						?>
							<p>no task found</p><?php 
							}
						} else { ?> 
							<p>no task to display</p><?php
						} ?> 

					</div><?php 
					if (isset($taskId)) {
						?> 
					<form action="../includes/dbedit.php" method="POST">
						<input type="hidden" name="hiddenName" id="recentHiddenId-<?= $taskId; ?>" value="">
						<input type="hidden" name="taskId" id="taskId" value="<?= $taskId ?>">
						<div class="button-group">
							<input type="button" value="Edit" id="recentEditButton-<?= $taskId; ?>" onclick="toggleEdit('recentTaskDesc-<?= $taskId; ?>', 'recentEditButton-<?= $taskId; ?>', 'recentHiddenId-<?= $taskId; ?>');">
							<input type="submit" value="Delete" name="Delete">
						</div><?php
					} //end if
					?> 
					</form>
				</div>
			</div>
			
			<div class="task-section">
				<div class="flex-container">
					<div class="selectable-text" contenteditable="false"><?php
						// Display newest Tasks
						if ($newTask->num_rows > 0) {
							$data = $newTask->fetch_assoc();
							if ($data) {
								$taskId = $data['taskID']; ?> 
						<table>
							<tr>
								<th>Task Name</th>
								<th>Task Date</th>
								<th>Newest Task Description</th>
							</tr>

							<tr>
								<td><?= $data['taskName']; ?></td>
								<td><?= (new DateTime($data['taskDate']))->format('Y-m-d'); ?></td>
								<td id="newTaskDesc-<?= $taskId; ?>" class="task-desc" contenteditable="false"><?= $data['taskDesc']; ?></td>
							</tr>
						</table><?php
					 		} else { ?> 
							<p>no task found</p><?php
							}
						} else {
						?> 
							<p>no task to display</p><?php
						}
						?> 

					</div><?php
					if (isset($taskId)) {
						?> 
					<form action="../includes/dbedit.php" method="POST">
						<input type="hidden" name="hiddenName" id="newHiddenId-<?= $taskId; ?>" value="">
						<input type="hidden" name="taskId" id="taskId" value="<?= $taskId ?>">
						<div class="button-group">
							<input type="button" value="Edit" id="newEditButton-<?= $taskId; ?>" onclick="toggleEdit('newTaskDesc-<?= $taskId; ?>', 'newEditButton-<?= $taskId; ?>', 'newHiddenId-<?= $taskId; ?>')">
							<input type="submit" value="Delete" name="Delete">
						</div><?php
					} //end if
					?> 
					</form>
				</div>
			</div>

			<div class="task-section">
				<div class="flex-container">
					<div class="selectable-text" contenteditable="false"><?php
						// Display oldest Tasks
						if ($oldTask->num_rows > 0) {
							$data = $oldTask->fetch_assoc();
							if ($data) {
								$taskId = $data['taskID']; ?> 
						<table>
							<tr>
								<th>Task Name</th>
								<th>Task Date</th>
								<th>Oldest Task Description</th>
							</tr>
							<tr>
								<td><?= $data['taskName']; ?></td>
								<td><?= (new DateTime($data['taskDate']))->format('Y-m-d'); ?></td>
								<td id="oldTaskDesc-<?= $taskId; ?>" class="task-desc" contenteditable="false"><?= $data['taskDesc']; ?></td>
							</tr>
						</table><?php
							} else { ?> 
							<p>no task found</p><?php
							}
						} else { ?> 
							<p>no task to display</p><?php
						} ?> 
 
					</div><?php
						if (isset($taskId)) {
						?> 
					<form action="../includes/dbedit.php" method="POST">
						<input type="hidden" name="hiddenName" id="oldHiddenId-<?= $taskId; ?>" value="">
						<input type="hidden" name="taskId" id="taskId" value="<?= $taskId ?>">
						<div class="button-group">
							<input type="button" value="Edit" id="oldEditButton-<?= $taskId; ?>" onclick="toggleEdit('oldTaskDesc-<?= $taskId; ?>', 'oldEditButton-<?= $taskId; ?>', 'oldHiddenId-<?= $taskId; ?>')">
							<input type="submit" value="Delete" name="Delete">
						</div><?php
					} //end if 
					?> 
					</form>
				</div>
			</div>
		</div> 
	</main>
	<?php include '../includes/footer.php';
	?> 

	<script src="../assets/js/toggleSelection.js"></script>
	<script src="../assets/js/toggleEdit.js"></script>
</body>
</html>

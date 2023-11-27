<?php include("../includes/dbhome.php");
session_start();

if (!isset($_SESSION["username"])) {
	header("location: login.php");
	exit;
}
?>
<link rel="stylesheet" type="text/css" href="../assets/css/home.css">

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Add other stylesheets or scripts here -->

    <title>Lifestyle Companion</title>
</head>

<body>

<?php
$pageTitle = "Home Page";
$currentPage = 'home';
include '../includes/header.php';
?>

<div class="layout">
	<aside class="left-aside"></aside>
	<main class="main-content">
		<div id="contentSelection">
		<div class="note-section">
				<div class="flex-container">
					<div class="selectable-text" contenteditable="false">Recent User Widget, Tasks and Notes</div>
					<div class="button-group">
						<input type="button" value="Edit">
						<input type="button" value="Delete">
					</div>
				</div>
			</div>
			
			
		<div class="note-section" onclick="toggleSelection(this)">
			<div class="flex-container">
				<div class="selectable-text" contenteditable="false">
				<!-- Display Newest Tasks -->
                <?php
				  // Display Task Data
				  if ($newTask->num_rows > 0) {
				?> 
				<table>
				  <tr>
				    <th>Task Name</th>
					<th>Task Description</th>
					<th>Task Date</th>
				  </tr><?php
				    while ($data = $newTask->fetch_assoc()) {
				  ?> 
				  <tr>
					<td><?= $data['taskName']; ?></td>
					<td><?= $data['taskDesc']; ?></td>
					<td><?= $data['taskDate']; ?></td>
				  <tr><?php
					}
				  ?> 
				</table>
				<br><?php
					}
				?>
				<!-- Display Newest Notes -->
                <?php
				  // Display Task Data
				  if ($newNote->num_rows > 0) {
				?> 
				<table>
				  <tr>
				    <th>Note Name</th>
					<th>Note Description</th>
					<th>Note Date</th>
				  </tr><?php
				    while ($data = $newNotes->fetch_assoc()) {
				  ?> 
				  <tr>
					<td><?= $data['noteName']; ?></td>
					<td><?= $data['noteDesc']; ?></td>
				  <tr><?php
					}
				  ?> 
				</table>
				<br><?php
					}
				?>
        </div>
				<div class="button-group">
					<input type="button" value="Edit">
					<input type="button" value="Delete">
					<div class="selectable-text" contenteditable="false">
						<!-- Display oldest Tasks -->
						<?php 
						if ($oldTask->num_rows > 0) { 
							$data = $oldTask->fetch_assoc();
							if ($data) {
								$taskId = $data['taskID']; ?>
								<table>
									<tr>
										<th>Task Date</th>
										<th>Task Description</th>
									</tr>
									<tr>
										<td><?= htmlspecialchars($data['taskDate']); ?></td>
										<td id="taskDesc-<?= $taskId; ?>" class="task-desc" contenteditable="false"><?= $data['taskDesc']; ?></td>
									</tr>
								</table>
								<?php } else { ?>
									<p>no task found</p>
							<?php }	
						} else { ?>
								<p>no task to display</p>
							<?php } ?>

							</div>
							<?php if (isset($taskId)) { ?>
								<div class="button-group">
									<input type="button" value="Edit" id="editButton-<?= $taskId; ?>" onclick="toggleEdit('taskDesc-<?= $taskId; ?>', 'editButton-<?= $taskId; ?>')">
									<input type="button" value="Delete">					 
								</div>								
							<?php } //end if ?>			
				</div>			 
			</div>
		</div>
		<div class="note-section" onclick="toggleSelection(this)">
			<div class="flex-container">
				<div class="selectable-text" contenteditable="false">
                <!-- Display oldest Tasks -->
                <?php
				  // Display Task Data
				  if ($oldTask->num_rows > 0) {
				?> 
				<table>
				  <tr>
				    <th>Task Date</th>
					<th>Task Description</th>
				  </tr><?php
				    while ($data = $oldTask->fetch_assoc()) {
				  ?> 
				  <tr>
					<td><?= $data['taskName']; ?></td>
					<td><?= $data['taskDesc']; ?></td>
					<td><?= $data['taskDate']; ?></td>
				  <tr><?php
					}
				  ?> 
				</table>
				<br><?php
					}
				?>
				<!-- Display Oldest Notes -->
                <?php
				  // Display Task Data
				  if ($oldNote->num_rows > 0) {
				?> 
				<table>
				  <tr>
				    <th>Note Name</th>
					<th>Note Description</th>
					<th>Note Date</th>
				  </tr><?php
				    while ($data = $oldNotes->fetch_assoc()) {
				  ?> 
				  <tr>
					<td><?= $data['noteName']; ?></td>
					<td><?= $data['noteDesc']; ?></td>
				  <tr><?php
					}
				  ?> 
				</table>
				<br><?php
					}
				?>
        </div>
				<div class="button-group">
					<input type="button" value="Edit">
					<input type="button" value="Delete">
				</div>
			<div class="note-section">
				<div class="flex-container">
					<div class="selectable-text" contenteditable="false">
						<!-- Display oldest Tasks -->
						<?php 
						if ($oldTask->num_rows > 0) { 
							$data = $oldTask->fetch_assoc();
							if ($data) {
								$taskId = $data['taskID']; ?>
								<table>
									<tr>
										<th>Task Date</th>
										<th>Task Description</th>
									</tr>
									<tr>
										<td><?= htmlspecialchars($data['taskDate']); ?></td>
										<td id="taskDesc-<?= $taskId; ?>" class="task-desc" contenteditable="false"><?= $data['taskDesc']; ?></td>
									</tr>
								</table>
								<?php } else { ?>
									<p>no task found</p>
							<?php }	
						} else { ?>
								<p>no task to display</p>
							<?php } ?>

							</div>
							<?php if (isset($taskId)) { ?>
								<div class="button-group">
									<input type="button" value="Edit" id="editButton-<?= $taskId; ?>" onclick="toggleEdit('taskDesc-<?= $taskId; ?>', 'editButton-<?= $taskId; ?>')">
									<input type="button" value="Delete">					 
								</div>								
							<?php } //end if ?>			
				</div>			 
			</div>
			<div class="note-section">
				<div class="flex-container">
					<div class="selectable-text" contenteditable="false">
						<!-- Display oldest Tasks -->
						<?php 
						if ($oldTask->num_rows > 0) { 
							$data = $oldTask->fetch_assoc();
							if ($data) {
								$taskId = $data['taskID']; ?>
								<table>
									<tr>
										<th>Task Date</th>
										<th>Task Description</th>
									</tr>
									<tr>
										<td><?= htmlspecialchars($data['taskDate']); ?></td>
										<td id="taskDesc-<?= $taskId; ?>" class="task-desc" contenteditable="false"><?= $data['taskDesc']; ?></td>
									</tr>
								</table>
								<?php } else { ?>
									<p>no task found</p>
							<?php }	 
						} else { ?>
								<p>no task to display</p>
							<?php } ?>

							</div>
							<?php if (isset($taskId)) { ?>
								<div class="button-group">
									<input type="button" value="Edit" id="editButton-<?= $taskId; ?>" onclick="toggleEdit('taskDesc-<?= $taskId; ?>', 'editButton-<?= $taskId; ?>')">
									<input type="button" value="Delete">					 
								</div>								
							<?php } //end if ?>			
				</div>			 
			</div>

		<script src="../assets/js/toggleEdit.js"></script>							
		
	</main>
	 
		<aside class="right-aside"></aside>
		</div>

		<?php
		include '../includes/footer.php';
		?>

<script src="../assets/js/toggleSelection.js"></script> 
<script src="../assets/js/toggleEdit.js"></script>							

</body>
 
</html>
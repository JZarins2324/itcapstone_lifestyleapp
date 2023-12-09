<?php
session_start();
include("../includes/dbhome.php");

if (!isset($_SESSION["username"])) {
	header("location: login.php");
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../assets/css/home.css">
    <title>Lifestyle Companion</title>
</head>

<body>

<?php
$pageTitle = "Home Page";
$currentPage = 'home';
include '../includes/header.php';
?>

<!-- TASK LAYOUT -->
<div class="layout">
	<main class="main-content">
		<div id="contentSelection">
		
<div class="note-section">
				<div class="flex-container">
					<div class="selectable-text" contenteditable="false">
						<!-- Display Recently Modified Task -->
						<?php
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
										<th>Task Description</th>
									</tr>
									<form action="../includes/dbedit.php" method="POST">
									<input type="hidden" name="hiddenName" id="recentHiddenId-<?= $taskId; ?>" value="">
									<input type="hidden" name="taskId" id="taskId" value="<?= $taskId ?>">
									<tr>
										<td><?= $data['taskName']; ?></td>
										<td><?= (new DateTime($data['taskDate']))->format('Y-m-d'); ?></td>
										<td id="recentTaskDesc-<?= $taskId; ?>" class="task-desc" contenteditable="false"><?= $data['taskDesc']; ?></td>
									</tr>
								</table>
								<?php } else { ?>
									<p>no task found</p>
							<?php }	
						} else { ?>
								<p>no task to display</p>
							<?php } //end if, else, else ?>

							</div>
							<?php if (isset($taskId)) { ?>
								<div class="button-group">
									<input type="button" value="Edit" id="recentEditButton-<?= $taskId; ?>" onclick="toggleEdit('recentTaskDesc-<?= $taskId; ?>', 'recentEditButton-<?= $taskId; ?>', 'recentHiddenId-<?= $taskId; ?>');">
									<input type="submit" value="Delete" name="Delete">					 
								</div>		
			
							<?php } //end if ?>		
							</form>
				</div>			 
			</div>
			
<div class="note-section">
				<div class="flex-container">
					<div class="selectable-text" contenteditable="false">
						<!-- Display Newest Created Task -->
						<?php 
						if ($newTask->num_rows > 0) { 
							$data = $newTask->fetch_assoc();
							if ($data) {
								$taskId = $data['taskID']; ?>
								<table>
									<tr>
										<th>Task Name</th>
										<th>Task Date</th>
										<th>Task Description</th>
									</tr>
									<form action="../includes/dbedit.php" method="POST">
									<input type="hidden" name="hiddenName" id="newHiddenId-<?= $taskId; ?>" value="">
									<input type="hidden" name="taskId" id="taskId" value="<?= $taskId ?>">
									<tr>
										<td><?= $data['taskName']; ?></td>
										<td><?= (new DateTime($data['taskDate']))->format('Y-m-d'); ?></td>
										<td id="newTaskDesc-<?= $taskId; ?>" class="task-desc" contenteditable="false"><?= $data['taskDesc']; ?></td>
									</tr>
								</table>
								<?php } else { ?>
									<p>no task found</p>
							<?php }	
						} else { ?>
								<p>no task to display</p>
								<?php } //end if, else, else ?>

							</div>
							<?php if (isset($taskId)) { ?>
								<div class="button-group">
									<input type="button" value="Edit" id="newEditButton-<?= $taskId; ?>" onclick="toggleEdit('newTaskDesc-<?= $taskId; ?>', 'newEditButton-<?= $taskId; ?>', 'newHiddenId-<?= $taskId; ?>')">
									<input type="submit" value="Delete" name="Delete">					 
								</div>								
							<?php } //end if ?>			
							</form>
				</div>			 
			</div>
			
<div class="note-section">
				<div class="flex-container">
					<div class="selectable-text" contenteditable="false">
						<!-- Display Oldest Task -->
						<?php 
						if ($oldTask->num_rows > 0) { 
							$data = $oldTask->fetch_assoc();
							if ($data) {
								$taskId = $data['taskID']; ?>
								<table>
									<tr>
										<th>Task Name</th>
										<th>Task Date</th>
										<th>Task Description</th>
									</tr>
									<form action="../includes/dbedit.php" method="POST">
									<input type="hidden" name="hiddenName" id="oldHiddenId-<?= $taskId; ?>" value="">
									<input type="hidden" name="taskId" id="taskId" value="<?= $taskId ?>">
									<tr>
										<td><?= $data['taskName']; ?></td>
										<td><?= (new DateTime($data['taskDate']))->format('Y-m-d'); ?></td>
										<td id="oldTaskDesc-<?= $taskId; ?>" class="task-desc" contenteditable="false"><?= $data['taskDesc']; ?></td>
									</tr>
								</table>
								<?php } else { ?>
									<p>no task found</p>
							<?php }	
						} else { ?>
								<p>no task to display</p>
							<?php } //end if, else, else ?>

							</div>
							<?php if (isset($taskId)) { ?>
								<div class="button-group">
									<input type="button" value="Edit" id="oldEditButton-<?= $taskId; ?>" onclick="toggleEdit('oldTaskDesc-<?= $taskId; ?>', 'oldEditButton-<?= $taskId; ?>', 'oldHiddenId-<?= $taskId; ?>')">
									<input type="submit" value="Delete" name="Delete">					 
								</div>								
							<?php } //end if ?>		
							</form>	
				</div>			 
			</div>
	</main>
	 		</div>
<!-- TASK LAYOUT END -->

		<?php include '../includes/footer.php'; ?>

<script src="../assets/js/toggleEdit.js"></script>							

</body>
 
</html>

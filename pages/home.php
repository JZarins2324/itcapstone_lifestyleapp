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
					<div class="selectable-text" contenteditable="false">
						<!-- Display recent Tasks -->
						<?php
						// Initialize taskId
						$taskId = '';
						
						if ($recentTask->num_rows > 0) { 
							$data = $recentTask->fetch_assoc();
							if ($data) {
								$taskId = $data['taskID']; ?>
								<table>
									<tr>
										<th>Task Date</th>
										<th>Task Description</th>
									</tr>
									<form action="../includes/dbbuttons.php" method="POST">
									<input type="hidden" name="hiddenName" id="hiddenId" value="">
									<input type="hidden" name="taskId" id="taskId" value="<?php echo $taskId ?>">
									<tr>
										<td><?= htmlspecialchars($data['taskDate']); ?></td>
										<td id="recentTaskDesc-<?= $taskId; ?>" class="task-desc" contenteditable="false"><?= $data['taskDesc']; ?></td>
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
									<input type="button" value="Edit" id="recentEditButton-<?= $taskId; ?>" onclick="toggleEdit('recentTaskDesc-<?= $taskId; ?>', 'recentEditButton-<?= $taskId; ?>');">
									<input type="button" value="Delete">					 
								</div>		
			
							<?php } //end if ?>		
							</form>
				</div>			 
			</div>
			
<div class="note-section">
				<div class="flex-container">
					<div class="selectable-text" contenteditable="false">
						<!-- Display newest Tasks -->
						<?php 
						if ($newTask->num_rows > 0) { 
							$data = $newTask->fetch_assoc();
							if ($data) {
								$taskId = $data['taskID']; ?>
								<table>
									<tr>
										<th>Task Date</th>
										<th>Task Description</th>
									</tr>
									<tr>
										<td><?= htmlspecialchars($data['taskDate']); ?></td>
										<td id="newTaskDesc-<?= $taskId; ?>" class="task-desc" contenteditable="false"><?= $data['taskDesc']; ?></td>
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
									<input type="button" value="Edit" id="newEditButton-<?= $taskId; ?>" onclick="toggleEdit('taskDesc-<?= $taskId; ?>', 'newEditButton-<?= $taskId; ?>')">
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
										<td id="oldTaskDesc-<?= $taskId; ?>" class="task-desc" contenteditable="false"><?= $data['taskDesc']; ?></td>
									</tr>
							        </form>
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
									<input type="button" value="Edit" id="oldEditButton-<?= $taskId; ?>" onclick="toggleEdit('taskDesc-<?= $taskId; ?>', 'oldEditButton-<?= $taskId; ?>')">
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
		include("../includes/dbbuttons.php");
		include '../includes/footer.php';
		?>

<script src="../assets/js/toggleSelection.js"></script> 
<script src="../assets/js/toggleEdit.js"></script>							

</body>
 
</html>

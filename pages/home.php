<?php include ("../includes/dbhome.php");
session_start();

if(!isset($_SESSION["username"])){
    header("location: login.php");
    exit;
}
?>
    <link rel="stylesheet" type="text/css" href="../assets/css/home.css">

<?php
	$pageTitle = "Home Page";
	$currentPage = 'home';

include '../includes/header.php';
?>

		<div class="layout">
    <aside class="left-aside"></aside>

		<main class="main-content">
		<div id="contentSelection">	
			<div class="note-section" onclick="toggleSelection(this)">
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
					<div class="selectable-text" contenteditable="false">New User Widget, Tasks and Notes</div>
					<div class="button-group">
						<input type="button" value="Edit">
						<input type="button" value="Delete">

					</div>
				</div>
			</div>
			<div class="note-section" onclick="toggleSelection(this)">
				<div class="flex-container">
					<div class="selectable-text" contenteditable="false">Old User Widget, Tasks and Notes</div>
					<div class="button-group">
						<input type="button" value="Edit">
						<input type="button" value="Delete">

					</div>
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
				    <th>Task Date</th>
					<th>Task Description</th>
				  </tr><?php
				    while ($data = $newTask->fetch_assoc()) {
				  ?> 
				  <tr>
					<td><?= $data['taskDate']; ?></td>
					<td><?= $data['taskDesc']; ?></td>
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
					<td><?= $data['taskDate']; ?></td>
					<td><?= $data['taskDesc']; ?></td>
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
			</div>
		</div>

		<?php
		include '../includes/footer.php';
		?>


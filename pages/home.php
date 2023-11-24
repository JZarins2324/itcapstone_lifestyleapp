<?php
session_start();

if(!isset($_SESSION["username"])){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to Lifestyle Companion</title>
    <!-- <link rel="stylesheet" type="text/css" href="../assets/css/app.css"> -->
		<link rel="stylesheet" type="text/css" href="../assets/css/home.css">
</head>
<body>
<header class="site-header">
    <h1>Welcome, <?= $_SESSION["username"] ?></h1>
    <h3>Lifestyle Companion<br>Home Page</h3>
    <h4>
        <div id="links">
            <a href='input.php'>New Entry</a> | 
            <a href='view.php'>View Entries</a> | 
            <a href='../server/logout.php'>Logout</a>
        </div>
    </h4>
</header>
<!-- Repeat for other headers with appropriate content -->

		<div class="layout">
    <aside class="left-aside"></aside>
		<main class="main-content">

		<main class="main-content">	
  	<div class="note-section" onclick="toggleSelection(this)">
			<div class="flex-container">
				<div class="selectable-text" contenteditable="false">
                Recent User Widget, Tasks and Notes
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
                New User Widget, Tasks and Notes
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
                Old User Widget, Tasks and Notes
        </div>
				<div class="button-group">
					<input type="button" value="Edit">
					<input type="button" value="Delete">

        </div>
    	</div>
		</div>
		<script src="../assets/js/toggleSelection.js"></script> 
		<div class="links-container">
		<footer class="site-footer">

		
		<br>
		Developer Contact:
		<a href="mailto:webmaster@example.com">Jacob Z.</a>
		<a href="mailto:amorford@student.cvtc.edu">Anthony M.</a>
		<a href="mailto:webmaster@example.com">Sam S.</a>

		</footer>
		</div>
		</main>
		<aside class="right-aside"></aside>
		</div>
		

</body>
</html>

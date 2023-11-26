<!-- header.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Add other stylesheets or scripts here -->
    <title>Lifestyle Companion</title>
</head>
<body>

<header class="site-header">
    <h1>Welcome, <?= htmlspecialchars($_SESSION["username"]); ?></h1>
    <h3>Lifestyle Companion<br><?= $pageTitle ?></h3>
    <h4><div id="links">
			<?php if($currentPage != 'view'): ?>
			<a href='view.php'>View Entries</a><span class="separator">|</span>
			<?php endif; ?>
			<?php if($currentPage != 'input'): ?>
				<a href='input.php'>New Entry</a><span class="separator">|</span>
			<?php endif; ?>
			<?php if($currentPage != 'home'): ?>
				<a href='home.php'>Home Page</a><span class="separator">|</span>
			<?php endif; ?>
			<a href='../server/logout.php'>Logout</a></div></h4>
</header>
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
    <link rel="stylesheet" type="text/css" href="../assets/css/app.css">
		<link rel="stylesheet" type="text/css" href="../assets/css/home.css">
</head>
<body>
 
		<header class="site-header">
    <h1>Welcome to Lifestyle Companion, <?= $_SESSION["username"] ?></h1>
		</header>
		<div class="layout">
    <aside class="left-aside">
			aside
			information
		</aside>
		<main class="main-content">
		<div class="main">
		<p>This is the home page. Here you can manage your to-dos, notes, and other information.</p>
		<p>Example Text: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacinia odio vitae vestibulum vestibulum. Cras interdum pharetra felis eu faucibus. Cras sed lobortis libero. Pellentesque arcu dui, iaculis sed enim quis, bibendum sollicitudin augue. Vestibulum sed magna at nunc commodo placerat.</p>

		<p>Praesent sollicitudin enim vel mi mattis, non ultrices nulla tincidunt. Proin eget est nunc. Nulla facilisi. Morbi bibendum nisl a nibh interdum, et fermentum enim blandit. Curabitur aliquet quam id dui posuere blandit.</p>

		<p>Curabitur laoreet, mauris vel blandit fringilla, leo elit rhoncus nunc, ac sagittis nulla sem eu justo. Nullam ac dolor id nulla posuere fermentum. Nam ac felis et neque consequat elementum a eget turpis.</p>

		<p>Aliquam erat volutpat. Sed imperdiet augue sit amet velit ullamcorper, et lobortis diam sollicitudin. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In bibendum nulla vel quam pretium a fringilla erat ornare.</p>

		<p>Etiam pharetra et nisl at faucibus. Quisque luctus pulvinar arcu, et molestie lectus ultrices et. Sed diam urna, egestas ut ipsum vel, volutpat volutpat neque. Praesent fringilla tortor arcu. Vivamus faucibus nisl enim, nec tristique ipsum euismod facilisis.</p>

		</div>
		<div class="links-container">
    <a href='view.php'>View Entries</a> | 
    <a href='../server/logout.php'>Logout</a>
		</div>
		</main>
		<aside class="right-aside">
			aside
			information
		</aside>
		</div>
		<footer class="site-footer">footer information</footer>

</body>
</html>

<?php
// Login page content
echo "<h1>Login</h1>";
echo "<form method='post' action='../server/authenticate.php'>";
echo "<input type='text' name='username' placeholder='Username' required />";
echo "<input type='password' name='password' placeholder='Password' required />";
echo "<input type='submit' value='Login' />";
echo "</form>";
?>

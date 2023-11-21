<?php
  include "../includes/dbgetuser.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='../assets/css/table.css'>
    <title>Admin Page</title>
  </head>
  <body><?php
      if ($userData->num_rows > 0) {
    ?> 
    <table>
      <tr>
        <th>User ID</th>
        <th>Username</th>
        <th>Date Created</th>
        <th>Action</th>
      </tr><?php
        while ($data = $userData->fetch_assoc()) {
        ?> 
      <tr>
        <td><?= $data['userID']; ?></td>
        <td><?= $data['userName']; ?></td>
        <td><?= $data['currentTimestamp']; ?></td>
        <td>DELETE</td>
      </tr><?php
        }
        echo PHP_EOL . "    </table>";
      }
    ?> 
  </body>
</html>
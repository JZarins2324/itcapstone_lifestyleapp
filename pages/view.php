<?php include "../includes/tabledata.php";

    // The view page for displaying user information

    echo "<h1>View Your Entries</h1>";

    // Sample data array simulating fetched data from the database
    $entries = [
        ['id' => 1, 'type' => 'to-do', 'content' => 'Buy groceries'],
        ['id' => 2, 'type' => 'note', 'content' => 'Meeting at 10am with team'],
        // More entries would be fetched in a real application
    ];

    // Display the entries
    foreach ($entries as $entry) {
        echo "<div class='entry'>";
        echo "<h2>" . ucfirst($entry['type']) . "</h2>";
        echo "<p>" . $entry['content'] . "</p>";
        // Edit and delete options for each entry
        echo "<a href='edit.php?id=" . $entry['id'] . "'>Edit</a> | ";
        echo "<a href='delete.php?id=" . $entry['id'] . "'>Delete</a>";
        echo "</div>";
    }

    //Display Table Data
    /*foreach ($taskData as $data) {
        ?><tr><td>
        <?php echo "$data"; ?>
        </td></tr><?php
    }*/

?>
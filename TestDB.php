<?php
/*
Author: Brad Hill

TODO: Have basic CRUD functionalilty.
Ultimately will be the 'back end'

*/
require_once "Issue.php";
require_once "Database.php";

$db = new Database();
foreach ($db->get_issues() as $issue) { }

?>

<html>

<head> </head>
<body> 
    <h1> TICKETS </h1>
    <?php
    foreach ($db->get_issues() as $issue) { 
        echo "<h3>".$issue['title']."<h3>";
        echo"
        <form action='update.php' method='POST'>
        <input type='hidden' name='id' value='".$issue['id']."'>
        <input type='submit' value='update ticket'>
        </form>";
        echo"
        <form action='delete.php' method='POST'>
        <input type='hidden' name='id' value='".$issue['id']."'>
        <input type='submit' value='delete ticket'>
        </form>";
    }
    ?>
</body>
</html>
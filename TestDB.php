<?php
/*
Author: Brad Hill

TODO: Have basic CRUD functionalilty.
Ultimately will be the 'back end'

*/
require_once "Issue.php";
require_once "Database.php";

$db = new Database();

?>

<html>

<head> </head>
<body> 
    <h1> TICKETS </h1>
    <a href="index.php"><h3>Create new ticket</h3></a>
    <?php
    foreach ($db->get_issues() as $issue) { 
        echo "<h3>".$issue['title']."<h3>";
        echo"
        <form action='index.php' method='GET'>
        <input type='hidden' name='id' value='".$issue['id']."'>
        <input type='submit' value='view / edit ticket'>
        </form>";
        echo"
        <form action='delete.php' method='POST'>
        <input type='hidden' name='id' value='".$issue['id']."'>
        <input type='submit' value='close ticket'>
        </form>";
    }
    ?>
</body>
</html>
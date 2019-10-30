<?php
/*
Author: Brad Hill

TODO: Have a better way to add a ticket.
Make the form preload if an ID is passed via the POST variable.
Become the entry point for API calls.

*/
require_once 'Database.php';
$edit = false;
if(isset($_GET['id'])){
    $edit = true;
    
}
?>
<html>

<head>

</head>
<?php
if(!$edit){
    echo'<body>
    <form action="CreateIssue.php" method="post">
        <p>Title</p>
        <input type="text" name="title" value="title of issue">
        <br />
        <p>Description</p>
        <input type="text" name="description">
        <br />
        <select name="priority">
            <option value="low">low</option>
            <option value="medium">medium</option>
            <option value="high">high</option>
        </select>
        <br />
        <input type="submit" value="Add new ticket">
    </form>
</body>';
}else{
    $db = new Database();
    $issueJSON = $db->get_issue_by_id($_GET['id']);
    echo "<br />";
    $issue = json_decode($issueJSON, false);
    var_dump($issue);
    echo'<body>
    <form action="update.php" method="post">
        <input type="hidden" value="'.$issue->id.'" name="id">
        <p>Title</p>
        <input type="text" name="title" value="'.$issue->title.'">
        <br />
        <p>Description</p>
        <input type="text" name="description" value="'.$issue->description.'">
        <br />
        <select name="priority" value = "'.$issue->priority.'">
            <option value="low">low</option>
            <option value="medium">medium</option>
            <option value="high">high</option>
        </select>
        <br />
        <input type="submit" value="Update">
    </form>
</body>';
}
?>

</html>
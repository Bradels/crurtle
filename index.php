<?php
/*
Author: Brad Hill

TODO: Have a better way to add a ticket.
Make the form preload if an ID is passed via the POST variable.
Become the entry point for API calls.

*/

?>
<html>

<head>

</head>

<body>
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
        <input type="submit" value="submit ">
    </form>
    </form>
</body>

</html>
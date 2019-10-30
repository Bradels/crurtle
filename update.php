<?php
require_once 'Database.php';
if(isset($_POST['id'])){
    $db = new Database();
    $db->update_issue($_POST['id'],$_POST['title'],$_POST['description'],$_POST['priority']);
}else{
    echo "No data to update ticket with";
}
header("Location: ./TestDB.php");
die();
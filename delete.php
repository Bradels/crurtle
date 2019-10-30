<?php
require_once 'Database.php';
if(isset($_POST['id'])){
    $db = new Database();
    $db->delete_issue($_POST['id']);
}
header("Location: ./TestDB.php");
die();

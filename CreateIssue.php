<?php

require_once 'Database.php';
require_once 'Issue.php';

$db = new Database();
$issue = new Issue($_POST['title'],$_POST['description'],$_POST['priority']);
$db->insert_issue($issue);

header("Location: ./TestDB.php");
die();

<?php
/*
Author: Brad Hill
Purpose: Read gitlog file and close tickets based on commits
*/
require_once 'Database.php';
require_once 'Issue.php';
$db = new Database();
$file = fopen("encoded.log", "r");
while (!feof($file)) {
    $line = fgets($file);
    $line = utf8_encode($line);
    $pattern = '/(![a-z]#[a-zA-Z0-9]+)+/';
    preg_match_all($pattern, $line, $matches);
    for ($i = 0; $i < count($matches[1]); $i++) {
        $input = $matches[1][$i];
        $command = substr($input,1,1);
        $value = substr($input,3);
        echo("Command: ".substr($input,1,1));
        echo "<br />";
        echo("Value: ".substr($input,3));
        switch($command){
            case 'c':
            $db->delete_issue($value);
            break;

            case 'o':
            $db->insert_issue(new Issue($value,"",'low'));
        }

    }
}

fclose($file);

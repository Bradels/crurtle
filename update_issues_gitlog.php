<?php
/*
Author: Brad Hill
Purpose: Read gitlog file and close tickets based on commits
*/
require_once 'Database.php';
$db = new Database();
$file = fopen("encoded.log", "r");
while (!feof($file)) {
    $line = fgets($file);
    $line = utf8_encode($line);
    $pattern = '/(!c#[0-9]+)+/';
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
        }

    }
}

fclose($file);

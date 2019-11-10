<?php
/*
Author: Brad Hill
Purpose: Read gitlog file and close tickets based on commits
*/
$file = fopen("log.txt", "r");
while (!feof($file)) {
    echo "<br />";
    echo phpversion();
    $line = fgets($file);
    //$line = utf8_encode($line);
    $pattern = '/(!c#[0-9]+)+/';
    echo $pattern;
    preg_match_all($pattern, $line, $matches);
    echo $line;
    echo "==== Matches with ====";
    var_dump($matches);
    // for ($i = 0; $i < count($matches[1]); $i+) {
    //     $key = $matches[1][$i];
    //     $value = $matches[2][$i];
    //     echo($key);
    //     echo($value);
    //     $$key = $value;
    // }
    //echo $line;
    echo "<br />";
}

fclose($file);

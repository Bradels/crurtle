<?php
/*
Author: Brad Hill
Purpose: Read gitlog file and close tickets based on commits
*/
$file = fopen("gitlog.log", "r");
$matches = 0;
while (!feof($file)) {
    echo "<br />";
    $line = fgets($file);
    $pattern = '/(!c#[0-9]+)+/';
    echo preg_quote($pattern);
    preg_match(preg_quote($pattern), $line, $matches);
    echo $line;
    echo "==== Matches with ====";
    var_dump($matches);
    // for ($i = 0; $i < count($matches[1]); $i++) {
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

<?php
/*
Author: Brad Hill
Purpose: Read gitlog file and close tickets based on commits
*/
    $line = "This should close !c#10";
    $pattern = '/(!c#[0-9]+)+/';
    echo $pattern;
    preg_match_all($pattern, $line, $matches);
    echo $line;
    var_dump($matches);
    echo "<br />";


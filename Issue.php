<?php
/*
Author: Brad Hill

Not entirely sure this class is needed
as PHP loves to let me create objects
with whatever members I want...

*/
class Issue{
    public $title;
    public $description;
    public $priority;
    //The status is closed or open. Open = False, Closed = True;
    public $status = false;

    function __construct($title, $description, $priority)
    {
        $this->title = $title;
        $this->description = $description;
        $this->priority = $priority;
    }
}
?>
<?php
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
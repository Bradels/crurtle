<?php
class configuration
{
    function __construct()
    {
    $this->configuration["DatabaseAddress"] = "localhost";
    $this->configuration["Database"] = "crurtle";
    $this->configuration["username"] = "crurtle";
    $this->configuration["password"] = "crurtle";    
    }
    

    function get_config(){
        return $this->configuration;
    }
}


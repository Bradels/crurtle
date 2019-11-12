<?php
class configuration
{
    function __construct()
    {
        $this->configuration["database_address"] = "localhost";
        $this->configuration["database"] = "crurtle01";
        $this->configuration["username"] = "crurtle";
        $this->configuration["password"] = "crurtleP0wer!";
    }


    function get_config()
    {
        return $this->configuration;
    }
}

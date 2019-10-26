<?php
/*
Author: Brad Hill

TODO: Finish CRUD Functions with Prepared Statements.
Make the process send and recieve JSON. Seperate Front-end from back end.

*/
require_once "Issue.php";
class Database
{
    private $servername = "localhost";
    private $username = "crurtle";
    private $password = "crurtleP0wer!";
    private $dbname = "crurtle01";
    private $conn;
    function __construct()
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
    }

    function __destruct()
    {
        $this->conn->close();
    }

    function insert_issue($issue)
    {
        $preparedStatement = $this->conn->prepare("INSERT INTO issues (title, description, priority) VALUES (?, ?, ?)");
        if (!$preparedStatement) {
            var_dump($this->conn->error_list);
        }
        $preparedStatement->bind_param('sss', $issue->title, $issue->description, $issue->priority);
        $preparedStatement->execute();
    }

    function get_issues($limit = 10, $sort_by = 'created_by')
    {
        $issues = [];
        $sql = "SELECT id, title, description, priority FROM issues";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $counter = 0;
            while ($row = $result->fetch_assoc()) {
                $issues[$counter++] = $row;
             }
        }
        return $issues;
    }

    function get_issue_by_id($id)
    {
        $issues = [];
        $sql = "SELECT id, title, description, priority FROM issues WHERE id=".$id;
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $counter = 0;
            while ($row = $result->fetch_assoc()) {
                $issues[$counter++] = $row;
             }
        }
        return $issues;
    }
}

<?php
/*
Author: Brad Hill

TODO:
Make the process send and recieve JSON. Seperate Front-end from back end.
Create Routes and Endpoints for API calls.
Move Database creds to ignored config file.

*/
require_once "Issue.php";
class Database
{
    //Local Database Credentials. DEV ONLY.
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
        $sql = "SELECT id, title, priority FROM issues WHERE closed=false LIMIT ".$limit;
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
        $stmt = $this->conn->prepare("SELECT id, title, description, priority FROM issues WHERE id=?");
        if (!$stmt) {
            var_dump($this->conn->error_list);
        }
        $stmt->bind_param('s', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return json_encode($result->fetch_assoc());
    }

    function update_issue($id, $title = null, $description = null, $priority = null)
    {
        echo "Adding bits and pieces into the DB::: <br />";
        var_dump(func_get_args());
        //TODO: Turn this into prepared statement
        if (!is_null($title)) {
            $sql = "UPDATE issues SET title='" . $title . "' WHERE id=" . $id;
            $this->conn->query($sql);
        }
        if (!is_null($description)) {
            $sql = "UPDATE issues SET description='" . $description . "' WHERE id=" . $id;
            $this->conn->query($sql);
        }
        if (!is_null($priority)) {
            $sql = "UPDATE issues SET priority='" . $priority . "' WHERE id=" . $id;
            $this->conn->query($sql);
        }
    }

    function delete_issue($id)
    {
        //TODO: Turn this into a prepared statement
        $sql = "UPDATE issues SET closed=true WHERE id=" . $id;
        $this->conn->query($sql);
        // $preparedStatement = $this->conn->prepare("DELETE FROM issues WHERE id=(id) VALUES (?)");
        // if (!$preparedStatement) {
        //     var_dump($this->conn->error_list);
        // }
        // $preparedStatement->bind_param('i', $id);
        // $preparedStatement->execute();
    }
}

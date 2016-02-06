<?php

error_reporting(E_ALL);
ini_set('error_reporting', E_ALL | E_STRICT);
ini_set('display_errors', 1);

class DBConnect
{

    var $mysqli;
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $db = "questian";

    function __construct()
    {
        if (!empty($this->mysqli)) {
            $this->mysqli = new mysqli(
                $this->host,
                $this->user,
                $this->password,
                $this->db);
            if ($this->mysqli->errno)
                printf("MYSQL CONNECT ERROR : %s", $this->mysqli->error);
        }
    }

    function __destruct()
    {
        $this->mysqli->close();
        unset($this->mysqli);
    }

    public function getMysqli()
    {
        return $this->mysqli;
    }

    public function excuteQuery($query)
    {
        $this->mysqli->query($query);
        if ($this->mysqli->errno){
            printf("QUERY ERROR : %s", $this->mysqli->error);
        }
    }

}
<?php

/**
 * Created by PhpStorm.
 * User: Seungwoo
 * Date: 2016. 2. 7.
 * Time: 오후 1:49
 */

error_reporting(E_ALL);
ini_set('error_reporting', E_ALL | E_STRICT);
ini_set('display_errors', 1);

class DBConnect
{
    public $mysqli;
    private $host = "localhost";
    private $user = "root";
    private $password = "Asdf25896!!";
    private $db = "questian";

    function __construct()
    {
        if (empty($this->mysqli)) {
            $this->mysqli = new mysqli(
                $this->host,
                $this->user,
                $this->password,
                $this->db);
            if ($this->mysqli->errno)
                printf("MYSQL CONNECT ERROR : %s", $this->mysqli->error);
        }
    }

    /**
     * @param $query
     */
    function query($query)
    {
        $this->mysqli->query($query);
        if ($this->mysqli->errno) {
            echo "QUERY ERROR : %s", $this->mysqli->error;
        }
    }

}
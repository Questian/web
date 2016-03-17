<?php

/**
 * Created by PhpStorm.
 * User: Seungwoo
 * Date: 2016. 2. 7.
 * Time: 오후 1:49
 */

//if you are debugging, plz uncomment this comment
//so you can see error reporting

//error_reporting(E_ALL);
//ini_set('error_reporting', E_ALL | E_STRICT);
//ini_set('display_errors', 1);

define('DB_HOST', "localhost");
define('DB_USERNAME', "root");
define('DB_PASSWORD', "asdf25896");
define('DB_NAME', "questian");

class DBConnect
{
    public $mysqli;
    private $host = DB_HOST;
    private $user = DB_USERNAME;
    private $password = DB_PASSWORD;
    private $db = DB_NAME;

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

    public function getPDO(){
        return new PDO(
            'mysql:host='.$this->host.
            ';dbname='.$this->db,
            $this->user,
            $this->password,
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    }

    public function getMysqli(){
        return $this->mysqli;
    }

}
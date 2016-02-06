<?php
error_reporting(E_ALL);
ini_set('error_reporting', E_ALL|E_STRICT);
ini_set('display_errors', 1);

//$connection = mysqli_connect("localhost", "root", "Asdf25896!!", "questian");

$mysqli = new mysqli('localhost', 'root', 'Asdf25896!!', 'questian');

//if (!$connection) {
//    die("MYSQL CONNECT ERROR" . "ERROR NUMBER :" . $mysqli->errno . "ERROR : " . $mysqli->error);
//}

if($mysqli->connect_errno){
    printf("Server not connected: %s", $mysqli->connect_error);
}

//echo "SUCCESSFUL CONNECT MYSQL!";

$mysqli->close();
unset($mysqli);
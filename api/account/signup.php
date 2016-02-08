<?php
error_reporting(E_ALL);
ini_set('error_reporting', E_ALL | E_STRICT);
ini_set('display_errors', 1);

include_once '../classes/DBConnect.php';

$db = new DBConnect();
$mysqli = $db->mysqli;


$id = $mysqli->real_escape_string($_POST['id']);
$password = $mysqli->real_escape_string($_POST['password']);
$email = $mysqli->real_escape_string($_POST['email']);
$name = $mysqli->real_escape_string($_POST['username']);

$password_encrypt = password_hash($password, PASSWORD_BCRYPT);

$signup_query = "INSERT INTO users(id,username, email, password) VALUES('$id','$name','$email', '$password_encrypt')";

$result = $mysqli->query($signup_query);

echo $mysqli->error;

if ($result) {
    //register succeed
    echo "register succeed";
} else {
    //register failed
    echo "register failed";
    echo $mysqli->error;
}
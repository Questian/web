<?php
session_start();

$db = new DBConnect();
$mysqli = $db->getMysqli();

$id = $mysqli->real_escape_string($_POST['id']);
$password = $mysqli->real_escape_string($_POST['password']);
$email = $mysqli->real_escape_string($_POST['email']);
$name = $mysqli->real_escape_string($_POST['username']);

$password_encrypt = password_hash($password, PASSWORD_BCRYPT);

$signup_query = "INSERT INTO users(id,username, email, password) VALUES('$id','$name','$email', '$password_encrypt')";

$db->excuteQuery($signup_query);
//
//if () {
//    //register succeed
//    echo "register succeed";
//} else {
//    //register failed
//    echo "register failed";
//    echo $mysqli->error;
//}
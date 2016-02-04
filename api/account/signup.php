<?php
session_start();
include('../DBConnect.php');

$id = mysql_real_escape_string($_POST['id']);
$password = mysql_real_escape_string($_POST['password']);
$email = mysql_real_escape_string($_POST['email']);
$name = mysql_real_escape_string($_POST['username']);

$password_encrypt = password_hash($password, PASSWORD_BCRYPT);

if(mysqli_query($connection,"INSERT INTO users(id,username, email, password) VALUES('$id','$name','$email', '$password_encrypt')")){
	//register succeed
	echo "register succeed";
} else {
	//register failed
	echo "register failed";
    echo mysql_error();
}
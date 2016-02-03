<?php
session_start();
include '../DBConnect.php';

$id = mysql_real_escape_string($_POST['id']);
$password = md5(mysql_real_escape_string($_POST['password']));
$email = mysql_real_escape_string($_POST['email']);
$name = mysql_real_escape_string($_POST['username']);

if(mysql_query("INSERT INTO users(id,username, email, password) VALUES('$id','$name','$email', '$password')")){
	//register succeed
	echo "register succeed";
} else {
	//register failed
	echo "register failed";
    echo mysql_error();
}

?>
<?php
include '../DBConnect.php';

$param_id = $_POST['id'];
$param_pw = $_POST['password'];

$id = mysql_real_escape_string($param_id);
$password = mysql_real_escape_string($_POST['password']);

//bcrypt function
//password encrypt
$password_encrypt = password_hash($password, PASSWORD_BCRYPT);

$result = mysql_query("SELECT * FROM users WHERE id LIKE '$id'");
$row = mysql_fetch_array($result);

if(!empty($param_id) && !empty($param_pw)){

	if(password_verify($param_pw, $password_encrypt)){
		echo "login succeed";
	} else {
		echo "login failed";
		echo "cause : " . mysql_error();
	}

} else {
	echo "LESS PARAMETERS";
}
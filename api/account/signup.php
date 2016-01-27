<?php

include './db_connect.php';

$id = $_POST['id'];
$pw = $_POST['password'];
$email = $_POST['email'];
$tel = $_POST['telephone'];
$capcha = $_POST['capcha'];

if(!empty($id) || !empty($pw) || !empty($email)|| !empty($tel) || !empty($capcha)){
	$signup_result = mysql_query('INSERT INTO users (id, pw, email, tel, capcha, created) VALUES('"$id"', '"$pw"', '"$email"', '"$tel"', '"$capcha'", '"now()"')
} else {
	echo 'less paramater'
}

?>
<?php
include_once '../DBConnect.php';

$param_id = $_POST['id'];
$param_pw = $_POST['password'];

$id = mysql_real_escape_string($param_id);
$password = md5(mysql_real_escape_string($_POST['password']));

$result = mysql_query("SELECT * FROM users WHERE id LIKE '$id'");
$row = mysql_fetch_array($result);

if(!empty($param_id) && !empty($param_pw)){
	if($row['password'] == md5($param_pw)){
		echo "Login Succeed";
	} else {
		echo "Login Failed : " . mysql_error();
	}
} else {
	echo "LESS PARAMETERS";
}

?>
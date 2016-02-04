<?php 
include_once '../DBConnect.php';

$param_x = $_POST['latitude'];
$param_y = $_POST['longtitude'];
$param_token = $_POST['token'];

$query = mysql_query("UPDATE users SET location = GEOMFROMTEXT('POINT('$param_x' '$param_y')', 0) WHERE token LIKE $param_token");
echo mysql_error();
if($query)echo "SUCCEED";
}else{
	echo "ERROR : ". mysql_error();
}
?>

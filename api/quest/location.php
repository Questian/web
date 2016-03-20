<?php
include_once '../classes/DBConnect.php';
include_once '../classes/Request.php';

$db = new DBConnect();
$mysqli = $db->getMysqli();
$pdo = $db->getPDO();

$uid = $mysqli->real_escape_string($_POST['uid']);
$latitude = $mysqli->real_escape_string($_POST['latitude']);
$longtitude = $mysqli->real_escape_string($_POST['longtitude']);

$request = new Request($uid);

$request->location($latitude, $longtitude)

?>

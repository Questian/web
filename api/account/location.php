<?php
include_once '../DBConnect.php';

$param_x = $_POST['latitude'];
$param_y = $_POST['longtitude'];
$param_token = $_POST['token'];

if (mysqli_query($connection, "UPDATE users SET location = GEOMFROMTEXT('$param_x','$param_y') WHERE token = $param_token")) {
    echo "SUCCEED";
}
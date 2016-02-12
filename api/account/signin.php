<?php
include '../DBConnect.php';
include '../classes/Auth.php';

$db = new DBConnect();
$mysqli = $db->mysqli;
$auth = new Auth();

$id = $mysqli->real_escape_string($_POST['id']);
$password = $mysqli->real_escape_string($_POST['password']);

$signin = $auth->signin($id, $password);

if ($signin) {
    echo "login succeed";
} else {
    echo "login failed";
}

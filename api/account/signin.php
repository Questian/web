<?php
include '../DBConnect.php';

$param_id = $_POST['id'];
$param_pw = $_POST['password'];

$id = $mysqli->real_escape_string($param_id);
$password = $mysqli->real_escape_string($_POST['password']);

//bcrypt function
//password encrypt
$password_encrypt = password_hash($password, PASSWORD_BCRYPT);

$signin_query = "SELECT * FROM users WHERE id LIKE '$id'";

$result = $mysqli->query($signin_query);

//$row = mysql_fetch_array($result);

$row = $result->fetch_array(MYSQLI_ASSOC);

if (!empty($param_id) && !empty($param_pw)) {

    if (password_verify($param_pw, $password_encrypt)) {
        echo "login succeed";
    } else {
        echo "login failed";
        echo "cause : " . $mysqli->error;
    }

} else {
    echo "LESS PARAMETERS";
}
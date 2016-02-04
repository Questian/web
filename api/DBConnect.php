<?php

$connection = mysqli_connect("127.0.0.1", "root", "asdf25896", "questian");

if (!$connection) {
    echo "MYSQL CONNECT ERROR";
    echo "ERROR NUMBER :" . mysqli_connect_errno();
    echo "ERROR : " . mysqli_connect_error();
    exit;
}

echo "SUCCESSFUL CONNECT MYSQL!";

mysqli_close($connection);
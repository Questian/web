<?php
$db_connect = mysql_connect('localhost', 'root', 'asdf25896');
if (!$db_connect) {
    die('Could not connect: ' . mysql_error());
}
if(!mysql_select_db('questian')){
	die('Not selected DB : ' . mysql_error());
}
mysql_close($link);
?>
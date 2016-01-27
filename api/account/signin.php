<?php
  include './db_conncect.php';
  $id = $_POST['id'];
  $pw = $_POST['password'];
  
  if(!empty($id) || !empty($pw)){
    $signin_result = mysql_query('SELECT * FROM users where id =' .$id .'and where password = '.$pw);
  } else {
    //less parameter
  }
  
?>
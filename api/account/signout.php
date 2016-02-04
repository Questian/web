
<?php
/**
 * Created by PhpStorm.
 * User: Seungwoo
 * Date: 2016. 2. 4.
 * Time: 오후 10:52
 */

session_start();
unset($_SESSION['id']);
unset($_SESSION['password']);

header('Refresh: 2; URL = login.php');
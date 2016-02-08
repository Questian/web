<?php
session_start();
include 'api/DBConnect.php';

error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Questian :: Login</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="theme-color" content="#00bcd9">

    <link rel="stylesheet" href="css/noto.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/content.css">

    <script src="js/nearQuestianFix.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script type="text/javascript" src="//apis.daum.net/maps/maps3.js?apikey=22e1ead8e7bd6f1fc4308eaa6c150de7"></script>
    <!--[if lte IE 9]>
        <script src="js/IE9.js"></script>
        <script src="js/html5shiv.min.js"></script>
        <script src="js/flexie.min.js"></script>
    <[endif]-->
</head>

<body>
<header id="page-header">
    <div id="page-header-wrapper">
        <a id="page-header-logo" href="index.php">
            <img id="page-header-logo-image" src="image/logo.png" border="0">
        </a>

        <div id="page-header-menu">

            <?php

            include_once 'api/classes/DBConnect.php';
            include_once 'api/classes/Auth.php';

            $db = new DBConnect();
            $mysqli = $db->mysqli;

            $id = $mysqli->real_escape_string($_POST['id']);
            $password = $mysqli->real_escape_string($_POST['password']);
            $email = $mysqli->real_escape_string($_POST['email']);
            $username = $mysqli->real_escape_string($_POST['username']);
            $is_signup = isset($_POST['signup']);

            if (!empty($id) && !empty($password) && !empty($email) && !empty($username)) {
                $auth = new Auth($id, $password, $username, $email);
                $auth->register();
            }

            ?>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                <input type="text" name="id" placeholder="아이디"><br>
                <input type="password" name="password" placeholder="비밀번호"><br>
                <input type="password" placeholder="비밀번호 확인"><br>
                <input type="text" name="username" placeholder="사용자 이름"><br>
                <input type="email" name="email" placeholder="이메일"><br>
                <input type="submit" name="signup" value="회원가입">
            </form>
        </div>

    </div>
</header>

<article id="content">

</article>
</body>

</html>
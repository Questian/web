<?php
session_start();
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Questian :: SignUp</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="theme-color" content="#fff">

    <link rel="stylesheet" href="css/noto.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/content.css">

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
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

        </div>
    </div>
</header>

<article id="content">
    <div class="auth-form">
        <?php

        include 'api/classes/DBConnect.php';
        include 'api/classes/Auth.php';

        if (isset($_POST['sign-up'])) {

            $db = new DBConnect();
            $mysqli = $db->mysqli;

            $id = $mysqli->real_escape_string($_POST['id']);
            $password = $mysqli->real_escape_string($_POST['password']);
            $email = $mysqli->real_escape_string($_POST['email']);
            $username = $mysqli->real_escape_string($_POST['username']);

            if (!empty($id) && !empty($password) && !empty($email) && !empty($username)) {
                $auth = new Auth();
                $result = $auth->signup($id, $password, $username, $email);
                if (!$result->errorCode()) {
                    echo "회원가입 성공";
                } else {
                    $error_msg = array_values($result->errorInfo());
                    echo "회원가입 실패 : " . $error_msg[2];
                }
            } else {
                echo "회원가입 실패 LESS PARAMETER";
            }
        }
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
            <input type="text" name="id" placeholder="아이디"><br>
            <input type="password" name="password" placeholder="비밀번호"><br>
            <input type="password" placeholder="비밀번호 확인"><br>
            <input type="text" name="username" placeholder="사용자 이름"><br>
            <input type="email" name="email" placeholder="이메일"><br>
            <input type="submit" name="sign-up" value="회원가입">
        </form>
    </div>
</article>
<!-- Questian - Rectangle -->
<ins class="adsbygoogle"
     style="display:inline-block;width:336px;height:280px"
     data-ad-client="ca-pub-2557364464552376"
     data-ad-slot="4320844043"></ins>
<script>
    (adsbygoogle = window.adsbygoogle || []).push({});
</script>
</body>
</html>
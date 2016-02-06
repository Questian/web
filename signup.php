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

            $id = $mysqli->real_escape_string($_POST['id']);
            $password = $mysqli->real_escape_string($_POST['password']);
            $email = $mysqli->real_escape_string($_POST['email']);
            $usernamename = $mysqli->real_escape_string($_POST['username']);
            $is_signup = isset($_POST['signup']);

            if(!empty($id) && !empty($password) && !empty($email) && ! empty($username)){

                $password_encrypt = password_hash($password, PASSWORD_BCRYPT);
                $signup_query = "INSERT INTO users(id,username, email, password) VALUES('$id','$name','$email', '$password_encrypt')";

                if ($mysqli->query($signup_query)) {
                    //register succeed
                    echo "register succeed";
                } else {
                    //register failed
                    echo "register failed";
                    echo $mysqli->error;
                }

            } else {
                echo "LESS PARAMETER";
            }
            //            $param_id = $_POST['id'];
            //            $param_pw = $_POST['password'];
            //            $id = $mysqli -> real_escape_string($param_id);
            //            $password = $mysqli ->real_escape_string($_POST['password']);
            //
            //            $login_msg = '';
            //
            //            //bcrypt function
            //            //password encrypt
            //            $password_encrypt = password_hash($password, PASSWORD_BCRYPT);
            //
            //            $signup_query = "INSERT INTO users(id,username, email, password) VALUES('$id','$name','$email', '$password_encrypt')";
            //
            //            $result = $mysqli -> query($signup_query);
            //
            //            $row = $result->fetch_array(MYSQLI_ASSOC);
            //
            //            if (isset($_POST['signup'])&&!empty($param_id) && !empty($param_pw)) {
            //
            //                if (password_verify($row['password'], $password_encrypt)) {
            //                    $login_msg = "login succeed";
            //                } else {
            //                    $login_msg = "login failed" . "cause : " . $mysqli->error;
            //                }
            //            } else {
            //                $login_msg = 'less paramas';
            //            }
            //
            //            echo '<script>alert("' . $login_msg . '")</script>'
            //            ?>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                <input type="text" name="id" placeholder="아이디"><br>
                <input type="password" name="password" placeholder="비밀번호"><br>
                <input type="password" placeholder="비밀번호 확인"><br>
                <input type="text" name="username" placeholder="사용자 이름"><br>
                <input type="submit" name="signup" value="회원가입">
            </form>
        </div>

    </div>
</header>

<article id="content">

</article>
</body>

</html>
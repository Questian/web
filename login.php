<?php
session_start();
include 'api/DBConnect.php';

error_reporting( E_ALL );
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
            $param_id = $_POST['id'];
            $param_pw = $_POST['password'];
            $id = $mysqli -> real_escape_string($param_id);
            $password = $mysqli ->real_escape_string($_POST['password']);

            $login_msg = '';

            //bcrypt function
            //password encrypt
            $password_encrypt = password_hash($password, PASSWORD_BCRYPT);

            $result = $mysqli -> query("SELECT * FROM users WHERE id ='$id'");
            $row = mysql_fetch_array($result);

            if (!empty($param_id) && !empty($param_pw)) {

                if (password_verify($row['password'], $password_encrypt)) {
                    $login_msg = "login succeed";
                } else {
                    $login_msg = "login failed" . "cause : " . mysql_error();
                }
            } else {
                $login_msg = 'less paramas';
            }

            echo '<script>alert("' . $login_msg . '")</script>'
            ?>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                <input type="text" name="id" placeholder="아이디를 입력해 주세요."></br>
                <input type="password" name="password" placeholder="비밀번호를 입력해 주세요."></br>
                <input type="submit" value="로그인">
            </form>
        </div>

    </div>
</header>

<article id="content">

</article>
</body>

</html>
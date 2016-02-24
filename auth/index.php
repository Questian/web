<?php
session_start();
include_once '../api/classes/Auth.php';

error_reporting(E_ALL);

$auth = new Auth();
if($auth->is_loggedin()){
    $auth->redirect("../index.php");
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Questian :: SignIn</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="theme-color" content="#00bcd9">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/noto.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/content.css">
    <link rel="stylesheet" href="../css/setting.css">
    <link rel="stylesheet" href="../css/auth.css">


    <script src="../js/jquery.min.js"></script>
    <script src="../js/jquery.easing.min.js"></script>
    <!--[if lte IE 9]>
        <script src="js/IE9.js"></script>
        <script src="js/html5shiv.min.js"></script>
        <script src="js/flexie.min.js"></script>
    <[endif]-->
</head>

<body>
<header id="page-header">
    <div id="page-header-wrapper">
        <a id="page-header-logo" href="../index.php">
            <img id="page-header-logo-image" src="../image/logo.png" border="0">
        </a>
        <div id="page-header-auth">
            <i class="fa fa-user-secret"></i>
            <a>PROTECTED BY MYASS</a>
        </div>
    </div>

</header>
<article id="content">
    <section id="find-criteria" class="box-model">
        <div id="setting-tab">
            <a href="#" class="by-distance button active">로그인</a>
            <a href="signup.php" class="by-ratedscore button">회원가입</a>
            <a href="#" class="by-ratedscore button">계정찾기</a>
        </div>
        <div id="setting">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                <div id="setting-title">
                    <h2>퀘스티안 계정</h2>
                    <p>기존 회원이시라면 로그인 가능합니다.</p>
                </div>
                <div class="auth-form">
                    <?php

                    if (isset($_POST['sign-in'])) {

                        $db = new DBConnect();
                        $mysqli = $db->mysqli;

                        $param_id = $_POST['id'];
                        $param_pw = $_POST['password'];
                        $id = $mysqli->real_escape_string($param_id);
                        $password = $mysqli->real_escape_string($_POST['password']);

                        $auth = new Auth();
                        $signin = $auth->signin($id, $password);


                        if ($signin) {
                            echo "로그인 성공";
                            $auth->redirect('../index.php');
                        } else {
                            echo "로그인 실패 ERRORCODE";
                        }
                    }
                    ?>
                    <input type="text" name="id" placeholder="아이디를 입력해 주세요."></br>
                    <input type="password" name="password" placeholder="비밀번호를 입력해 주세요."></br>
                </div>
                <div id="facebook-button">
                    <i id="facebook-font" class="fa fa-facebook"></i>
                    페이스북으로 로그인
                </div>
                <div id="twitter-button">
                    <i class="fa fa-twitter"></i>
                    트위터로 로그인
                </div>
                <div id="google-button">
                    <i class="fa fa-google-plus"></i>
                    구글플러스로 로그인
                </div>
                <input type="submit" value="기존 계정으로 로그인" name="sign-in"/>
            </
            >
        </div>
    </section>
</article>
</body>

</html>
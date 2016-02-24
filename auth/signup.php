<!DOCTYPE html>
<html>

<head>
    <title>Questian :: SignUp</title>

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
            <a href="index.php" class="by-distance button">로그인</a>
            <a href="#" class="by-ratedscore button active">회원가입</a>
            <a href="#" class="by-ratedscore button">계정찾기</a>
        </div>
        <div id="setting">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                <div id="setting-title">
                    <h2>퀘스티안에 오신것을 환영합니다!</h2>
                    <p>아래 절차에 따라 회원가입을 할 수 있습니다.</p>
                    <p>회원가입시 이 <a><b>회원약관</b></a>을 동의한것으로 간주합니다.</p>
                </div>
                <div class="auth-form">
                    <?php

                    include '../api/classes/Auth.php';

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
                    <input type="text" name="id" placeholder="아이디"><br>
                    <input type="password" name="password" placeholder="비밀번호"><br>
                    <input type="password" placeholder="비밀번호 확인"><br>
                    <input type="text" name="username" placeholder="사용자 이름"><br>
                    <input type="email" name="email" placeholder="이메일"><br>
                </div>
                <div id="facebook-button">
                    <i id="facebook-font" class="fa fa-facebook"></i>
                    페이스북으로 회원가입
                </div>
                <div id="twitter-button">
                    <i class="fa fa-twitter"></i>
                    트위터로 회원가입
                </div>
                <div id="google-button">
                    <i class="fa fa-google-plus"></i>
                    구글플러스로 회원가입
                </div>
                <input type="submit" value="회원가입" name="sign-up"/>
            </>
        </div>
    </section>
</article>
</body>

</html>
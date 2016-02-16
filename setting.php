<!DOCTYPE html>
<html>

<head>
    <title>Questian :: Settings</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="theme-color" content="#00bcd9">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/noto.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/content.css">

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <!--[if lte IE 9]>
        <script src="js/IE9.js"></script>
        <script src="js/html5shiv.min.js"></script>
        <script src="js/flexie.min.js"></script>
    <[endif]-->
</head>

<body>
<header id="page-header">
    <div id="page-header-wrapper">
        <a id="page-header-logo" href="/index.php">
            <img id="page-header-logo-image" src="image/logo.png" border="0">
        </a>

        <div id="search-wrapper">
            <input id="search-field" type="search" placeholder="검색어를 입력해 주세요.">
            <button id="search-button" type="submit">
                <img id="search-button-image" src="image/search-button.png">
            </button>
        </div>

        <div id="page-header-menu">
            <img class="profile-image margin-fix" src="http://i.imgur.com/ySlwZ4Z.png">
            <a href="#" id="menu-alert"><i class="fa fa-bell"></i></a>
            <!--            <a href="#" id="menu-user"><img src="image/menu-user.png"></a>-->
            <a href="#" id="menu-search"><i class="fa fa-search"></i></a>
            <a href="setting.php" id="menu-setting"><i class="fa fa-cog"></i></a>
        </div>

    </div>
</header>

<article id="content">
    <section id="find-criteria" class="box-model">
        <a href="#" class="by-distance button active">일반 설정</a>
        <a href="#" class="by-ratedscore button">보안 설정</a>
        <a href="#" class="by-recently button">위치 설정</a>
        <div id="setting">
            <h2>계정</h2>
            <p>기본 계정과 언어 설정을 변경합니다.</p>
            <form>
                <div id="id-fieldset">
                    아이디 <input type="text"value="endless_hack"><br>
                    https://questian.us/endless_hack
                </div>
                <div id="email-fieldset">
                    이메일 주소 <input type="email" value="ysw0094@gmail.com"><br>
                    이메일은 공개되지 않습니다.
                </div>
                <div id="lang-fieldset">
                    언어 <select>
                        <option value="lang-ko">Korean (한국어)</option>
                    </select><br>
                    퀘스티안 번역 프로젝트에 참가해보시겠어요?
                </div>
                <div id="time-fieldset">
                    시간대 <select>
                        <option value="time-zone-seoul">(GMT+09:00) Seoul</option>
                    </select><br>
                    시간대에 맞추어 퀘스트가 정렬됩니다.
                </div>
                <h2>퀘스트</h2>
                <input type="submit" value="변경사항 저장"/>
            </form>
        </div>
    </section>
</article>
</body>

</html>
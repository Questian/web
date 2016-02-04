<!DOCTYPE html>
<html>

<head>
    <title>Questian :: Settings</title>

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

        <div id="search-wrapper">
            <input id="search-field" type="search" placeholder="검색어를 입력해 주세요."><!--
                --><button id="search-button" type="submit">
                <img id="search-button-image" src="image/search-button.png">
            </button>
        </div>

        <div id ="page-header-menu">
            <a href="#"id="menu-alert"><img src="image/menu-alert.png"></a>
            <a href="#"id="menu-quest"><img src="image/menu-quest.png"></a>
            <a href="#"id="menu-user"><img src="image/menu-user.png"></a>
            <a href="#"id="menu-setting"><img src="image/menu-setting.png"></a>
        </div>

    </div>
</header>

<article id="content">
        <section id="find-criteria" class="box-model">
            <a href="#" class="by-distance button active">일반 설정</a>
            <a href="#" class="by-ratedscore button">보안 설정</a>
            <a href="#" class="by-recently button">위치 설정</a>
            <div id="daum-map"></div>
        </section>
</article>
</body>

</html>
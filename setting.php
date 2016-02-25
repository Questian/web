<?php
include 'api/classes/Auth.php';
include 'api/classes/Request.php';

session_start();

$auth = new Auth();

$uid = $_SESSION['user_session'];
$request = new Request($uid);
?>

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
    <link rel="stylesheet" href="css/setting.css">


    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <!--[if lte IE 9]>
        <script src="js/IE9.js"></script>
        <script src="js/html5shiv.min.js"></script>
        <script src="js/flexie.min.js"></script>
    <[endif]-->
</head>

<body>
<?php include 'header.php'?>
<article id="content">
    <section id="find-criteria" class="box-model">
        <div id="setting-tab" class="setting-tab">
            <a href="#" class="by-distance button active">일반 설정</a>
            <a href="#" class="by-ratedscore button">보안 설정</a>
            <a href="#" class="by-recently button">위치 설정</a>
        </div>
        <div id="setting">
            <form>
                <div id="setting-title">
                    <h2>계정</h2>
                    <p>기본 계정과 언어 설정을 변경합니다.</p>
                </div>
                <div id="id-fieldset" class="pref-box">
                    <label for="id-field">아이디</label>
                    <input type="text"class="pref-input" id="id-field" value="endless_hack">
                    <p>https://questian.us/endless_hack</p>
                </div>
                <br>
                <div id="email-fieldset" class="pref-box">
                    <label for="email-field">이메일 주소</label>
                    <input type="email" class="pref-input" id="email-field" value="ysw0094@gmail.com">
                    <p>이메일은 공개되지 않습니다.</p>
                </div>
                <br>
                <div id="lang-fieldset" class="pref-box">
                    <label for="lang-field">언어</label>
                    <div class="dropdown">
                        <select>
                            <option id="lang-field" value="lang-ko">Korean (한국어)</option>
                        </select>
                    </div>
                    <a href="//github.com/questian/web"><p>퀘스티안 번역 프로젝트에 참여해보시겠어요?</p></a>
                </div>
                <br>
                <div id="logout-fieldset" class="pref-box">
                    <label for="time-zone-field">시간대</label>
                    <div class="dropdown">
                        <select>
                            <option id="time-zone-field" value="time-zone-seoul">(GMT+09:00) Seoul</option>
                        </select>
                    </div>
                    <p>시간대에 맞추어 퀘스트가 정렬됩니다.</p>
                </div>
                <br>
                <div id="setting-title">
                    <h2>퀘스트</h2>
                    <p>타임라인에 로드되는 퀘스트를 설정합니다.</p>
                </div>
                <div id="sort-fieldset" class="pref-box">
                    <label for="sort-field">정렬순</label>
                    <div class="dropdown">
                        <select>
                            <option id="sort-time" value="내위치 기준 정렬">내위치 기준 정렬</option>
                        </select>
                    </div>
                    <p>퀘스티안 타임라인의 퀘스트 정렬기준을 선택합니다.</p>
                </div>
                <div id="sort-fieldset" class="pref-box">
                    <label for="sort-field">주변 퀘스트 실시간 알림</label>
                        <input type="checkbox" >
                    <p>자신의 위치 주변에 퀘스트가 공표되면 알려드려요.</p>
                </div>
                <input type="submit" value="변경사항 저장"/>
            </form>
            <div id="logout-fieldset" class="pref-box">
                <?php
                if(isset($_POST['logout'])){
                    $auth->logout();
                    $auth->redirect('auth/index.php');
                }
                ?>
                <label for="time-zone-field">로그아웃</label>
                <div class="dropdown">
                </div>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                    <input type="submit" value="지금 이 계정을 로그아웃 합니다." name="logout" onclick="window.location = 'index.php'">
                </form>
            </div>
        </div>
    </section>
</article>
</body>

</html>
<?php

include 'api/classes/Auth.php';
include 'api/classes/Request.php';
include 'api/classes/Model/Quest.php';

session_start();
session_save_path('./session');
echo $_SESSION['username'];

$db = new DBConnect();
$mysqli = $db->mysqli;
$pdo = $db->getPDO();


$auth = new Auth();
if(!$auth->is_loggedin()){
    $auth->redirect("/auth/index.php");
}

$uid = $_SESSION['user_session'];
$request = new Request($uid);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Questian :: Timeline</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="theme-color" content="#00bcd9">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//rawgit.com/Soldier-B/jquery.toast/master/jquery.toast/jquery.toast.min.css" />
    <link rel="stylesheet" href="css/noto.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/content.css">

    <link rel="shortcut icon" href="/image/android_favicon.png"/>
    <link rel="apple-touch-icon" href="/image/ios_favicon.png"/>

    <script src="js/nearQuestianFix.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script type="text/javascript" src="//apis.daum.net/maps/maps3.js?apikey=22e1ead8e7bd6f1fc4308eaa6c150de7"></script>
    <script src="//rawgit.com/Soldier-B/jquery.toast/master/jquery.toast/jquery.toast.min.js"></script>
    <script src="/js/toast.js"></script>
    <!--[if lte IE 9]>
        <script src="js/IE9.js"></script>
        <script src="js/html5shiv.min.js"></script>
        <script src="js/flexie.min.js"></script>
    <[endif]-->
</head>

<body>
<header id="page-header">
    <div id="page-header-wrapper">
        <a id="page-header-logo" href="#">
            <img id="page-header-logo-image" src="image/logo.png" border="0">
        </a>

        <div id="search-wrapper">
            <input id="search-field" type="search" placeholder="검색어를 입력해 주세요.">
            <button id="search-button" type="submit">
                <img id="search-button-image" src="image/search-button.png">
            </button>
        </div>

        <div id="page-header-menu">
            <img class="profile-image margin-fix" src="<?php echo $request->getUser($uid)->getImg()?>">
            <a href="#" id="menu-alert"><i class="fa fa-bell"></i></a>
            <!--            <a href="#" id="menu-user"><img src="image/menu-user.png"></a>-->
            <a href="#" id="menu-search"><i class="fa fa-search"></i></a>
            <a href="setting.php" id="menu-setting"><i class="fa fa-cog"></i></a>
        </div>

    </div>
</header>

<article id="content">
    <section id="find-criteria" class="box-model">
        <a href="#" class="by-distance button active" onclick="getLocation()">가까운 거리순</a>
        <a href="#" class="by-ratedscore button">레이팅 점수순</a>
        <a href="#" class="by-recently button">최신 업로드순</a>
        <div id="daum-map"></div>
        <script src="js/daumMap/daum_map.js"></script>
        <script src="js/daumMap/common.js"></script>
    </section>

    <section id="right-container">
        <div class="box-model" id="near-questian">
            <div id="near-questian-title">주변의 추천 퀘스티안</div>
            <div class="near-questian-padding-wrapper">
                <div class="near-people">
                    <img class="profile-image margin-fix" src="http://i.imgur.com/ZvlD7Li.png"/>
                    <div class="user-nickname">꾸기</div>
                    <div class="user-introduction">[대출갤러] 뭐든지 맡겨만 주십쇼</div>
                </div>
                <div class="near-people">
                    <img class="profile-image margin-fix" src="http://i.imgur.com/Lo09ZvI.jpg">
                    <div class="user-nickname">Philip</div>
                    <div class="user-introduction">i would suck your dick if you pay me</div>
                </div>
                <div class="near-people">
                    <img class="profile-image margin-fix" src="http://i.imgur.com/ySlwZ4Z.png"/>
                    <div class="user-nickname">씅우</div>
                    <div class="user-introduction">노가다 경력 11년 백수입니다.</div>
                </div>
                <div class="near-people">
                    <img class="profile-image margin-fix" src="http://i.imgur.com/ySlwZ4Z.png"/>
                    <div class="user-nickname">씅우</div>
                    <div class="user-introduction">노가다 경력 11년 백수입니다.</div>
                </div>
                <div class="near-people">
                    <img class="profile-image margin-fix" src="http://i.imgur.com/ySlwZ4Z.png"/>
                    <div class="user-nickname">씅우</div>
                    <div class="user-introduction">노가다 경력 11년 백수입니다.</div>
                </div>
            </div>
        </div>
    </section>

    <section id="left-container">
        <?php

        if (isset($_POST['submit-quest'])) {

            $quest = $mysqli->real_escape_string($_POST['quest']);
            $reward = $mysqli->real_escape_string($_POST['reward']);
            $content = $mysqli->real_escape_string($_POST['content']);
            if (!empty($quest) && !empty($reward) && !empty($content)) {
                //get latitude (Dummy)
                $latitude = 0.0;
                //get longtitude (Dummy)
                $longtitude = 0.0;
                //get img
                $img = '';
                $quest = new Quest($uid, $quest, $reward, $content, $latitude, $longtitude, $img);
                $result = $request->requestQuest($quest);
                if ($result) echo "<script>createToast('succeed');</script>";
                else echo "<script>createToast('dberror');</script>";

            } else echo "<script>createToast('lessparam');</script>";

        }
        ?>

        <form method="post" id="request-form" action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>>
            <div class="box-model quest-request">
                <div class="quest-card-padding-wrapper request-box">
                    <article class="quest-card-article">
                        <img class="quest-image title-image" src="image/quest.png">
                        <blockquote class="quest-reward-text">
                            <input name="quest" type="text" placeholder="퀘스트를 입력하세요.">
                        </blockquote>
                        <img class="reward-image title-image" src="image/reward.png">
                        <blockquote class="quest-reward-text">
                            <form>
                                <input name="reward" type="text" placeholder="완료보상을 입력하세요.">
                            </form>
                        </blockquote>
                        <textarea class="quest-content" name="content" placeholder="무엇이 필요하신가요?"
                                  form="request-form"></textarea>

                    </article>
                </div>

                <footer class="quest-request-footer">
                    <div class="quest-request-data">
                        <i class="fa fa-map-marker"></i>
                        <i class="fa fa-file-image-o"></i>
                    </div>
                    <div class="quest-more quest-request-text">
                        <input class="quest-request-text" name="submit-quest" type="submit" value="공표">
                    </div>
                </footer>
            </div>
        </form>

        <?php
        $quest = $request->getQuestAll();
        foreach($quest as $row):
            $user = $request->getUser($row['uid']);
        ?>

        <div class="box-model quest-card">
            <div class="quest-card-padding-wrapper">
                <header class="quest-card-header">
                    <div class="user-location"><span class="cyan-text">전라남도 목포 신안군</span> 근방</div>
                    <img class="profile-image" src="<?=$user->getImg()?>">
                    <div class="user-nickname"><?=$user->getUsername() .'('. $user->getId() . ')'?></div>
                    <div class="time-ago"><?=$row['date']?></div>
                    <div class="clear"></div>
                </header>
                <article class="quest-card-article">
                    <img class="quest-image title-image" src="image/quest.png">
                    <blockquote class="quest-reward-text">
                        <?=$row['quest']?>
                    </blockquote>
                    <img class="reward-image title-image" src="image/reward.png">
                    <blockquote class="quest-reward-text">
                        <?=$row['reward']?>
                    </blockquote>
                    <p><?=str_replace('\r\n', '<br/>', $row['content'])?></p>
                </article>
            </div>
            <footer class="quest-card-footer">
                <div class="quest-status">현재 진행중</div>
                <div class="quest-more cyan-text">더 보기</div>
            </footer>
        </div>

        <?php endforeach ?>

        <div class="box-model quest-card">
            <div class="quest-card-padding-wrapper">
                <header class="quest-card-header">
                    <div class="user-location"><span class="cyan-text">광주광역시 서구 김대중컨밴션센터</span> 근방</div>
                    <img class="profile-image" src="image/IMG_20150504_142602.jpg">
                    <div class="user-nickname">김수현</div>
                    <div class="time-ago">5분 전</div>
                    <div class="clear"></div>
                </header>
                <article class="quest-card-article">
                    <img class="quest-image title-image" src="image/quest.png">
                    <blockquote class="quest-reward-text">
                        잃어버린 제 강아지를 찾아요.
                    </blockquote>
                    <img class="reward-image title-image" src="image/reward.png">
                    <blockquote class="quest-reward-text">
                        강아지를 찾아주시면 25만원
                    </blockquote>
                    <p>이렇게 생긴 제 강아지를 찾아주세요..
                        <br/>제발 ㅠㅠ 부탁드립니다.. 사례는 이정도면 되겠죠?
                    </p>
                    <img class="quest-content-img"
                         src="http://www.asrgo.com/files/attach/images/8131/104/063/Labrador_Retriever_puppies.jpg">
                </article>
            </div>
            <footer class="quest-card-footer">
                <div class="quest-status">현재 진행중</div>
                <div class="quest-more cyan-text">더 보기</div>
            </footer>
        </div>
        <div class="box-model quest-card">
            <div class="quest-card-padding-wrapper">
                <header class="quest-card-header">
                    <div class="user-location"><span class="cyan-text">전라남도 목포 신안군</span> 근방</div>
                    <img class="profile-image" src="image/milkgun.png">
                    <div class="user-nickname">익명퀘스티안(QPDCA1345)</div>
                    <div class="time-ago">5분 전</div>
                    <div class="clear"></div>
                </header>
                <article class="quest-card-article">
                    <img class="quest-image title-image" src="image/quest.png">
                    <blockquote class="quest-reward-text">
                        휴지좀 갖다줘요 바지도 사오면 더좋고.
                    </blockquote>
                    <img class="reward-image title-image" src="image/reward.png">
                    <blockquote class="quest-reward-text">
                        휴지만 갖다주면 만원, 바지도 사오면 바지값+2만원이다 이거야~
                    </blockquote>
                    <p>씨발 진짜 나 똥마렵거든
                        <br/>근데 지금 휴지가 없어요
                        <br/>주변에 님들 저 진짜 한번만 도와주세요
                        <br/>사례는 10000원 드리구요..
                        <br/>아 미친 지금 말 하는 동시에 똥 지렸거든요
                        <br/>바지까지 사오시면 바지값 + 2만원 드릴게요
                        <br/>하 님들진짜 제발 부탁드립니다.
                        <br/>저진짜 살면서 똥지린적은 처음이거든요
                    </p>
                    <p>씨발 진짜 나 똥마렵거든
                        <br/>근데 지금 휴지가 없어요
                        <br/>주변에 님들 저 진짜 한번만 도와주세요
                        <br/>사례는 10000원 드리구요..
                        <br/>아 미친 지금 말 하는 동시에 똥 지렸거든요
                        <br/>바지까지 사오시면 바지값 + 2만원 드릴게요
                        <br/>하 님들진짜 제발 부탁드립니다.
                        <br/>저진짜 살면서 똥지린적은 처음이거든요
                    </p>
                </article>
            </div>
            <footer class="quest-card-footer">
                <div class="quest-status">현재 진행중</div>
                <div class="quest-more cyan-text">더 보기</div>
            </footer>
        </div>
    </section>
    <div class="clear"></div>
</article>
</body>

</html>
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

<?php include 'header.php'?>

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
                        <i class="fa fa-compass"></i>
                        <i class="fa fa-file-image-o"></i>
                        <i class="fa fa-facebook-official"></i>
                        <i class="fa fa-twitter-square"></i>
                        <i class="fa fa-google-plus-square"></i>
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
                    <div class="user-location"><span class="cyan-text"><?php echo $request->getGeoLocation($row['qid'])?></span> 근방</div>
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
                <div class="quest-more cyan-text"><a href="detail.php?qid=<?=$row['qid']?>">더 보기</a></div>
            </footer>
        </div>

        <?php endforeach ?>
    </section>
    <div class="clear"></div>
</article>
</body>

</html>
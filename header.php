<header id="page-header">
    <div id="page-header-wrapper">
        <a id="page-header-logo" href="index.php">
            <img id="page-header-logo-image" src="image/logo.png" border="0">
        </a>

        <div id="search-wrapper">
            <input id="search-field" type="search" placeholder="검색어를 입력해 주세요.">
            <button id="search-button" type="submit">
                <img id="search-button-image" src="image/search-button.png">
            </button>
        </div>

        <div id="page-header-menu">
            <div id="profile-dropdown">
                <img class="profile-image margin-fix" src="<?php echo $request->getUser($uid)->getImg() ?>">
                <div id="profile-dropdown-content">
                    <a href="#">내 프로필</a>
                    <a href="#">프로필 설정</a>
                    <a href="#">위치 동기화</a>
                    <a href="#">로그아웃</a>
                </div>
            </div>
            <a href="#" id="menu-alert"><i class="fa fa-bell"></i></a>
            <!--            <a href="#" id="menu-user"><img src="image/menu-user.png"></a>-->
            <a href="#" id="menu-search"><i class="fa fa-search"></i></a>
            <a href="setting.php" id="menu-setting"><i class="fa fa-cog"></i></a>
        </div>

    </div>
</header>
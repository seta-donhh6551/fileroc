<div id="header_main_menu">
    <span id="header_main_menu_bg"></span>
    <!--[if !IE]>start header<![endif]-->
    <div id="header">
        <div class="inner">
            <h1 id="logo"><a href="<?= Yii::$app->request->baseUrl; ?>"><img src="<?= Yii::$app->request->baseUrl; ?>/img/logo.png" /></a></h1>

            <!--[if !IE]>start user details<![endif]-->
            <div id="user_details">
                <ul id="user_details_menu">
                    <li class="welcome">Chào bạn <strong><?= Yii::$app->user->getIdentity()->username; ?>(<a class="new_messages" href="#">1 new message</a>)</strong></li>
                    <li>
                        <ul id="user_access">
							<?php $homeUrl = str_replace('/system', '', Yii::$app->homeUrl); ?>
                            <li class="first"><a href="<?= $homeUrl ?>" target="_blank">Trang chủ</a></li>
                            <li class="last"><a href="<?= Yii::$app->request->baseUrl."/account/default/logout"; ?>">Thoát</a></li>
                        </ul>
                    </li>
                </ul>

                <div id="server_details">
                    <dl>
                        <dt>Server time :</dt>
                        <dd><?= date('H:i'); ?> | <?= date('d/m/Y'); ?> </dd>
                    </dl>
                    <dl>
                        <dt>Last login ip :</dt>
                        <dd>192.168.0.25</dd>
                    </dl>
                </div>

            </div>

            <!--[if !IE]>end user details<![endif]-->
        </div>
    </div>
    <!--[if !IE]>end header<![endif]-->

    <!--[if !IE]>start main menu<![endif]-->
    <div id="main_menu">
        <div class="inner">
            <ul id="menu">
                <li><a href="<?= Yii::$app->request->baseUrl; ?>"><span class="l"><span></span></span><span class="m"><em>Trang chủ</em><span></span></span><span class="r"><span></span></span></a></li>
                <li><a href="<?= Yii::$app->request->baseUrl . "/posts"; ?>"><span class="l"><span></span></span><span class="m"><em>Bài viết</em><span></span></span><span class="r"><span></span></span></a>
                    <ul>
                        <li><a href="<?= Yii::$app->request->baseUrl . "/tutorials"; ?>"><span class="l"><span></span></span><span class="m"><em>Hướng dẫn</em><span></span></span><span class="r"><span></span></span></a></li>
                    </ul>
                </li>
                <li><a href="<?= Yii::$app->request->baseUrl . "/category"; ?>"><span class="l"><span></span></span><span class="m"><em>Menu</em><span></span></span><span class="r"><span></span></span></a>
					<ul>
                        <li><a href="<?= Yii::$app->request->baseUrl . "/categorytutorial"; ?>"><span class="l"><span></span></span><span class="m"><em>Menu hướng dẫn</em><span></span></span><span class="r"><span></span></span></a></li>
                    </ul>
				</li>
                <li>
                    <a href="<?= Yii::$app->request->baseUrl . "/users"; ?>"><span class="l"><span></span></span><span class="m"><em>Thành viên</em><span></span></span><span class="r"><span></span></span></a>
                </li>
				<li><a href="<?= Yii::$app->request->baseUrl . "/comment"; ?>"><span class="l"><span></span></span><span class="m"><em>Comments</em><span></span></span><span class="r"><span></span></span></a></li>
                <li><a href="#"><span class="l"><span></span></span><span class="m"><em>Nhiều hơn</em><span></span></span><span class="r"><span></span></span></a>
                    <ul>
                        <li><a href="<?= Yii::$app->request->baseUrl . "admin/config"; ?>"><span class="l"><span></span></span><span class="m"><em>Cấu hình</em><span></span></span><span class="r"><span></span></span></a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <span class="sub_bg"></span>
    </div>
    <!--[if !IE]>end main menu<![endif]-->

</div>
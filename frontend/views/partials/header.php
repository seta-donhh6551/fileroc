<div class="visible-md visible-lg">
    <nav class="bootstrap-home navbar navbar-default navbar-fixed-top" id="site-header">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header col-md-3 no-padding">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= Yii::$app->request->baseUrl; ?>"><img src="<?= Yii::$app->request->baseUrl; ?>img/new/logo.png" alt="Freefile - Download phần mềm miễn phí" /></a>
            </div>
            <div class="col-md-9 no-padding">
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-collapse-1">
                    <form class="navbar-form navbar-left search-container" action="<?= Yii::$app->request->baseUrl; ?>tim-kiem.html">
                        <div class="input-group search-container-inner">
                            <i class="fa fa-search"></i>
                            <input type="text" class="form-control search-box auto-complete-search" autocomplete="off" placeholder="Tìm kiếm" name="keyword" value="<?= Yii::$app->getRequest()->getQueryParam('keyword') ?>">
                            <button type="submit" style="position:absolute; left: -9999px;" tabindex="-1">                            
                            </button>
                        </div>
                    </form>
                    <?php $listMenu = Yii::$app->controller->listMenu; ?>
					<?php $activeMenu = Yii::$app->controller->activeMenu; ?>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown platform-dropdown">
							<?php if($activeMenu) { ?>
                            <a href="<?= Yii::$app->request->baseUrl.$activeMenu['rewrite']; ?>.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="fa <?= $activeMenu['icon_class']; ?>"></i> 
                                <span><?= $activeMenu['name']; ?></span>
                                <span class="caret"></span>
                            </a>
							<?php } ?>
							<?php if($listMenu){ ?>
                            <ul class="dropdown-menu">
                            <?php $activeMenuId = isset($activeMenu->id) ? $activeMenu->id : 0;?>
                            <?php foreach($listMenu as $menuItem){ ?>
								<?php if($menuItem['id'] != $activeMenuId){ ?>
                                <li><a href="<?= Yii::$app->request->baseUrl.$menuItem['rewrite']; ?>.html" ><i class="fa <?= $menuItem['icon_class']; ?>"></i><?= $menuItem['name']; ?></a></li>
								<?php } ?>
                            <?php } ?>
                            </ul>
							<?php } ?>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
        </div>
        <!-- /.container -->
    </nav>
    <!-- <div class="bootstrap-home" id="site-header-secondary-nav">
        <div class="container">
            <ol class="hidden-xs hidden-sm" role="navigation">
                <li class="active"><a href="../../index.html">TẢI VỀ</a></li>
                <li class=""><a href="#">PHẦN MỀM KINH DOANH</a></li>
                <li class=""><a href="#">TIN TỨC</a></li>
                <li class=""><a href="#">ĐÁNH GIÁ</a></li>
                <li class=""><a href="#">TOP ỨNG DỤNG</a></li>
            </ol>
        </div>
    </div> -->
    <!-- /.container-fluid -->
</div>
<div id="header-tablet" class="visible-sm">
    <div class="blue-menu">
        <div class="container container-fh header">
            <div class="logo-holder">
                <a href="<?= Yii::$app->request->baseUrl; ?>" title="Home">
                    <img src="<?= Yii::$app->request->baseUrl; ?>img/new/logo-small.png" alt="FreeFile.vn - Tải phần mềm miễn phí" />
                </a>
            </div>
            <div class="os-options">
                <ul class="m-options">
					<?php $i = 1;foreach($listMenu as $menuItem){ ?>
                    <li><a class="" href="<?= Yii::$app->request->baseUrl.$menuItem['rewrite']; ?>.html" style=""><?= $menuItem['name']; ?></a></li>
                    <li class="divider"></li>
					<?php if($i == 5){ break; } ?>
					<?php ++$i; } ?>
                </ul>
            </div>
            <div class="main-search-container">
                <form name="f" action="<?= Yii::$app->request->baseUrl; ?>tim-kiem.html">
                    <div class="main-search-box">
                        <input type="search" id="tablet-search" class="auto-complete-search" name="keyword" value="<?= Yii::$app->getRequest()->getQueryParam('keyword') ?>" />
                        <button type="submit" id="tablet-search-button">
                            <img alt="search" src="<?= Yii::$app->request->baseUrl; ?>img/search-button.png" />
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="header-mobile" class="visible-xs">
    <div class="blue-menu">
        <div class="container container-fh">
            <div id="mobile-menu-bar" class="menu-bar">
                <img src="<?= Yii::$app->request->baseUrl; ?>img/mob-bars.png" />
            </div>
            <div class="mob-search">
                <img src="<?= Yii::$app->request->baseUrl; ?>img/mob-search.png" />
            </div>
            <div class="main-logo-container">
                <a href="<?= Yii::$app->request->baseUrl; ?>" title="Home">
                    <div id="main-logo-mobile">
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- language drop down -->
    <div id="mobile-roll-over-search" class="roll-over-search">
        <form name="f" action="<?= Yii::$app->request->baseUrl; ?>tim-kiem.html">
            <input id="mobile-search-text-box" name="keyword" value="<?= Yii::$app->getRequest()->getQueryParam('keyword') ?>" placeholder="Tìm kiếm" type="search" class="auto-complete-search" />
        </form>
    </div>
    <div id="mobile-menu">
        <ul>
			<?php foreach($listMenu as $menuItem){ ?>
            <li><a class="" href="<?= Yii::$app->request->baseUrl.$menuItem['rewrite']; ?>.html"><?= $menuItem['name']; ?></a></li>
			<?php ++$i; } ?>
        </ul>
    </div>
</div>
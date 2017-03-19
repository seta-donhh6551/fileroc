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
                <a class="navbar-brand" href="<?= Yii::$app->request->baseUrl; ?>"><img src="<?= Yii::$app->request->baseUrl; ?>img/new/logo.png" alt="FileHippo - Software that matters" /></a>
            </div>
            <div class="col-md-9 no-padding">
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-collapse-1">
                    <form class="navbar-form navbar-left search-container" action="http://filehippo.com/search">
                        <div class="input-group search-container-inner">
                            <i class="fa fa-search"></i>
                            <input type="text" class="form-control search-box auto-complete-search" autocomplete="off" placeholder="Tìm kiếm" name="q">
                            <button type="submit" style="position:absolute; left: -9999px;" tabindex="-1">                            
                            </button>
                        </div>
                    </form>
                    <?php $listMenu = Yii::$app->controller->listMenu; ?>
                    <ul class="nav navbar-nav navbar-right">
                        <?php if($listMenu){ ?>
                        <li class="dropdown platform-dropdown">
                            <a href="<?= Yii::$app->request->baseUrl.$listMenu[0]['rewrite']; ?>.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-windows"></i> 
                                <span><?= $listMenu[0]['name'] ?></span>
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                            <?php unset($listMenu[0]); ?>
                            <?php foreach($listMenu as $menuItem){ ?>
                                <li><a href="<?= Yii::$app->request->baseUrl.$menuItem['rewrite']; ?>.html" ><i class="fa <?= $menuItem['icon_class']; ?>"></i><?= $menuItem['name']; ?></a></li>
                            <?php } ?>
                            </ul>
                        </li>
                        <li class="dropdown language-dropdown">
                            <a href="#" class="dropdown-toggle no-left-border" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">VN<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="http://filehippo.com/de/software/security/" >En</a>
                                </li>
                            </ul>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
        </div>
        <!-- /.container -->
    </nav>
    <div class="bootstrap-home" id="site-header-secondary-nav">
        <div class="container">
            <ol class="hidden-xs hidden-sm" role="navigation">
                <li class="active"><a href="../../index.html">TẢI VỀ</a></li>
                <li class=""><a href="http://filehippo.com/browse-business-software/">PHẦN MỀM KINH DOANH</a></li>
                <li class=""><a href="http://news.filehippo.com/">TIN TỨC</a></li>
                <li class=""><a href="http://news.filehippo.com/category/product-reviews/">ĐÁNH GIÁ</a></li>
                <li class=""><a href="http://filehippo.com/popular/">TOP ỨNG DỤNG</a></li>
            </ol>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<div id="header-tablet" class="visible-sm">
    <div class="blue-menu">
        <div class="container container-fh header">
            <div class="logo-holder">
                <a href="../../index.html" title="Home">
                    <img src="http://cache.filehippo.com/img/new/logo-small.png" alt="FileHippo - Software that matters" />
                </a>
            </div>
            <div class="os-options">
                <ul class="m-options">
                    <li><a class="m-windows" href="../../index.html">WINDOWS</a></li>
                    <li class="divider"></li>
                    <li><a class="m-webapps" href="http://filehippo.com/web/web-apps/">WEB APPS</a></li>
                    <li class="divider"></li>
                    <li><a class="m-mac" href="http://filehippo.com/mac/">MAC</a></li>
                    <li class="divider"></li>
                    <li><a class="m-news" href="http://news.filehippo.com/">NEWS</a></li>
                </ul>
            </div>
            <div class="main-search-container">
                <div id="tablet-language-container">
                    <div class="selected-language">
                        English <span class="disclosure-arrow-down"></span>
                    </div>
                </div>
                <form name="f" action="http://filehippo.com/search">
                    <div class="main-search-box">
                        <input name="q" type="search" id="tablet-search" class="auto-complete-search" />
                        <button type="submit" id="tablet-search-button">
                            <img alt="search" src="http://cache.filehippo.com/img/new/search-button.png" />
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- language drop down -->
    <div id="tablet-language-select-box">
        <div class="language-box">
            <a href="http://filehippo.com/en/software/security/" class="internal-link" title="English">English</a>
        </div>
        <div class="language-box">
            <a href="http://filehippo.com/de/software/security/" class="internal-link" title="Deutsch">Deutsch</a>
        </div>
    </div>
</div>
<div id="header-mobile" class="visible-xs">
    <div class="blue-menu">
        <div class="container container-fh">
            <div id="mobile-menu-bar" class="menu-bar">
                <img src="http://cache.filehippo.com/img/mobile/mob-bars.png" />
            </div>
            <div class="mob-search">
                <img src="http://cache.filehippo.com/img/mobile/mob-search.png" />
            </div>
            <div class="main-logo-container">
                <a href="../../index.html" title="Home">
                    <div id="main-logo-mobile">
                    </div>
                </a>
            </div>
            <div class="language-container">
                <div id="selected-language-mobile">
                    EN <span class="disclosure-arrow-down"></span>
                </div>
            </div>
        </div>
    </div>
    <!-- language drop down -->
    <div class="language-select-box">
        <div class="language-box">
            <a href="http://filehippo.com/en/software/security/" class="internal-link" title="English">English</a>
        </div>
        <div class="language-box">
            <a href="http://filehippo.com/de/software/security/" class="internal-link" title="Deutsch">Deutsch</a>
        </div>
    </div>
    <div id="mobile-roll-over-search" class="roll-over-search">
        <form name="f" action="http://filehippo.com/search">
            <input id="mobile-search-text-box" name="q" placeholder="Search for something..."
                   type="search" class="auto-complete-search" />
        </form>
    </div>
    <div id="mobile-menu">
        <ul>
            <li><a class="m-windows" href="../../index.html">WINDOWS</a></li>
            <li><a class="m-mac" href="http://filehippo.com/mac/">MAC</a></li>
            <li><a class="m-webapps" href="http://filehippo.com/web/web-apps/">WEB APPS</a></li>
            <li><a href="http://news.filehippo.com/">NEWS</a></li>
        </ul>
    </div>
</div>
<div class="grey-top height-fix desktop">
    <div class="left-bg"></div>
    <div class="bg">
        <div class="container main-splash">
            <div>
                <div class="splash-text">
                    <div class="splash-content">
                        <h1>Luôn Cập Nhật<br>Phiên Bản Mới Nhất</h1>
                        <ul>
                            <li>Dễ dàng tìm kiếm và download phần mềm miễn phí</li>
                            <li>Đã được kiểm tra không có phần mềm độc hại, virus</li>
                            <li>Không có quảng cáo, toolbars hoặc trình cài đặt khác</li>
                        </ul>
                    </div>

                    <div class="software-button"><a href="/browse-software/">Tìm Kiếm Phần Mềm</a></div>
                    <div class="software-button latest-button"><a href="/latest/">Mới Cập Nhật</a></div>
                </div>
                <div class="splash-image">
                    <img src="http://cache.filehippo.com/img/new/splash.gif" alt="Download the latest versions of the best software titles">
                </div>
            </div>
        </div>
    </div>
    <div class="right-bg"></div>
</div>
<div class="grey-top counter-container desktop">
    <div class="container main-splash">
        <div id="splash-counts">
            <div>
                <div class="s-count-items">
                    <div id="downloads-served">3,285,747,657</div>
                    <div class="splash-count-title">Downloads Served</div>
                </div>
            </div>
            <div class="v-spacer">&nbsp;</div>
            <div>
                <div class="s-count-items">
                    <div id="latest-updates">2 Minutes Ago</div>
                    <div class="splash-count-title">Last Update Check</div>
                </div>
            </div>
            <div class="v-spacer">&nbsp;</div>
            <div>
                <div class="s-count-items">
                    <div id="windows-programs">28,487</div>
                    <div class="splash-count-title">Program Versions Listed</div>
                </div>
            </div>
        </div>
    </div>
</div>
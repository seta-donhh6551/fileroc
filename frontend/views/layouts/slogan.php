<?php $activeMenu = Yii::$app->controller->activeMenu; ?>
<div class="grey-top lower-part mobile grey-top-mobile">
    <div class="container">
        <div id="main-splash">
            <div class="splash-content">
                <h1>Luôn cập nhật<br>phiên bản mới nhất</h1>
            </div>
            <ul>
                <li>Dễ dàng tìm kiếm và download phần mềm miễn phí</li>
                <li>Tất cả phần mềm được kiểm tra không có phần mềm độc hại, virus</li>
                <li>Không có quảng cáo, toolbars hoặc trình cài đặt khác</li>
            </ul>
            <div class="button-container">
                <div class="software-button" style="background:green"><a href="<?= Yii::$app->request->baseUrl; ?>huong-dan.html">Thủ thuật</a></div>
                <div class="software-button latest-button"><a href="<?= Yii::$app->request->baseUrl.$activeMenu['rewrite']; ?>/tai-nhieu-nhat.html">Tải nhiều</a></div>
            </div>
        </div>
    </div>
</div>
<div class="grey-top height-fix desktop">
    <!-- <div class="left-bg"></div> -->
    <div class="bg">
        <div class="container main-splash">
            <div>
                <div class="splash-text">
                    <!-- <div class="splash-content">
                        <h1>Luôn Cập Nhật<br>Phiên Bản Mới Nhất</h1>
                        <ul>
                            <li>Dễ dàng tìm kiếm và download phần mềm miễn phí</li>
                            <li>Đã được kiểm tra không có phần mềm độc hại, virus</li>
                            <li>Không có quảng cáo, toolbars hoặc trình cài đặt khác</li>
                        </ul>
                    </div> -->

                    <!-- <div class="software-button"><a href="/browse-software/">Tìm Kiếm Phần Mềm</a></div>
                    <div class="software-button latest-button"><a href="/latest/">Mới Cập Nhật</a></div> -->
                </div>
                <!-- <div class="splash-image">
                    <img src="http://cache.filehippo.com/img/new/splash.gif" alt="Download the latest versions of the best software titles">
                </div> -->
            </div>
        </div>
    </div>
    <!-- <div class="right-bg"></div> -->
</div>
<div class="grey-top counter-container desktop">
    <div class="container main-splash">
        <div id="splash-counts">
            <div>
                <div class="s-count-items">
                    <div class="software-button"><a href="<?= Yii::$app->request->baseUrl.$activeMenu['rewrite']; ?>/tai-nhieu-nhat.html">Tải về nhiều nhất</a></div>
                </div>
            </div>
            <div class="v-spacer">&nbsp;</div>
            <div>
                <div class="s-count-items">
                    <div class="software-button" style="background:green"><a href="<?= Yii::$app->request->baseUrl; ?>huong-dan.html">Thủ thuật máy tính</a></div>
                </div>
            </div>
            <div class="v-spacer">&nbsp;</div>
            <div>
                <div class="s-count-items">
                    <div class="software-button"><a href="<?= Yii::$app->request->baseUrl.$activeMenu['rewrite']; ?>/moi-cap-nhat.html">Phần Mềm Mới nhất</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
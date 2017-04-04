<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?= $this->render('//layouts/slogan');?>
<div class="container">
    <div id="root-content">
        <div class="home-main-left">
            <div class="left-hand-col">
                <div>
                    <div class="home-cat-container">
                        <div id="home-categories">
                            <h2>DANH SÁCH</h2>
                            <ul id="home-categories-list">
							<?php if(isset($listSubCategory)){ ?>
								<?php foreach($listSubCategory as $subCate){ ?>
                                <li><a title="<?= $subCate['name']; ?>" href="<?= Yii::$app->request->baseUrl.$model->rewrite.'/'.$subCate['rewrite']; ?>.html"><?= $subCate['name']; ?></a></li>
								<?php } ?>
							<?php } ?>
                            </ul>
                        </div>
                        <div class="home-categories-spacer"></div>
                    </div>
                    <div>
                        <div id="popular">
                            <h2><a href="<?= Yii::$app->request->baseUrl.$model->rewrite.'/'; ?>tai-nhieu-nhat.html">PHỔ BIẾN</a></h2>
                            <a href="<?= Yii::$app->request->baseUrl.$model->rewrite.'/'; ?>tai-nhieu-nhat.html" class="view-more-link">Xem Thêm</a>
                            <div class="clearfix-no-padding"></div>
                            <ul id="popular-list">
                                <?php if(isset($listPupolar)){ ?>
                                <?php foreach($listPupolar as $popular){ ?>
                                <li>
                                    <a href="<?= Yii::$app->request->baseUrl.'download/'.$popular['rewrite']; ?>.html" title="Download <?= $popular['title']; ?>">
                                        <img src="<?= Yii::getAlias('@web') ?>/uploads/icons/<?= $popular['icon'] ?>" alt="Download <?= $popular['title']; ?>"><?= $popular['title'].' '.$popular['version']; ?>
                                    </a>
                                </li>
                                <?php } } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="middle-column-leaderboard-ad-container">
                    <div class="middle-column-leaderboard-ad">
                        <div class="ad-unit-label" style="color: #869aab;font-size: 11px;margin-bottom: 2px;">Advertisement</div>
                        <div id="div-gpt-ad-1384762460430-3a118e30e650453192aee2604bb7a827" style="width:728px; height:90px;" data-google-query-id="CP-NjsOH39ICFcWBvQodwagJKA">
                            <img src="<?= Yii::$app->request->baseUrl; ?>img/adsense-728x90.gif" width="728" />
                        </div>
                    </div>
                </div>
                <div>
                    <div style="padding-top:10px">
                        <div id="soft-news">
                            <h2 style="margin-bottom:20px"><a href="#">Thủ thuật & Hướng Dẫn</a></h2>
                            <div class="latest-software-news">
								<?php if(isset($listTutorials)){ ?>
								<?php foreach($listTutorials as $tutorials){ ?>
                                <div class="news-data">
                                    <div class="news-title">
                                        <h3><a href="<?= Yii::$app->request->baseUrl.$tutorials['rewrite'].'-'.$tutorials['id']; ?>.html"><?= $tutorials['title']; ?></a></h3>
                                    </div>
                                    <a href="#">
                                        <div class="news-image-overlay">
                                            <img class="news-image" src="<?= Yii::$app->request->baseUrl.'uploads/thumb/'.$tutorials['thumb']; ?>" alt="<?= $tutorials['title']; ?>" />
                                        </div>
                                    </a>
                                    <div class="news-counts">
                                        <div class="news-name">
                                            <img src="<?= Yii::$app->request->baseUrl; ?>img/icon-user.png" alt="haanhdon" width="27" />
                                            <span style="text-transform:lowercase">haanhdon</span>
                                        </div>
                                        <div class="news-dates">
                                            <img src="<?= Yii::$app->request->baseUrl; ?>img/news-date.png" />1 giờ
                                        </div>
                                        <div class="news-comments">
                                            <img src="<?= Yii::$app->request->baseUrl; ?>img/news-comments.png" />
                                            <span class="disqus-comment-count" data-disqus-url="#">
                                                0 Bình luận
                                            </span>
                                        </div>
                                    </div>
                                    <div class="news-excerpt">
                                        <?= $tutorials['info']; ?>
                                    </div>
                                    <div style="clear: both; height: 0"></div>
                                </div>
								<?php } } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="home-right-col">
            <div class="right-hand-col">
                <div class="ad-unit-label" style="color: #869aab;font-size: 11px;margin-bottom: 2px;">Advertisement</div>
                <div style="width:300px; height:250px;" data-google-query-id="CICOjsOH39ICFcWBvQodwagJKA">
                    <img src="img/adsense-300x250.gif" width="300" />
                </div>
                <div class="featured-software">
                    <h2 style="color:#F30">THỦ THUẬT MÁY TÍNH</h2>
                    <a href="<?= Yii::$app->request->baseUrl; ?>huong-dan.html" title="Thủ thuật máy tính và internet">
                        <img src="<?= Yii::$app->request->baseUrl; ?>img/thu-thuat-may-tinh.jpg" alt="Thủ thuật máy tính và internet">
                        <div class="featured-title-container">
                            <div class="feature-title">THỦ THUẬT: Sử dụng máy tính</div>
                        </div>
                    </a>
                </div>
                <!-- Homepage_MPU_Bottom -->
                <div class="outbrain-container">
                    <div id="outbrain_widget_0">
                        <div class="ob-widget ob-strip-layout" data-dynamic-truncate="true">
                            <span style="position:fixed;top:-200px;">&nbsp;</span>
                            <style type="text/css">
                                /* dynamic basic css */
                                .ob-widget .ob-widget-items-container {margin:0;padding:0;}
                                .ob-widget .ob-widget-items-container .ob-clearfix {display:block;width:100%;float:none;clear:both;height:0px;line-height:0px;font-size:0px;}
                                .ob-widget .ob-widget-items-container.ob-multi-row {padding-top: 2%;}
                                .ob-widget .ob-dynamic-rec-container {position:relative;margin:0;padding;0;}
                                .ob-widget .ob-dynamic-rec-link,
                                .ob-widget .ob-dynamic-rec-link:hover {text-decoration:none;}
                                .ob-widget .ob-rec-image-container .ob-video-icon-container {position:absolute;left:0;height:50%;width:100%;text-align:center;top:25%;}
                                .ob-widget .ob-rec-image-container .ob-video-icon {display:inline-block;height:100%;float:none;opacity:0.7;transition: opacity 500ms;}
                                .ob-widget .ob-rec-image-container .ob-video-icon:hover {opacity:1;}
                                .ob-widget .ob_what{direction:ltr;clear:both;padding:5px 10px 0px;}
                                .ob-widget .ob_what a{color:#999;font-size:11px;font-family:arial;text-decoration: none;}
                                .ob-widget .ob_what.ob-hover:hover a{text-decoration: underline;}
                                .ob-widget .ob_amelia,
                                .ob-widget .ob_logo,
                                .ob-widget .ob_text_logo{vertical-align:baseline !important;display:inline-block;vertical-align:text-bottom;padding:0px 5px;box-sizing:content-box;-moz-box-sizing:content-box;-webkit-box-sizing:content-box;}
                                .ob-widget:hover .ob_amelia,
                                .ob-widget:hover .ob_logo,
                                .ob-widget:hover .ob_text_logo{background-position:center bottom;}
                                .ob-widget .ob_what{text-align:right;}
                                .ob-widget .ob-rec-image-container .ob-rec-image {display:block;}
                                /* dynamic strip css */
                                .ob-widget .ob-rec-image-container {position:relative;}
                                .ob-widget .ob-rec-image-container .ob-image-ratio {height:0px;line-height:0px;padding-top:53.666666666666664%;}
                                .ob-widget .ob-rec-image-container img.ob-rec-image {width:100%;position:absolute;top:0;bottom:0;left:0;right:0;opacity:0;transition:all 750ms;}
                                .ob-widget .ob-rec-image-container img.ob-show {opacity:1;}
                                .ob-widget .ob-rec-image-container .ob-rec-label {position:absolute;bottom:0px;left:0px;padding:0px 3px;background-color:#666;color:white;font-size:10px;line-height:15px;}
                                .ob-widget {width:auto;min-width:180px;}
                                .ob-widget .ob-dynamic-rec-container {display:inline-block;vertical-align:top;min-width:50px;width:100.0%;box-sizing:border-box;-moz-box-sizing:border-box;}
                                .ob-widget .ob-unit.ob-rec-brandName,
                                .ob-widget .ob-unit.ob-rec-brandLogo-container,
                                .ob-widget .ob-rec-brandLogoAndName {display:inline-block;}
                                .ob-widget .ob-rec-brandLogo {width:auto;height:auto;}
                                .ob-widget .ob-rec-brandName {vertical-align:bottom;}
                                .ob-widget .ob-unit.ob-rec-brandName {vertical-align:super;}
                                .ob-widget .ob-widget-items-container {direction: ltr;}
                                .ob-widget .ob-dynamic-rec-container {margin-left:0;}
                                .ob-widget .ob-dynamic-rec-container ~ .ob-dynamic-rec-container {margin:0 0 0 2.3%; }
                                .ob-widget .ob-widget-header {direction:ltr; font-weight:bold;}
                                .ob-widget .ob-unit {display:block;}
                                .ob-widget .ob-rec-text {max-height:63.0px;overflow:hidden;font-weight:bold;}
                                .ob-widget .ob-rec-source {}
                                .ob-widget .ob-rec-date {font-weight:bold;}
                                /* dynamic customized css */
                                .ob-strip-layout .ob-widget-header {font-family:inherit;font-size:21px;color:#333;padding-bottom:15px;padding-top:0px;}
                                .ob-strip-layout .ob-dynamic-rec-container {max-width:300px;}
                                .ob-strip-layout .ob-rec-text {font-family:inherit;color:#0093de;padding:5px 0 0px;text-align:left;line-height:1.5;font-size:14px;}
                                .ob-strip-layout .ob-rec-text:hover {color:#337ab7;}
                                .ob-strip-layout .ob-rec-source {font-family:inherit;color:#869aab;padding:0px 0 5px;text-align:left;font-size:12px;}
                                .ob-strip-layout .ob-rec-date {font-family:inherit;color:black;padding:0px 0 0px;text-align:left;font-size:12px;}
                                .ob-strip-layout .ob-rec-author {font-family:inherit;color:black;padding:0px 0 0px;text-align:left;font-size:12px;}
                                .ob-strip-layout .ob-rec-description {font-family:inherit;color:black;padding:0px 0 0px;text-align:left;font-size:12px;}
                                .ob-strip-layout .ob-rec-brandName {font-family:inherit;padding:5px 0 0px;line-height:1.5;font-size:13px;font-weight:400;}
                                .ob-strip-layout .ob-rec-brandLogo {width:20px;height:20px;}
                            </style>
                            <div class="ob-widget-section ob-first" style="padding-top:15px">
                                <div class="ob-widget-header">PHẦN MỀM NỔI BẬT</div>
                                <ul class="ob-widget-items-container">
                                    <li class="ob-dynamic-rec-container ob-recIdx-0 ob-p" data-pos="0">
                                        <a class="ob-dynamic-rec-link" href="#">
                                            <span class="ob-unit ob-rec-image-container" data-type="Image">
                                                <div class="ob-image-ratio"></div>
                                                <img class="ob-rec-image ob-show" src="<?= Yii::$app->request->baseUrl; ?>img/zalo-cho-mobile.jpg" onload="this.className += ' ob-show'" alt="Tải zalo cho ios và android phiên bản mới nhất" title="Tải zalo cho ios và android phiên bản mới nhất">
                                            </span>
                                            <span class="ob-unit ob-rec-text" data-type="Title" title="Tải zalo cho ios và android phiên bản mới nhất">Tải zalo cho ios và android phiên bản mới nhất</span>
											<span class="ob-unit ob-rec-source" data-type="Source">Zalo là phần mềm mạng xã hội cho phép bạn chia sẻ hình ảnh & status với bạn bè</span>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="ob-widget-items-container ob-multi-row ob-row-1">
                                    <li class="ob-dynamic-rec-container ob-recIdx-1 ob-p" data-pos="1">
                                        <a class="ob-dynamic-rec-link" href="#">
                                            <span class="ob-unit ob-rec-image-container" data-type="Image">
                                                <div class="ob-image-ratio"></div>
                                                <img class="ob-rec-image ob-show" src="<?= Yii::$app->request->baseUrl; ?>img/avast-antivirus-free.jpg" onload="this.className += ' ob-show'" alt="Avast Antivirus, Phần mềm diệt virus miễn phí tốt cho máy tính của bạn" title="Avast Antivirus, Phần mềm diệt virus miễn phí tốt cho máy tính của bạn">
                                            </span>
                                            <span class="ob-unit ob-rec-text" data-type="Title" title="Avast Antivirus, Phần mềm diệt virus miễn phí tốt cho máy tính của bạn">Avast Antivirus, Phần mềm diệt virus miễn phí tốt cho máy tính của bạn</span>
											<span class="ob-unit ob-rec-source" data-type="Source">Kaspersky Anti-virus | AVG Antivirus | Avira Free Antivirus</span>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="ob-widget-items-container ob-multi-row ob-row-2">
                                    <li class="ob-dynamic-rec-container ob-recIdx-2 ob-p" data-pos="2">
                                        <a class="ob-dynamic-rec-link" href="#">
                                            <span class="ob-unit ob-rec-image-container" data-type="Image">
                                                <div class="ob-image-ratio"></div>
                                                <img class="ob-rec-image ob-show" src="<?= Yii::$app->request->baseUrl; ?>img/google-chrome.jpg" onload="this.className += ' ob-show'" alt="Tải google chrome, trình duyệt web miễn phí nhanh nhất từ google" title="Tải google chrome, trình duyệt web miễn phí nhanh nhất từ google">
                                            </span>
                                            <span class="ob-unit ob-rec-text" data-type="Title" title="Tải google chrome, trình duyệt web miễn phí nhanh nhất từ google">Tải google chrome, trình duyệt web miễn phí nhanh nhất từ google</span>
											<span class="ob-unit ob-rec-source" data-type="Source">Download google chrome | Trình duyệt web miễn phí</span>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="ob-widget-items-container ob-multi-row ob-row-3">
                                    <li class="ob-dynamic-rec-container ob-recIdx-3 ob-p" data-pos="2">
                                        <a class="ob-dynamic-rec-link" href="#">
                                            <span class="ob-unit ob-rec-image-container" data-type="Image">
                                                <div class="ob-image-ratio"></div>
                                                <img class="ob-rec-image ob-show" src="<?= Yii::$app->request->baseUrl; ?>img/tao-usb-boot-cai-win.jpg" onload="this.className += ' ob-show'" alt="Cách tạo usb boot cài window 7,8 và 10" title="Cách tạo usb boot cài window 7,8 và 10">
                                            </span>
                                            <span class="ob-unit ob-rec-text" data-type="Title" title="Cách tạo usb boot cài window 7,8 và 10">Cách tạo usb boot cài window 7,8 và 10</span>
											<span class="ob-unit ob-rec-source" data-type="Source">Usb boot | Usb hirent boot</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="ob_what ob-hover">
                                <a href="#" rel="nofollow">
                                    Recommended by<span class="ob_logo" title="Outbrain - content marketing"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript" async="async" src="http://widgets.outbrain.com/outbrain.js"></script>
                </div>
				<!--largeLayoutBottomMPUAdUnit -->
                <div class="ad-unit-label" style="color: #869aab;font-size: 11px;margin-bottom: 2px;">Advertisement</div>
                <div id="div-gpt-ad-1384762460430-4b46dd7c3eef406a91452fb1489cc077" style="" data-google-query-id="CIGOjsOH39ICFcWBvQodwagJKA">
                    <img src="img/adsense-300x250.gif" width="300" />
                </div>
            </div>
        </div>
    </div>
</div>
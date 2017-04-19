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
                            <img src="<?= Yii::$app->request->baseUrl; ?>img/adsense-728x90.gif" width="728" alt="Quảng cáo" />
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
                                            <img src="<?= Yii::$app->request->baseUrl; ?>img/news-date.png" alt="Thời gian" />1 giờ
                                        </div>
                                        <div class="news-comments">
                                            <img src="<?= Yii::$app->request->baseUrl; ?>img/news-comments.png" alt="Bình luận" />
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
                    <img src="img/adsense-300x250.gif" width="300" alt="Quảng cáo" />
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
                            <div class="ob-widget-section ob-first" style="padding-top:15px">
                                <div class="ob-widget-header">PHẦN MỀM NỔI BẬT</div>
                                <ul class="ob-widget-items-container">
                                    <li class="ob-dynamic-rec-container ob-recIdx-0 ob-p" data-pos="0">
                                        <a class="ob-dynamic-rec-link" href="#">
                                            <div class="ob-unit ob-rec-image-container" data-type="Image">
                                                <div class="ob-image-ratio"></div>
                                                <img class="ob-rec-image ob-show" src="<?= Yii::$app->request->baseUrl; ?>img/zalo-cho-mobile.jpg" onload="this.className += ' ob-show'" alt="Tải zalo cho ios và android phiên bản mới nhất" title="Tải zalo cho ios và android phiên bản mới nhất">
                                            </div>
                                            <span class="ob-unit ob-rec-text" data-type="Title" title="Tải zalo cho ios và android phiên bản mới nhất">Tải zalo cho ios và android phiên bản mới nhất</span>
											<span class="ob-unit ob-rec-source" data-type="Source">Zalo là phần mềm mạng xã hội cho phép bạn chia sẻ hình ảnh & status với bạn bè</span>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="ob-widget-items-container ob-multi-row ob-row-1">
                                    <li class="ob-dynamic-rec-container ob-recIdx-1 ob-p" data-pos="1">
                                        <a class="ob-dynamic-rec-link" href="#">
                                            <div class="ob-unit ob-rec-image-container" data-type="Image">
                                                <div class="ob-image-ratio"></div>
                                                <img class="ob-rec-image ob-show" src="<?= Yii::$app->request->baseUrl; ?>img/avast-antivirus-free.jpg" onload="this.className += ' ob-show'" alt="Avast Antivirus, Phần mềm diệt virus miễn phí tốt cho máy tính của bạn" title="Avast Antivirus, Phần mềm diệt virus miễn phí tốt cho máy tính của bạn">
                                            </div>
                                            <span class="ob-unit ob-rec-text" data-type="Title" title="Avast Antivirus, Phần mềm diệt virus miễn phí tốt cho máy tính của bạn">Avast Antivirus, Phần mềm diệt virus miễn phí tốt cho máy tính của bạn</span>
											<span class="ob-unit ob-rec-source" data-type="Source">Kaspersky Anti-virus | AVG Antivirus | Avira Free Antivirus</span>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="ob-widget-items-container ob-multi-row ob-row-2">
                                    <li class="ob-dynamic-rec-container ob-recIdx-2 ob-p" data-pos="2">
                                        <a class="ob-dynamic-rec-link" href="#">
                                            <div class="ob-unit ob-rec-image-container" data-type="Image">
                                                <div class="ob-image-ratio"></div>
                                                <img class="ob-rec-image ob-show" src="<?= Yii::$app->request->baseUrl; ?>img/google-chrome.jpg" onload="this.className += ' ob-show'" alt="Tải google chrome, trình duyệt web miễn phí nhanh nhất từ google" title="Tải google chrome, trình duyệt web miễn phí nhanh nhất từ google">
                                            </div>
                                            <span class="ob-unit ob-rec-text" data-type="Title" title="Tải google chrome, trình duyệt web miễn phí nhanh nhất từ google">Tải google chrome, trình duyệt web miễn phí nhanh nhất từ google</span>
											<span class="ob-unit ob-rec-source" data-type="Source">Download google chrome | Trình duyệt web miễn phí</span>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="ob-widget-items-container ob-multi-row ob-row-3">
                                    <li class="ob-dynamic-rec-container ob-recIdx-3 ob-p" data-pos="2">
                                        <a class="ob-dynamic-rec-link" href="#">
                                            <div class="ob-unit ob-rec-image-container" data-type="Image">
                                                <div class="ob-image-ratio"></div>
                                                <img class="ob-rec-image ob-show" src="<?= Yii::$app->request->baseUrl; ?>img/tao-usb-boot-cai-win.jpg" onload="this.className += ' ob-show'" alt="Cách tạo usb boot cài window 7,8 và 10" title="Cách tạo usb boot cài window 7,8 và 10">
                                            </div>
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
                </div>
				<!--largeLayoutBottomMPUAdUnit -->
                <div class="ad-unit-label" style="color: #869aab;font-size: 11px;margin-bottom: 2px;">Advertisement</div>
                <div id="div-gpt-ad-1384762460430-4b46dd7c3eef406a91452fb1489cc077" style="" data-google-query-id="CIGOjsOH39ICFcWBvQodwagJKA">
                    <img src="img/adsense-300x250.gif" width="300" alt="Quảng cáo" />
                </div>
            </div>
        </div>
    </div>
</div>
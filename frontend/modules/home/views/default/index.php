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
                        <div class="download-manager">
                            <a href="http://www.filehippo.com/download_app_manager/">
                                <img src="http://cache.filehippo.com/img/new/download-icon.png" alt="Download FileHippo App Manager">
                                <div class="download-manager-text">Download FileHippo App Manager</div>
                            </a>
                        </div>
                    </div>
                    <div>
                        <div id="popular">
                            <h2><a href="/popular/">PHỔ BIẾN</a></h2>
                            <a href="/popular/" class="view-more-link">Xem Thêm</a>
                            <div class="clearfix-no-padding"></div>
                            <ul id="popular-list">
                                <li><a href="#">
                                        <img src="http://cache.filehippo.com/img/ex/6067t__ccleaner_icon.png" alt="Download CCleaner 5.28.6005">CCleaner 5.28.6005
                                    </a>
                                </li>
                                <li><a href="#">
                                        <img src="http://cache.filehippo.com/img/ex/6936t__AIPS_icon.png" alt="Download Advanced IP Scanner 2.4.3021">Advanced IP Scanner 2.4.3021
                                    </a>
                                </li>
                                <li><a href="#">
                                        <img src="http://cache.filehippo.com/img/ex/6052t__recuva-icon.png" alt="Download Recuva 1.53.1087">Recuva 1.53.1087
                                    </a>
                                </li>
                                <li><a href="#">
                                        <img src="http://cache.filehippo.com/img/ex/6050t__vlc-icon.png" alt="Download VLC Media Player 2.2.4 (64-bit)">VLC Media Player 2.2.4 (64-bit)
                                    </a>
                                </li>
                                <li><a href="#">
                                        <img src="http://cache.filehippo.com/img/ex/6049t__vlc-icon.png" alt="Download VLC Media Player 2.2.4 (32-bit)">VLC Media Player 2.2.4 (32-bit)
                                    </a>
                                </li>
                                <li><a href="#">
                                        <img src="http://cache.filehippo.com/img/ex/8745t__microsoft_office_2013_icon_8_12_16_converted.png" alt="Download Microsoft Office 2013">Microsoft Office 2013
                                    </a>
                                </li>
                                <li><a href="#">
                                        <img src="http://cache.filehippo.com/img/ex/7180t__picasa_new_icon_converted.png" alt="Download Picasa 3.9 Build 141.259">Picasa 3.9 Build 141.259
                                    </a>
                                </li>
                                <li><a href="#">
                                        <img src="http://cache.filehippo.com/img/ex/2171t__ChromeNew_icon.png" alt="Download Google Chrome for Work 32-bit 43.02357.124">Google Chrome for Work 32-bit 43.02357.124
                                    </a>
                                </li>
                                <li><a href="#">
                                        <img src="http://cache.filehippo.com/img/ex/8744t__adobe_shockwave_player_icon_8_12_16_converted.png" alt="Download Shockwave Player 12.2.8.198">Shockwave Player 12.2.8.198
                                    </a>
                                </li>
                                <li><a href="#">
                                        <img src="http://cache.filehippo.com/img/ex/8747t__Net_Framework_Version_4.png" alt="Download .NET Framework Version 4.6.2">.NET Framework Version 4.6.2
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div id="latest" style="display:none">
                            <h2><a href="/latest/">Latest updates</a></h2>
                            <a href="/latest/" class="view-more-link">View more</a>
                            <div class="clearfix-no-padding"></div>
                            <ul id="latest-list">
                                <li><a href="#">
                                        <img src="http://cache.filehippo.com/img/ex/6468t__chrome-icon-110x110.png" alt="Download Google Chrome 58.0.3029.19 Beta">Google Chrome 58.0.3029.19 Beta
                                    </a>
                                </li>
                                <li><a href="#">
                                        <img src="http://cache.filehippo.com/img/ex/4774t__driver_genius_icon.png" alt="Download Driver Genius 17.0.0.138">Driver Genius 17.0.0.138
                                    </a>
                                </li>
                                <li><a href="#">
                                        <img src="http://cache.filehippo.com/img/ex/8979t__debut_video_capture_icon_6_2_17.png" alt="Download Debut Video Capture 4.00">Debut Video Capture 4.00
                                    </a>
                                </li>
                                <li><a href="#">
                                        <img src="http://cache.filehippo.com/img/ex/5851t__eusing_maze_lock_icon.png" alt="Download Eusing Maze Lock 3.6">Eusing Maze Lock 3.6
                                    </a>
                                </li>
                                <li><a href="#">
                                        <img src="http://cache.filehippo.com/img/ex/6468t__chrome-icon-110x110.png" alt="Download Google Chrome 57.0.2987.110">Google Chrome 57.0.2987.110
                                    </a>
                                </li>
                                <li><a href="#">
                                        <img src="http://cache.filehippo.com/img/ex/6055t__firefox_icon.png" alt="Download Firefox 53.0 Beta 3">Firefox 53.0 Beta 3
                                    </a>
                                </li>
                                <li><a href="#">
                                        <img src="http://cache.filehippo.com/img/ex/6734t__comodo_cloud_antivirus_icon_converted.png" alt="Download Comodo Cloud Antivirus 1.9.412027.469">Comodo Cloud Antivirus 1.9.412027.469
                                    </a>
                                </li>
                                <li><a href="#">
                                        <img src="http://cache.filehippo.com/img/ex/4956t__potplayer_icon.png" alt="Download Potplayer 1.7.1150 64-Bit">Potplayer 1.7.1150 64-Bit
                                    </a>
                                </li>
                                <li><a href="#">
                                        <img src="http://cache.filehippo.com/img/ex/4954t__potplayer_icon.png" alt="Download Potplayer 1.7.1150 32-Bit">Potplayer 1.7.1150 32-Bit
                                    </a>
                                </li>
                                <li><a href="#">
                                        <img src="http://cache.filehippo.com/img/ex/2176t__LibreOffice3_icon.png" alt="Download LibreOffice 5.3.1 64-bit">LibreOffice 5.3.1 64-bit
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="middle-column-leaderboard-ad-container">
                    <div class="middle-column-leaderboard-ad">
                        <!-- Homepage_leaderboard_Top -->
                        <!--middleLeaderboardAdUnit -->
                        <div class="ad-unit-label" style="color: #869aab;font-size: 11px;margin-bottom: 2px;">Advertisement</div>
                        <div id="div-gpt-ad-1384762460430-3a118e30e650453192aee2604bb7a827" style="width:728px; height:90px;" data-google-query-id="CP-NjsOH39ICFcWBvQodwagJKA">
                            <img src="img/adsense-728x90.gif" width="728" />
                        </div>
                    </div>
                </div>
                <div>
                    <div style="padding-top:10px">
                        <div id="soft-news">
                            <h2><a href="#">Thủ thuật & Hướng Dẫn</a></h2>
                            <div class="latest-software-news">
								<?php if(isset($listTutorials)){ ?>
								<?php foreach($listTutorials as $tutorials){ ?>
                                <div class="news-data">
                                    <div class="news-title">
                                        <h3><a href="<?= Yii::$app->request->baseUrl.$tutorials['rewrite']; ?>.html"><?= $tutorials['title']; ?></a></h3>
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
                <!-- Homepage_MPU_Top -->
                <!--largeLayoutTopMPUAdUnit -->
                <div class="ad-unit-label" style="color: #869aab;font-size: 11px;margin-bottom: 2px;">Advertisement</div>
                <div style="width:300px; height:250px;" data-google-query-id="CICOjsOH39ICFcWBvQodwagJKA">
                    <img src="img/adsense-300x250.gif" width="300" />
                </div>
                <div class="featured-software">
                    <h2>Featured Software</h2>
                    <a href="http://news.filehippo.com/2017/03/secure-your-pc-mac-or-mobile-device-with-norton-wifi-privacy/" title="FEATURED SOFTWARE: Norton WiFi Privacy">
                        <img src="http://news.filehippo.com/wp-content/uploads/2017/03/Norton_wifi_privacy-300x139.png" alt="FEATURED SOFTWARE: Norton WiFi Privacy">
                        <div class="featured-title-container">
                            <div class="feature-title">FEATURED SOFTWARE: Norton WiFi Privacy</div>
                        </div>
                    </a>
                </div>
                <!-- Homepage_MPU_Bottom -->
                <!--largeLayoutBottomMPUAdUnit -->
                <div class="ad-unit-label" style="color: #869aab;font-size: 11px;margin-bottom: 2px;">Advertisement</div>
                <div id="div-gpt-ad-1384762460430-4b46dd7c3eef406a91452fb1489cc077" style="" data-google-query-id="CIGOjsOH39ICFcWBvQodwagJKA">
                    <img src="img/adsense-300x250.gif" width="300" />
                </div>
                <div class="outbrain-container">
                    <div id="ob_holder" style="display: none;">
                        <iframe id="ob_iframe" src="http://widgets.outbrain.com/nanoWidget/externals/obFrame/obFrame.htm#pid=6584&amp;dmpenabled=true&amp;csenabled=true&amp;d=whtfz2H6OanCI2CBdQ-zIfSKP_9KGlE0N6k9d239o8Hi3LIp-PfikvNN9jczMInW" style="display: none; width: 1px; height: 1px;"></iframe><script type="text/javascript" src="http://log.outbrain.com/loggerServices/widgetGlobalEvent?eT=0&amp;tm=1143&amp;pid=6584&amp;sid=10873&amp;wId=110&amp;wRV=01001603&amp;rId=8112db6a041c3d4e0f32bd28e1a11031&amp;idx=0&amp;pvId=8112db6a041c3d4e0f32bd28e1a11031&amp;org=0&amp;pad=3&amp;pVis=1&amp;eIdx=&amp;ab=0&amp;wl=0" charset="UTF-8" async=""></script><script type="text/javascript" src="http://log.outbrain.com/loggerServices/widgetGlobalEvent?eT=3&amp;tm=4348535&amp;pid=6584&amp;sid=10873&amp;wId=110&amp;wRV=01001603&amp;rId=8112db6a041c3d4e0f32bd28e1a11031&amp;idx=0&amp;pvId=8112db6a041c3d4e0f32bd28e1a11031&amp;org=0&amp;pad=3&amp;pVis=1&amp;eIdx=0&amp;ab=0&amp;wl=0" charset="UTF-8" async=""></script>
                    </div>
                    <div class="OUTBRAIN" data-src="http://filehippo.com" data-widget-id="AR_3" data-ob-template="FileHippo" data-ob-mark="true" data-browser="chrome" data-os="win32" data-dynload="" data-idx="0" id="outbrain_widget_0">
                        <div class="ob-widget ob-strip-layout AR_3" data-dynamic-truncate="true">
                            <span style="position:fixed;top:-200px;">&nbsp;</span>
                            <style type="text/css">
                                /* dynamic basic css */
                                .AR_3.ob-widget .ob-widget-items-container {margin:0;padding:0;}
                                .AR_3.ob-widget .ob-widget-items-container .ob-clearfix {display:block;width:100%;float:none;clear:both;height:0px;line-height:0px;font-size:0px;}
                                .AR_3.ob-widget .ob-widget-items-container.ob-multi-row {padding-top: 2%;}
                                .AR_3.ob-widget .ob-dynamic-rec-container {position:relative;margin:0;padding;0;}
                                .AR_3.ob-widget .ob-dynamic-rec-link,
                                .AR_3.ob-widget .ob-dynamic-rec-link:hover {text-decoration:none;}
                                .AR_3.ob-widget .ob-rec-image-container .ob-video-icon-container {position:absolute;left:0;height:50%;width:100%;text-align:center;top:25%;}
                                .AR_3.ob-widget .ob-rec-image-container .ob-video-icon {display:inline-block;height:100%;float:none;opacity:0.7;transition: opacity 500ms;}
                                .AR_3.ob-widget .ob-rec-image-container .ob-video-icon:hover {opacity:1;}
                                .AR_3.ob-widget .ob_what{direction:ltr;clear:both;padding:5px 10px 0px;}
                                .AR_3.ob-widget .ob_what a{color:#999;font-size:11px;font-family:arial;text-decoration: none;}
                                .AR_3.ob-widget .ob_what.ob-hover:hover a{text-decoration: underline;}
                                .AR_3.ob-widget .ob_amelia,
                                .AR_3.ob-widget .ob_logo,
                                .AR_3.ob-widget .ob_text_logo{vertical-align:baseline !important;display:inline-block;vertical-align:text-bottom;padding:0px 5px;box-sizing:content-box;-moz-box-sizing:content-box;-webkit-box-sizing:content-box;}
                                .AR_3.ob-widget .ob_amelia{background:url('http://widgets.outbrain.com/images/widgetIcons/ob_logo_16x16.png') no-repeat center top;width:16px;height:16px;margin-bottom:-2px;}
                                .AR_3.ob-widget .ob_logo{background:url('http://widgets.outbrain.com/images/widgetIcons/ob_logo_67x12.png') no-repeat center top;width:67px;height:12px;}
                                .AR_3.ob-widget .ob_text_logo{background:url('http://widgets.outbrain.com/images/widgetIcons/ob_text_logo_67x22.png') no-repeat center top;width:67px;height:22px;}
                                @media only screen and (-webkit-min-device-pixel-ratio: 2),(min-resolution: 192dpi) {
                                    .AR_3.ob-widget .ob_amelia{background:url('http://widgets.outbrain.com/images/widgetIcons/ob_logo_16x16@2x.png') no-repeat center top;width:16px;height:16px;margin-bottom:-2px; background-size:16px 32px;}
                                    .AR_3.ob-widget .ob_logo{background:url('http://widgets.outbrain.com/images/widgetIcons/ob_logo_67x12@2x.png') no-repeat center top;width:67px;height:12px; background-size:67px 24px;}
                                    .AR_3.ob-widget .ob_text_logo{background:url('http://widgets.outbrain.com/images/widgetIcons/ob_text_logo_67x22@2x.png') no-repeat center top;width:67px;height:20px; background-size:67px 40px;}
                                }
                                .AR_3.ob-widget:hover .ob_amelia,
                                .AR_3.ob-widget:hover .ob_logo,
                                .AR_3.ob-widget:hover .ob_text_logo{background-position:center bottom;}
                                .AR_3.ob-widget .ob_what{text-align:right;}
                                .AR_3.ob-widget .ob-rec-image-container .ob-rec-image {display:block;}
                                /* dynamic strip css */
                                .AR_3.ob-widget .ob-rec-image-container {position:relative;}
                                .AR_3.ob-widget .ob-rec-image-container .ob-image-ratio {height:0px;line-height:0px;padding-top:53.666666666666664%;}
                                .AR_3.ob-widget .ob-rec-image-container img.ob-rec-image {width:100%;position:absolute;top:0;bottom:0;left:0;right:0;opacity:0;transition:all 750ms;}
                                .AR_3.ob-widget .ob-rec-image-container img.ob-show {opacity:1;}
                                .AR_3.ob-widget .ob-rec-image-container .ob-rec-label {position:absolute;bottom:0px;left:0px;padding:0px 3px;background-color:#666;color:white;font-size:10px;line-height:15px;}
                                .AR_3.ob-widget {width:auto;min-width:180px;}
                                .AR_3.ob-widget .ob-dynamic-rec-container {display:inline-block;vertical-align:top;min-width:50px;width:100.0%;box-sizing:border-box;-moz-box-sizing:border-box;}
                                .AR_3.ob-widget .ob-unit.ob-rec-brandName,
                                .AR_3.ob-widget .ob-unit.ob-rec-brandLogo-container,
                                .AR_3.ob-widget .ob-rec-brandLogoAndName {display:inline-block;}
                                .AR_3.ob-widget .ob-rec-brandLogo {width:auto;height:auto;}
                                .AR_3.ob-widget .ob-rec-brandName {vertical-align:bottom;}
                                .AR_3.ob-widget .ob-unit.ob-rec-brandName {vertical-align:super;}
                                .AR_3.ob-widget .ob-widget-items-container {direction: ltr;}
                                .AR_3.ob-widget .ob-dynamic-rec-container {margin-left:0;}
                                .AR_3.ob-widget .ob-dynamic-rec-container ~ .ob-dynamic-rec-container {margin:0 0 0 2.3%; }
                                .AR_3.ob-widget .ob-widget-header {direction:ltr; font-weight:bold;}
                                .AR_3.ob-widget .ob-unit {display:block;}
                                .AR_3.ob-widget .ob-rec-text {max-height:63.0px;overflow:hidden;font-weight:bold;}
                                .AR_3.ob-widget .ob-rec-source {}
                                .AR_3.ob-widget .ob-rec-date {font-weight:bold;}
                                /* dynamic customized css */
                                .AR_3.ob-strip-layout .ob-widget-header {font-family:inherit;font-size:21px;color:#333;padding-bottom:15px;padding-top:0px;}
                                .AR_3.ob-strip-layout .ob-dynamic-rec-container {max-width:300px;}
                                .AR_3.ob-strip-layout .ob-rec-text {font-family:inherit;color:#0093de;padding:5px 0 0px;text-align:left;line-height:1.5;font-size:14px;}
                                .AR_3.ob-strip-layout .ob-rec-text:hover {color:#337ab7;}
                                .AR_3.ob-strip-layout .ob-rec-source {font-family:inherit;color:#869aab;padding:0px 0 5px;text-align:left;font-size:12px;}
                                .AR_3.ob-strip-layout .ob-rec-date {font-family:inherit;color:black;padding:0px 0 0px;text-align:left;font-size:12px;}
                                .AR_3.ob-strip-layout .ob-rec-author {font-family:inherit;color:black;padding:0px 0 0px;text-align:left;font-size:12px;}
                                .AR_3.ob-strip-layout .ob-rec-description {font-family:inherit;color:black;padding:0px 0 0px;text-align:left;font-size:12px;}
                                .AR_3.ob-strip-layout .ob-rec-brandName {font-family:inherit;padding:5px 0 0px;line-height:1.5;font-size:13px;font-weight:400;}
                                .AR_3.ob-strip-layout .ob-rec-brandLogo {width:20px;height:20px;}
                            </style>
                            <style type="text/css" class="ob-custom-css">
                            </style>
                            <div class="ob-widget-section ob-first">
                                <div class="ob-widget-header">PROMOTED STORIES</div>
                                <ul class="ob-widget-items-container">
                                    <li class="ob-dynamic-rec-container ob-recIdx-0 ob-p" data-pos="0">
                                        <a class="ob-dynamic-rec-link" onclick="" href="https://cpi.mooseroots.com/stories/15691/cost-of-beer-then-and-now?utm_medium=cm&amp;utm_source=outbrain&amp;utm_campaign=i3.cm.ob.dt.11000" onmousedown="this.href = 'http://paid.outbrain.com/network/redir?p=bQzuTAmLyjfz9zY8UVBWTCLooHXvwPBDeTkrdPZx2VFIZPyt2WRRn7ng5TxFNQFUBrDnx-T8pu9FJoWabd6k0dQZPUldelvneRLAmqwLSEZODFKfse6EGSpWsgH4Bkss91rWBL9d7XgqTaOG2Pg8A2u6CDCtwJVL7_Z2GMQ_HOMlp7DpZBVYHiunsShbiiRLJshiX9VzvsBRb6BYIKWZq8EcKH54excKaTz4Y_-xbFGNl4mYUBAonOGcoEErzu9Rjt9XLRHnzY63zVmSpnF2tzJoEcOZkbMph4eWDu2TlBmPdmjxuWpv0qened4TKfG8GX6TkPDQVII26_Y-mfETYGLXGArPD19bejEUiS1O5AzIDzzjC2wCljttZyoew_63mrizQ33fnX-n3GvUtbEXV1JMFWg30mSSp5HvTXW5XFtxS21UJnqLQzpuMG3P-8d3UOa4lyrWJxJ3GydW7wIEVviDcaNaqB8g4jcPFcmhdYjWs2VA0pk7bOx2H_qp3kmPIOFCqNCor1J23xclnJ5YReqN0ouWl1ChY0KIO5uMxyDeeDKpj_ALHOoXxNso_-22ZUeCrfpKImlQbTQBlqJeMkhuVbxHeWaswD408EVZnT1zAXaYYDopy9mEQkR6sdQtEcDXRIvEEirVb6FjjpENUwRK7yMu-7LYYPqoA2_mz2_KjvIIiPMKt27GLgL9I7x5W2nkkJL0HJuxbojB9urHNKRaFq4GCvok9UlfLY7-J32hhqwZAXrgzuW1v7Pe3ToKnwtl3dJ2PYSCT8INXNahakD3i85GBIAWpMux7Ag2f1FlnGCAxs-A8yMbHwMCecoS&amp;c=7714b2ea&amp;v=3';
                                           " target="_blank" rel="nofollow">
                                            <span class="ob-unit ob-rec-image-container" data-type="Image">
                                                <div class="ob-image-ratio"></div>
                                                <img class="ob-rec-image ob-show" src="http://images.outbrain.com/Imaginarium/api/uuid/61850290851ef8b318804b162e801f17cea6c95e5ca8ca9bc585577eb7b08e15/300/161/1.0" onload="this.className += ' ob-show'" alt="The Cost of a Beer Every Year Since 1952" title="The Cost of a Beer Every Year Since 1952" onerror="OBR.extern.imageError(this)">
                                            </span>
                                            <span class="ob-unit ob-rec-text" data-type="Title" title="The Cost of a Beer Every Year Since 1952">The Cost of a Beer Every Year Since 1952</span>      <span class="ob-unit ob-rec-source" data-type="Source">Consumer Price Index (CPI) - Inflation Calculator and Rates</span>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="ob-widget-items-container ob-multi-row ob-row-1">
                                    <li class="ob-dynamic-rec-container ob-recIdx-1 ob-p" data-pos="1">
                                        <a class="ob-dynamic-rec-link" onclick="" href="http://us-presidents.insidegov.com/stories/5392/least-intelligent-presidents?utm_medium=cm&amp;utm_source=outbrain&amp;utm_campaign=i3.cm.ob.dt.5392" onmousedown="this.href = 'http://paid.outbrain.com/network/redir?p=W4QpUwbBl4dnpfjTqkhF0gKSs8LeJR-FrqPoSYjaqgzfjUpETSpOunRwfccewslvQ6CyVMrg1y9GDFn8KCywWdmXsMIxyKBkIFhoYqCYkhzmoJdhBqD7ToXMopXth4Kqfy-R93wnccueZVNiBh82oNHiD64yLyC3933baxtJ0TapV8LXdIJbJxa9-P4JiwibiCf6KoNqxLpRurjLk6P2yEGcOd6CDu6FKM-4HFZt-u0oBddiONBoJalG3bZVeO1lYRjMtGrQbPpCL4bTS7KVcXPe5XmO8xJU5_5MOVxVpCAuP34Tq1LLqPKLR5lqXJxKnbnrzphpATnxn50F9IROZwrcSOA1Y8Uq8X36jAD4rv8vk2NmpHmbOcit--yuTpOOMo1sgEQSfYxS61z-jdcMOF8eYBvGKePBeslErTgeIixHPewV6LhHa6eFEHLYmHCvmdyG5Fl6qiL7L83LNQO63eVvKmPvlnw5oyr0VqDIpx8vq6eux7B3JlEnQRGZILQD58jsgya3ef0b_d3Ul9JlWe1SwrNFgjYQreWpHvxpeDCTN2DllNeRJuConJWmNS8Nz-9jKu7RFkG9yXIxy1N3n2frJCWuG3wVqALgtxur_fVLwSh9A1T8BzdJq1C-Od8m6zF4d582-NF9wZnl6KZ2FyCICCdoGVSqkQ6wO3a9gN70Bqi2WVoY1-25eCEO8zfUevtjzSrwYNWi24G57Ayh5q-Rk1lLY4sQ_wE9OjQuGn0HycnKRTv_wL255TxNq2wPPXJ_HVAZ7xSEvi0mm_LrCQFN7CtQx25A5w0gFZb0Qd52e-8TwPQ6pAL6RQ9Hq0QP&amp;c=90f245c2&amp;v=3';
                                           " target="_blank" rel="nofollow">
                                            <span class="ob-unit ob-rec-image-container" data-type="Image">
                                                <div class="ob-image-ratio"></div>
                                                <img class="ob-rec-image ob-show" src="http://images.outbrain.com/Imaginarium/api/uuid/b3893c163ca67531c3f270f8ba4d709671843748e0c896642892c96470563449/300/161/1.0" onload="this.className += ' ob-show'" alt="Here Are the 25 Presidents with the Lowest IQ Scores" title="Here Are the 25 Presidents with the Lowest IQ Scores" onerror="OBR.extern.imageError(this)">
                                            </span>
                                            <span class="ob-unit ob-rec-text" data-type="Title" title="Here Are the 25 Presidents with the Lowest IQ Scores">Here Are the 25 Presidents with the Lowest IQ Scores</span>      <span class="ob-unit ob-rec-source" data-type="Source">InsideGov | By Graphiq</span>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="ob-widget-items-container ob-multi-row ob-row-2">
                                    <li class="ob-dynamic-rec-container ob-recIdx-2 ob-p" data-pos="2">
                                        <a class="ob-dynamic-rec-link" onclick="" href="http://basketball-players.pointafter.com/stories/5891/biggest-dead-weight-nba-lance-stephenson-rajon-rondo?utm_medium=cm&amp;utm_source=outbrain&amp;utm_campaign=i3.cm.ob.dt.5891" onmousedown="this.href = 'http://paid.outbrain.com/network/redir?p=gSeShGlBgIENx6tIK-l1nOtzVe3elQpXj9jpvv72aoII86agHrMuMgCVzepHu1qbBkUzr8Hw2WySqgEINwK68NcUb4lki2_n1IVq6RuvmXdaJay2JkgfsnyESyl5IiAOfL6U26Z1NOWfdNq4b07geTqBicHggmbMwjlSK5znMB6ZrrFXIeCbRgFKiSQvsoR5XDfMYHj-YxhnYr8jJ2CBv2ZEgs1oJggLLYJIONWRfLplXxfXiSs4H9Ryf7fj_aT09mlR2bUxzB2hSAsXcf_qeBxkVBUODgo67-8YvAGNRXFlGetQwgapUnLz_-1RD_hiLvjAsPlu6Qxmy6d5S23iSbGn6rvHLrKLUvtsTKTGZheMtB15gKUixdI4yxLa4B-EzEBJ628iju8Ghyahq2OKg0KY_LOFSnUQbzQnpl25lzCEgmfclh1eb7ivCxjyy0kM0Y4U34LT8dxo6XJyZ8PxSt08CMbdN72DldXG_o0jcqmnz7feMw-oaQzb6-mAfPwQck-dSs5RrGdHHYYaq8hdEF3o1ejq9fFjyYGC16_0v49C8oInRQFAR358cSsIOo8hDKdG_Xc4vNQdQhdSNouchWUWrSovgsY85177UR5eOs1jrQ2sg6vva_GxrRs1w6UbEfh9c_GnlcM2BQUQKPf-rrRwfeP-HN2s0YY4ldElm3PboR56e7t8eeQJP2L_RbILoOHXPy9v1zZD6lZPf5P4a2sS1l45sXZS4nYSbxfK_TvE-Y5EZDdZkX8C7uoZ77ZfSZkdmp8mhj4_8eTkSoYGra04jCwM1I2KNJLYK8AvAFr44LQzH35WIt4SBoXbEeXM&amp;c=ad1ca247&amp;v=3';
                                           " target="_blank" rel="nofollow">
                                            <span class="ob-unit ob-rec-image-container" data-type="Image">
                                                <div class="ob-image-ratio"></div>
                                                <img class="ob-rec-image ob-show" src="http://images.outbrain.com/Imaginarium/api/uuid/2b0a283e7961a8c6df780d3d498b8ba0d07895259935d9834a3166d05bc30beb/300/161/1.0" onload="this.className += ' ob-show'" alt="NBA Teams are Glad These Guys are Gone" title="NBA Teams are Glad These Guys are Gone" onerror="OBR.extern.imageError(this)">
                                            </span>
                                            <span class="ob-unit ob-rec-text" data-type="Title" title="NBA Teams are Glad These Guys are Gone">NBA Teams are Glad These Guys are Gone</span>      <span class="ob-unit ob-rec-source" data-type="Source">PointAfter | By Graphiq</span>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="ob-widget-items-container ob-multi-row ob-row-3">
                                    <li class="ob-dynamic-rec-container ob-recIdx-3 ob-p" data-pos="2">
                                        <a class="ob-dynamic-rec-link" onclick="" href="http://basketball-players.pointafter.com/stories/5891/biggest-dead-weight-nba-lance-stephenson-rajon-rondo?utm_medium=cm&amp;utm_source=outbrain&amp;utm_campaign=i3.cm.ob.dt.5891" onmousedown="this.href = 'http://paid.outbrain.com/network/redir?p=gSeShGlBgIENx6tIK-l1nOtzVe3elQpXj9jpvv72aoII86agHrMuMgCVzepHu1qbBkUzr8Hw2WySqgEINwK68NcUb4lki2_n1IVq6RuvmXdaJay2JkgfsnyESyl5IiAOfL6U26Z1NOWfdNq4b07geTqBicHggmbMwjlSK5znMB6ZrrFXIeCbRgFKiSQvsoR5XDfMYHj-YxhnYr8jJ2CBv2ZEgs1oJggLLYJIONWRfLplXxfXiSs4H9Ryf7fj_aT09mlR2bUxzB2hSAsXcf_qeBxkVBUODgo67-8YvAGNRXFlGetQwgapUnLz_-1RD_hiLvjAsPlu6Qxmy6d5S23iSbGn6rvHLrKLUvtsTKTGZheMtB15gKUixdI4yxLa4B-EzEBJ628iju8Ghyahq2OKg0KY_LOFSnUQbzQnpl25lzCEgmfclh1eb7ivCxjyy0kM0Y4U34LT8dxo6XJyZ8PxSt08CMbdN72DldXG_o0jcqmnz7feMw-oaQzb6-mAfPwQck-dSs5RrGdHHYYaq8hdEF3o1ejq9fFjyYGC16_0v49C8oInRQFAR358cSsIOo8hDKdG_Xc4vNQdQhdSNouchWUWrSovgsY85177UR5eOs1jrQ2sg6vva_GxrRs1w6UbEfh9c_GnlcM2BQUQKPf-rrRwfeP-HN2s0YY4ldElm3PboR56e7t8eeQJP2L_RbILoOHXPy9v1zZD6lZPf5P4a2sS1l45sXZS4nYSbxfK_TvE-Y5EZDdZkX8C7uoZ77ZfSZkdmp8mhj4_8eTkSoYGra04jCwM1I2KNJLYK8AvAFr44LQzH35WIt4SBoXbEeXM&amp;c=ad1ca247&amp;v=3';
                                           " target="_blank" rel="nofollow">
                                            <span class="ob-unit ob-rec-image-container" data-type="Image">
                                                <div class="ob-image-ratio"></div>
                                                <img class="ob-rec-image ob-show" src="http://images.outbrain.com/Imaginarium/api/uuid/2b0a283e7961a8c6df780d3d498b8ba0d07895259935d9834a3166d05bc30beb/300/161/1.0" onload="this.className += ' ob-show'" alt="NBA Teams are Glad These Guys are Gone" title="NBA Teams are Glad These Guys are Gone" onerror="OBR.extern.imageError(this)">
                                            </span>
                                            <span class="ob-unit ob-rec-text" data-type="Title" title="NBA Teams are Glad These Guys are Gone">NBA Teams are Glad These Guys are Gone</span>      <span class="ob-unit ob-rec-source" data-type="Source">PointAfter | By Graphiq</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="ob_what ob-hover">
                                <a href="http://www.outbrain.com/what-is/default/en" rel="nofollow" onclick="OBR.extern.callWhatIs('http://www.outbrain.com/what-is/default/en', '', -1, -1, true, null);
                                        return false">
                                    Recommended by<span class="ob_logo" title="Outbrain - content marketing"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript" async="async" src="http://widgets.outbrain.com/outbrain.js"></script>
                </div>
            </div>
        </div>
    </div>
</div>
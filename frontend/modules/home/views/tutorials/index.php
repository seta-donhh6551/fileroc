<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$navigator = [
	[
		'url' => false,
		'title' => 'Thủ thuật phần mềm'
	]
];
?>
<link href="<?= Yii::$app->request->baseUrl; ?>css/detail.css" rel="stylesheet" type="text/css" />
<div id="content-main" class="nopadding" style="margin-top:10px">
	<div id="tutorial-menu">
		<div id="content_left_menu">
			<div id="left_menu_top">
				<h2>HƯỚNG DẪN</h2>
			</div>
			<div id="left_menu_mid">
				<ul>
					<li><a href="http://phpandmysql.net/html-css.html" title="Html Css">Html Css</a></li>
					<li><a href="http://phpandmysql.net/javascript-jquery.html" title="Javascript &amp; jQuery">Javascript &amp; jQuery</a></li>
					<li><a href="http://phpandmysql.net/php-can-ban.html" title="PHP Căn bản">PHP Căn bản</a></li>
					<li><a href="http://phpandmysql.net/php-nang-cao.html" title="PHP Nâng cao">PHP Nâng cao</a></li>
					<li><a href="http://phpandmysql.net/php-training.html" title="PHP Training">PHP Training</a></li>
					<li><a href="http://phpandmysql.net/yii2-framework.html" title="Yii2 Framework">Yii2 Framework</a></li>
					<li><a href="http://phpandmysql.net/codeigniter-framework.html" title="Codeigniter Framework">Codeigniter Framework</a></li>
				</ul>
				<div class="cls"></div>
			</div>
			<div id="left_menu_bot"></div>
		</div>
        <div id="ads-left">
            <img src="<?= Yii::$app->request->baseUrl; ?>img/acai-160x600.gif" width="160" />
        </div>
	</div>
	<div id="tutorial-content">
		<?= $this->render('//layouts/navigator', ['navigator' => $navigator]); ?>
        <div id="tutorial-body">
            <div class="tutorial-title">
                <h2><?= $model->title ?></h2>
            </div>
            <div class="tutorial-description">
                <?= $model->info ?>
            </div>
            <div class="tutorial-body">
                <?= $model->fullcontent ?>
            </div>
        </div>
	</div>
	<div id="tutorial-right">
        <div class="ads-250">
            <img src="<?= Yii::$app->request->baseUrl; ?>img/adsense-250x250-en.png"/>
        </div>
        <div id="popular" style="width:250px">
            <h2>Phần Mềm Liên Quan</h2>
            <div class="popular">
                <div class="topdown">
                    <a href="/download/hj-split-30.html"><img src="/uploads/icons/hjsplit-icon.jpg" alt="Download HJ-Split 3.0"></a>
                    <h3><a href="/download/hj-split-30.html" title="Download HJ-Split 3.0">HJ-Split 3.0</a><span class="total-right">100.000</span></h3>
                    <p>Easily split and join large files</p>
                </div>
                <div class="topdown">
                    <a href="/download/ytd-video-downloader.html"><img src="/uploads/icons/ytd-video-downloader.png" alt="Download Ytd video downloader"></a>
                    <h3><a href="/download/ytd-video-downloader.html" title="Download Ytd video downloader">Ytd video downloader</a><span class="total-right">100.000</span></h3>
                    <p>Download video from youtube, facebook</p>
                </div>
                <div class="topdown">
                    <a href="/download/recuva.html"><img src="/uploads/icons/recuva-icon.png" alt="Download Recuva"></a>
                    <h3><a href="/download/recuva.html" title="Download Recuva">Recuva</a><span class="total-right">100.000</span></h3>
                    <p>Restores any files you have deleted </p>
                </div>
                <div class="topdown">
                    <a href="/download/free-download-manager.html"><img src="/uploads/icons/free-download-manager-icon.jpg" alt="Download Free download manager "></a>
                    <h3><a href="/download/free-download-manager.html" title="Download Free download manager ">Free download manager </a><span class="total-right">100.000</span></h3>
                    <p>Accelerate download and supports downloading</p>
                </div>
                <div class="topdown">
                    <a href="/download/hj-split-30.html"><img src="/uploads/icons/hjsplit-icon.jpg" alt="Download HJ-Split 3.0"></a>
                    <h3><a href="/download/hj-split-30.html" title="Download HJ-Split 3.0">HJ-Split 3.0</a><span class="total-right">100.000</span></h3>
                    <p>Easily split and join large files</p>
                </div>
                <div class="topdown">
                    <a href="/download/ytd-video-downloader.html"><img src="/uploads/icons/ytd-video-downloader.png" alt="Download Ytd video downloader"></a>
                    <h3><a href="/download/ytd-video-downloader.html" title="Download Ytd video downloader">Ytd video downloader</a><span class="total-right">100.000</span></h3>
                    <p>Download video from youtube, facebook</p>
                </div>
                <div class="topdown">
                    <a href="/download/recuva.html"><img src="/uploads/icons/recuva-icon.png" alt="Download Recuva"></a>
                    <h3><a href="/download/recuva.html" title="Download Recuva">Recuva</a><span class="total-right">100.000</span></h3>
                    <p>Restores any files you have deleted </p>
                </div>
                <div class="topdown">
                    <a href="/download/free-download-manager.html"><img src="/uploads/icons/free-download-manager-icon.jpg" alt="Download Free download manager "></a>
                    <h3><a href="/download/free-download-manager.html" title="Download Free download manager ">Free download manager </a><span class="total-right">100.000</span></h3>
                    <p>Accelerate download and supports downloading</p>
                </div>
            </div>
        </div>
        <div class="ads-250">
            <img src="<?= Yii::$app->request->baseUrl; ?>img/adsense-250x250-en.png"/>
        </div>
	</div>
	<div class="cls"></div>
</div>
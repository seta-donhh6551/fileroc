<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$navigator = [
	[
		'url' => false,
		'title' => 'Thủ thuật hướng dẫn'
	]
];

$navigator[] = ['url' => Yii::getAlias('@web').'/'.$model['rewrite'].'-'.$model['id'],'title' => $model['title']];
?>
<link href="<?= Yii::$app->request->baseUrl; ?>css/detail.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?= Yii::$app->request->baseUrl; ?>js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="<?= Yii::$app->request->baseUrl; ?>js/scroll.js"></script>
<div id="content-main" class="nopadding" style="margin-top:10px">
	<div id="tutorial-menu">
		<div id="scroll-left">
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
		<div id="ads-two" style="height:30px">
		<!--img src="/img/adsense-300x250-01.gif" width="300" /-->
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
            </div>
        </div>
        <div class="popular-soft" style="width:250px">
			<h2>Bài Viết Mới</h2>
			<div id="techbeat-widget" style="width:250px">
			<div class="tb_postItem">
			 <div class="tb_postImage">
				 <a rel="bookmark" href="/huong-dan-tao-usb-boot-bang-hiren's-boot-cho-window-7810.html" title="Hướng dẫn tạo usb boot bằng hiren's boot cho window 7,8,10">
					 <img src="/uploads/thumb/tao-boot-usb.jpg" alt="Hướng dẫn tạo usb boot bằng hiren's boot cho window 7,8,10">
				 </a>
			 </div>
			<div class="tb_postTitle">
				<a rel="bookmark" href="/huong-dan-tao-usb-boot-bang-hiren's-boot-cho-window-7810.html">Hướng dẫn tạo usb boot bằng hiren's boot cho window 7,8,10</a>
			</div>
		 </div>
		 		 <div class="tb_postItem">
			 <div class="tb_postImage">
				 <a rel="bookmark" href="/phan-biet-o-ssd-va-hdd-nen-dung-o-ssd-hay-hdd-cho-laptop?.html" title="Phân biệt ổ SSD và HDD, nên dùng ổ SSD hay HDD cho laptop?">
					 <img src="/uploads/thumb/20032017-103143hdd-vs-ssd.jpg" alt="Phân biệt ổ SSD và HDD, nên dùng ổ SSD hay HDD cho laptop?">
				 </a>
			 </div>
			<div class="tb_postTitle">
				<a rel="bookmark" href="/phan-biet-o-ssd-va-hdd-nen-dung-o-ssd-hay-hdd-cho-laptop?.html">Phân biệt ổ SSD và HDD, nên dùng ổ SSD hay HDD cho laptop?</a>
			</div>
		 </div>
		 		 <div class="tb_postItem">
			 <div class="tb_postImage">
				 <a rel="bookmark" href="/khoi-phuc-du-lieu-bang-diskgetor-data-recovery.html" title="Khôi phục dữ liệu bằng DiskGetor Data Recovery">
					 <img src="/uploads/thumb/recovery-data.jpg" alt="Khôi phục dữ liệu bằng DiskGetor Data Recovery">
				 </a>
			 </div>
			<div class="tb_postTitle">
				<a rel="bookmark" href="/khoi-phuc-du-lieu-bang-diskgetor-data-recovery.html">Khôi phục dữ liệu bằng DiskGetor Data Recovery</a>
			</div>
		 </div>
		 		 <div class="tb_postItem">
			 <div class="tb_postImage">
				 <a rel="bookmark" href="/cai-va-su-dung-innoextractor-giai-nen-file-du-lieu.html" title="Cài và sử dụng InnoExtractor giải nén file dữ liệu">
					 <img src="/uploads/thumb/data-extract.jpg" alt="Cài và sử dụng InnoExtractor giải nén file dữ liệu">
				 </a>
			 </div>
			<div class="tb_postTitle">
				<a rel="bookmark" href="/cai-va-su-dung-innoextractor-giai-nen-file-du-lieu.html">Cài và sử dụng InnoExtractor giải nén file dữ liệu</a>
			</div>
		 </div>
		 		 <div class="tb_postItem">
			 <div class="tb_postImage">
				 <a rel="bookmark" href="/khoi-phuc-du-lieu-bang-active-partition-recovery.html" title="Khôi phục dữ liệu bằng Active Partition Recovery">
					 <img src="/uploads/thumb/1382645199_active-partition-recovery-professional.jpg" alt="Khôi phục dữ liệu bằng Active Partition Recovery">
				 </a>
			 </div>
			<div class="tb_postTitle">
				<a rel="bookmark" href="/khoi-phuc-du-lieu-bang-active-partition-recovery.html">Khôi phục dữ liệu bằng Active Partition Recovery</a>
			</div>
		 </div>
		 		 <div class="tb_postItem">
			 <div class="tb_postImage">
				 <a rel="bookmark" href="/cach-cai-free-pdf-compressor-giam-kich-thuoc-file-pdf.html" title="Cách cài Free PDF Compressor giảm kích thước file PDF">
					 <img src="/uploads/thumb/adobe-reader.jpg" alt="Cách cài Free PDF Compressor giảm kích thước file PDF">
				 </a>
			 </div>
			<div class="tb_postTitle">
				<a rel="bookmark" href="/cach-cai-free-pdf-compressor-giam-kich-thuoc-file-pdf.html">Cách cài Free PDF Compressor giảm kích thước file PDF</a>
			</div>
		 </div>
		 	  </div>
		</div>
	</div>
	<div class="cls"></div>
</div>
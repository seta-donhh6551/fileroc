<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$navigator = [
	[
		'url' => Yii::getAlias('@web').'/huong-dan',
		'title' => 'Thủ thuật hướng dẫn'
	]
];

$navigator[] = ['url' => Yii::getAlias('@web').'/'.$model['rewrite'].'-'.$model['id'],'title' => $model['title']];
?>
<link href="<?= Yii::$app->request->baseUrl; ?>css/detail.css" rel="stylesheet" type="text/css" />
<link href="http://www.jqueryscript.net/demo/Responsive-Touch-enabled-jQuery-Image-Lightbox-Plugin/dist/simplelightbox.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="<?= Yii::$app->request->baseUrl; ?>js/scroll.js"></script>
<script type="text/javascript" src="http://www.jqueryscript.net/demo/Responsive-Touch-enabled-jQuery-Image-Lightbox-Plugin/dist/simple-lightbox.min.js"></script>
<script type="text/javascript">
//right scroll
$(window).scroll(function () {
	scrollWindows('#popular', '#techbeat-widget', '#footer-desktop');
});
$(function(){
    var gallery = $('.tutorial-title a').simpleLightbox({navText:['&lsaquo;','&rsaquo;']});
});
document.write('<div id="fb-root"></div>');
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/all.js#xfbml=1&appId=199828456846777";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div id="content-main" class="nopadding" style="margin-top:10px">
	<div id="tutorial-menu">
		<?= $this->render('//layouts/tutorial-left-menu', ['listCategory' => $listCategory]); ?>
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
            <div style="margin:10px 0px 30px 0px;border-bottom:1px solid #DDD;"></div>
            <div id="commentfa">
            	<div class="fb-comments" data-href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" data-width="540" data-num-posts="100"></div>
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
                <div class="tb_postItem" style="margin-top:5px">
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
        <!--div class="popular-soft" style="width:250px;margin-top:20px">
            <h2 style="margin-bottom:5px !important">FreeFile.Vn Trên Facebook</h2>
            <object style="border:1px solid #DDD; overflow: hidden; width: 250px; height: 300px;"  data="http://www.facebook.com/plugins/likebox.php?href=http://www.facebook.com/hocthietkewebsite&amp;width=250&amp;height=300&amp;connections=10&amp;header=false"></object>
        </div-->
	</div>
	<div class="cls"></div>
</div>
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
<link href="<?= Yii::$app->request->baseUrl; ?>css/lightbox.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="<?= Yii::$app->request->baseUrl; ?>js/lightbox-plus-jquery.min.js"></script>
<script type="text/javascript" src="<?= Yii::$app->request->baseUrl; ?>js/scroll.js"></script>
<script type="text/javascript">
//right scroll
$(window).scroll(function () {
	scrollWindows('#scroll-ads-menu', '#techbeat-widget', '#footer-desktop');
	scrollWindows('#scroll-left', '#ads-two', '#footer-desktop');
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
            <div class="tutorial-body" style="padding-bottom:10px">
                <?= $model->fullcontent ?>
            </div>
            <div class="border-line"></div>
            <?php if(isset($listTags) && $listTags != null){ ?>
            <div class="list-tags-related">
                <h3>Tìm thêm</h3>
                <div class="list-tags">
                    <ul>
                    <?php foreach($listTags as $tags){ ?>
                        <li><a href="<?= Yii::$app->request->baseUrl.'tim-kiem/'.$tags['rewrite']; ?>.html"><?= $tags['name']; ?></a></li>
                    <?php } ?>
                    </ul>
                    <div class="cls"></div>
                </div>
            </div>
            <div class="border-line"></div>
            <?php } ?>
            <?php if(isset($listRelatedSoft) && $listRelatedSoft != null){ ?>
            <div class="list-tags-related">
                <h3>Phần mềm liên quan</h3>
                <div class="list-tags" style="padding-left:0px">
                    <ul class="related-soft">
                    <?php foreach($listRelatedSoft as $soft){ ?>
                        <li>
                            <img src="<?= Yii::getAlias('@web'); ?>/uploads/icons/<?= $soft['icon'] ?>" alt="Download <?= $soft['title'] ?>" />
                            <a href="<?= Yii::$app->request->baseUrl.'download/'.$soft['rewrite']; ?>.html"><?= $soft['title']; ?></a> - 
                            <span><?= $soft['short_info']; ?></span>
                        </li>
                    <?php } ?>
                    </ul>
                    <div class="cls"></div>
                </div>
            </div>
            <div class="border-line"></div>
            <?php } ?>
            <div id="commentfa">
            	<div class="fb-comments" data-href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" data-width="540" data-num-posts="100"></div>
            </div>
        </div>
	</div>
	<div id="tutorial-right">
        <div id="scroll-ads-menu">
            <div class="ads-250">
                <img src="<?= Yii::$app->request->baseUrl; ?>img/adsense-250x250-en.png"/>
            </div>
            <div id="quick-view">
                <div class="popular-soft" style="width:250px">
                <h2>Nội Dung Chính</h2>
                <ul></ul>
                </div>
            </div>
        </div>
        <div id="popular" style="width:250px">
            <?= $this->render('//layouts/related-soft', ['listRelatedSoft' => $listRelatedSoft]); ?>
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
<script type="text/javascript">
jQuery(function($){
	$('.tutorial-body').find('h3').each(function (index, element) {
		var text = $(this).text();
		$('#quick-view ul').append('<li><a href="#tab'+index+'">'+text+'</a></li>')
		$(this).attr('id','tab'+index);
	});
	$("#quick-view ul li a").click(function() {
		var id = $(this).attr('href');
        var topValue = $(id).offset().top;
		$('html, body').animate({
			scrollTop: (topValue - 57)
		}, 1000);
		return false;
	});
    
    //find all image and wrap
    $('.tutorial-body').find('img').each(function (index, element) {
		var imgUrl = $(this).attr('src');
        var title = $(this).attr('alt');
		$(this).wrap('<a class="example-image-link" href="'+imgUrl+'" data-lightbox="tutorials" data-title="'+title+'"></a>');
	});
});
</script>
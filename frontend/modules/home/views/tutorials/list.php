<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$navigator = [
	[
		'url' => Yii::getAlias('@web').'/huong-dan',
		'title' => 'Thủ thuật hướng dẫn'
	]
];
?>
<link href="<?= Yii::$app->request->baseUrl; ?>css/detail.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?= Yii::$app->request->baseUrl; ?>js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="<?= Yii::$app->request->baseUrl; ?>js/scroll.js"></script>
<div id="content-main" class="nopadding" style="margin-top:10px">
	<div id="tutorial-menu">
		<?= $this->render('//layouts/tutorial-left-menu', ['listCategory' => $listCategory]); ?>
	</div>
	<div id="tutorial-content">
		<?= $this->render('//layouts/navigator', ['navigator' => $navigator]); ?>
        <div id="tutorial-body">
            <div class="tutorial-title">
                <h2>Thủ thuật hướng dẫn</h2>
            </div>
            <div class="tutorial-description">
                Tổng hợp những bài viết về thủ thuật và hướng dẫn sử dụng máy tính, phần mềm, ứng dụng... chia sẻ những thủ thuật hay giúp bạn chăm sóc và quản lý tốt máy tính và những thiết bị của mình
            </div>
            <div class="tutorial-body">
			<?php if(isset($listTutorials)){ ?>
			<?php foreach($listTutorials as $tutorial){ ?>
				<div class="tutorial-list">
					<div class="tutol-list-header">
						<a href="<?= Yii::$app->request->baseUrl.$tutorial['rewrite'].'-'.$tutorial['id']; ?>.html" title="<?= $tutorial['title']; ?>" class="internal-link">
							<img src="<?= Yii::$app->request->baseUrl.'uploads/thumb/'.$tutorial['thumb']; ?>" alt="<?= $tutorial['title']; ?>" style="width:90px" />
							<span class="tutol-list-title">
								<h3><?= $tutorial['title']; ?></h3>
							</span>
						</a>
						<div class="tutol-list-details">New Softwares - 9.42MB - <span class="trial" style="float:none">License </span></div>
						<div class="tutol-list-info">
							<?= $tutorial['info']; ?>
						</div>
						<div class="tutol-list-more">
							<a href="<?= Yii::$app->request->baseUrl.$tutorial['rewrite'].'-'.$tutorial['id']; ?>.html" class="green program-entry-download-link button-link">
							Chi Tiết</a>
						</div>
						<div style="clear:both"></div>
					</div>
				 </div>
			<?php } } ?>
            </div>
			<div id="pagination">
				<?php echo \yii\widgets\LinkPager::widget([
					'pagination' => $pages,
				]); ?>
			</div>
        </div>
	</div>
	<div id="tutorial-right">
        <div class="ads-250">
            <img src="<?= Yii::$app->request->baseUrl; ?>img/adsense-250x250-en.png"/>
        </div>
        <?php
        echo $this->render('//layouts/popular-download', [
            'listPost' => $listPopular,
            'title' => 'Phần Mềm Tải Nhiều Nhất',
            'width' => 250
        ]); 
        ?>
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
        <div class="popular-soft" style="width:250px;margin-top:20px">
            <h2 style="margin-bottom:5px !important">Facebook</h2>
            <div class="fanpage">
            	<object style="border:1px solid #DDD; overflow: hidden; width: 250px; height: 300px;"  data="http://www.facebook.com/plugins/likebox.php?href=http://www.facebook.com/hocthietkewebsite&amp;width=250&amp;height=300&amp;connections=10&amp;header=false"></object>
            </div>
        </div>
	</div>
	<div class="cls"></div>
</div>

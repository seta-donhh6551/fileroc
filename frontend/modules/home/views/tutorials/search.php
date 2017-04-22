<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$navigator = [
	[
		'url' => Yii::getAlias('@web').'/huong-dan',
		'title' => 'Thủ thuật hướng dẫn'
	]
];
$navigator[] = ['url' => Yii::getAlias('@web').'/'.$listTags[0]['rewrite'],'title' => $listTags[0]['name']];
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
                <h2><?= $listTags[0]['name']; ?></h2>
            </div>
            <div class="tutorial-description">
                Các bài viết liên quán đến <?= $listTags[0]['name']; ?>
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
						<div class="tutol-list-details">Freefile.vn - <?= date('d-m-Y H:i', strtotime($tutorial['creat_date'])); ?> - <span class="free" style="float:none">License </span></div>
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
        <div class="popular-soft" style="width:250px;margin-top:20px">
            <h2 style="margin-bottom:5px !important">Facebook</h2>
             <div class="fanpage">
            	<object style="border:1px solid #DDD; overflow: hidden; width: 250px; height: 300px;"  data="http://www.facebook.com/plugins/likebox.php?href=http://www.facebook.com/hocthietkewebsite&amp;width=250&amp;height=300&amp;connections=10&amp;header=false"></object>
            </div>
        </div>
	</div>
	<div class="cls"></div>
</div>
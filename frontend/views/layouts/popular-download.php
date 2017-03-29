<div id="scroll-right">
	<div id="topads">
		<img src="<?= Yii::$app->request->baseUrl; ?>img/adsense-300x250.gif" />
	</div>
	<div id="popular">
		<h2>Phần Mềm Tương Tự</h2>
		<div class="popular">
			<?php if(isset($listPost)){ ?>
			<?php foreach($listPost as $postItem){ ?>
			<div class="topdown">
				<a href="<?= Yii::$app->request->baseUrl.'download/'.$postItem['rewrite']; ?>.html"><img src="<?= Yii::getAlias('@web'); ?>/uploads/icons/<?= $postItem['icon'] ?>" alt="Download <?= $postItem['title'] ?>" /></a>
				<h3><a href="<?= Yii::$app->request->baseUrl.'download/'.$postItem['rewrite']; ?>.html" title="Download <?= $postItem['title'] ?>"><?= $postItem['title'] ?></a><span class="total-right"><?= $postItem['total_down'] ?></span></h3>
                <p title="<?= $postItem['short_info'] ?>"><?= $postItem['short_info'] ?></p>
			</div>
			<?php } } ?>
		</div>
	</div>
</div>
<div id="ads-two" style="height:30px">
	<!--img src="<?= Yii::$app->request->baseUrl; ?>img/adsense-300x250-01.gif" width="300" /-->
</div>
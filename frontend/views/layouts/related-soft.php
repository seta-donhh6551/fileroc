<h2>Phần Mềm Liên Quan</h2>
<div class="popular">
	<?php if(isset($listRelatedSoft)){ ?>
	<?php foreach($listRelatedSoft as $related){ ?>
	<div class="topdown">
		<a href="<?= Yii::$app->request->baseUrl.'download/'.$related['rewrite']; ?>.html"><img src="<?= Yii::getAlias('@web'); ?>/uploads/icons/<?= $related['icon'] ?>" alt="Download <?= $related['title'] ?>"></a>
		<h3><a href="<?= Yii::$app->request->baseUrl.'download/'.$related['rewrite']; ?>.html" title="Download <?= $related['title'] ?>"><?= $related['title'] ?></a><span class="total-right"><?= number_format($related['total_down']) ?></span></h3>
		<p title="<?= $related['short_info'] ?>"><?= $related['short_info'] ?></p>
	</div>
	<?php } } ?>
</div>

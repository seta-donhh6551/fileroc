<?php if(isset($listComment)){ ?>
<?php foreach($listComment as $comment){ ?>
<div class="review-items">
	<?php if(!Yii::$app->user->getIsGuest()){ ?>
	<a href="" class="review-del">Delete</a>
	<?php } ?>
	<div class="ritems-left">
		<img src="<?= Yii::getAlias('@web') ?>/img/avatar-user.jpg" alt="">
		<div class="review-user-info">
			<p><?= $comment->name ?></p>
		</div>
	</div>
	<?php $width = $comment->star*16 ?>
	<div class="ritems-right">
		<span class="title-ritems">“<?= $comment->title ?>”</span>
		<div style="">
			<div class="stars">
				<span class="star-gray">
					<span class="star-active" style="width:<?= $width ?>px;"></span>
				</span>
				<div class="cls"></div>
			</div>
			<span style="font-size:12px">Reviewed at <?= date('F. j, Y H:i', strtotime($comment->created_date)); ?></span>
		</div>
		<p class="revire-descr"><?= $comment->review ?></p>
	</div>
	<div class="cls"></div>
</div>
<?php } } ?>
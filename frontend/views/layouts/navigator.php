<div id="navigation" style="width:540px">
	<ul>
		<li><a href="<?= Yii::getAlias('@web') ?>">Home</a></li>
		<?php if(isset($navigator)){ ?>
		<?php foreach($navigator as $navi){ ?>
		<li><a href="<?= $navi['url'] == false ? 'javascript:void(0)' : Yii::getAlias('@web').$navi['url'].'.html'; ?>" title="<?= $navi['title'] ?>"><?= $navi['title'] ?></a></li>
		<?php } } ?>
	</ul>
	<div class="cls"></div>
</div>
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$navigator = [
	[
		'url' => Yii::getAlias('@web').'/'.$infoCate['rewrite'],
		'title' => $infoCate['name']
	]
];
if(isset($infoSubCate)){
	$navigator[] = ['url' => Yii::getAlias('@web').'/'.$infoCate['rewrite'].'/'.$infoSubCate['rewrite'],'title' => $infoSubCate['name']];
	$navigator[] = [
		'url' => Yii::getAlias('@web').'/'.$infoCate['rewrite'].'/'.$infoSubCate['rewrite'].'/'.$model->rewrite,
		'title' => $model->name
	];

}else{
	$navigator[] = ['url' => Yii::getAlias('@web').'/'.$infoCate['rewrite'].'/'.$subCategory['rewrite'],'title' => $subCategory['titleMenu']];
}
?>
<div id="left-all">
	<?= $this->render('//layouts/navigator', ['navigator' => $navigator]); ?>
	<div id="short-info">
		<?= $model->info; ?>
	</div>
	<?php if(isset($listChild) && $listChild != null){ ?>
	<div id="sub-category">
		<ul>
			<?php foreach($listChild as $childItem){ ?>
			<li><a href="<?= Yii::$app->request->baseUrl.$infoCate['rewrite'].'/'.$subCategory['rewrite'].'/'.$childItem['rewrite']; ?>.html" title="<?= $childItem['name'] ?>"><?php if($childItem['icon']){ ?><img src="<?= Yii::$app->request->baseUrl.'uploads/icons/'.$childItem['icon']; ?>" /><?php } ?><?= $childItem['name'] ?></a></li>
			<?php } ?>
		</ul>
		<div class="cls"></div>
	</div>
	<?php } ?>
	<div id="sub-popular" class="padbot borbot">
		<h2>Top <?= $subCategory['titleMenu'] ?> Popular Download</h2>
		<div style="height: 15px"></div>
		<?php if(isset($listPost)){ ?>
		<?php $i = 1; foreach($listPost as $postItem){ ?>
		<div class="popular-item<?php if($i % 2 == 0){ echo ' item-even'; }?>">
			<a href="<?= Yii::$app->request->baseUrl.'download/'.$postItem['rewrite']; ?>.html"><img src="<?= Yii::getAlias('@web') ?>/uploads/icons/<?= $postItem['icon'] ?>" alt="Download <?= $postItem['title'] ?>" /></a>
			<h3><a href="<?= Yii::$app->request->baseUrl.'download/'.$postItem['rewrite']; ?>.html" title="Download <?= $postItem['title'] ?>"><?= $postItem['title'] ?></a></h3>
			<p><?= $postItem['short_info'] ?></p>
		</div>
		<?php $i++; } } ?>
		<div class="cls"></div>
	</div>
	<div id="topweek" class="padtop">
		<?php if(isset($listPost)){ ?>
		<?php $i = 1; foreach($listPost as $postItem){ ?>
		<div class="week-item">
			<div class="left-item">
				<h3><a href="<?= Yii::$app->request->baseUrl.'download/'.$postItem['rewrite']; ?>.html" title="<?= $postItem['title'] ?>"><?= $postItem['title'] ?></a> - <span class="short-descr"><?= $postItem['short_info'] ?></span></h3>
				<a href="<?= Yii::$app->request->baseUrl.'download/'.$postItem['rewrite']; ?>.html"><img src="<?= Yii::getAlias('@web') ?>/uploads/thumb/<?= $postItem['thumb'] ?>" alt="Download <?= $postItem['title'] ?>" style="width:100px" /></a>
				<p class="brand">Publisher <b><?= $postItem['author'] ?></b></p>
				<div class="short-info"><?= $postItem['short_intro'] ?></div>
				<p><span class="bold">Os required</span>: <?= $postItem['required'] ?></p>
			</div>
			<div class="right-item">
				<p><span class="<?= $postItem['type'] == 1 ? 'trial' : 'free' ?>">License </span></p>
				<a href="<?= Yii::$app->request->baseUrl.'download/'.$postItem['rewrite']; ?>.html"><span>Download</span></a>
				<div class="stars" style="padding-left:20px">
					<span class="star-gray">
						<span class="star-active" style="width:48px;"></span>
					</span>
					<span class="voted">4.300 voted</span>
					<div class="cls"></div>
				</div>
				<p><span class="bold">Total downloads</span> : <?= $postItem['total_down'] ?></p>
			</div>
			<div class="cls"></div>
		</div>
		<?php } } ?>
	</div>
</div>
<div id="right-page">
	<?= $this->render('//layouts/popular-download',[
		'subCategory' => $subCategory,
		'listPost' => $listPost
	]);
	?>
</div>
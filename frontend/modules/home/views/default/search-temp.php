<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$navigator = [
	[
		'url' => false,
		'title' => 'Search'
	]
];
?>
<div id="content-main">
    <div id="left-all">
        <?= $this->render('//layouts/navigator', ['navigator' => $navigator]); ?>
        <div id="topweek" class="padtop">
            <?php if(isset($listPost) && $listPost != null){ ?>
            <?php $i = 1; foreach($listPost as $postItem){ ?>
            <div class="week-item">
                <div class="left-item">
                    <h3><a href="<?= Yii::$app->request->baseUrl.'download/'.$postItem['rewrite']; ?>.html" title="<?= $postItem['title'] ?>"><?= $postItem['title'] ?></a> - <span class="short-descr"><?= $postItem['short_info'] ?></span></h3>
                    <a href="<?= Yii::$app->request->baseUrl.'download/'.$postItem['rewrite']; ?>.html"><img src="<?= Yii::getAlias('@web') ?>/uploads/thumb/<?= $postItem['thumb'] ?>" alt="Download <?= $postItem['title'] ?>" style="width:100px" /></a>
                    <p class="brand">Publisher <b>Rockstar</b></p>
                    <div class="short-info"><?= $postItem['short_intro'] ?></div>
                    <p><span class="bold">Os required</span>: <?= $postItem['required'] ?></p>
                </div>
                <div class="right-item">
                    <p><span class="<?= $postItem['type'] == 1 ? 'trial' : 'free' ?>">Price </span></p>
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
            <?php } }else{ ?>
            <div class="no-result">
                <p>0 results</p>
                <p>Your search returned no matches.</p>
            </div>
            <?php } ?>
        </div>
    </div>
    <div id="right-page">
        <?= $this->render('//layouts/popular-download',[
            'subCategory' => $subCategory,
            'listPost' => $listPost
        ]);
        ?>
    </div>
</div>
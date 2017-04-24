<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?= $this->render('//layouts/left-page',['listCate' => $subCategory]);?>
<div id="mid-page">
    <?php if(isset($listPost) && $listPost != null){ ?>
    <?php $postDay = $listPost[2];?>
    <div class="today">
        <h3><a href="<?= Yii::$app->request->baseUrl.'download/'.$postDay['rewrite']; ?>.html" title="<?= $postDay['title'] ?>"><?= $postDay['title'] ?></a></h3>
        <a href="<?= Yii::$app->request->baseUrl.'download/'.$postDay['rewrite']; ?>.html"><img class="today-thumb" alt="<?= $postDay['title'] ?>" src="uploads/thumb/<?= $postDay['thumb']; ?>" /></a>
        <p class="brand">Publisher  <b><?= $postDay['author'] ?></b></p>
        <p><?= $postDay['short_intro'] ?></p>
        <div class="stars">
            <span class="star-gray">
                    <span class="star-active" style="width:48px;"></span>
            </span>
            <span class="voted">4.300 voted</span>
            <div class="cls"></div>
        </div>
        <p><span class="bold">Total downloads</span> : <?= $postDay['total_down'] ?></p>
        <p><span class="bold">Os required</span>: <?= $postDay['required'] ?></p>
    </div>
    <?php } ?>
    <div class="top-popular">
        <h2>Top <?= $subCategory['titleMenu'] ?> Application Popular Download</h2>
        <div class="popular-down">
            <?php if(isset($listPost)){ ?>
            <?php $i = 1; foreach($listPost as $postItem){ ?>
            <div class="popular-item<?php if($i % 2 == 0){ echo ' item-even'; }?>">
                    <a href="<?= Yii::$app->request->baseUrl.'download/'.$postItem['rewrite']; ?>.html"><img src="uploads/icons/<?= $postItem['icon'] ?>" alt="Download <?= $postItem['title'] ?>" /></a>
            <h3><a href="<?= Yii::$app->request->baseUrl.'download/'.$postItem['rewrite']; ?>.html" title="Download <?= $postItem['title'] ?>"><?= $postItem['title'] ?></a></h3>
            <p><?= $postItem['short_info'] ?></p>
            </div>
            <?php $i++; } } ?>
            <div class="cls"></div>
        </div>
    </div>
    <div class="top-week">
        <?php if(isset($listPost)){ ?>
        <?php $i = 1; foreach($listPost as $postItem){ ?>
        <div class="week-item">
            <div class="left-item">
                <h3><a href="<?= Yii::$app->request->baseUrl.'download/'.$postItem['rewrite']; ?>.html" title="<?= $postItem['title'] ?>"><?= $postItem['title'] ?></a></h3>
                <a href="<?= Yii::$app->request->baseUrl.'download/'.$postItem['rewrite']; ?>.html"><img src="uploads/thumb/<?= $postItem['thumb'] ?>" alt="Download <?= $postItem['title'] ?>" style="width:100px" /></a>
                <p class="brand">Publisher <b><?= $postItem['author'] ?></b></p>
                <div class="short-info"><?= $postItem['short_intro'] ?></div>
                <p><span class="bold">Os required </span>: <?= $postItem['required'] ?></p>
            </div>
            <div class="right-item">
                <p><span class="<?= $postItem['type'] == 1 ? 'trial' : 'free' ?>">License </span></p>
                <a href="<?= Yii::$app->request->baseUrl.'download/'.$postItem['rewrite']; ?>.html"><span>Download</span></a>
                <div class="stars padleft">
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
        'listPost' => $listAllPost
    ]);
    ?>
</div>
<div id="popular"<?php if(isset($width)){ echo ' style="width:'.$width.'px"';}?>>
    <h2><?php echo isset($title) ? $title : 'Phần Mềm Tương Tự'; ?></h2>
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
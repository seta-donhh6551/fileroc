<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

if($infoCate){
	$navigator[] = ['url' => Yii::getAlias('@web').'/'.$infoCate['rewrite'],'title' => $infoCate['name']];
}
if($subCate){
	$navigator[] = ['url' => Yii::getAlias('@web').'/'.$infoCate['rewrite'].'/'.$subCate['rewrite'],'title' => $subCate['name']];
}
$navigator[] = ['url' => Yii::getAlias('@web').'/download/'.$model->rewrite,'title' => $model->title];
?>

<link href="<?= Yii::$app->request->baseUrl; ?>css/detail.css" rel="stylesheet" type="text/css" />

<div id="content-main">
    <div id="left-all">
        <?= $this->render('//layouts/navigator', ['navigator' => $navigator]); ?>
        <div id="download-option" class="padbot">
            <div class="download-now">
                <h1>Download <?= $model->title ?></h1>
                <p><?= $model->short_intro ?></p>
            </div>
            <div class="download-option marbot">
                <h3 class="link-title">Direct link</h3>
                <p class="hand martop"><?= $model->url_soft ?></p>
                <p class="hand-right"><a href="<?= $model->url_soft ?>" class="download-small" data-id="<?= $model->id ?>">Download</a></p>
                <div class="cls"></div>
            </div>
            <?php if($model->url_provide1){ ?>
            <div class="download-option marbot">
                <h3 class="link-title">Preventive link</h3>
                <p class="hand martop marbot"><?= $model->url_provide1 ?></p>
                <p class="hand-right"><a href="<?= $model->url_provide1 ?>" class="download-small" data-id="<?= $model->id ?>">Download</a></p>
                <div class="cls"></div>
            </div>
            <?php } ?>
            <?php if($model->url_provide2){ ?>
            <div class="download-option">
                <h3 class="link-title">Preventive link</h3>
                <p class="hand martop"><?= $model->url_provide2 ?></p>
                <p class="hand-right"><a href="<?= $model->url_provide2 ?>" class="download-small" data-id="<?= $model->id ?>">Download</a></p>
                <div class="cls"></div>
            </div>
            <?php } ?>
            <div class="cls"></div>
        </div>
        <div id="download-detail" class="cls">
            <div class="detail-intro padbot">
                <img src="<?= Yii::$app->request->baseUrl; ?>img/adsense-468x60.gif" style="margin-left: 100px"/>
            </div>
            <div class="soft-info">
                <table cellpadding="0" class="tblvoted">
                    <tr>
                        <td class="odd">Voted</td>
                        <td class="even">
                            <div class="stars">
                                <span class="star-gray">
                                    <span class="star-active" style="width:48px;"></span>
                                </span>
                                <span class="voted">4.300 voted</span>
                                <div class="cls"></div>
                            </div>
                        </td>
                        <td class="odd">Publisher</td>
                        <td class="even"><b><?= $model->author ?></b></td>
                    </tr>
                    <tr>
                        <td class="odd">Version</td>
                        <td class="even"><?= $model->version ?></td>
                        <td class="odd">License</td>
                        <td class="even"><span class="<?= $model->type == 1 ? 'trial' : 'free' ?>"></span></td>
                    </tr>
                    <tr>
                        <td class="odd">File size</td>
                        <td class="even"><?= $model->filesize ?> mb</td>
                        <td class="odd">Updated</td>
                        <td class="even"><?= $model->update_date ?></td>
                    </tr>
                    <tr>
                        <td class="odd">Total downloads</td>
                        <td class="even"><?= $model->total_down ?></td>
                        <td class="odd">Os required</td>
                        <td class="even"><?= $model->required ?></td>
                    </tr>
                </table>
            </div>
            <div class="related bortop martop">
                <h2>Related Applications and replace</h2>
                <div class="related-soft">
                    <?php if(isset($listPost)){ ?>
                    <?php foreach($listPost as $postItem){ ?>
                    <div class="related-item">
                        <div class="related-img">
                            <a href="<?= Yii::$app->request->baseUrl.'download/'.$postItem['rewrite']; ?>.html"><img src="<?= Yii::getAlias('@web'); ?>/uploads/icons/<?= $postItem['icon'] ?>" alt="Download <?= $postItem['title'] ?>" /></a>
                            <h3><a href="<?= Yii::$app->request->baseUrl.'download/'.$postItem['rewrite']; ?>.html" title="Download <?= $postItem['title'] ?>"><?= $postItem['title'] ?></a></h3>
                        </div>
                        <div class="related-info">
                            <?= $postItem['short_info'] ?>
                        </div>
                        <div class="related-total">
                            <?= '123.000' ?>
                        </div>
                    </div>
                    <?php } } ?>
                </div>
            </div>
        </div>
    </div>
    <div id="right-page">
        <?= $this->render('//layouts/popular-download',[
            'listPost' => $listPost
        ]);
        ?>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$('a.download-small').click(function(){
		var post_id = $(this).attr('data-id');
		if(post_id == ''){
			return false;
		}
		$.post('<?= Yii::$app->request->baseUrl; ?>home/posts/security', {post_id:post_id}, function(result){
			if(result == 'true'){
				return true;
			}
			return false;
		});
	});
});
</script>
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
<script type="text/javascript" src="<?= Yii::$app->request->baseUrl; ?>js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="<?= Yii::$app->request->baseUrl; ?>js/scroll.js"></script>
<div id="content-main">
    <div id="left-all">
        <?= $this->render('//layouts/navigator', ['navigator' => $navigator]); ?>
        <div id="download-option" class="padbot">
            <div class="download-now" style="width:660px">
                <h1>Download <?= $model->title ?> miễn phí</h1>
                <p><?= $model->short_intro ?></p>
            </div>
            <div class="download-now" style="text-align:center">
                <a href="<?= $model->url_soft ?>">
                    <img src="<?= Yii::$app->request->baseUrl; ?>img/download-cicle-icon.jpg" alt="Download <?= $model->title ?>" />
                    <span class="red">Tải phần mềm</span>
                </a>
                <p>&nbsp;</p>
                
            </div>
            <div class="download-option">
                <p>Nếu liên kết trên bị hỏng, bạn có thể tải <?= $model->title ?> từ các link dự phòng dưới đây</p>
            </div>
            <?php if($model->url_provide1){ ?>
            <div class="download-option">
                <h3 class="link-title">Link Dự Phòng 1</h3>
                <div class="cls" style="padding:7px"></div>
                <p class="hand martop marbot"><?= $model->url_provide1 ?></p>
                <p class="hand-right"><a href="<?= $model->url_provide1 ?>" class="download-small" data-id="<?= $model->id ?>">Tải về</a></p>
                <div class="cls"></div>
            </div>
            <?php } ?>
            <?php if($model->url_provide2){ ?>
            <div class="download-option">
                <h3 class="link-title">Link Dự Phòng 2</h3>
                <div class="cls" style="padding:7px"></div>
                <p class="hand martop"><?= $model->url_provide2 ?></p>
                <p class="hand-right"><a href="<?= $model->url_provide2 ?>" class="download-small" data-id="<?= $model->id ?>">Tải về</a></p>
                <div class="cls"></div>
            </div>
            <?php } ?>
            <div class="cls"></div>
        </div>
        <div id="download-detail" class="cls">
            <div class="detail-intro padbot">
                <img src="<?= Yii::$app->request->baseUrl; ?>img/adsense-468x60.gif" style="margin-left:100px"/>
            </div>
            <div class="soft-info">
                <table cellpadding="0" class="tblvoted">
                    <tr>
                        <td class="odd">Đánh giá</td>
                        <td class="even">
                            <div class="stars">
                                <span class="star-gray">
                                    <span class="star-active" style="width:48px;"></span>
                                </span>
                                <span class="voted">4.300 đánh giá</span>
                                <div class="cls"></div>
                            </div>
                        </td>
                        <td class="odd">Nhà phát hành</td>
                        <td class="even"><b><?= $model->author ?></b></td>
                    </tr>
                    <tr>
                        <td class="odd">Phiên bản</td>
                        <td class="even"><?= $model->version ?></td>
                        <td class="odd">Bản quyền</td>
                        <td class="even"><span class="<?= $model->type == 1 ? 'trial' : 'free' ?>"></span></td>
                    </tr>
                    <tr>
                        <td class="odd">Dung lượng file</td>
                        <td class="even"><?= $model->filesize ?> mb</td>
                        <td class="odd">Ngày cập nhật</td>
                        <td class="even"><?= date('d/m/Y H:i', strtotime($model->update_date)); ?></td>
                    </tr>
                    <tr>
                        <td class="odd">Số lượt tải</td>
                        <td class="even"><?= $model->total_down ?></td>
                        <td class="odd">Hệ điều hành yêu cầu</td>
                        <td class="even"><?= $model->required ?></td>
                    </tr>
                </table>
            </div>
            <div class="related bortop martop">
                <h2>PHẦN MỀM TƯƠNG TỰ</h2>
                <div class="related-soft">
                    <?php if(isset($listRelated)){ ?>
                    <?php foreach($listRelated as $postItem){ ?>
                    <div class="related-item">
                        <div class="related-img">
                            <a href="<?= Yii::$app->request->baseUrl.'download/'.$postItem['rewrite']; ?>.html"><img src="<?= Yii::getAlias('@web'); ?>/uploads/icons/<?= $postItem['icon'] ?>" alt="Download <?= $postItem['title'] ?>" /></a>
                            <h3><a href="<?= Yii::$app->request->baseUrl.'download/'.$postItem['rewrite']; ?>.html" title="Download <?= $postItem['title'] ?>"><?= $postItem['title'] ?></a></h3>
                        </div>
                        <div class="related-info">
                            <?= $postItem['short_info'] ?>
                        </div>
                        <div class="related-total">
                            <?= $postItem['total_down'] ?>
                        </div>
                    </div>
                    <?php } } ?>
                </div>
            </div>
        </div>
    </div>
    <div id="right-page">
        <div id="scroll-right">
            <div id="topads">
                <img src="<?= Yii::$app->request->baseUrl; ?>img/adsense-300x250.gif" alt="Quảng cáo" />
            </div>
            <?= $this->render('//layouts/popular-download',[
                'listPost' => $listPopular,
                'title' => 'Phần mềm phổ biến',
                'listRelated' => $listRelated
            ]);
            ?>
        </div>
        <div id="ads-two" style="height:30px">
            <!--img src="<?= Yii::$app->request->baseUrl; ?>img/adsense-300x250-01.gif" width="300" /-->
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $("#popular").css('margin','20px 0px 0px 0px');
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
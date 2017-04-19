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
		<div id="short-info">
			<?= $model->short_intro ?>
		</div>
		<div id="download-option">
			<div class="download-now">
				<h1>Tải phần mềm <?= $model->title ?></h1>
				<div class="down-left">
                    <a href="<?= Yii::$app->request->baseUrl.'download-option/'.$model->rewrite; ?>.html" class="download" style="font-size:18px">Tải Về</a>
				</div>
				<div class="down-right">
					<h2>Tìm <?= $model->title ?> trên</h2>
					<a href="#"><img src="<?= Yii::getAlias('@web') ?>/uploads/icons/mac-os.png" /> Mac</a>
					<a href="#"><img src="<?= Yii::getAlias('@web') ?>/uploads/icons/android.png" /> Android</a>
					<a href="#"><img src="<?= Yii::getAlias('@web') ?>/uploads/icons/mac-os.png" /> iOs</a>
				</div>
				<div class="cls"></div>
			</div>
			<div class="cls"></div>
			<div class="detail-info-left">
				<table cellpadding="0">
					<tr>
						<td>Nhà phát hành</td>
						<td class="even"><b><?php if($model->author_url){ echo '<a href="'.$model->author_url.'" target="_blank">'.$model->author.'</a>'; }else{ echo $model->author; } ?></b></td>
					</tr>
					<tr>
						<td>Phiên bản</td>
						<td class="even"><?= $model->version ?></td>
					</tr>
					<tr>
						<td>Đánh giá</td>
						<td class="even">
							<div class="stars">
								<span class="star-gray">
									<span class="star-active" style="width:48px;"></span>
								</span>
								<span class="voted">4.300 voted</span>
								<div class="cls"></div>
							</div>
						</td>
					</tr>
					<tr>
						<td>Bản quyền</td>
						<td class="even"><span class="<?= $model->type == 1 ? 'trial' : 'free' ?>"></span></td>
					</tr>
					<?php if($model->type == 1 && $model->time_limit != null){ ?>
					<tr>
						<td>Time limit</td>
						<td><?= $model->time_limit ?></td>
					</tr>
					<?php } ?>
					<tr>
						<td>Dung lượng file</td>
						<td class="even"><?= $model->filesize ?> Mb</td>
					</tr>
					<tr>
						<td>Ngày tạo</td>
						<td class="even"><?= date('d/m/Y H:i', strtotime($model->creat_date)); ?></td>
					</tr>
					<tr>
						<td>Ngày cập nhật</td>
						<td class="even"><?= date('d/m/Y H:i', strtotime($model->update_date)); ?></td>
					</tr>
					<tr>
						<td>Hệ điều hành yêu cầu</td>
						<td class="even"><?= $model->required ?></td>
					</tr>
				</table>
			</div>
			<div class="detail-info-right">
                <img src="<?= Yii::getAlias('@web') ?>/uploads/<?= $model->thumb ?>" alt="<?= $model->title ?>" width="150" style="margin-bottom:5px"/>
				<p><?= $model->short_info ?></p>
			</div>
			<div class="cls"></div>
		</div>
		<div id="download-detail">
			<div class="detail-intro padbot">
				<h2>GIỚI THIỆU</h2>
				<div class="intro-content">
					<?= $model->info ?>
				</div>
			</div>
            <div class="detail-content" style="margin-top:20px">
				<h2>CHỨC NĂNG CHÍNH</h2>
				<div class="full-content">
					<?= $model->info_function ?>
				</div>
			</div>
			<?php if($model->url_video){ ?>
			<div class="detail-video">
				<h2>VIDEO VỀ <?= $model->title ?></h2>
				<div class="video-content">
					<iframe width="600" height="350" src="<?= $model->url_video ?>" frameborder="0" allowfullscreen></iframe>
				</div>
			</div>
			<?php } ?>
			<div class="manual" style="margin-top:30px">
				<h2>HƯỚNG DẪN CÀI ĐẶT</h2>
				<div class="full-content">
					<?= $model->fullcontent ?>
				</div>
			</div>
			<div class="rating-title martop">
			Hiện có <?= count($listComment); ?> đánh giá từ người dùng
		</div>
		<div id="reviews">
			<h2 style="font-size:18px;color:#F60;margin-bottom:15px;">NGƯỜI DÙNG ĐÁNH GIÁ</h2>
			<div class="rating-title martop">
			Hiện có <?= count($listComment); ?> đánh giá từ người dùng
			<?php
			$listRating = [];
			foreach($listComment as $key => $val){
				$listRating[] = $val->star;
			}
			$totalRating = array_count_values($listRating);
			$excellent = isset($totalRating[5]) ? $totalRating[5] : 0;
			$veryGood  = isset($totalRating[4]) ? $totalRating[4] : 0;
			$average   = isset($totalRating[3]) ? $totalRating[3] : 0;
			$poor      = isset($totalRating[2]) ? $totalRating[2] : 0;
			$terrible  = isset($totalRating[1]) ? $totalRating[1] : 0;
			?>
			</div>
			<div class="user-rating">
				<div class="rating-left">
					<span class="rate-title">Người dùng đánh giá</span>
				</div>
				<div class="rating-right">
					<span class="rate-title">Viết đánh giá</span>
				</div>
				<div class="rating-right2" style="float:left;color:#999;border-right:1px solid #DDD;">
					<div class="item">
						<div style="width:35%;float:left;">
							<span style="margin-left:10px;float: left;color: #218592;line-height:30px;">Xuất sắc</span>
						</div>
						<div style="float:left;width:65%;">
							<div class="barview">
								<div class="active" style="width:<?= ($excellent*120)/100 ?>px"></div>
							</div>
							<span style="margin-left:5px;line-height:30px;"><?= $excellent ?></span>
						</div>
						<div style="width:35%;float:left;">
							<span style="margin-left:10px;float: left;color: #218592;line-height:30px;">Rất tốt</span>
						</div>
						<div style="float:left;width:65%;">
							<div class="barview">
								<div class="active" style="width:<?= ($veryGood*120)/100 ?>px"></div>
							</div>
							<span style="margin-left:5px;line-height:30px;"><?= $veryGood ?></span>
						</div>
						<div style="width:35%;float:left;">
							<span style="margin-left:10px;float: left;color: #218592;line-height:30px;">Tạm được</span>
						</div>
						<div style="float:left;width:65%;">
							<div class="barview">
								<div class="active" style="width:<?= ($average*120)/100 ?>px"></div>
							</div>
							<span style="margin-left:5px;line-height:30px;"><?= $average ?></span>
						</div>
						<div style="width:35%;float:left;">
							<span style="margin-left:10px;float: left;color: #218592;line-height:30px;">Kém</span>
						</div>
						<div style="float:left;width:65%;">
							<div class="barview">
								<div class="active" style="width:<?= ($poor*120)/100 ?>px"></div>
							</div>
							<span style="margin-left:5px;line-height:30px;"><?= $poor ?></span>
						</div>
						<div style="width:35%;float:left;">
							<span style="margin-left:10px;float: left;color: #218592;line-height:30px;">Quá tồi</span>
						</div>
						<div style="float:left;width:65%;">
							<div class="barview">
								<div class="active" style="width:<?= ($terrible*120)/100 ?>px"></div>
							</div>
							<span style="margin-left:5px;line-height:30px;"><?= $terrible ?></span>
						</div>
					</div>
				</div>
				<div class="detail-ques-reviews" style="width:260px;float:left;color:#999;padding:20px 0px 0px 20px">
					Bạn có muốn đánh giá cho sản phẩm này không?
					<a class="review" style="margin-top:10px">Viết đánh giá</a>
				 </div>
			</div>
			<div class="reviews-list">
				<?php use yii\web\IdentityInterface; ?>
				<?= $this->render('list-comment',['listComment' => $listComment]);?>
			</div>
			<div class="review-form">
				<div class="review-form-title">
					<span style="margin-left:10px;line-height:35px;">Đánh Giá Phần Mềm</span>
				</div>
				<div class="review-form-body">
					<div class="errors red err-icon" style="display:none;margin-bottom:10px"></div>
					<form method="post" action="javascript:void(0)">
						<div class="form-items">
							<label>Tên của bạn <span class="red">*</span></label> <input type="text" name="name" size="40" maxlength="50" />
						</div>
						<div class="form-items">
							<label>Địa chỉ email <span class="red">*</span></label> <input type="text" name="email" size="40" maxlength="50" />
						</div>
						<div class="form-items">
							<label>Tiêu đề <span class="red">*</span></label> <input type="text" name="title" size="40" maxlength="150" />
						</div>
						<div class="form-items">
							<label>Viết đánh giá <span class="red">*</span></label> <textarea name="review" cols="50" rows="5"></textarea>
						</div>
						<div class="form-items" style="padding:0px">
							<label class="width100-mobile">&nbsp;</label>
							Bạn muốn đánh giá phần mềm này mấy sao?
						</div>
						<div class="form-items" style="padding:0px">
							<label>&nbsp;</label>
							<div class="stars" style="float:left">
								<input type="hidden" id="number-star" value="0" />
								<input type="hidden" name="post_id" value="<?= $model->id ?>" />
								<div class="star-gray review-star">
									<div class="star-button">
										<span role="1"></span>
										<span role="2"></span>
										<span role="3"></span>
										<span role="4"></span>
										<span role="5"></span>
									</div>
									<div class="star-active" style="width:48px"></div>
								</div>
								<div class="cls"></div>
							</div>
							<div class="review-star-title"></div>
							<div class="cls"></div>
						</div>
						<div class="form-items" style="text-align: center">
							<input type="submit" name="send" value="Gửi đánh giá" />
						</div>
					</form>
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
                'title' => 'Phần mềm phổ biến'
            ]);
            ?>
        </div>
        <div id="ads-two" style="height:30px">
            <!--img src="<?= Yii::$app->request->baseUrl; ?>img/adsense-300x250-01.gif" width="300" /-->
        </div>
	</div>
	<div class="cls"></div>
</div>
</div>
<style type="text/css">
#downloadbar{border-bottom:1px solid #f9f9f9;background:#666;width:100%;height:60px;position:fixed;bottom:0;left:0;box-shadow:3 3px 0px #ccc;padding-top:6px}
#download-menu{width:1052px;margin:0px auto}
#download-menu a{float:left;margin-right: 10px}
.downloadbar-title{font-size: 18px;font-weight: 700;margin-top: 15px;width: 550px;color:#FFF}
#download-menu a.download:hover{
    color: #fff;
    background: -webkit-gradient(linear,left top,left bottom,from(#f00),to(#f00));
}
</style>
<script type="text/javascript">
$(window).scroll(function (){
    var windowTop = $(window).scrollTop();
    if(windowTop > 300){
        $('#downloadbar').removeClass('hide');
        $('#footer-desktop .grey-top').css('background-color','#fff');
    }else{
        $('#downloadbar').addClass('hide');
        $('#footer-desktop .grey-top').css('background-color','#96322d');
    }
});
</script>
<div id="downloadbar" class="hide">
    <div id="download-menu">
        <a href="<?= Yii::$app->request->baseUrl.'download-option/'.$model->rewrite; ?>.html" class="download" style="font-size:18px">Tải Về</a>
        <div style="padding-top:17px">
            <h3 class="downloadbar-title">Tải <?= $model->title ?> <em> <?= $model->version ?></em></h3>
        </div>
    </div>
</div>
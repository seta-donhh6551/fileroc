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
<div id="left-all">
	<?= $this->render('//layouts/navigator', ['navigator' => $navigator]); ?>
	<div id="short-info">
		<?= $model->short_intro ?>
	</div>
	<div id="download-option">
		<div class="download-now">
			<h1>Download <?= $model->title ?></h1>
			<div class="down-left">
				<a href="<?= Yii::$app->request->baseUrl.'download-option/'.$model->rewrite; ?>.html" class="download">Download</a>
			</div>
			<div class="down-right">
				<h2>Find <?= $model->title ?> on</h2>
				<a href="#"><img src="<?= Yii::getAlias('@web') ?>/uploads/icons/mac-os.png" /> Mac</a>
				<a href="#"><img src="<?= Yii::getAlias('@web') ?>/uploads/icons/android.png" /> Android</a>
				<a href="#"><img src="<?= Yii::getAlias('@web') ?>/uploads/icons/mac-os.png" /> iOs</a>
			</div>
			<div class="cls"></div>
		</div>
		<div class="cls"></div>
		<div style="width: 363px; float: left">
			<table cellpadding="0">
				<tr>
					<td>Publisher</td>
					<td class="even"><b><?php if($model->author_url){ echo '<a href="'.$model->author_url.'" target="_blank">'.$model->author.'</a>'; }else{ echo $model->author; } ?></b></td>
				</tr>
				<tr>
					<td>Version</td>
					<td class="even"><?= $model->version ?></td>
				</tr>
				<tr>
					<td>Voted</td>
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
					<td>License</td>
					<td class="even"><span class="<?= $model->type == 1 ? 'trial' : 'free' ?>"></span></td>
				</tr>
				<?php if($model->type == 1 && $model->time_limit != null){ ?>
				<tr>
					<td>Time limit</td>
					<td><?= $model->time_limit ?></td>
				</tr>
				<?php } ?>
				<tr>
					<td>File size</td>
					<td class="even"><?= $model->filesize ?> Mb</td>
				</tr>
				<tr>
					<td>Date Added</td>
					<td class="even"><?= date('F. j, Y', strtotime($model->creat_date)); ?></td>
				</tr>
				<tr>
					<td>Update date</td>
					<td class="even"><?= date('F. j, Y', strtotime($model->update_date)); ?></td>
				</tr>
				<tr>
					<td>Os required</td>
					<td class="even"><?= $model->required ?></td>
				</tr>
			</table>
		</div>
		<div style="width: 250px; float: left; margin-left: 15px; padding-top: 40px; text-align: center">
			<img src="<?= Yii::getAlias('@web') ?>/uploads/<?= $model->thumb ?>" alt="<?= $model->title ?>" width="150"/>
			<p><?= $model->short_info ?></p>
		</div>
		<div class="cls"></div>
	</div>
	<div id="download-detail">
		<div class="detail-intro padbot">
			<h2>Introduction</h2>
			<div class="intro-content">
				<?= $model->info ?>
			</div>
		</div>
		<div class="detail-content">
			<h2>Main functions</h2>
			<div class="full-content">
				<?= $model->info_function ?>
			</div>
		</div>
		<?php if($model->url_video){ ?>
		<div class="detail-video">
			<h2>Video instruction</h2>
			<div class="video-content">
				<iframe width="600" height="350" src="<?= $model->url_video ?>" frameborder="0" allowfullscreen></iframe>
			</div>
		</div>
		<?php } ?>
		<div class="manual" style="margin-top:30px">
			<h2>Manual</h2>
			<div class="full-content">
				<?= $model->fullcontent ?>
			</div>
		</div>
	</div>
	<div id="reviews">
		<h2>Reviews</h2>
		<div class="rating-title martop">
		<?= count($listComment); ?> review(s) from our community
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
				<span class="rate-title">User Rating</span>
			</div>
			<div class="rating-right">
				<span class="rate-title">Write review</span>
			</div>
			<div style="width:300px;float:left;color:#999;border-right:1px solid #DDD;">
				<div class="item">
					<div style="width:25%;float:left;">
						<span style="margin-left:10px;float: left;color: #218592;line-height:30px;">Excellent</span>
					</div>
					<div style="float:left;width:75%;">
						<div class="barview">
							<div class="active" style="width:<?= ($excellent*120)/100 ?>px"></div>
						</div>
						<span style="margin-left:5px;line-height:30px;"><?= $excellent ?></span>
					</div>
					<div style="width:25%;float:left;">
						<span style="margin-left:10px;float: left;color: #218592;line-height:30px;">Very good</span>
					</div>
					<div style="float:left;width:75%;">
						<div class="barview">
							<div class="active" style="width:<?= ($veryGood*120)/100 ?>px"></div>
						</div>
						<span style="margin-left:5px;line-height:30px;"><?= $veryGood ?></span>
					</div>
					<div style="width:25%;float:left;">
						<span style="margin-left:10px;float: left;color: #218592;line-height:30px;">Average</span>
					</div>
					<div style="float:left;width:75%;">
						<div class="barview">
							<div class="active" style="width:<?= ($average*120)/100 ?>px"></div>
						</div>
						<span style="margin-left:5px;line-height:30px;"><?= $average ?></span>
					</div>
					<div style="width:25%;float:left;">
						<span style="margin-left:10px;float: left;color: #218592;line-height:30px;">Poor</span>
					</div>
					<div style="float:left;width:75%;">
						<div class="barview">
							<div class="active" style="width:<?= ($poor*120)/100 ?>px"></div>
						</div>
						<span style="margin-left:5px;line-height:30px;"><?= $poor ?></span>
					</div>
					<div style="width:25%;float:left;">
						<span style="margin-left:10px;float: left;color: #218592;line-height:30px;">Terrible</span>
					</div>
					<div style="float:left;width:75%;">
						<div class="barview">
							<div class="active" style="width:<?= ($terrible*120)/100 ?>px"></div>
						</div>
						<span style="margin-left:5px;line-height:30px;"><?= $terrible ?></span>
					</div>
				</div>
			</div>
			<div style="width:260px;float:left;color:#999;padding:20px 0px 0px 20px">
				Write your review, How would you rate this software?
				<a class="review">Write review</a>
			 </div>
		</div>
		<div class="reviews-list">
			<?php use yii\web\IdentityInterface; ?>
			<?= $this->render('list-comment',['listComment' => $listComment]);?>
		</div>
		<div class="review-form">
			<div class="review-form-title">
				<span style="margin-left:10px;line-height:35px;">Leave your comments</span>
			</div>
			<div class="review-form-body">
				<script type="text/javascript" src="<?= Yii::$app->request->baseUrl; ?>js/vote.js"></script>
				<div class="errors red err-icon" style="display:none;margin-bottom:10px"></div>
				<form method="post" action="javascript:void(0)">
					<div class="form-items">
						<label>Your name <span class="red">*</span></label> <input type="text" name="name" size="40" maxlength="50" />
					</div>
					<div class="form-items">
						<label>Your email <span class="red">*</span></label> <input type="text" name="email" size="40" maxlength="50" />
					</div>
					<div class="form-items">
						<label>Title <span class="red">*</span></label> <input type="text" name="title" size="40" maxlength="150" />
					</div>
					<div class="form-items">
						<label>Your review <span class="red">*</span></label> <textarea name="review" cols="50" rows="5"></textarea>
					</div>
					<div class="form-items" style="padding:0px">
						<label>&nbsp;</label>
						How would you rate this software?
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
								<div class="star-active" style="width:48px;"></div>
							</div>
							<div class="cls"></div>
						</div>
						<div class="review-star-title"></div>
						<div class="cls"></div>
					</div>
					<div class="form-items" style="text-align: center">
						<input type="submit" name="send" value="Send review" />
					</div>
				</form>
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
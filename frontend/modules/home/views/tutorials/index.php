<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$navigator = [
	[
		'url' => false,
		'title' => 'Thủ thuật phần mềm'
	]
];
?>
<link href="<?= Yii::$app->request->baseUrl; ?>css/detail.css" rel="stylesheet" type="text/css" />
<div id="content-main" class="nopadding" style="margin-top:10px">
	<div id="tutorial-menu">
		<div id="content_left_menu">
			<div id="left_menu_top">
				<h2>HƯỚNG DẪN</h2>
			</div>
			<div id="left_menu_mid">
				<ul>
					<li><a href="http://phpandmysql.net/html-css.html" title="Html Css">Html Css</a></li>
					<li><a href="http://phpandmysql.net/javascript-jquery.html" title="Javascript &amp; jQuery">Javascript &amp; jQuery</a></li>
					<li><a href="http://phpandmysql.net/php-can-ban.html" title="PHP Căn bản">PHP Căn bản</a></li>
					<li><a href="http://phpandmysql.net/php-nang-cao.html" title="PHP Nâng cao">PHP Nâng cao</a></li>
					<li><a href="http://phpandmysql.net/php-training.html" title="PHP Training">PHP Training</a></li>
					<li><a href="http://phpandmysql.net/yii2-framework.html" title="Yii2 Framework">Yii2 Framework</a></li>
					<li><a href="http://phpandmysql.net/codeigniter-framework.html" title="Codeigniter Framework">Codeigniter Framework</a></li>
				</ul>
				<div class="cls"></div>
			</div>
			<div id="left_menu_bot"></div>
		</div>
	</div>
	<div id="tutorial-content">
		 <?= $this->render('//layouts/navigator', ['navigator' => $navigator]); ?>
	</div>
	<div id="tutorial-right">
		<img src="<?= Yii::$app->request->baseUrl; ?>img/adsense-250x250-en.png"/>
	</div>
	<div class="cls"></div>
</div>
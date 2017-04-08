<div id="scroll-left">
	<div id="content_left_menu">
		<div id="left_menu_top">
			<h2>HƯỚNG DẪN</h2>
		</div>
		<div id="left_menu_mid">
			<ul>
				<?php if (isset($listCategory)) { ?>
					<?php foreach ($listCategory as $categoryTuto) { ?>
						<li><a href="<?= Yii::$app->request->baseUrl.'thu-thuat/'.$categoryTuto['rewrite']; ?>.html" title="<?= $categoryTuto['name']; ?>"><?= $categoryTuto['name']; ?></a></li>
					<?php }
				} ?>
			</ul>
			<div class="cls"></div>
		</div>
		<div id="left_menu_bot"></div>
	</div>
	<div id="ads-left">
		<img src="<?= Yii::$app->request->baseUrl; ?>img/google-adsense-200x200.png" width="190" />
	</div>
    <div style="margin-top:10px">
        <img src="<?= Yii::$app->request->baseUrl; ?>img/200x200.jpg" width="190" />
    </div>
</div>
<div id="ads-two" style="height:30px">
	<!--img src="/img/adsense-300x250-01.gif" width="300" /-->
</div>
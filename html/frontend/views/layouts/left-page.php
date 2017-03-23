<div id="left-page">
	<div id="leftnav">
		<div class="h">
			<h1><a href="<?= Yii::$app->request->baseUrl.$listCate['rewrite']; ?>.html" title="<?= $listCate['titleMenu'] ?>" class="left-menu"><?= $listCate['titleMenu'] ?> Software</a></h1>
		</div>
		<div class="c">
			<ul class="leftnavmenu">
				<?php if(isset($listCate)){ ?>
				<?php foreach($listCate['listMenu'] as $leftMenu){ ?>
				<li class="mnu-item">
					<a href="<?= Yii::$app->request->baseUrl.$listCate['rewrite'].'/'.$leftMenu['rewrite']; ?>.html" title="<?= $leftMenu['name']; ?>"><?php if($leftMenu['icon']){ ?><img src="<?= Yii::$app->request->baseUrl.'uploads/icons/'.$leftMenu['icon']; ?>" alt="<?= $leftMenu['name']; ?>" /><?php } ?><span class="menu-text"><?= $leftMenu['name']; ?></span><span class="menu-icon"></span></a>
					<?php if(isset($leftMenu['listChildMenu']) && $leftMenu['listChildMenu'] != null){ ?>
					<ul class="leftsubnavmenu">
					<?php foreach($leftMenu['listChildMenu'] as $leftChildMenu){ ?>
						<li><a href="<?= Yii::$app->request->baseUrl.$listCate['rewrite'].'/'.$leftMenu['rewrite'].'/'.$leftChildMenu['rewrite']; ?>.html" title="<?= $leftChildMenu['name'] ?>"><?php if($leftChildMenu['icon']){ ?><img src="<?= Yii::$app->request->baseUrl.'uploads/icons/'.$leftChildMenu['icon']; ?>" alt="<?= $leftMenu['name']; ?>" /><?php } ?><?= $leftChildMenu['name'] ?></a></li>
					<?php } ?>
					</ul>
					<?php } ?>
				</li>
				<?php } } ?>
			</ul>
		</div>
	</div>
</div>
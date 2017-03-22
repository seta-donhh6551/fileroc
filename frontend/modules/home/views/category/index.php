<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$navigator = [
	[
		'url' => Yii::getAlias('@web').'/'.$infoCate['rewrite'],
		'title' => $infoCate['name']
	]
];
if(isset($infoSubCate)){
	$navigator[] = ['url' => Yii::getAlias('@web').'/'.$infoCate['rewrite'].'/'.$infoSubCate['rewrite'],'title' => $infoSubCate['name']];
	$navigator[] = [
		'url' => Yii::getAlias('@web').'/'.$infoCate['rewrite'].'/'.$infoSubCate['rewrite'].'/'.$model->rewrite,
		'title' => $model->name
	];

}else{
	$navigator[] = ['url' => Yii::getAlias('@web').'/'.$infoCate['rewrite'].'/'.$subCategory['rewrite'],'title' => $subCategory['titleMenu']];
}
?>
<div class="content-wrapper">
    <div id="content-main" class="nopadding ">
       <div id="sidebar-left" class="category-page-box-fix">
          <ol id="category-navigation">
             <li class="highlighted category-level-1">
                <h3><a class="internal-link" href="<?= Yii::$app->request->baseUrl.$infoCate->rewrite.'/'.$model->rewrite; ?>.html" title="<?= $model->name; ?>"><?= $model->name; ?></a></h3>
             </li>
             <?php if(isset($listChilds) && $listChilds != null){ ?>
             <?php foreach($listChilds as $childItem){ ?>
             <li class="category-level-2">
                <a class="internal-link" href="<?= Yii::$app->request->baseUrl.$infoCate['rewrite'].'/'.$subCategory['rewrite'].'/'.$childItem['rewrite']; ?>.html" title="<?= $childItem['name'] ?>"><?= $childItem['name'] ?></a>
             </li>
             <?php } } ?>
          </ol>
          <div class="hidden-sm hidden-xs">
             <ul id="category-popular-software">
                <li>Popular software</li>
				<?php if(isset($listPopular) && $listPopular){ ?>
				<?php foreach($listPopular as $popular){ ?>
                <li>
                   <a class="internal-link" href="<?= Yii::$app->request->baseUrl.'download/'.$popular['rewrite']; ?>.html" title="<?= $popular['title']; ?>">
                   <img src="http://cache.filehippo.com/img/ex/5063t__folder_lock_icon.png"/><?= $popular['title']; ?></a>
                </li>
				<?php } } ?>
             </ul>
          </div>
          <div id="ad-slot-4" class="hidden-xs">
             <!-- Categories_Security_skyscraper -->
             <!--dfp_skyscraper -->
             <div class="ad-unit-label" style="color: #869aab;font-size: 11px;margin-bottom: 2px;">Advertisement</div>
             <div id='div-gpt-ad-1384762460430-934a43e13eb4400186a6ebc8285dd946' style=''>
                <img src="<?= Yii::$app->request->baseUrl; ?>img/adsense-160x600.jpg" width="160" />
             </div>
          </div>
       </div>
       <div id="category-header">
          <?= $this->render('//layouts/navigator', ['navigator' => $navigator]); ?>
          <div class="category-breadcrumbs">
             <div class="category-breadcrumb-entry">
                <h1><?= $model->name; ?></h1>
             </div>
          </div>
          <div class="short-info">
             <?= $model->info; ?>
          </div>
       </div>
       <div id="main-column">
          <div class="adsense-words">
             <div id="afs_div_container-0">
                <!-- <script async="async" src="https://www.google.com/adsense/search/ads.js"></script>
                <script type="text/javascript" charset="utf-8">
                   (function(g,o){g[o]=g[o]||function(){(g[o]['q']=g[o]['q']||[]).push(
                   arguments)},g[o]['t']=1*new Date})(window,'_googCsa');
                </script> -->
             </div>
             <!--AFS A-->

          </div>
          <div id="programs-list">
             <?php if(isset($listPost)){ ?>
             <?php foreach($listPost as $postItem){ ?>
             <div class="program-entry">
                <div class="program-entry-header">
                   <a href="<?= Yii::$app->request->baseUrl.'download/'.$postItem['rewrite']; ?>.html" title="<?= $postItem['title'] ?>" class="internal-link">
                      <img src="<?= Yii::getAlias('@web') ?>/uploads/thumb/<?= $postItem['thumb'] ?>" alt="Download <?= $postItem['title'] ?>" />
                      <span class="program-title-text">
                         <h3><?= $postItem['title'] ?></h3>
                      </span>
                   </a>
                </div>
                <div class="program-entry-download-button category-page-box-fix">
                   <a href="<?= Yii::$app->request->baseUrl.'download/'.$postItem['rewrite']; ?>.html" class="green program-entry-download-link button-link">
                   <span class="sprite download-icon-white"></span>Download</a>
                </div>
                <div class="program-entry-details"><?= $postItem['author'] ?> - <?= $postItem['filesize'] ?>MB - <span class="<?= $postItem['type'] == 1 ? 'trial' : 'free' ?>">License </span></div>
                <div class="program-entry-description">
                    <?= $postItem['short_intro'] ?>
                </div>
                <ul class="child-programs">
                </ul>
             </div>
             <?php } } ?>
          </div>
          <div class="adsense-words">
             <div id="afs_div_container-1">
                <script async="async" src="https://www.google.com/adsense/search/ads.js"></script>
                <script type="text/javascript" charset="utf-8">
                   (function(g,o){g[o]=g[o]||function(){(g[o]['q']=g[o]['q']||[]).push(
                   arguments)},g[o]['t']=1*new Date})(window,'_googCsa');
                </script>
             </div>
          </div>
          <div class="pager-container"> 
			 <?php echo \yii\widgets\LinkPager::widget([
				'pagination' => $pages,
			 ]); ?>   
          </div>
       </div>
       <div id="sidebar-right" class="hidden-sm hidden-xs">
          <div id="ad-slot-2">
             <!-- Categories_Security_Top_MPU -->
             <!--dfp_topMpu -->
             <div class="ad-unit-label" style="color: #869aab;font-size: 11px;margin-bottom: 2px;">Advertisement</div>
             <div id='div-gpt-ad-1384762460430-922df1082d0048deb70a07ef4e1e443f' style=''>
                <img src="<?= Yii::$app->request->baseUrl; ?>img/ads-google-300.jpg" width="300" />
             </div>
          </div>
          <div id="techbeat-widget">
             <header><a href="#" target="_blank">Bài Viết Hướng Dẫn & Thủ Thuật Mới</a></header>
             <?php if(isset($listTutorials)){ ?>
             <?php foreach($listTutorials as $tutorials){ ?>
             <div class="tb_postItem">
                 <div class="tb_postImage">
                     <a rel="bookmark" href="<?= Yii::$app->request->baseUrl.$tutorials['rewrite']; ?>.html" title="<?= $tutorials['title']; ?>">
                         <img src="<?= Yii::$app->request->baseUrl.'uploads/thumb/'.$tutorials['thumb']; ?>" alt="<?= $tutorials['title']; ?>" />
                     </a>
                 </div>
                <div class="tb_postTitle">
                    <a rel="bookmark" href="<?= Yii::$app->request->baseUrl.$tutorials['rewrite']; ?>.html"><?= $tutorials['title']; ?></a>
                </div>
             </div>
             <?php } } ?>
          </div>
          <div id="ad-slot-3">
             <!-- Categories_Security_Bottom_MPU -->
             <!--dfp_bottomMpu -->
             <div class="ad-unit-label" style="color: #869aab;font-size: 11px;margin-bottom: 2px;">Advertisement</div>
             <div id='div-gpt-ad-1384762460430-dd0ef69811094147b6cb26aedb86de52' style=''>
                <img src="<?= Yii::$app->request->baseUrl; ?>img/mobile-leaderboard.png" width="300" />
             </div>
          </div>
       </div>
    </div>
 </div>
<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
		<?php $infoConfig = Yii::$app->controller->infoConfig; ?>
        <link rel="shortcut icon" href="<?= Yii::$app->request->baseUrl; ?>favicon.ico" />
		<meta name="keywords" content="<?= $infoConfig['keywords'] ?>" />
		<meta name="description" content="<?= $infoConfig['description'] ?>" />
        <meta property="fb:admins" content="100003239486888"/>
        <!-- stylesheet -->
        <link href="<?= Yii::$app->request->baseUrl; ?>css/style.css" rel="stylesheet" type="text/css">

        <!-- jQuery -->
        <script type="text/javascript" src="<?= Yii::$app->request->baseUrl; ?>js/jquery-1.11.3.min.js"></script>
		<script type="text/javascript" src="<?= Yii::$app->request->baseUrl; ?>js/utility.js"></script>
		<script type="text/javascript" src="<?= Yii::$app->request->baseUrl; ?>js/scroll.js"></script>
        <script type="text/javascript">
            document.write('<div id="fb-root"></div>');
            (function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) return;
              js = d.createElement(s); js.id = id;
              js.src = "//connect.facebook.net/vi_VN/all.js#xfbml=1&appId=1592895507593753&version=v2.0";
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
    </head>
    <body>
		<div id="container">
        <?= $this->render('//partials/header'); ?>
        <div id="content">
        <?= $content ?>
		</div>
        <?= $this->render('//partials/footer'); ?>
		</div>
    </body>
</html>
<?php $this->endPage() ?>
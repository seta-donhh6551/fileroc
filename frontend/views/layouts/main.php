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
<html lang="vi">
    <head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
		<?php $infoConfig = Yii::$app->controller->infoConfig; ?>
        <link rel="shortcut icon" href="<?= Yii::$app->request->baseUrl; ?>favicon.ico" />
		<meta name="keywords" content="<?= $infoConfig['keywords'] ?>" />
		<meta name="description" content="<?= $infoConfig['description'] ?>" />
        <meta property="fb:admins" content="100003239486888"/>
        
        <!-- stylesheet -->
        <link href="<?= Yii::$app->request->baseUrl; ?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= Yii::$app->request->baseUrl; ?>css/jquery-ui.min.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
        
        <link href="<?= Yii::$app->request->baseUrl; ?>css/main.css" rel="stylesheet" type="text/css" />
        <link href="<?= Yii::$app->request->baseUrl; ?>css/home.css" rel="stylesheet" type="text/css" />
        <link href="<?= Yii::$app->request->baseUrl; ?>fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        
        <!--[if lt IE 9]>
        <link rel="stylesheet" type="text/css" href="<?= Yii::$app->request->baseUrl; ?>css/IE8.css?v1" />
        <![endif]-->
        <!--[if gte IE 9]>
        <style type="text/css">
           .gradient {filter: none;}
        </style>
        <![endif]-->

        <!-- jQuery -->
        <script type="text/javascript" src="<?= Yii::$app->request->baseUrl; ?>js/px.js"></script>
        <script>(function(w,d,u){w.readyQ=[];w.bindReadyQ=[];function p(x,y){if(x=="ready"){w.bindReadyQ.push(y);}else{w.readyQ.push(x);}};var a={ready:p,bind:p};w.$=w.jQuery=function(f){if(f===d||f===u){return a}else{p(f)}}})(window,document)</script>
    </head>
    
    <body class="en">
        <?= $this->render('//partials/header'); ?>
        <div class="content-wrapper">
        <?= $content ?>
		</div>
        <?= $this->render('//partials/footer'); ?>
    </body>
</html>
<?php $this->endPage() ?>
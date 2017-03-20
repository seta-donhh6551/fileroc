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
        <link rel="stylesheet" type="text/css" href="http://cache.filehippo.com/inc/IE8.css?v1" />
        <![endif]-->
        <!--[if gte IE 9]>
        <style type="text/css">
           .gradient {filter: none;}
        </style>
        <![endif]-->

        <!-- jQuery -->
        <script type="text/javascript" src="<?= Yii::$app->request->baseUrl; ?>js/px.js"></script>
    </head>
    
    <body class="en">
        <?= $this->render('//partials/header'); ?>
        <?= $content ?>
        <?= $this->render('//partials/footer'); ?>
    </body>
</html>
<?php $this->endPage() ?>
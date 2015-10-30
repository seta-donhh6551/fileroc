<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;
use yii\widgets\ActiveForm;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
<?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>

        <!-- stylesheet -->
        <link href="<?= Yii::$app->request->baseUrl; ?>/css/normalize.css" rel="stylesheet" type="text/css">
        <link href="<?= Yii::$app->request->baseUrl; ?>/css/svg.css" rel="stylesheet" type="text/css">
        <link href="<?= Yii::$app->request->baseUrl; ?>/css/common.css" rel="stylesheet" type="text/css">
        <link href="<?= Yii::$app->request->baseUrl; ?>/css/login.css" rel="stylesheet" type="text/css">

        <!-- jQuery -->
        <script type="text/javascript" src="<?= Yii::$app->request->baseUrl; ?>/js/jquery-1.9.1.min.js"></script>
    </head>
    <body id="login">
        <!-- ============================== システムヘッダー[start] ============================== -->   
        <div id="sys_header">
            <p class="sys">Phiten IP Salon 予約管理システム</p>
        </div><!-- /#sys_header -->
        <!-- ============================== システムヘッダー[end] ============================== -->
<?= $content; ?>
    </body>
</html>
<?php $this->endPage() ?>
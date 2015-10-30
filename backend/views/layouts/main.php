<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>

        <!-- stylesheet -->
        <link href="<?= Yii::$app->request->baseUrl; ?>/css/admin.css" rel="stylesheet" type="text/css">
        <link href="<?= Yii::$app->request->baseUrl; ?>/css/admin-white.css" rel="stylesheet" type="text/css">
        <link href="<?= Yii::$app->request->baseUrl; ?>/css/styles.css" rel="stylesheet" type="text/css">
        
        <!-- jQuery -->
        <script type="text/javascript" src="<?= Yii::$app->request->baseUrl; ?>/js/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="<?= Yii::$app->request->baseUrl; ?>/js/cufon-yui.js"></script>
        <script type="text/javascript" src="<?= Yii::$app->request->baseUrl; ?>/js/UTM_Facebook_KT_400.font.js"></script>
        <script type="text/javascript" src="<?= Yii::$app->request->baseUrl; ?>/js/behaviour.js"></script>
        <script type="text/javascript">
            Cufon.replace('h2.menu_title');
        </script>        
        <script type="text/javascript">
            $(document).ready(function () {
                var $tab = $("ul.table_tabs li a");
                $obj = $(".table_wrapper_inner");
                $tab.click(function () {
                    $item = $(this).attr("name");
                    if ($item != "") {
                        $(".selected").removeClass("selected");
                        $(this).addClass("selected");
                        $obj.hide();
                        $("#" + $item).show();
                        return false;
                    } else {
                        return true;
                    }
                });
            });
        </script>
    </head>
    <body>
        <div id="wrapper">
            <?= $this->render('//partials/header'); ?>
            <div id="content">		
                <div class="inner">
                    <?= $content ?>
                </div>
            </div>
        </div>
        <?= $this->render('//partials/footer'); ?>
    </body>
</html>
<?php $this->endPage() ?>
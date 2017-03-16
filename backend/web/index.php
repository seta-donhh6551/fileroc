<?php

header('Content-Type: text/html; charset=utf-8');
//1. Nhung tap tin FCKeditor vao file chay
include('fckeditor/fckeditor.php');
//2. Dinh nghia duong dan BasePath cho FCK
$sRoot = "http://".$_SERVER['HTTP_HOST'];
$sDomain = str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
$folderFCK = 'fckeditor/';
define('sBASEPATH', $sRoot.$sDomain.$folderFCK);

defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require(__DIR__ . '/../../vendor/autoload.php');
require(__DIR__ . '/../../vendor/yiisoft/yii2/Yii.php');
require(__DIR__ . '/../../common/config/bootstrap.php');
require(__DIR__ . '/../config/bootstrap.php');

$config = yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/../../common/config/main.php'),
    require(__DIR__ . '/../../common/config/main-local.php'),
    require(__DIR__ . '/../config/main.php'),
    require(__DIR__ . '/../config/main-local.php')
);

(new yii\web\Application($config))->run();


<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;
use common\components\Utility;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);

$this->title = Yii::t('app', 'title salon preset');
$salonOpenFormModel->hourOpen = date('H', strtotime($openDatetime));
$salonOpenFormModel->minuteOpen = date('i', strtotime($openDatetime));
$salonOpenFormModel->hourClose = date('H', strtotime($closeDatetime));
$salonOpenFormModel->minuteClose = date('i', strtotime($closeDatetime));
?>

<?php if (!$hasError): //close window  ?>
    <script>
        window.close();
        window.opener.location.href = window.opener.document.URL;
    </script>
<?php endif; ?>

<?php $this->beginPage() ?>
<!doctype html>
<html lang="ja">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= Html::encode($this->title) ?></title>

        <!-- stylesheet -->
        <link href="<?= Yii::$app->request->baseUrl; ?>/css/normalize.css" rel="stylesheet" type="text/css">
        <link href="<?= Yii::$app->request->baseUrl; ?>/css/common.css" rel="stylesheet" type="text/css">
        <link href="<?= Yii::$app->request->baseUrl; ?>/css/salon.css" rel="stylesheet" type="text/css">

        <!-- jQuery -->
        <script type="text/javascript" src="<?= Yii::$app->request->baseUrl; ?>/js/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="<?= Yii::$app->request->baseUrl; ?>/js/common.js"></script>

        <!--[if lt IE 9]>
            <script src="<?= Yii::$app->request->baseUrl; ?>/js/html5shiv.js" ></script>
        <![endif]-->

    </head>

    <body id="preset">

        <h1><?= date('Y年m月d日', strtotime($salonDate)); ?></h1>
        <h2><営業時間の編集></h2>

        <?= Html::beginForm(Url::to(['/salon/salon/preset/', 'salonId' => $salonId, 'salonDate' => $salonDate]), 'post', []) ?>
        <?php $err = $salonOpenFormModel->getErrors(); ?>
        <?php if ($err): ?>
            <div class="errorBox">
                <ul>
                    <?php foreach ($err as $key => $value): ?>
                        <li><?php echo $value[0] ?></li>
                    <?php endforeach; ?>
                </ul>
            </div><!-- /.erroBox -->
        <?php endif; ?>

        <table>
            <tr>
                <th>営業時間</th>
                <td>
                    <ul class="open">
                        <li>
                            <?= Html::activeListBox($salonOpenFormModel, 'hourOpen', Utility::getArrHour(array('key' => '00', 'value' => '00時')), ['size' => false]) ?>
                        </li>
                        <li>
                            <?= Html::activeListBox($salonOpenFormModel, 'minuteOpen', Utility::getArrMinuteStep(array()), ['size' => false]) ?>
                        </li>
                    </ul><p>〜&nbsp;</p>
                    <ul class="close">
                        <li>
                            <?= Html::activeListBox($salonOpenFormModel, 'hourClose', Utility::getArrHour(array('key' => '00', 'value' => '00時')), ['size' => false]) ?>
                        </li>
                        <li>
                            <?= Html::activeListBox($salonOpenFormModel, 'minuteClose', Utility::getArrMinuteStep(array()), ['size' => false]) ?>
                        </li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td class="button" colspan="2">
                    <!-- 設定ボタン -->
                    <input type="button" name="pos" value="閉じる" class="button_small gray" onclick="window:top.close()">
                    <input type="submit" name="pos" value="設定する" class="button_small blue" onclick="">
                </td>
            </tr>
        </table>

        <?= Html::endForm() ?>

    </body>
</html>
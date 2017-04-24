<?php

    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use yii\helpers\Url;
    //set title
    Yii::$app->view->title = 'Phiten IP Salon 予約管理システム｜会員管理｜知多 利雄｜会員情報等変更';
    //set Breadcrumbs
    Yii::$app->params['links'] = [
        [
            'label' => 'サロン設定',
            'url' => FALSE,
        ],
    ];
?>
<div id="wrapper">

    <div id="left">

        <div class="title">
            <span class="icon-setting"></span><h2>サロン設定</h2>
        </div><!-- /.title -->

        <!-- ============================== 氏名[start] ============================== -->
        <div id="infoBox">
            <ul>
                <li class="name">設定が完了しました。</li>
                <li style="margin:0;padding:5px">
                    <?= Html::a('↑サロン設定TOPへ', Url::to(['/salon/salon/setting/', 'salonId' => $data['salon_id']])); ?>
                </li>
            </ul>
        </div><!-- /#infoBox -->
        <!-- ============================== 氏名[end] ============================== -->

    </div><!-- /#left -->

    <p class="scroll"><a href="#stop"><span class="icon-scroll"></span></a></p>

</div><!-- /#wrapper -->
<?php

    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use yii\helpers\Url;
     //set title
    Yii::$app->view->title = 'Phiten IP Salon 予約管理システム｜会員管理｜知多 利雄｜ユーザー情報編集';
    //set Breadcrumbs
    Yii::$app->params['links'] = [
        [
            'label' => '会員管理',
            'url' => ['/member/default/index/', 'salonId' => $salonId],
        ],
        [
            'label' => 'ユーザー情報編集',
            'url' => ['/member/member/edit', 'salonId' => $salonId, 'memberId' => $memberId],
        ],
        [
            'label' => '完了',
            'url' => false,
        ],
    ];
?>
<link href="<?= Yii::$app->request->baseUrl; ?>/css/user.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?= Yii::$app->request->baseUrl; ?>/js/member.js"></script>

<div id="user_detail">

    <div id="wrapper">

        <div id="left">

            <div class="title">
                <span class="icon-edit"></span><h2>ユーザー情報編集</h2>
            </div><!-- /.title -->

            <!-- ============================== 氏名[start] ============================== -->
            <div id="infoBox">
                <ul>
                    <li class="name">設定が完了しました。</li>
                    <li class="member" style="margin:0;padding:5px">
                        <?= Html::a('↑会員管理TOPへ', Url::to(['/member/member/edit', 'salonId' => $salonId, 'memberId' => $memberId])); ?>
                    </li>
                </ul> 
            </div><!-- /#infoBox -->
            <!-- ============================== 氏名[end] ============================== -->

        </div><!-- /#left -->

        <p class="scroll"><a href="#stop"><span class="icon-scroll"></span></a></p>

    </div><!-- /#wrapper -->

</div>


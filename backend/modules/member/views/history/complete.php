<?php
//set Breadcrumbs
Yii::$app->params['links'] = [
    [
        'label' => '会員管理',
        'url' => FALSE,
    ],
    [
        'label' => $User['user_name'],
        'url' => Yii::$app->homeUrl . 'member/user_detail/user_detail/' . $salonId . '/' . $memberId,
    ],
    [
        'label' => '会員情報等変更',
        'url' => FALSE
    ]
];

Yii::$app->view->title = 'Phiten IP Salon 予約管理システム｜会員管理｜' . $User['user_name'] . '｜会員情報等変更';
?>
<div id="wrapper">

    <div id="left">

        <div class="title">
            <span class="icon-edit"></span><h2>会員情報等変更</h2>
        </div><!-- /.title -->

        <!-- ============================== 氏名[start] ============================== -->
        <div id="infoBox">
            <ul>
                <li class="name">設定が完了しました。</li>
                <li class="member" style="margin:0;padding:5px"><a href="<?= Yii::$app->request->baseUrl . '/member/user_history/category_history/' . $salonId . '/' . $memberId; ?>">↑会員情報等変更TOPへ</a></li>
            </ul> 
        </div><!-- /#infoBox -->
        <!-- ============================== 氏名[end] ============================== -->

    </div><!-- /#left -->

    <p class="scroll"><a href="#stop"><span class="icon-scroll"></span></a></p>

</div><!-- /#wrapper -->
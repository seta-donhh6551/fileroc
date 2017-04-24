<?php

use yii\helpers\Html;
use yii\helpers\Url;

Yii::$app->view->title = Yii::t('app', 'title member user reservation salon complete');
Yii::$app->params['links'] = [
    [
        'label' => '会員管理',
        'url' => ['/member/default/index', 'salonId' => $salonId],
    ],
    [
        'label' => $infoBooking['user_name'],
        'url' => ['/member/default/detail', 'salonId' => $salonId, 'memberId' => $memberId],
    ],
    [
        'label' => 'サロン利用予約申込み｜完了',
        'url' => false,
    ],
];
?>
<div id="wrapper">

<div id="left">

<div class="title">
<span class="icon-edit"></span><h2>サロン利用予約申込み</h2>
</div><!-- /.title -->

<!-- ============================== 氏名[start] ============================== -->
<div id="infoBox">
<ul>
<li class="name">設定が完了しました。</li>
<li class="member" style="margin:0;padding:5px"><a href="<?= Url::to(['/member/default/detail', 'salonId' => $salonId, 'memberId' => $memberId]) ?>">↑会員管理TOPへ</a></li>
</ul>
</div><!-- /#infoBox -->
<!-- ============================== 氏名[end] ============================== -->

</div><!-- /#left -->

<p class="scroll"><a href="#stop"><span class="icon-scroll"></span></a></p>

</div><!-- /#wrapper -->
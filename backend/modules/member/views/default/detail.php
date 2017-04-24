<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\components\Utility;
//Set page title
Yii::$app->view->title = 'Phiten IP Salon 予約管理システム｜会員管理｜' . $data['user_name'];
//Set Breadcrumbs
Yii::$app->params['links'] = [
    [
        'label' => '会員管理',
        'url' => ['/member/default/index/', 'salonId' => $data['member_id']],
    ],
    [
        'label' => $data['user_name'],
        'url' => FALSE,
    ],
];
?>
<link href="<?= Yii::$app->request->baseUrl; ?>/css/user.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
    // アコーディオンメニュー
    $(function () {
        $(".toggle").click(function () {
            $(this).parents('table').children('tbody').toggle();
            $(this).toggleClass("active");
        });
    });
</script>
<div id="user_detail">
    <div id="wrapper">

        <div id="left">

            <div class="title">
                <span class="icon-group"></span><h2>会員管理</h2>
            </div><!-- /.title -->


            <!-- ============================== 氏名[start] ============================== -->
            <div id="infoBox">
                <ul>
                    <li class="name">ユーザー名：<?php echo $data['user_name']; ?></li>
                    <li class="button"><a href="<?php echo Yii::$app->urlManager->createUrl(['member/member/edit', 'salonId' => $data['salon_id'], 'memberId' => $data['member_id']]); ?>" class="pink">確認・変更</a></li>
                    <li class="member"><?php echo ($data['membertype_name']) ? $data['membertype_name'] : 'ビジター'; ?></li>
                    <li class="status"><?php echo date('n') . '月利用：' . $data['count_monthly'] . '回'; ?></li>
                    <li class="date">■<?php echo $data['system_date']; ?></li>
                    <?php 
                      if (isset($data['member_schedule_today'])):
                        foreach ($data['member_schedule_today'] as $item):
                              
                    ?>
                        <li class="sc_head"><?php echo date('H:i', strtotime($item['start_datetime'])); ?> ご来店予定</li>
                        <li class="sc_body"><?php echo $item['description']; ?></li>
                    <?php endforeach;endif; ?>
                </ul> 
            </div><!-- /#infoBox -->
            <!-- ============================== 氏名[end] ============================== -->




            <!-- ============================== 基本情報[start] ============================== -->
            <table>
                <thead>
                    <tr>
                        <th class="header" colspan="2"><span class="icon-member"></span><h2>基本情報（ID:<?php echo $data['member_id']; ?>）</h2><p class="toggle" title="表示/非表示">閉じる</p><a href="group.html" title="グループ" class="button_small_header blue">グループ</a></th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>お名前</th>
                        <td><?php echo $data['user_name']; ?></td>
                    </tr>
                    <tr>
                        <th>お名前カナ</th>
                        <td><?php echo $data['user_kana']; ?></td>
                    </tr>
                    <tr>
                        <th>電話番号</th>
                        <td><?php echo $data['user_tel']; ?></td>
                    </tr>
                    <tr>
                        <th>住所</th>
                        <td><?php echo $data['addr_1'].$data['addr_2'].$data['addr_3']; ?></td>
                    </tr>
                    <tr>
                        <th>メールアドレス</th>
                        <td><?php echo $data['user_email']; ?></td>
                    </tr>
                    <tr>
                        <th>性別</th>
                        <td><?php if ($data['gender'] == '1') { echo '<span class="icon-male"></span>男性'; } elseif ($data['gender'] == '2') { echo '<span class="icon-female"></span>女性'; } else echo '&nbsp;'; ?></td>
                    </tr>
                    <tr>
                        <th>生年月日</th>
                        <td><?php echo $data['birthday'] . '（' . Utility::getAge($data['birthday']) . '歳）'; ?></td>
                    </tr>
                </tbody>
            </table>
            <!-- ============================== 基本情報[end] ============================== -->




            <!-- ============================== 会員情報[start] ============================== -->
            <table>
                <thead>
                    <tr>
                        <th class="header" colspan="2"><span class="icon-member"></span><h2>会員情報</h2><p class="toggle" title="表示/非表示">閉じる</p><a href="<?php echo Yii::$app->urlManager->createUrl(['member/history/index', 'salonId' => $data['salon_id'], 'memberId' => $data['member_id']]); ?>" title="履　歴" class="button_small_header blue">履　歴</a></th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>POS会員番号</th>
                        <td><?php echo $data['pos_member_cd']; ?><a href="<?php echo Yii::$app->urlManager->createUrl(['member/historyinput/index', 'salonId' => $data['salon_id'], 'memberId' => $data['member_id'], 'process' => 999]); ?>" class="button_small pink">確認 変更</a></td>
                    </tr>
                    <tr>
                        <th>会員種別</th>
                        <td><?php echo date('n') . '月利用：' . $data['count_monthly'] . '回'; ?><a href="<?php echo Yii::$app->urlManager->createUrl(['member/historyinput/index', 'salonId' => $data['salon_id'], 'memberId' => $data['member_id']]); ?>" class="button_small pink">確認 変更</a></td>
                    </tr>
                    <?php
                        $salonTime = '';
                        if ($data['timelimit_flg'] != 0) {
                            $salonTime = '／' . date('H:i', strtotime($data['start_time']));
                            if ($data['close_time']) {
                                $salonTime = $salonTime . '～' . date('H:i', strtotime($data['close_time']));
                            }  
                        }
                    ?>
                    <tr>
                        <th>会員条件</th>
                        <td><?php echo ($data['use_limit']) ? '月' . $data['use_limit'] . '回' : ''; echo ($data['holiday_type']) ? '／'. $data['holiday_type'] : ''; echo $salonTime;?><br><?php echo implode('／', $data['facility_name']); ?></td>
                    </tr>
                    
                    <tr>
                        <th>ステータス</th>
                        <td><?php echo $data['member_status']; ?></td>
                    </tr>
                    <!--
                    <tr>
                        <th>回数券</th>
                        <td>ファイテンO2 Neo3回分<a href="coupon.html" class="button_small pink">確認 変更</a></td>
                    </tr>
                    <tr>
                        <th>オプション</th>
                        <td>会員特別価格<a href="#" class="button_small pink">確認 変更</a></td>
                    </tr>
                    -->
                </tbody>
            </table>
            <!-- ============================== 会員情報[end] ============================== -->




            <!-- ============================== サロン予約[start] ============================== -->
            <table>
                <thead>
                    <tr>
                        <th class="header"><span class="icon-salon02"></span><h2>サロン予約</h2><p class="toggle" title="表示/非表示">閉じる</p><a href="<?php echo Yii::$app->urlManager->createUrl(['member/salonhistory/index', 'salonId' => $data['salon_id'], 'memberId' => $data['member_id']]); ?>" title="履　歴" class="button_small_header blue">履　歴</a><a href="<?php echo Yii::$app->urlManager->createUrl(['/member/reservation/history', 'salonId' => $data['salon_id'], 'memberId' => $data['member_id']]); ?>" title="履　歴" class="button_small_header blue">履　歴</a><a href="<?php echo Yii::$app->urlManager->createUrl(['member/reservation/add', 'salonId' => $data['salon_id'], 'memberId' => $data['member_id']]); ?>" title="新規予約" class="button_small_header green">新規予約</a></th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                      if (isset($data['member_schedule'])):
                        foreach ($data['member_schedule'] as $item):
                              
                    ?>
                        <tr>
                            <td><?php echo Utility::getDateInJapanFormat($item['start_datetime'], FALSE) . ' ' . date('H:i', strtotime($item['start_datetime'])); if ($item['end_datetime']) { echo '～' . date('H:i', strtotime($item['end_datetime']));} ?><a href="<?php echo Yii::$app->urlManager->createUrl(['/member/reservation/edit', 'salonId' => $data['salon_id'], 'memberId' => $data['member_id'], 'memberSheduleId' => $item['member_schedule_id']]); ?>" class="button_small pink">変更</a></td>
                        </tr>
                    <?php endforeach;endif; ?>
                </tbody>
            </table>
            <!-- ============================== サロン予約[end] ============================== -->




            <!-- ============================== イベント予約[start] ============================== -->
            <!--
            <table>
                <thead>
                    <tr>
                        <th class="header"><span class="icon-event"></span><h2>イベント予約</h2><p class="toggle" title="表示/非表示">閉じる</p><a href="event_history.html" title="履　歴" class="button_small_header blue">履　歴</a><a href="event_add.html" title="新規予約" class="button_small_header green">新規予約</a></th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>12月01日(月) 11:00～スロートレーニング<a href="event_edit.html" class="button_small pink">変更</a></td>
                    </tr>
                    <tr>
                        <td>12月08日(月) 11:00～スロートレーニング<a href="event_edit.html" class="button_small pink">変更</a></td>
                    </tr>
                    <tr>
                        <td>12月15日(月) 11:00～スロートレーニング<a href="event_edit.html" class="button_small pink">変更</a></td>
                    </tr>
                </tbody>
            </table>
            -->
            <!-- ============================== イベント予約[end] ============================== -->

        </div><!-- /#left -->

        <p class="scroll"><a href="#stop"><span class="icon-scroll"></span></a></p>

    </div><!-- /#wrapper -->
</div>
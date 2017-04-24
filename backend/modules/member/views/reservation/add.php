<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use common\components\Utility;


?>
<link href="<?= Yii::$app->request->baseUrl; ?>/css/svg.css" rel="stylesheet" type="text/css">
<link href="<?= Yii::$app->request->baseUrl; ?>/css/reserve.css" rel="stylesheet" type="text/css">

<!-- ============================== パンくずリスト[end] ============================== -->

<div id="salon">
    <div id="wrapper">

        <div id="left">

            <div class="title">
                <span class="icon-edit"></span><h2>サロン利用予約申込み｜新規予約</h2>
            </div><!-- /.title -->

            <p class="date"><?= date('Y年m月d日'); ?>（<?= Utility::$arrayWeek[date('l')]; ?>）</p>

            <?php $err = $salonBookingForm->getErrors(); ?>
            <?php if ($err): ?>
                <div class="errorBox">
                    <ul>
                        <?php foreach ($err as $key => $value): ?>
                            <li><?php echo $value[0] ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div><!-- /.erroBox -->
            <?php endif; ?>
            <!-- ============================== ユーザー情報[start] ============================== -->
            <table>
                <thead>
                    <tr>
                        <th class="header edit" colspan="2"><span class="icon-member"></span><h2>ユーザー情報</h2><a href="group.html" title="グループ" class="button_small_header blue">グループ</a></th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <ul class="info">
                                <li class="name">ユーザー名：<?= $infoBooking['user_name'] ?></li>
                                <li><?= $infoBooking['membertype_name'] ?></li>
                                <li><?= date('m'); ?>月利用：<?= $maxCountMonth; ?>回</li>
                                <li>会員番号：<?= $infoBooking['pos_member_cd'] ?></li>
                            </ul>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- ============================== ユーザー情報[end] ============================== -->


            <?php $form = ActiveForm::begin(); ?>

            <!-- ============================== グループメンバー[start] ============================== -->
            <table class="group_list">
                <thead>
                    <tr>
                        <th class="header edit"><span class="icon-salon02"></span><h2>サロン利用予約内容</h2></th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>予約日時</th>
                    </tr>
                    <tr>
                        <td>

                            <ul class="date calendar_form">
                                <li>
                                    <?= Html::activeListBox($salonBookingForm, 'timeBooking[year]', Utility::getArrYear(date('Y'), true), ['size' => false, 'class' => 'pulldown year']) ?>
                                </li>
                                <li>
                                    <?= Html::activeListBox($salonBookingForm, 'timeBooking[month]', Utility::getArrMonth(array('key' => 'default', 'value' => '---月')), ['size' => false, 'class' => 'pulldown month']) ?>
                                </li>
                                <li>
                                    <?= Html::activeListBox($salonBookingForm, 'timeBooking[day]', Utility::getArrDay(array('key' => 'default', 'value' => '---日')), ['size' => false, 'class' => 'pulldown day']) ?>
                                </li>
                            </ul>

                            <ul class="time">
                                <li>
                                    <?=
                                    Html::activeListBox($salonBookingForm, 'timeBooking[hour]', Utility::getArrHour(), ['size' => false, 'class' => 'pulldown'])
                                    ?>
                                </li>
                                <li>
                                    <?=
                                    Html::activeListBox($salonBookingForm, 'timeBooking[minute]', Utility::getArrMinuteStep(), ['size' => false, 'class' => 'pulldown'])
                                    ?>
                                </li>
                                <li>
                                    <?=
                                    Html::activeListBox($salonBookingForm, 'timeBooking[range]', Utility::getArrMinuteRange(), ['size' => false, 'class' => 'pulldown'])
                                    ?>
                                </li>
                            </ul>
                            <a link="<?= Url::to(['/member/reservation/calendar', 'salonId' => $salonId]) ?>" href="javascript:cal_win('<?= Url::to(['/member/reservation/calendar', 'salonId' => $salonId]) ?>','calendar');" class="icon-calendar" id="link-calendar" title="日付変更カレンダー"></a>
                        </td>
                    </tr>
                    <tr>
                        <th>利用希望設備機材</th>
                        </td>
                    </tr>
                <td>
                    <h3>（会費内）</h3>
                    <?=
                    Html::activeCheckboxList($salonBookingForm, 'facility', $providerFacilityList, [ 'class' => 'facility'])
                    ?>
                    <!--						<h3>（回数券有り）</h3>
                                            <p><label><input type="checkbox" name="" value="">アクアチタン浴カプセル(30分</label></p>
                                            <p><label><input type="checkbox" name="" value="">アクアチタン浴チェア(30分)</label><p>
                                            <p><label><input type="checkbox" name="" value="">メタルシャワー(30分)</label><p>-->
                    <h3>（別料金）</h3>
                    <?=
                    Html::activeCheckboxList($salonBookingForm, 'facilityOther', $providerFacilityListOther, [ 'class' => 'facility'])
                    ?>
                </td>
                </tr>
                <tr>
                    <td class="button">
                        <!-- 設定ボタン -->
                        <!-- <input type="button" name="pos" value="キャンセル" class="button_small pink" onclick="location.href='salon_complete.html'"> -->
                        <?php if (Yii::$app->controller->action->id == 'add'):?>
                            <input type="button" name="pos" value="閉じる" class="button_small gray" onclick="location.href = '<?= Url::to(['/member/member/detail', 'salonId' => $salonId, 'memberId' => $memberId]) ?>'">
                            <input type="submit" name="pos" value="予約する" class="button_small blue" >
                        <?php elseif (Yii::$app->controller->action->id == 'edit'):?>
                            <input type="button" name="pos" value="キャンセル" class="button_small pink" onclick="location.href='<?= Url::to(['/member/reservation/cancel', 'salonId' => $salonId, 'memberId' => $memberId, 'memberScheduleId' => $memberScheduleId]) ?>'">
                            <input type="button" name="pos" value="閉じる" class="button_small gray" onclick="location.href = '<?= Url::to(['/member/member/detail', 'salonId' => $salonId, 'memberId' => $memberId]) ?>'">
                            <input type="submit" name="pos" value="変更する" class="button_small blue" >
                        <?php endif; ?>
                        <!-- <input type="button" name="pos" value="変更する" class="button_small red" onclick="location.href='salon_entry_complete.html'"> -->
                        <!-- <input type="button" name="pos" value="来店確認" class="button_small blue" onclick="location.href=''"> -->
                    </td>
                </tr>
                </tbody>
            </table>
            <!-- ============================== グループメンバー[end] ============================== -->

            <?php ActiveForm::end(); ?>
        </div><!-- /#left -->

        <p class="scroll"><a href="#stop"><span class="icon-scroll"></span></a></p>

    </div><!-- /#wrapper -->
</div>
<script type="text/javascript" src="<?= Yii::$app->request->baseUrl; ?>/js/calendar_reload.js"></script>

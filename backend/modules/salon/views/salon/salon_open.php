<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\ActiveField;
use common\components\Utility;

Yii::$app->view->title = \Yii::t('app', 'title salon open');
//link breadcrumb
Yii::$app->params['links'] = [
    [
        'label' => 'サロン設定',
        'url' => ['/salon/salon/setting', 'salonId' => $salonId],
    ],
    [
        'label' => '営業日/時間設定',
        'url' => false,
    ],
];
$salonOpenFormModel->hourOpen = date('H', strtotime($salonOb->open_time));
$salonOpenFormModel->minuteOpen = date('i', strtotime($salonOb->open_time));
$salonOpenFormModel->hourClose = date('H', strtotime($salonOb->close_time));
$salonOpenFormModel->minuteClose = date('i', strtotime($salonOb->close_time));
$salonOpenFormModel->periodMax = array(
    'month' => intval(date('m', strtotime($salonDateMax))),
    'day' => date('d', strtotime($salonDateMax)),
);
?>

<link href="<?= Yii::$app->request->baseUrl; ?>/css/salon.css" rel="stylesheet" type="text/css">

<div id="salon_open">
    <div id="wrapper">

        <div id="left">

            <div class="title">
                <span class="icon-setting"></span><h2>営業日/時間設定</h2>
            </div><!-- /.title -->

            <?= Html::beginForm(Url::to(['/salon/salon/open/', 'salonId' => $salonId]), 'post', []) ?>
            <!-- ============================== 設定状況[start] ============================== -->
            <table>
                <thead>
                    <tr>
                        <th class="header edit" colspan="2">営業日/時間設定</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= date('Y年m月d日', strtotime($salonDateMax)); ?>まで　設定済み<a href="<?= Url::to(['/salon/salon/calendar/', 'salonId' => $salonId]) ?>" title="カレンダー" class="cal"><span class="icon-calendar"></span></a></td>
                    </tr>
                </tbody>
            </table>
            <!-- ============================== 設定状況[end] ============================== -->


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

            <!-- ============================== 自動生成条件設定[start] ============================== -->
            <table>

                <thead>
                    <tr>
                        <th class="header edit" colspan="2"><h2>自動生成条件設定</h2></th>
                </tr>
                </thead>
                <tbody>
                <th>項目</th>
                <td class="gray">内容</td>
                <tr>
                    <th>標準営業時間</th>
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
                        <p>[営業時間説明]</p>
                    </td>
                </tr>

                <tr>
                    <th>定休日</th>
                    <td>
                        <p>[定休日説明]</p>
                        <h3>1)繰り返し設定</h3>
    <!--					<label><input class="repeat_type" type="radio" name="a_repeat" value="day_of_week" checked> 曜日指定</label>
                        <label><input class="repeat_type" type="radio" name="a_repeat" value="day_specified"> 日にち指定</label>-->
                        <?=
                        Html::activeRadioList($salonOpenFormModel, 'repeat', ['day_of_week' => '曜日指定', 'day_specified' => '日にち指定'], ['class' => 'repeat_type'
                        ])
                        ?>
                        <table class="inner" id="repeat_day_of_week">
                            <tr>
                                <th>1つ目</th>
                                <td>
                                    <?php
                                    ?>
                                    <?= Html::activeListBox($salonOpenFormModel, 'dayOfWeek[1][month]', Utility::getArrMonth(), ['size' => false]) ?>
                                </td>
                                <td>
                                    <?= Html::activeListBox($salonOpenFormModel, 'dayOfWeek[1][week]', Utility::getArrWeekNo(), ['size' => false]) ?>
                                </td>
                                <td>
                                    <?= Html::activeListBox($salonOpenFormModel, 'dayOfWeek[1][day]', Utility::$arrayWeek, ['size' => false]) ?>
                                </td>
                            </tr>
                            <tr>
                                <th>2つ目</th>
                                <td>
                                    <?= Html::activeListBox($salonOpenFormModel, 'dayOfWeek[2][month]', Utility::getArrMonth(), ['size' => false]) ?>
                                <td>
                                    <?= Html::activeListBox($salonOpenFormModel, 'dayOfWeek[2][week]', Utility::getArrWeekNo(), ['size' => false]) ?>
                                </td>
                                <td>
                                    <?= Html::activeListBox($salonOpenFormModel, 'dayOfWeek[2][day]', Utility::$arrayWeek, ['size' => false]) ?>
                                </td>
                            </tr>
                            <tr>
                                <th>3つ目</th>
                                <td>
                                    <?= Html::activeListBox($salonOpenFormModel, 'dayOfWeek[3][month]', Utility::getArrMonth(), ['size' => false]) ?>
                                </td>
                                <td>
                                    <?= Html::activeListBox($salonOpenFormModel, 'dayOfWeek[3][week]', Utility::getArrWeekNo(), ['size' => false]) ?>
                                </td>
                                <td>
                                    <?= Html::activeListBox($salonOpenFormModel, 'dayOfWeek[3][day]', Utility::$arrayWeek, ['size' => false]) ?>
                                </td>
                            </tr>
                        </table>


<!--                        <label><input type="radio" name="b_repeat" value=""> 曜日指定</label>
                        <label><input type="radio" name="b_repeat" value="" checked> 日にち指定</label>-->

                        <table class="inner" id="repeat_day_specified" style="display: none">
                            <tr>
                                <th>1つ目</th>
                                <td>
                                    <?= Html::activeListBox($salonOpenFormModel, 'specifiedDate[1][month]', Utility::getArrMonth(), ['size' => false]) ?>
                                </td>
                                <td>
                                    <?= Html::activeListBox($salonOpenFormModel, 'specifiedDate[1][date]', Utility::getArrDay(false), ['size' => false]) ?>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <th>2つ目</th>
                                <td>
                                    <?= Html::activeListBox($salonOpenFormModel, 'specifiedDate[2][month]', Utility::getArrMonth(), ['size' => false]) ?>
                                </td>
                                <td>
                                    <?= Html::activeListBox($salonOpenFormModel, 'specifiedDate[2][date]', Utility::getArrDay(false), ['size' => false]) ?>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <th>3つ目</th>
                                <td>
                                    <?= Html::activeListBox($salonOpenFormModel, 'specifiedDate[3][month]', Utility::getArrMonth(), ['size' => false]) ?>
                                </td>
                                <td>
                                    <?= Html::activeListBox($salonOpenFormModel, 'specifiedDate[3][date]', Utility::getArrDay(false), ['size' => false]) ?>
                                </td>
                                <td></td>
                            </tr>
                        </table>

                        <h3 style="float:left;margin-right:10px">2)特別休日設定</h3>　<span>※年末年始･盆休み等</span>

                        <table class="inner02">
                            <tr>
                                <th>1つ目</th>
                                <td>
                                    <?= Html::activeListBox($salonOpenFormModel, 'specialHoliday[1][year][begin]', Utility::getArrYear(date('Y', strtotime($salonDateMax))), ['size' => false]) ?>
                                    <br>
                                    <?= Html::activeListBox($salonOpenFormModel, 'specialHoliday[1][year][end]', Utility::getArrYear(date('Y', strtotime($salonDateMax))), ['size' => false]) ?>
                                </td>
                                <td>
                                    <?= Html::activeListBox($salonOpenFormModel, 'specialHoliday[1][month][begin]', Utility::getArrMonth(false), ['size' => false]) ?>
                                    <br>
                                    <?= Html::activeListBox($salonOpenFormModel, 'specialHoliday[1][month][end]', Utility::getArrMonth(false), ['size' => false]) ?>
                                </td>
                                <td>
                                    <?= Html::activeListBox($salonOpenFormModel, 'specialHoliday[1][day][begin]', Utility::getArrDay(false), ['size' => false]) ?>
                                    <br>
                                    <?= Html::activeListBox($salonOpenFormModel, 'specialHoliday[1][day][end]', Utility::getArrDay(false), ['size' => false]) ?>
                                </td>
                                <td>から<br>まで</td>
                            </tr>

                            <tr>
                                <th>2つ目</th>
                                <td>
                                    <?= Html::activeListBox($salonOpenFormModel, 'specialHoliday[2][year][begin]', Utility::getArrYear(date('Y', strtotime($salonDateMax))), ['size' => false]) ?>
                                    <br>
                                    <?= Html::activeListBox($salonOpenFormModel, 'specialHoliday[2][year][end]', Utility::getArrYear(date('Y', strtotime($salonDateMax))), ['size' => false]) ?>
                                </td>
                                <td>
                                    <?= Html::activeListBox($salonOpenFormModel, 'specialHoliday[2][month][begin]', Utility::getArrMonth(false), ['size' => false]) ?>
                                    <br>
                                    <?= Html::activeListBox($salonOpenFormModel, 'specialHoliday[2][month][end]', Utility::getArrMonth(false), ['size' => false]) ?>
                                </td>
                                <td>
                                    <?= Html::activeListBox($salonOpenFormModel, 'specialHoliday[2][day][begin]', Utility::getArrDay(false), ['size' => false]) ?>
                                    <br>
                                    <?= Html::activeListBox($salonOpenFormModel, 'specialHoliday[2][day][end]', Utility::getArrDay(false), ['size' => false]) ?>
                                </td>
                                <td>から<br>まで</td>
                            </tr>

                            <tr>
                                <th>3つ目</th>
                                <td>
                                    <?= Html::activeListBox($salonOpenFormModel, 'specialHoliday[3][year][begin]', Utility::getArrYear(date('Y', strtotime($salonDateMax))), ['size' => false]) ?>
                                    <br>
                                    <?= Html::activeListBox($salonOpenFormModel, 'specialHoliday[3][year][end]', Utility::getArrYear(date('Y', strtotime($salonDateMax))), ['size' => false]) ?>
                                </td>
                                <td>
                                    <?= Html::activeListBox($salonOpenFormModel, 'specialHoliday[3][month][begin]', Utility::getArrMonth(false), ['size' => false]) ?>
                                    <br>
                                    <?= Html::activeListBox($salonOpenFormModel, 'specialHoliday[3][month][end]', Utility::getArrMonth(false), ['size' => false]) ?>
                                </td>
                                <td>
                                    <?= Html::activeListBox($salonOpenFormModel, 'specialHoliday[3][day][begin]', Utility::getArrDay(false), ['size' => false]) ?>
                                    <br>
                                    <?= Html::activeListBox($salonOpenFormModel, 'specialHoliday[3][day][end]', Utility::getArrDay(false), ['size' => false]) ?>
                                </td>
                                <td>から<br>まで</td>
                            </tr>
                        </table>

                    </td>
                </tr>
                <tr>
                    <th>自動生成期間</th>
                    <td>
                        <p><?= date('Y年m月d日', strtotime(str_replace('-', '/', $salonDateMax) . "+1 days")); ?>から</p>
                        <table class="inner">
                            <tr>
                                <td>
                                    <?= Html::activeListBox($salonOpenFormModel, 'periodMax[year]', Utility::getArrYear(date('Y', strtotime($salonDateMax)) + 1), ['size' => false]) ?>
                                </td>
                                <td>
                                    <?= Html::activeListBox($salonOpenFormModel, 'periodMax[month]', Utility::getArrMonth(false), ['size' => false]) ?>
                                </td>
                                <td>
                                    <?= Html::activeListBox($salonOpenFormModel, 'periodMax[day]', Utility::getArrDay(false), ['size' => false]) ?>
                                </td>
                                <td>まで</td>
                            </tr>
                        </table>
                    </td>
                </tr>


                </tbody>
            </table>

            <!-- ============================== 自動生成条件設定[end] ============================== -->


            <!-- 設定ボタン -->
            <p class="submit_large"><input type="submit" name="submit" value="自動生成" class="button_large blue"></p>

            <?= Html::endForm() ?>

        </div><!-- /#left -->

        <p class="scroll"><a href="#stop"><span class="icon-scroll"></span></a></p>

    </div><!-- /#wrapper -->
</div>

<script type="text/javascript" src="<?= Yii::$app->request->baseUrl; ?>/js/salon.js"></script>

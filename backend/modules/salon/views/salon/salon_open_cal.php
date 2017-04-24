<?php

use yii\helpers\Url;
function createLinkMonth($yearSelected, $yearGoto, $calendar) {
    if ($yearSelected == $yearGoto) {
        //show link with month
        for ($index = 1; $index <= 12; $index++) {
            $urlMonth = $calendar->month_url($index);
            echo '<a href="' . htmlspecialchars($urlMonth) . '">' . $index .'月</a> ';
        }
    }
}

Yii::$app->view->title = Yii::t('app', 'title salon calendar');
//link breadcrumb
Yii::$app->params['links'] = [
    [
        'label' => 'サロン設定',
        'url' => ['/salon/salon/setting', 'salonId' => $salonId],
    ],
    [
        'label' => '営業日・時間指定',
        'url' => ['/salon/salon/open', 'salonId' => $salonId],
    ],
    [
        'label' => '自動生成結果',
        'url' => false,
    ],
];
?>

<link href="<?= Yii::$app->request->baseUrl; ?>/css/salon.css" rel="stylesheet" type="text/css">

<div id="wrapper">
    <h2 class="main_title">自動生成結果</h2>

    <!-- ============================== イベント名[start] ============================== -->
    <table class="event_info">
        <tr>
            <td><div class="open">&nbsp;</div>平日営業日　<div class="holiday">&nbsp;</div>休日営業日　<div class="closed">&nbsp;</div>定休日</td>
        </tr>
    </table>
    <!-- ============================== イベント名[end] ============================== -->

    <h2 class="main_title"><?php echo $calendar->year ?>年<?php echo $calendar->month ?>月
        <span style="margin-left: 10px; border-left: 5px solid #333;"></span>&nbsp;
        <?php $prewYear = date('Y', mktime(0, 0, 0, 1, 1, $yearSelected - 1)); ?>
        <a href="<?php echo $calendar->month_url(1, $prewYear); ?>">
            <?php echo $prewYear ?>年</a>&nbsp;
        <?php $thisYear = $yearSelected; ?>
        <a href="<?php echo $calendar->month_url(1, $yearSelected); ?>"><?php echo $yearSelected; ?>年</a>&nbsp;
            <?php
            createLinkMonth($yearSelected, $yearSelected, $calendar);
            ?>
        <?php $nextYear = date('Y', mktime(0, 0, 0, 1, 1, $yearSelected + 1)); ?>
        <a href="<?php echo $calendar->month_url(1, $nextYear); ?>"><?php echo $nextYear; ?>年</a>&nbsp;
    </h2>

    <table class="calendar event_calendar">
        <colgroup span="1" class="holiday" style="width:14.2%"></colgroup>
        <colgroup span="1" style="width:14.2%"></colgroup>
        <colgroup span="1" style="width:14.2%"></colgroup>
        <colgroup span="1" style="width:14.2%"></colgroup>
        <colgroup span="1" style="width:14.2%"></colgroup>
        <colgroup span="1" style="width:14.2%"></colgroup>
        <colgroup span="1" style="width:14.2%"></colgroup>

        <thead>
            <tr>
                <th class="holiday">日</th>
                <th>月</th>
                <th>火</th>
                <th>水</th>
                <th>木</th>
                <th>金</th>
                <th class="holiday">土</th>
            </tr>
        </thead>
<!--		<thead>
            <tr class="navigation">
                <th class="prev-month"><a href="<?php echo htmlspecialchars($calendar->prev_month_url()) ?>"><?php echo $calendar->prev_month() ?></a></th>
                <th colspan="5" class="current-month"><?php echo $calendar->month() ?> <?php echo $calendar->year ?></th>
                <th class="next-month"><a href="<?php echo htmlspecialchars($calendar->next_month_url()) ?>"><?php echo $calendar->next_month() ?></a></th>
            </tr>
            <tr class="weekdays">
        <?php foreach ($calendar->days() as $day): ?>
                                                                                <th><?php echo $day ?></th>
        <?php endforeach ?>
            </tr>
        </thead>-->
        <tbody>

            <?php foreach ($calendar->weeks() as $week): ?>
                <tr>
                    <?php foreach ($week as $key => $day): ?>
                        <?php
                        list($number, $current, $data) = $day;
                        $classes = array();
                        $output = '';

                        if (is_array($data)) {
                            $classes = $data['classes'];
                            $title = $data['title'];
                            $output = empty($data['output']) ? '' : '<ul class="output"><li>' . implode('</li><li>', $data['output']) . '</li></ul>';
                        }
                        ?>
                                                                <!--						<td class="day <?php echo implode(' ', $classes) ?>">
                                                                                        <span class="date" title="<?php echo implode(' / ', $title) ?>"><?php echo $number ?></span>
                                                                                        <div class="day-content">
                        <?php echo $output ?>
                                                                                        </div>
                                                                                    </td>-->
                        <td class="<?php
                        $isHoliday = false;
                        $isSPClosed = false;

                        if (@$dataDateType[date('Y-m-d', strtotime($calendar->year . '-' . $calendar->month . '-' . $number))] == 9 && $current) :
                            echo 'sp_closed';
                            $isSPClosed = true;
                        elseif ($key == 0 || $key == 6 || (@$dataDateType[date('Y-m-d', strtotime($calendar->year . '-' . $calendar->month . '-' . $number))] == 2) && $current) :
                            echo 'holiday';
                            $isHoliday = true;
                        endif;
                        ?>">
                                <?php if ($current): ?>
                                <a class="icon-plus" href="<?php if ($key != 0 && $key != 6 && !$isSPClosed && !$isHoliday) : ?>javascript:set_win('<?= Url::to(['/salon/salon/preset/', 'salonId' => $salonId, 'salonDate' => date('Y-m-d', strtotime($calendar->year . '-' . $calendar->month . '-' . $number))]); ?>','preset');<?php endif; ?>"></a>
                                <span class="date"><?php echo $number ?></span>

                                <?php if ($key != 0 && $key != 6 && !$isSPClosed && !$isHoliday) : ?>
                                    <ul>
                                        <li>
                                            <a href="javascript:set_win('<?= Url::to(['/salon/salon/preset/', 'salonId' => $salonId, 'salonDate' => date('Y-m-d', strtotime($calendar->year . '-' . $calendar->month . '-' . $number))]); ?>','preset');"><?php echo @$listSalonOpenCloseInMonth[date('Y-m-d', strtotime($calendar->year . '-' . $calendar->month . '-' . $number))] ?></a>
                                        </li>
                                    </ul>
                                <?php endif; ?>

                            <?php endif; ?>
                            <?php ?>
                        </td>
                    <?php endforeach ?>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

</div>
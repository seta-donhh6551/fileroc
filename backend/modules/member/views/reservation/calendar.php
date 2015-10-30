<?php
use yii\helpers\Url;
Yii::$app->view->title = Yii::t('app', 'title reservation calendar');
?>
<!doctype html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>Phiten IP Salon 予約管理システム｜カレンダー</title>

        <!-- stylesheet -->
        <link href="<?= Yii::$app->request->baseUrl; ?>/css/normalize.css" rel="stylesheet" type="text/css">
        <link href="<?= Yii::$app->request->baseUrl; ?>/css/common.css" rel="stylesheet" type="text/css">
        <link href="<?= Yii::$app->request->baseUrl; ?>/css/schedule.css" rel="stylesheet" type="text/css">
        <link href="<?= Yii::$app->request->baseUrl; ?>/css/calendar_popup.css" rel="stylesheet" type="text/css">

        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <![endif]-->
    </head>

    <body id="calendar">
        <!-- ============================== イベント名[end] ============================== -->
        <input type="hidden" id="currentYear" value="<?= $year != 0 ? $year : date('Y'); ?>" />
        <input type="hidden" id="currentMonth" value="<?= $month != 0 ? $month : date('m'); ?>" />
        <table id="cal_wrapper">
            <tr>
                <td class="cal_header">
                    <table>
                        <tr>
                            <td class="date_left"><a href="<?php echo htmlspecialchars($calendar->prev_year_url()) ?>"><<</a> <a href="<?php echo htmlspecialchars($calendar->prev_month_url()) ?>"><</a></td>
                            <td class="date_center"><?php echo $calendar->year ?>年<?php echo $calendar->month ?>月</td>
                            <td class="date_right"> <a href="<?php echo htmlspecialchars($calendar->next_month_url()) ?>">></a> <a href="<?php echo htmlspecialchars($calendar->next_year_url()) ?>">>></a></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td class="cal_header cal_body">
                    <table id="inner">
                        <tr class="week">
                            <td>日</td>
                            <td>月</td>
                            <td>火</td>
                            <td>水</td>
                            <td>木</td>
                            <td>金</td>
                            <td>土</td>
                        </tr>
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
                                    echo implode(' ', $classes);
                                    if (isset($data['output'][0]) && $data['output'][0] == 'selected-date') {
                                        echo ' selected-date ';
                                    }
                                    $isHoliday = false;
                                    $isSPClosed = false;

                                    if (@$dataDateType[date('Y-m-d', strtotime($calendar->year . '-' . $calendar->month . '-' . $number))] == 9 && $current) :
                                        echo ' sp_closed ';
                                        $isSPClosed = true;
                                    elseif ($key == 0 || $key == 6 || (@$dataDateType[date('Y-m-d', strtotime($calendar->year . '-' . $calendar->month . '-' . $number))] == 2) && $current) :
                                        echo ' holiday ';
                                        $isHoliday = true;
                                    endif;
                                    ?>">
                                            <?php if ($current): ?>
                                            <span class="date"><?php echo $number ?></span>
                                        <?php endif; ?>
                                        <?php // var_dump($data['output']) ?>
                                    </td>
                                <?php endforeach ?>
                            </tr>
                        <?php endforeach ?>
                    </table>
                </td>
            </tr>
        </table>

        <input type="button" name="pos" value="閉じる" class="button_small blue" onclick="window:top.close()">
<script type="text/javascript" src="<?= Yii::$app->request->baseUrl; ?>/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="<?= Yii::$app->request->baseUrl; ?>/js/calendar_popup.js"></script>
    </body>
</html>
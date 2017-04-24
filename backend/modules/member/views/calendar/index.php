<!doctype html>
<html lang="ja">

    <head>
        <meta charset="UTF-8">

        <title>Calendar</title>

        <!-- stylesheet -->
        <link href="<?= Yii::$app->request->baseUrl; ?>/css/normalize.css" rel="stylesheet" type="text/css">
        <link href="<?= Yii::$app->request->baseUrl; ?>/css/common.css" rel="stylesheet" type="text/css">
        <link href="<?= Yii::$app->request->baseUrl; ?>/css/schedule.css" rel="stylesheet" type="text/css">
        <style type="text/css">
            table#cal_wrapper tr td{cursor: pointer}
        </style>
        
        <!--[if lt IE 9]>
        <script src="<?= Yii::$app->request->baseUrl; ?>js/html5shiv.js"></script>
        <![endif]-->
        
        <script type="text/javascript" src="<?= Yii::$app->request->baseUrl; ?>/js/jquery-1.9.1.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                field = '<?= $field; ?>';
                $("table#inner tr:not(.week) td").on('click', function(){
                   fdate = $(this).text().trim();
                   if(fdate != ''){
                       window.opener.$("#"+field+"year").val(Math.abs($('#currentYear').val()));
                       window.opener.$("#"+field+"month").val(Math.abs($('#currentMonth').val()));
                       window.opener.$("#"+field+"day").val(Math.abs(fdate));
                       window:top.close();
                   }
                   return false;
                });
            });
        </script>

    </head>
        
    <body id="calendar">

        <input type="hidden" id="currentYear" value="<?= $haYear != 0 ? $haYear : date('Y'); ?>" />
        <input type="hidden" id="currentMonth" value="<?= $haMonth != 0 ? $haMonth : date('m'); ?>" />
        <!-- ============================== イベント名[end] ============================== -->
        <table id="cal_wrapper">
            <tr>
                <td class="cal_header">
                    <table>
                        <tr>
                            <td class="date_left"><a href="javascript:void(0)"><<</a> <a href="<?php echo htmlspecialchars($calendar->prev_month_url()) ?>"><</a></td>
                            <td class="date_center"><?php echo $calendar->year ?>年<?php echo $calendar->month ?>月</td>
                            <td class="date_right"> <a href="<?php echo htmlspecialchars($calendar->next_month_url()) ?>">></a> <a href="javascript:void(0)">>></a></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td class="cal_header">
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
                                            <span class="date"><?php echo $number ?></span>
                                        <?php endif; ?>
                                        <?php ?>
                                    </td>
                                <?php endforeach ?>
                            </tr>
                        <?php endforeach ?>
                    </table>
                </td>
            </tr>
        </table>


        <input type="button" name="pos" value="閉じる" class="button_small blue" onclick="window:top.close()">


    </body>
</html>
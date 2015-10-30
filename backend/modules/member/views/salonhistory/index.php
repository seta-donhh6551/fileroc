<link href="<?= Yii::$app->request->baseUrl; ?>/css/reserve.css" rel="stylesheet" type="text/css">

<script type="text/javascript">
    $('body').attr('id', 'salon');
</script>

<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

Yii::$app->view->title = 'Phiten IP Salon 予約管理システム｜' . $User['user_name'] . '｜サロン利用予約履歴';
//set Breadcrumbs
Yii::$app->params['links'] = [
    [
        'label' => '会員管理',
        'url' => false
    ],
    [
        'label' => $User['user_name'],
        'url' => false
    ],
    [
        'label' => 'サロン利用予約履歴',
        'url' => false
    ]
];
?>

<div id="wrapper">

    <div id="left">

        <div class="title">
            <span class="icon-edit"></span><h2>サロン利用予約履歴</h2>
        </div><!-- /.title -->

        <p class="date"><?= common\components\Utility::getDateInJapanFormat(date('Y/m/d')); ?></p>

        <!-- ============================== ユーザー情報[start] ============================== -->
        <table>
            <thead>
                <tr>
                    <th class="header edit" colspan="2"><span class="icon-member"></span><h2>ユーザー情報</h2></th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <ul class="info">
                            <li class="name">ユーザー名：<?= $User['user_name']; ?></li>
                            <li><?= $User['membertype_name'] ?></li>
                            <li><?= date('m'); ?>月利用：<?= $User['count_monthly'] ?>回</li>
                            <li>会員番号：<?= $User['pos_member_cd']; ?></li>
                        </ul>
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- ============================== ユーザー情報[end] ============================== -->


        <?php $form = ActiveForm::begin(['id' => 'salon-history', 'method' => 'get']); ?>

            <!-- ============================== サロン利用予約履歴[start] ============================== -->
            <table class="group_list history">

                <colgroup span="1" style="width:50%"></colgroup>
                <colgroup span="1" style="width:25%"></colgroup>
                <colgroup span="1" style="width:25%"></colgroup>

                <thead>
                    <tr>
                        <th class="header edit" colspan="3"><span class="icon-salon02"></span><h2>サロン利用予約履歴</h2></th>
                </tr>
                </thead>
                <tbody>
                    <tr class="header">
                        <th>利用（予定）日時/申し込み</th>
                        <th>状態</th>
                        <th>会員種別</th>
                    </tr>
                    <?php $entryType = ['1'=>'1:来店','2'=>'2:電話','3'=>'3:Web']; //1:来店/2:電話/3:Web ?>
                    <?php $scheduleStatus = ['0'=>'0:サロン側での予約取り消し','1'=>'1:予約中','2'=>'2:利用日中','3'=>'3:予約申請中','8'=>'8:完了','9'=>'9:キャンセル']; //member_schedule.status?>
                    <?php $visitFlg = ['0'=>'0:来店確認していない','1'=>'1:来店確認した','2'=>'2:完了(*)検討中']; //member_schedule.visit_flg ?>
                    <?php $visitType = ['0'=>'0:初回ガイダンス','1'=>'1:通常会費内利用','2'=>'2:ビジター利用']; //0:初回ガイダンス/1:通常会費内利用/2:ビジター利用 ?>
                    
                    <?php if(isset($listSchedule) && $listSchedule != null){ ?>
                    <?php foreach($listSchedule as $schedule){ ?>
                    <?php
                        //Set status
                        switch ($schedule['status']){
                            case 1 : $statusColor = 'reserve'; break; //予約中 - xanh
                            case 2 : $statusColor = 'today'; break; //利用中 - vàng
                            case 9 : $statusColor = 'cancelled'; break; //キャンセル - xám
                            case 8 : $statusColor = ''; break; //完了 - trắng
                            default : $statusColor = ''; break;
                        }
                    ?>
                    <tr class="<?= $statusColor ?>">
                        <td><?= date('Y/m/d H:i:s', strtotime($schedule['start_datetime'])) ?>
                            <br><?php echo array_key_exists($schedule['entry_type'], $entryType) ? $entryType[$schedule['entry_type']] : '';  ?>
                        </td>
                        <td>
                            <?php echo array_key_exists($schedule['status'], $scheduleStatus) ? $scheduleStatus[$schedule['status']] : '';  ?>
                            <?php echo $schedule['status'] == 9 ? '<br />'.date('Y/m/d', strtotime($schedule['cancel_date'])).'' : ''; ?>
                            <br /><?php echo array_key_exists($schedule['visit_flg'], $visitFlg) ? $visitFlg[$schedule['visit_flg']] : '';  ?>
                        </td>
                        <td>
                            <?= $schedule['membertype_name']; ?>
                            <br><?php echo array_key_exists($schedule['visit_type'], $visitType) ? $visitType[$schedule['visit_type']] : '';  ?></td>
                    </tr>
                    <?php } } ?>
                    <tr>
                        <td class="button" colspan="3">
                            <!-- ボタン -->
                            <input type="button" name="pos" value="閉じる" class="button_small blue" onclick="location.href = '<?= Yii::$app->request->baseUrl . '/member/user_detail/user_detail/'.$salonId.'/'.$memberId; ?> '">
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- ============================== サロン利用予約履歴[end] ============================== -->

        <?php ActiveForm::end(); ?>

    </div><!-- /#left -->

    <p class="scroll"><a href="#stop"><span class="icon-scroll"></span></a></p>

</div><!-- /#wrapper -->
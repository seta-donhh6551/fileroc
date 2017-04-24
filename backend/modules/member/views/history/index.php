<link href="<?= Yii::$app->request->baseUrl; ?>/css/reserve.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?= Yii::$app->request->baseUrl; ?>/js/jquery.clickableTr.js"></script>

<script type="text/javascript">
    $('body').attr('id', 'category');
</script>

<?php
Yii::$app->view->title = 'Phiten IP Salon 予約管理システム｜' . $User['user_name'] . '｜会員種別等変更履歴';
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
        'label' => '会員種別等変更履歴',
        'url' => false
    ]
];
?>

<div id="wrapper">
    <div id="left">
        <div class="title">
            <span class="icon-edit"></span><h2>会員種別等変更履歴</h2>
        </div><!-- /.title -->

        <p class="date"><?= common\components\Utility::getDateInJapanFormat(date('Y/m/d')); ?></p>

        <form action="" method="get" accept-charset="utf-8">

            <!-- ============================== 会員種別等変更履歴[start] ============================== -->
            <table class="group_list list">
                <thead>
                    <tr>
                        <th class="header edit" colspan="2"><span class="icon-member"></span><h2>会員情報履歴(予定)一覧</h2><a href="<?= Yii::$app->request->baseUrl . '/member/user_history/category_add/' . $valUrl['salonId'] . '/' . $valUrl['memberId']; ?>" title="設定する" class="button_small_header blue">設定する</a></th>
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
                    <tr>
                        <th>2014年</th>
                    </tr>
                    <tr>
                        <td>
                            <!-- 履歴テーブル[start] -->
                            <table class="revision">

                                <colgroup span="1" style="width: 15%"></colgroup>
                                <colgroup span="1" style="width: 15%"></colgroup>
                                <colgroup span="1" style="width: 25%"></colgroup>
                                <colgroup span="1" style="width: 45%"></colgroup>

                                <thead>
                                    <tr>
                                        <th>受付日</th>
                                        <th>実行日</th>
                                        <th>処理</th>
                                        <th>処理内容</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $salonType = [];
                                    foreach ($listSalonType as $k => $v) {
                                        $salonType[$v['salon_membertype_id']] = $v['membertype_name'];
                                    }
                                    //common\components\Utility::debugData($listSalonType); die();
                                    ?>
                                    <?php if (isset($listAll) && $listAll != NULL) { ?>
                                        <?php foreach ($listAll as $key => $val) { ?>
                                            <?php
                                            $actType = ['10' => '入会', '20' => '会員種別変更', '30' => '休会', '40' => '復会', '90' => '退会', '999' => 'POS番号修正'];
                                            $actStatus = ['0' => '未処理', '1' => '未処理', '2' => '手動処理', '9' => '取消'];
                                            if (array_key_exists($val['status'], $actStatus)) {
                                                $status = $val['status'] . ':' . $actStatus[$val['status']];
                                            } else {
                                                $status = '';
                                            }
                                            ?>
                                            <tr class="<?php if($val['action_type'] == 20){ echo 'cat20';} if($val['action_type'] == 90){ echo 'cat90';} ?> item clickable" data-href="<?= Yii::$app->request->baseUrl . '/member/user_history/category_add/' . $valUrl['salonId'] . '/' . $valUrl['salonId'] . '/0?memberActionId='.$val['member_action_id']; ?>">
                                                <td><?= date('m/d', strtotime($val['receipt_datetime'])); ?></td>
                                                <td><?= date('m/d', strtotime($val['resume_date'])); ?></td>
                                                <td>
                                                    <?php
                                                    $typename_out = NULL;
                                                    $typename_next = NULL;
                                                    $pos_old = NULL;
                                                    $pos_new = NULL;
                                                    $cancel_date = NULL;
                                                    switch ($val['action_type']) {
                                                        case 10 :
                                                            $typename_out = array_key_exists($val['salon_membertype_id'], $salonType) ? $salonType[$val['salon_membertype_id']] : '';
                                                            break;
                                                        case 20 :
                                                            $typename_out = array_key_exists($val['salon_membertype_id'], $salonType) ? $salonType[$val['salon_membertype_id']] : '';
                                                            $typename_next = array_key_exists($val['salon_membertype_id_NEXT'], $salonType) ? $salonType[$val['salon_membertype_id_NEXT']] : '';
                                                            break;
                                                        case 30 :
                                                            $typename_out = '';
                                                            break;
                                                        case 40 :
                                                            $typename_out = '';
                                                            break;
                                                        case 90 :
                                                            $cancel_date = $val['cancel_date'];
                                                            break;
                                                        case 999 :
                                                            $pos_old = $val['pos_member_cd_OLD'];
                                                            $pos_new = $val['pos_member_cd'];
                                                            break;
                                                        default : $typename_out = array_key_exists($val['salon_membertype_id'], $salonType) ? $salonType[$val['salon_membertype_id']] : '';
                                                            break;
                                                    }
                                                    ?>
                                                    <?php
                                                    if (array_key_exists($val['action_type'], $actType)) {
                                                        echo $val['action_type'] . ':' . $actType[$val['action_type']];
                                                    }
                                                    ?></td>
                                                <td>
                                                    <?= $status ?> <?php
                                                    if ($cancel_date != NULL) {
                                                        echo date('m/d', strtotime($cancel_date));
                                                    }
                                                    ?><br />
                                                    <?php
                                                    if ($typename_out != NULL) {
                                                        if ($val['action_type'] == 10) {
                                                            echo $typename_out . '<br />';
                                                        } else {
                                                            echo '元:' . $typename_out . '<br />';
                                                        }
                                                    }
                                                    ?>
                                                    <?php
                                                    if ($typename_next != NULL) {
                                                        if ($val['action_type'] == 10) {
                                                            echo $typename_next . '<br />';
                                                        } else {
                                                            echo '→:' . $typename_next . '<br />';
                                                        }
                                                    };
                                                    ?>
                                                    <?php
                                                    if ($pos_old != NULL) {
                                                        echo '元:' . $pos_old . '<br />';
                                                    };
                                                    ?>
                                                    <?php
                                                    if ($pos_new != NULL) {
                                                        echo '→:' . $pos_new . '<br />';
                                                    };
                                                    ?>
                                                </td>
                                                <!--td>2:手動処理<br>月2回(平日)</td-->
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <!-- 履歴テーブル[end] -->

                        </td>
                    </tr>
                    <tr>
                        <td class="button">
                            <input type="button" name="pos" value="閉じる" class="button_small gray" style="text-align: center" onclick="location.href = '<?= Yii::$app->request->baseUrl . '/member/user_detail/user_detail/' . $valUrl['salonId'] . '/' . $valUrl['salonId']; ?>'">
                        </td>
                    </tr>

                </tbody>
            </table>
            <!-- ============================== 会員種別等変更履歴[end] ============================== -->

        </form>

    </div><!-- /#left -->

    <p class="scroll"><a href="#stop"><span class="icon-scroll"></span></a></p>

</div><!-- /#wrapper -->
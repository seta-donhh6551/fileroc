<?php

    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use yii\helpers\Url;

    //set title
    Yii::$app->view->title = 'Phiten IP Salon 予約管理システム｜サロン設定';
    //set Breadcrumbs
    Yii::$app->params['links'] = [
        [
            'label' => 'サロン設定',
            'url' => FALSE,
        ],
    ];

    $salonFacStr = '';
    foreach ($data['salon_facility'] as $value) {
        $salonFacStr .= $value['facility_name'] . '(' . $value['cnt'] . ')/';
    }

    $data['salon_facility'] = substr($salonFacStr, 0, -1);

    $salonMebertypeStr = '';
    foreach ($data['salon_membertype'] as $key => $value) {
        $salonMebertypeStr .= $value->membertype_name . '/';
    }

    $data['salon_membertype'] = substr($salonMebertypeStr, 0, -1);
    
    $model->open_date_hour = substr($model->open_time, 0, 2);
    $model->open_date_min = substr($model->open_time, 3, 2);
    $model->close_date_hour = substr($model->close_time, 0, 2);
    $model->close_date_min = substr($model->close_time, 3, 2);
?>
<link href="<?= Yii::$app->request->baseUrl; ?>/css/salon.css" rel="stylesheet" type="text/css">

<div id="wrapper">

    <div id="left">

        <div class="title">
            <span class="icon-setting"></span><h2>サロン設定</h2>
        </div><!-- /.title -->
        <!--
        <form action="salon_setting_complete.html" method="get" accept-charset="utf-8">
        -->
        <?php $form = ActiveForm::begin(); ?>
        <?php $err = $model->getErrors(); ?>
        <?php if ($err): ?>
            <div class="errorBox">
                <ul>
                    <?php foreach ($err as $key => $value): ?>
                        <li><?php echo $value[0] ?></li>
                    <?php endforeach; ?>
                </ul>
            </div><!-- /.erroBox -->
        <?php endif; ?>

        <!-- ============================== 設定状況[start] ============================== -->
        <table>
            <thead>
                <tr>
                    <th class="header edit" colspan="2">設定状況</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>営業日/時間<br>
                        <?= Html::a('設定する', Url::to(['/salon/salon/open/', 'salonId' => $data['salon_id']]), ['class' => 'button_small blue']); ?>
                    </th>
                    <td><?= date('Y年m月d日', strtotime($data['salon_open'])) . 'まで　設定済み'; ?></td>
                </tr>
                <tr>
                    <th>設備機材<br><a href="salon_equipment.html" class="button_small blue">設定する</a></th>
                    <td><?= $data['salon_facility']; ?></td>
                </tr>
                <tr>
                    <th>会員種別<br><a href="salon_category.html" class="button_small blue">設定する</a></th>
                    <td><?= $data['salon_membertype']; ?></td>
                </tr>
                <tr>
                    <th>回数券<br><a href="salon_coupon.html" class="button_small blue">設定する</a></th>
                    <td>アクアチタン浴カプセル(3回･1か月／6回･2か月)酸素カプセル(3回･1か月／6回･3か月)
                        セルフエステ(4回･4週間／8回･8週間)</td>
                </tr>
            </tbody>
        </table>
        <!-- ============================== 設定状況[end] ============================== -->





        <!-- ============================== サロン設定内容[start] ============================== -->
        <table>

            <thead>
                <tr>
                    <th class="header edit" colspan="2"><h2>サロン設定内容</h2></th>
            </tr>
            </thead>
            <tbody>
            <th>項目</th>
            <td class="gray">内容</td>
            <tr>
                <th>店舗コード<br>(システムID)</th>
                <td><?= $model->pos_shop_cd; ?><br>(ID: <?= $model->salon_id; ?>)
                </td>
            </tr>
            <tr>
                <th>名称</th>
                <td>
                    <?= Html::activeTextInput($model, 'salon_name', ['class' => 'input_form', 'id' => 'shop_name', 'style' => 'width:100%;']); ?>
                </td>

            </tr>
            <tr>
                <th>名称（カナ）</th>
                <td>
                    <?= Html::activeTextInput($model, 'salon_kana', ['class' => 'input_form', 'id' => 'shop_name_kana', 'style' => 'width:100%;']); ?>
                </td>
            </tr>
            <th>電話番号</th>
            <td>
                <?= Html::activeTextInput($model, 'salon_tel', ['class' => 'input_form', 'id' => 'tel', 'style' => 'width:70%;']); ?>
            </td>
            </tr>
            <tr>
                <th>住所</th>
                <td>
                    〒<?= Html::activeTextInput($model, 'zip_cd', ['class' => 'input_form', 'id' => 'zip', 'style' => 'width:100px;margin-left:5px;']); ?>
                    <?= Html::activeTextInput($model, 'jis_code', ['class' => 'input_form', 'id' => 'state', 'style' => 'width:100px;margin-left:10px;']); ?><br>
                    <?= Html::activeTextInput($model, 'addr_shi', ['class' => 'input_form', 'id' => 'address1', 'style' => 'width:95%']); ?><br>
                    <?= Html::activeTextInput($model, 'addr_cho', ['class' => 'input_form', 'id' => 'address2', 'style' => 'width:95%']); ?><br>
                    <?= Html::activeTextInput($model, 'addr_bldg', ['class' => 'input_form', 'id' => 'address3', 'style' => 'width:95%']); ?><br>
                    緯度<?= Html::activeTextInput($model, 'latitude', ['class' => 'input_form', 'id' => 'latitude', 'style' => 'width:100px;margin:0 10px 0 4px']); ?>
                    経度<?= Html::activeTextInput($model, 'longitude', ['class' => 'input_form', 'id' => 'longitude', 'style' => 'width:100px;margin-left:4px;']); ?>
                </td>
            </tr>
            <tr>
                <th>サロン種別</th>
                <td class="equip_time">
                    <?=
                    Html::activeRadioList($model, 'salon_type', [0 => 'IPコーナー', 1 => 'IPサロン', 2 => 'IPルーム'], [
                        'item' => function ($index, $label, $name, $checked, $value) {
                    return '<label class="radio">' . Html::radio($name, $checked, ['value' => $value]) . $label . '</label>';
                }
                    ])
                    ?>

                    <p class="separator">&nbsp;</p>
                    <?=
                    Html::activeRadioList($model, 'gender_type', [0 => '男女兼用', 1 => '女性限定', 2 => '男性限定'], [
                        'item' => function ($index, $label, $name, $checked, $value) {
                    return '<label class="radio">' . Html::radio($name, $checked, ['value' => $value]) . $label . '</label>';
                }
                    ])
                    ?>
                </td>
            </tr>
            <tr>
                <th>営業時間</th>
                <td>
                    <ul class="open">
                        <li>
                            <?=
                            Html::activeListBox($model, 'open_date_hour', ['10' => '10時', '11' => '11時', '12' => '12時', '13' => '13時', '14' => '14時', '15' => '15時', '16' => '16時', '17' => '17時', '18' => '18時', '19' => '19時',
                                '20' => '20時', '21' => '21時', '22' => '22時',
                                    ], ['class' => 'pulldown', 'id' => 'open_h', 'size' => 1]);
                            ?>
                        </li>
                        <li>
                            <?=
                            Html::activeListBox($model, 'open_date_min', ['05' => '05分', '10' => '10分', '15' => '15分', '20' => '20分',
                                '25' => '25分', '30' => '30分', '35' => '35分', '40' => '40分',
                                '45' => '45分', '50' => '50分', '55' => '55分',
                                    ], ['class' => 'pulldown', 'id' => 'open_m', 'size' => 1]);
                            ?>
                        </li>
                    </ul><p>〜&nbsp;</p>
                    <ul class="close">
                        <li>
                            <?=
                            Html::activeListBox($model, 'close_date_hour', ['10' => '10時', '11' => '11時', '12' => '12時', '13' => '13時', '14' => '14時', '15' => '15時', '16' => '16時', '17' => '17時', '18' => '18時', '19' => '19時',
                                '20' => '20時', '21' => '21時', '22' => '22時',
                                    ], ['class' => 'pulldown', 'id' => 'close_h', 'size' => 1]);
                            ?>
                        </li>
                        <li>
                            <?=
                            Html::activeListBox($model, 'close_date_min', ['05' => '05分', '10' => '10分', '15' => '15分', '20' => '20分',
                                '25' => '25分', '30' => '30分', '35' => '35分', '40' => '40分',
                                '45' => '45分', '50' => '50分', '55' => '55分',
                                    ], ['class' => 'pulldown', 'id' => 'close_m', 'size' => 1]);
                            ?>
                        </li>
                    </ul>
                    <?= Html::activeTextInput($model, 'open_other', ['class' => 'input_form', 'style' => 'width:100%;margin-top:10px']); ?>
                    <br>


                </td>
            </tr>
            <tr>
                <th>定休日</th>
                <td>
                    <?= Html::activeTextInput($model, 'holiday_other', ['class' => 'input_form', 'style' => 'width:100%;']); ?>
                </td>
            </tr>
            <tr>
                <th>予約可能日数</th>
                <td>
                    <?= Html::activeTextInput($model, 'reservable_days', ['class' => 'input_form', 'style' => 'width:50px;']); ?>
                    日後まで</td>
            </tr>
            <tr>
                <th>受入可能人数</th>
                <td>
                    <?= Html::activeTextInput($model, 'capacity', ['class' => 'input_form', 'style' => 'width:50px;']); ?>
                    人まで</td>
            </tr>
            <tr>
                <th>1日標準<br>利用時間(分)</th>
                <td>
                    <?= Html::activeTextInput($model, 'timelimit_atday', ['class' => 'input_form', 'style' => 'width:50px;']); ?>
                    分間　※2時間→120分､2時間半→150分</td>
            </tr>

            </tbody>
        </table>
        <!-- ============================== サロン設定内容[end] ============================== -->



        <!-- 設定ボタン -->
        <p class="submit_large"><?= Html::submitButton('変更', ['class' => 'button_large blue', 'value' => '変更']); ?></p>

        <?php ActiveForm::end(); ?>
    </div><!-- /#left -->

    <p class="scroll"><a href="#stop"><span class="icon-scroll"></span></a></p>

</div><!-- /#wrapper -->

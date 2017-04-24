<?php

    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use yii\helpers\Url;
    use common\components\Utility;
    //set title
    Yii::$app->view->title = 'Phiten IP Salon 予約管理システム｜会員管理｜知多 利雄｜ユーザー情報編集';
    //set Breadcrumbs
    Yii::$app->params['links'] = [
        [
            'label' => '会員管理',
            'url' => ['/member/default/index/', 'salonId' => $data['salon_id']],
        ],
        [
            'label' => 'ユーザー情報編集',
            'url' => FALSE,
        ],
    ];

    $salonMebertypeStr = [0 => '選択してください'];
    foreach ($data['salon_membertype'] as $key => $value) {
        $salonMebertypeStr[$value->salon_membertype_id] = $value->membertype_name;
    }
    if(!empty($model->pos_member_cd)) {
        $pos_member_cd = substr($model->pos_member_cd, 0, 1) . ' ' . substr($model->pos_member_cd, 1, 6) . ' ' . substr($model->pos_member_cd, 7, 5) . ' ' . substr($model->pos_member_cd, 12, 1);
    }

    $model->createDay = date('d');
    $model->createMonth = date('n');
    $model->createYear = date('Y');
?>
<link href="<?= Yii::$app->request->baseUrl; ?>/css/user.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?= Yii::$app->request->baseUrl; ?>/js/member.js"></script>

<div id="user_detail">
    <div id="wrapper">

        <div id="left">

            <div class="title">
                <span class="icon-edit"></span><h2>ユーザー情報編集</h2>
            </div><!-- /.title -->


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

            <!-- ============================== POS会員番号[start] ============================== -->
            <table>
                <thead>
                    <tr>
                        <th class="header edit" colspan="2">ID:2897</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>POS会員番号</th>
                        <td>
                            <ul class="pos">
                                <?php if (isset($data['member_id']) && !empty($pos_member_cd)): ?>
                                <li class="num"><?= $pos_member_cd; ?></li>
                                <?php endif; ?>
                                <li class="title">[変更する場合]</li>
                                <li class="form" style="width:30%">
                                    <?= Html::activeHiddenInput($model, 'pos_id'); ?>
                                    <?= Html::activeHiddenInput($model, 'member_id'); ?>
                                    <?= Html::activeTextInput($model, 'pos1', ['class' => 'input_form', 'id' => 'pos1', 'size' => 10]); ?>
                                </li>
                                <li class="form" style="width:30%">
                                    <?= Html::activeTextInput($model, 'pos2', ['class' => 'input_form', 'id' => 'pos2', 'size' => 10]); ?>
                                </li>
                                <li class="form" style="width:30px">
                                    <?= Html::activeTextInput($model, 'pos3', ['class' => 'input_form', 'id' => 'pos3', 'size' => 3]); ?>
                                </li>
                                <li class="cd">[CD]</li>
                            </ul>
                            <p class="record">POS側でレコード確認</p>
                            <p>
                                <?= Html::submitButton('確認する', ['class' => 'button_large blue button_edit', 'id' => 'user_add_submit', 'value' => '確認する', 'url_search' => Url::to(['/member/member/search/', 'salonId' => $data['salon_id'], 'memberId' => $data['member_id']]), 'url_edit' => Url::to(['/member/member/edit/', 'salonId' => $data['salon_id'], 'memberId' => $data['member_id']])]); ?>
                            </p>
                            <p class="p-red">※ビジター等でPOS番号不明なら、何も入力せず[確認する]をクリックしてください。</p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- ============================== POS会員番号[end] ============================== -->



            <?php if (isset($data['pos'])) : ?>
            <!-- ============================== ユーザー情報[start] ============================== -->
            <table>
                <thead>
                    <tr>
                        <th class="header edit" colspan="2"><span class="icon-member"></span><h2>ユーザー情報</h2><a href="group.html" title="グループ" class="button_small_header blue">グループ</a></th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>お名前</th>
                        <td>
                            <?= Html::activeTextInput($model, 'user_name', ['class' => 'input_form', 'style' => 'width:200px;']); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>お名前カナ</th>
                        <td>
                            <?= Html::activeTextInput($model, 'user_kana', ['class' => 'input_form', 'style' => 'width:200px;']); ?>
                        </td>
                    </tr>
                    <tr>
                        <th rowspan="2">電話番号</th>
                        <td>
                            <?= Html::activeTextInput($model, 'user_tel', ['class' => 'input_form', 'style' => 'width:180px;']); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?= Html::activeTextInput($model, 'user_tel2', ['class' => 'input_form', 'style' => 'width:180px;']); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>住所</th>
                        <td>
                            〒<?= Html::activeTextInput($model, 'zip_cd', ['class' => 'input_form', 'style' => 'width:100px;margin-left:5px;']); ?><br>
                            <?= Html::activeTextInput($model, 'addr_1', ['class' => 'input_form', 'style' => 'width:95%']); ?><br>
                            <?= Html::activeTextInput($model, 'addr_2', ['class' => 'input_form', 'style' => 'width:95%']); ?><br>
                            <?= Html::activeTextInput($model, 'addr_3', ['class' => 'input_form', 'style' => 'width:95%']); ?><br>
                        </td>
                    </tr>
                    <tr>
                        <th>メールアドレス</th>
                        <td>
                            <?= Html::activeTextInput($model, 'user_email', ['class' => 'input_form', 'style' => 'width:95%']); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>性別</th>
                        <td>
                            <?= Html::activeDropDownList($model, 'gender', [1 => '男性', 2 => '女性']) ?>
                        </td>
                    </tr>
                    <tr>
                        <th>生年月日</th>
                        <td>
                            <?= Html::activeTextInput($model, 'birthday', ['class' => 'input_form', 'style' => 'width:150px']); ?>
                        </td>
                    </tr>

                </tbody>
            </table>
            <!-- ============================== ユーザー情報[end] ============================== -->




            <!-- ============================== 会員情報[start] ============================== -->
            <table>
                <thead>
                    <tr>
                        <th colspan="2" class="header edit"><span class="icon-member"></span><h2>会員情報</h2></th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>会員種別</th>
                        <td>
                            <?= Html::activeListBox($model, 'salon_membertype_id', $salonMebertypeStr, ['size' => 1]); ?>
                        </td>
                    </tr>
                    <tr class="date_change_membertype">
                        <th>変更処理日</th>
                        <td>
                            <ul class="date calendar_form">
                                <li>
                                    <?= Html::activeListBox($model, 'createYear', Utility::getArrYear(false), ['size' => 1, 'class' => 'year']); ?>
                                </li>
                                <li>
                                    <?= Html::activeListBox($model, 'createMonth', Utility::getArrMonth(false), ['size' => 1, 'class' => 'month']); ?>
                                </li>
                                <li>
                                    <?= Html::activeListBox($model, 'createDay', Utility::getArrDay(false), ['size' => 1, 'class' => 'day']); ?>
                                </li>
                            </ul>
                            <a link="<?= Url::to(['/member/reservation/calendar', 'salonId' => $data['salon_id']]) ?>" href="javascript:cal_win('<?= Url::to(['/member/reservation/calendar', 'salonId' => $data['salon_id']]) ?>','calendar');" class="icon-calendar" id="link-calendar" title="日付変更カレンダー"></a>
                        </td>
                    </tr>
                    <tr>
                        <th>回数券</th>
                        <td>ファイテンO2 Neo3回分<a href="coupon.html" class="button_small pink">確認 変更</a></td>
                    </tr>
                    <tr>
                        <th>オプション</th>
                        <td>会員特別価格<a href="#" class="button_small pink">確認 変更</a></td>
                    </tr>
                </tbody>
            </table>
            <!-- ============================== 会員情報[end] ============================== -->

            <!-- 設定ボタン -->
            <p class="submit_large">
                <?= Html::submitButton('設定する', ['class' => 'button_large blue', 'value' => '設定する']); ?>
            </p>
            <?php endif; ?>
            <?php ActiveForm::end(); ?>

        </div><!-- /#left -->

        <p class="scroll"><a href="#stop"><span class="icon-scroll"></span></a></p>

    </div><!-- /#wrapper -->
</div>
<script type="text/javascript" src="<?= Yii::$app->request->baseUrl; ?>/js/calendar_reload.js"></script>

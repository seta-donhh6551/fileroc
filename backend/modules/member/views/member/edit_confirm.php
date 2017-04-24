<?php

    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use yii\helpers\Url;
    //set title
    Yii::$app->view->title = 'Phiten IP Salon 予約管理システム｜会員管理｜知多 利雄｜ユーザー情報編集';
    //set Breadcrumbs
    Yii::$app->params['links'] = [
        [
            'label' => '会員管理',
            'url' => ['/member/default/index/', 'salonId' => $salonId],
        ],
        [
            'label' => 'ユーザー情報編集',
            'url' => ['/member/member/edit', 'salonId' => $salonId, 'pos' => $data->pos_member_cd],
        ],
        [
            'label' => '知多 利雄',
            'url' => false,
        ],
    ];

    $gender = [1 => '男性', 2 => '女性'];
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

            <!-- ============================== POS会員番号[start] ============================== -->
            <table>
                <thead>
                    <tr>
                        <th class="header edit" colspan="2">ID:<?= $data->pos_id; ?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>POS会員番号</th>
                        <td>
                            <ul class="pos">
                                <li class="num"><?= $data->pos_member_cd ?></li>
                            </ul>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- ============================== POS会員番号[end] ============================== -->




            <!-- ============================== ユーザー情報[start] ============================== -->
            <table>
                <thead>
                    <tr>
                        <th class="header edit" colspan="2"><span class="icon-member"></span><h2>ユーザー情報</h2></th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>お名前</th>
                        <td><?= $data->user_name; ?></td>
                    </tr>
                    <tr>
                        <th>お名前カナ</th>
                        <td><?= $data->user_kana; ?></td>
                    </tr>
                    <tr>
                        <th rowspan="2">電話番号</th>
                        <td><?= $data->user_tel; ?></td>
                    </tr>
                    <tr>
                        <td><?= isset($data->user_tel2) ? $data->user_tel2 : '---'; ?></td>
                    </tr>
                    <tr>
                        <th>住所</th>
                        <td>
                            〒<?= $data->zip_cd . ' ' . $data->addr_1 . $data->addr_2 . $data->addr_3; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>メールアドレス</th>
                        <td><?= $data->user_email; ?></td>
                    </tr>
                    <tr>
                        <th>性別</th>
                        <td><?= $data->gender . $gender[$data->gender]; ?></td>
                    </tr>
                    <tr>
                        <th>生年月日</th>
                        <td><?= $data->birthday; ?></td>
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
                        <td><?= $data->membertype_name; ?></td>
                    </tr>
                    <tr>
                        <th>回数券</th>
                        <td>ファイテンO2 Neo3回分</td>
                    </tr>
                    <tr>
                        <th>オプション</th>
                        <td>会員特別価格</td>
                    </tr>
                </tbody>
            </table>
            <!-- ============================== 会員情報[end] ============================== -->

            <!-- 設定ボタン -->
            <p class="submit_large">
                <?= Html::submitButton('送信する', ['class' => 'button_large blue', 'value' => '送信する']); ?>
            </p>
            <p class="submit_large" style="margin-top:-35px"><input type="button" name="submit" onclick="location.href = '<?= Url::to(['/member/member/edit/', 'salonId' => $salonId, 'pos' => $data->pos_member_cd]) ?>'" value="戻る" class="button_large blue"></p>

            <?php ActiveForm::end(); ?>

        </div><!-- /#left -->

        <p class="scroll"><a href="#stop"><span class="icon-scroll"></span></a></p>

    </div><!-- /#wrapper -->


</div>


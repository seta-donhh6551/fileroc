<?php

    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use yii\helpers\Url;
    //set title
    Yii::$app->view->title = 'Phiten IP Salon 予約管理システム｜会員管理｜ユーザー新規登録';
    //set Breadcrumbs
    Yii::$app->params['links'] = [
        [
            'label' => '会員管理',
            'url' => ['/member/default/index/', 'salonId' => $data['salon_id']],
        ],
        [
            'label' => 'ユーザー新規登録',
            'url' => FALSE,
        ],
    ];
?>
<link href="<?= Yii::$app->request->baseUrl; ?>/css/user.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?= Yii::$app->request->baseUrl; ?>/js/member.js"></script>

<div id="user_detail">
    <div id="wrapper">

        <div id="left">

            <div class="title">
                <span class="icon-edit"></span><h2>ユーザー新規登録</h2>
            </div><!-- /.title -->
            <!--
            <form action="user_info_confirm.html" method="get" accept-charset="utf-8">
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
            <!-- ============================== POS会員番号[start] ============================== -->
            <table>
                <tr>
                    <th>POS会員番号</th>
                    <td>
                        <ul class="pos">
                            <li class="form" style="width:30%">
                                <?= Html::activeTextInput($model, 'pos1', ['class' => 'input_form', 'id' => 'pos1', 'size' => 10, 'style' => 'width:100%;']); ?>
                            </li>
                            <li class="form" style="width:30%">
                                <?= Html::activeTextInput($model, 'pos2', ['class' => 'input_form', 'id' => 'pos2', 'size' => 10, 'style' => 'width:100%;']); ?>
                            </li>
                            <li class="form" style="width:30px">
                                <?= Html::activeTextInput($model, 'pos3', ['class' => 'input_form', 'id' => 'pos3', 'size' => 3, 'style' => 'width:100%;']); ?>
                            </li>
                            <li class="cd">[CD]</li>
                        </ul>
                        <p class="record">POS側でレコード確認</p>
                        <p>
                            <?= Html::submitButton('確認する', ['class' => 'button_large blue', 'id' => 'user_add_submit', 'value' => '確認する', 'url_search' => Url::to(['/member/member/search/', 'salonId' => $data['salon_id']]), 'url_edit' => Url::to(['/member/member/edit/', 'salonId' => $data['salon_id']])]); ?>
                        </p>
                        <p class="p-red">※ビジター等でPOS番号不明なら、何も入力せず[確認する]をクリックしてください。</p>
                    </td>
                </tr>
            </table>
            <!-- ============================== POS会員番号[end] ============================== -->

            <?php ActiveForm::end(); ?>

        </div><!-- /#left -->

        <p class="scroll"><a href="#stop"><span class="icon-scroll"></span></a></p>

    </div><!-- /#wrapper -->
</div><!-- /#wrapper -->
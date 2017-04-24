<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

//set Breadcrumbs
Yii::$app->params['links'] = [
    [
        'label' => '会員管理',
        'url' => FALSE,
    ],
    [
        'label' => $User['user_name'],
        'url' => Yii::$app->homeUrl . 'member/user_detail/user_detail/'.$valUrl['salonId'].'/'.$valUrl['salonId'],
    ],
    [
        'label' => '会員情報等変更｜新規登録',
        'url' => FALSE
    ]
];

Yii::$app->view->title = 'Phiten IP Salon 予約管理システム｜会員情報等変更｜' . $User['user_name'] . '｜新規登録';
?>

<link href="<?= Yii::$app->request->baseUrl; ?>/css/reserve.css" rel="stylesheet" type="text/css">
<style type="text/css">
    .ha-hide,.help-block{display: none};
</style>

<script type="text/javascript" src="<?= Yii::$app->request->baseUrl; ?>/js/member/dropdown.js"></script>

<script type="text/javascript">
    $('body').attr('id', 'category');
    var memberActionId = '<?= $valUrl['memberActionId'] ?>';
    $(document).ready(function(){
        
    })
</script>

<div id="wrapper">

    <div id="left">

        <div class="title">
            <span class="icon-edit"></span><h2>会員情報等変更｜新規登録</h2>
        </div><!-- /.title -->

        <p class="date"><?= common\components\Utility::getDateInJapanFormat(date('Y/m/d')); ?></p>

        <!-- Begin form -->
        <?php $form = ActiveForm::begin(['id' => 'category-add', 'method' => 'post']); ?>

        <?php $err = $model->getErrors(); ?>
        <?php if ($err): ?>
            <div class="errorBox alawayShow">
                <ul>
                    <?php foreach ($err as $key => $value): ?>
                        <li><?php echo $value[0] ?></li>
                    <?php endforeach; ?>
                </ul>
            </div><!-- /.erroBox -->
        <?php endif; ?>
            <div id="errorBox" style="display: none">
                <div class="errorBox"></div><!-- /.erroBox -->
            </div>
        <?php
        //31 days
        for ($i = 1; $i <= 31; $i++) {
            $listDays[$i] = $i . '日';
        }
        //12 months
        for ($i = 1; $i <= 12; $i++) {
            $listMonth[$i] = $i . '月';
        }
        ?>
        <!-- ============================== 会員情報等変更｜新規登録[start] ============================== -->
        <table class="group_list list">
            <thead>
                <tr>
                    <th class="header edit" colspan="2"><span class="icon-member"></span><h2>会員情報</h2></th>
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
                    <th class="header edit" colspan="2"><span class="icon-edit"></span><h2>会員情報等変更｜新規登録</h2></th>
            </tr>
            <tr>
                <td>
                    <!-- 会員情報テーブル[start] -->
                    <table class="revision">

                        <colgroup span="1" style="width: 25%"></colgroup>
                        <colgroup span="1" style="width: 75%"></colgroup>

                        <thead>
                            <tr>
                                <th>項目</th>
                                <th>内容</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>処理</th>
                                    <?php
                                    if($valUrl['memberActionId'] == null){
                                        if($actionType != null){
                                            if($model->action_type == null){
                                                $model->action_type = $actionType;
                                            }
                                        }
                                        echo '<td>';
                                        echo $form->field($model, 'action_type')->dropDownList(
                                                [10 => '10：入会', 20 => '20：種別変更', 30 => '30：休会', 40 => '40：復会', 90 => '90：退会', 999 => '999：会員番号修正'], ['prompt' => '選択して下さい', 'class' => 'pulldown']
                                        )->label(false);
                                    }else{
                                        echo "<td class='cat'>";
                                        echo $form->field($model, 'action_type')->hiddenInput()->label(false);
                                        $actionType = [10 => '10：入会', 20 => '20：種別変更', 30 => '30：休会', 40 => '40：復会', 90 => '90：退会', 999 => '999：会員番号修正'];
                                        if (array_key_exists($model->action_type, $actionType)) {
                                            echo $actionType[$model->action_type];
                                        }
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr id="salontype" class="had ha-hide">
                                <th>変更後の会員種別</th>
                                <td>
                                    <input type="text" id="abcaaa" size="30" />
                                    <?php
                                    $arr = [];
                                    foreach ($salonMemberType as $k => $v) {
                                        $arr[$v['salon_membertype_id']] = $v['membertype_name'];
                                    }
                                    echo $form->field($model, 'salon_membertype_id_NEXT')->dropDownList(
                                            $arr, ['prompt' => '選択してください', 'class' => 'pulldown']
                                    )->label(false);
                                    ?>
                                </td>
                            </tr>
                            <tr id="memberposcd" class="had ha-hide">
                                <th>会員番号</th>
                                <td>
                                    <?php 
                                    if($model->pos_member_cd != null && strlen($model->pos_member_cd) >= 13){
                                        $model->poscd1 = substr($model->pos_member_cd,0,7);
                                        $model->poscd2 = substr($model->pos_member_cd,7,5);
                                        $model->poscd3 = substr($model->pos_member_cd,12,1);
                                    }
                                    ?>
                                    <?= Html::activeTextInput($model, 'poscd1', ['class' => 'input_form', 'id' => 'poscd1', 'size' => 15]); ?>
                                    <?= Html::activeTextInput($model, 'poscd2', ['class' => 'input_form', 'id' => 'poscd2', 'size' => 15]); ?>
                                    <?= Html::activeTextInput($model, 'poscd3', ['class' => 'input_form', 'id' => 'poscd3', 'size' => 5]); ?>
                                    <input type="button" name="pos-cd" id="pos-cd" value="確認する" data-search="<?= Yii::$app->homeUrl . 'member/user_detail/user_info_search/'.$valUrl['salonId']; ?>" class="button_small blue" />
                                </td>
                            </tr>
                            <tr>
                                <th>受付日</th>
                                <td>
                                    <ul class="date">
                                        <li>
                                            <?php
                                            $model->createYear = abs(date('Y', strtotime($model->receipt_datetime)));
                                            echo $form->field($model, 'createYear')->dropDownList(
                                                    [2014 => '2014年', 2015 => '2015年'], ['prompt' => '---年', 'class' => 'pulldown']
                                            )->label(false);
                                            ?>
                                        </li>
                                        <li>
                                            <?php
                                            $model->createMonth = abs(date('m', strtotime($model->receipt_datetime)));
                                            echo $form->field($model, 'createMonth')->dropDownList(
                                                    $listMonth, ['prompt' => '---月', 'class' => 'pulldown']
                                            )->label(false);
                                            ?>
                                        </li>
                                        <li>
                                            <?php
                                            $model->createDay = abs(date('d', strtotime($model->receipt_datetime)));
                                            echo $form->field($model, 'createDay')->dropDownList(
                                                    $listDays, ['prompt' => '---日', 'class' => 'pulldown']
                                            )->label(false);
                                            ?>
                                        </li>
                                    </ul>
                                    <a href="javascript:cal_win('<?= Yii::$app->homeUrl . "member/calendar?field=memberaction-create"; ?>','calendar');" class="icon-calendar" title="日付変更カレンダー"></a>
                                </td>
                            </tr>
                            <tr id="suspended" class="had ha-hide">
                                <th>休会処理日</th>
                                <td>
                                    <ul class="date">
                                        <li>
                                            <?php
                                            $model->suspendedYear = abs(date('Y', strtotime($model->comeback_date)));
                                            echo $form->field($model, 'suspendedYear')->dropDownList(
                                                    [2014 => '2014年', 2015 => '2015年'], ['prompt' => '---年', 'class' => 'pulldown']
                                            )->label(false);
                                            ?>
                                        </li>
                                        <li>
                                            <?php
                                            $model->suspendedMonth = abs(date('m', strtotime($model->comeback_date)));
                                            echo $form->field($model, 'suspendedMonth')->dropDownList(
                                                    $listMonth, ['prompt' => '---月', 'class' => 'pulldown']
                                            )->label(false);
                                            ?>
                                        </li>
                                        <li>
                                            <?php
                                            $model->suspendedDay = abs(date('d', strtotime($model->comeback_date)));
                                            echo $form->field($model, 'suspendedDay')->dropDownList(
                                                    $listDays, ['prompt' => '---日', 'class' => 'pulldown']
                                            )->label(false);
                                            ?>
                                        </li>
                                    </ul>
                                    <a href="javascript:cal_win('<?= Yii::$app->homeUrl . "member/calendar?field=memberaction-suspended"; ?>','calendar');" class="icon-calendar" title="日付変更カレンダー"></a>
                                </td>
                            </tr>
                            <tr id="withdrew" class="had ha-hide">
                                <th>退会処理日</th>
                                <td>
                                    <ul class="date">
                                        <li>
                                            <?php
                                            $model->withdrewYear = abs(date('Y', strtotime($model->resume_date)));
                                            echo $form->field($model, 'withdrewYear')->dropDownList(
                                                    [2014 => '2014年', 2015 => '2015年'], ['prompt' => '---年', 'class' => 'pulldown']
                                            )->label(false);
                                            ?>
                                        </li>
                                        <li>
                                            <?php
                                            $model->withdrewMonth = abs(date('m', strtotime($model->resume_date)));
                                            echo $form->field($model, 'withdrewMonth')->dropDownList(
                                                    $listMonth, ['prompt' => '---月', 'class' => 'pulldown']
                                            )->label(false);
                                            ?>
                                        </li>
                                        <li>
                                            <?php
                                            $model->withdrewDay = abs(date('d', strtotime($model->resume_date)));
                                            echo $form->field($model, 'withdrewDay')->dropDownList(
                                                    $listDays, ['prompt' => '---日', 'class' => 'pulldown']
                                            )->label(false);
                                            ?>
                                        </li>
                                    </ul>
                                    <a href="javascript:cal_win('<?= Yii::$app->homeUrl . "member/calendar?field=memberaction-withdrew"; ?>','calendar');" class="icon-calendar" title="日付変更カレンダー"></a>
                                </td>
                            </tr>
                            <tr id="fuku-kai" class="had ha-hide">
                                <th>復会処理日</th>
                                <td>
                                    <ul class="date">
                                        <li>
                                            <?php
                                            $model->fukukaiYear = abs(date('Y', strtotime($model->resume_date)));
                                            echo $form->field($model, 'fukukaiYear')->dropDownList(
                                                    [2014 => '2014年', 2015 => '2015年'], ['prompt' => '---年', 'class' => 'pulldown']
                                            )->label(false);
                                            ?>
                                        </li>
                                        <li>
                                            <?php
                                            $model->fukukaiMonth = abs(date('m', strtotime($model->resume_date)));
                                            echo $form->field($model, 'fukukaiMonth')->dropDownList(
                                                    $listMonth, ['prompt' => '---月', 'class' => 'pulldown']
                                            )->label(false);
                                            ?>
                                        </li>
                                        <li>
                                            <?php
                                            $model->fukukaiDay = abs(date('d', strtotime($model->resume_date)));
                                            echo $form->field($model, 'fukukaiDay')->dropDownList(
                                                    $listDays, ['prompt' => '---日', 'class' => 'pulldown']
                                            )->label(false);
                                            ?>
                                        </li>
                                    </ul>
                                    <a href="javascript:cal_win('<?= Yii::$app->homeUrl . "member/calendar?field=memberaction-fukukai"; ?>','calendar');" class="icon-calendar" title="日付変更カレンダー"></a>
                                </td>
                            </tr>
                            <tr>
                                <th>理由など</th>
                                <td><?= $form->field($model, 'reason')->textArea(['rows' => '4', 'cols' => '40'])->label(false) ?></td>
                            </tr>
                            <?php if($model->status == 0 && $valUrl['memberActionId'] != null){ ?>
                            <tr>
                                <th>処理状況</th>
                                <td>0：未処理<input type="button" name="cancel" value="取り消す" class="button_small blue" onclick="location.href = '<?= Yii::$app->request->baseUrl . '/member/user_history/category_canceled/' . $valUrl['salonId'] . '/' . $valUrl['salonId']; ?>'"></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <!-- 履歴テーブル[end] -->

                </td>
            </tr>
            <tr>
                <td class="button">
                    <!-- 閉じる -->
                    <input type="button" name="pos-history" value="閉じる" class="button_small gray" onclick="location.href = '<?= Yii::$app->request->baseUrl . '/member/user_history/category_history/' . $valUrl['salonId'] . '/' . $valUrl['salonId']; ?>'">
                    <!-- 設定する -->
                    <input type="submit" name="pos-submit" value="設定する" class="button_small blue" />
                </td>
            </tr>

            </tbody>
        </table>
        <!-- ============================== 会員情報等変更｜新規登録[end] ============================== -->

        <?php ActiveForm::end(); ?>
    </div><!-- /#left -->

    <p class="scroll"><a href="#stop"><span class="icon-scroll"></span></a></p>

</div><!-- /#wrapper -->
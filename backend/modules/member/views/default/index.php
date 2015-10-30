<link href="<?= Yii::$app->request->baseUrl; ?>/css/user.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?= Yii::$app->request->baseUrl; ?>/js/jquery.clickableTr.js"></script>

<script type="text/javascript">
    $('body').attr('id', 'user_index');
    var url = '<?= Yii::$app->request->url ?>';
</script>

<script type="text/javascript" src="<?= Yii::$app->homeUrl ?>js/users/list-user.js"></script>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

Yii::$app->view->title = 'Phiten IP Salon 予約管理システム｜会員管理 | 会員一覧';
//set Breadcrumbs
Yii::$app->params['links'] = [
    [
        'label' => '会員管理',
        'url' => false,
    ]
];
?>

<div id="wrapper">

    <!-- ============================== ユーザー新規登録[start] ============================== -->
    <table class="entry">
        <tr>
            <th>ユーザー新規登録</th>
            <td><a href="<?= Yii::$app->homeUrl . 'member/user_detail/user_info_add/' . $salonId; ?>" class="button" title="新規登録"><span>新規登録</span></a></td>
        </tr>
    </table>
    <!-- ============================== ユーザー新規登録[end] ============================== -->

    <!-- ============================== ユーザー検索[start] ============================== -->
    <table class="search">
        <tr>
            <th>ユーザー検索</th>
            <td>
                <?php $form = ActiveForm::begin(['action' => Yii::$app->request->baseUrl . '/member/user_index/' . $salonId, 'id' => 'member-list', 'method' => 'get']); ?>
                <!-- 会員種別 -->
                <input type="hidden" id="ordersort" readonly="readonly" value="asc" />
                <input type="hidden" id="ordertype" readonly="readonly" value="user_kana" />
                <p>
                    <label for="category">会員種別</label>
                    <select id="category" name="membertype_id" class="pulldown">
                        <option value="" selected>選択して下さい</option>
                        <?php if (isset($listMembertype)) { ?>
                            <?php foreach ($listMembertype as $memtype) { ?>
                                <option value="<?php echo $memtype['salon_membertype_id']; ?>" <?php
                                if ($model->salon_membertype_id == $memtype['salon_membertype_id']) {
                                    echo 'selected="selected"';
                                }
                                ?>><?php echo $memtype['membertype_name']; ?></option>
                                        <?php
                                    }
                                }
                                ?>
                    </select>
                </p>
                <!-- ステータス -->
                <p>
                    <label for="status">ステータス</label>
                    <select id="status" name="status" class="pulldown">
                        <option value="" selected="">選択して下さい</option>
                        <?php
                        $arrstatus = ['0' => '仮会員', '1' => '本会員', '2' => '休会会員', '9' => '退会済み'];
                        ?>
                        <?php foreach ($arrstatus as $key => $val) { ?>
                            <option value="<?php echo $key; ?>" <?php
                            if ($model->status == '' . $key . '') {
                                echo "selected='selected'";
                            }
                            ?>><?php echo $key . "." . $val; ?></option>
                                <?php } ?>
                    </select>
                </p>
                <!-- 検索ボタン -->
                <p class="submit">
                    <input type="submit" id="submit" class="input_button" value="検索" />
                </p>
                </form><?php ActiveForm::end(); ?>
            </td>
        </tr>
    </table>
    <!-- ============================== ユーザー検索[end] ============================== -->

    <!-- ============================== ユーザー一覧[start] ============================== -->
    <table class="list">
        <colgroup span="1" class="group"></colgroup>
        <colgroup span="1" class="id"></colgroup>
        <colgroup span="1" class="name"></colgroup>
        <colgroup span="1" class="category"></colgroup>
        <colgroup span="1" class="status"></colgroup>
        <colgroup span="1" class="tel"></colgroup>
        <colgroup span="1" class="address"></colgroup>

        <thead>
            <tr class="hasort">
                <th>グループ</th>
                <th id="member_id">会員番号&nbsp;<a href="#" class="asc">▲</a><a href="#" class="desc">▼</a>/ID</th>
                <th id="user_name">お名前&nbsp;<a href="#" class="asc">▲</a><a href="#" class="desc">▼</a></th>
                <th>会員種別</th>
                <th>ステータス</th>
                <th id="user_tel">電話番号&nbsp;<a href="#" class="asc">▲</a><a href="#" class="desc">▼</a></th>
                <th>住所</th>
            </tr>
        </thead>
        <tbody id="wrap">
            <?php echo $this->render('list_order', ['listMember' => $listMember, 'salonId'=>$salonId]); ?>
        </tbody>
    </table>
    <!-- ============================== ユーザー一覧[start] ============================== -->
    <div id="loadingimg" style="text-align: center;margin:10px 0 20px 0"><img id="loading" src="<?php echo Yii::$app->request->baseUrl; ?>/img/icon_loading.gif" alt="loading" style="display:none"  width="29" height="29" class="loading" /></div>
    <p class="scroll"><a href="#stop"><span class="icon-scroll"></span></a></p>

</div><!-- /#wrapper -->
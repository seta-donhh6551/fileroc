<?php

    use yii\helpers\Url;
    Yii::$app->view->title = 'Phiten IP Salon 予約管理システム｜ユーザー編集';
?>
<!doctype html>
<html lang="ja">

    <head>
        <meta charset="UTF-8">

        <title>Phiten IP Salon 予約管理システム｜ユーザー編集</title>

        <!-- stylesheet -->
        <link href="<?= Yii::$app->request->baseUrl; ?>/css/normalize.css" rel="stylesheet" type="text/css">
        <link href="<?= Yii::$app->request->baseUrl; ?>/css/common.css" rel="stylesheet" type="text/css">
        <link href="<?= Yii::$app->request->baseUrl; ?>/css/user.css" rel="stylesheet" type="text/css">


        <script type="text/javascript">
            function disp(url) {
                window.opener.location.href = url;
            }
        </script>

        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <![endif]-->

    </head>

    <body id="user_search">

        <table>
            <thead>
                <tr>
                    <th colspan="2" class="record">
                        ファイテンショップ岸和田店IPサロン<br>
                        会員番号：17212<br>
                        で、下記のレコードがヒットしました。
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th class="info">お名前</th>
                    <td>知多 利雄</td>
                </tr>
                <tr>
                    <th class="info">お名前（カナ）</th>
                    <td>チタ トシオ</td>
                </tr>
                <tr>
                    <th class="info">電話番号</th>
                    <td>012-3456-7890</td>
                </tr>
                <tr>
                    <th class="info">電話番号2</th>
                    <td>---</td>
                </tr>
                <tr>
                    <th class="info">郵便番号</th>
                    <td>111-2222</td>
                </tr>
                <tr>
                    <th class="info">住所1</th>
                    <td>大阪府岸和田市</td>
                </tr>
                <tr>
                    <th class="info">住所2</th>
                    <td>土生町1-23-456</td>
                </tr>
                <tr>
                    <th class="info">住所3</th>
                    <td>○○マンションxxx</td>
                </tr>
                <tr>
                    <th class="info">メールアドレス</th>
                    <td>user@pado.co.jp</td>
                </tr>
                <tr>
                    <th class="info">性別</th>
                    <td>1.男性</td>
                </tr>
                <tr>
                    <th class="info">生年月日</th>
                    <td>1957-1-1</td>
                </tr>

            </tbody>
        </table>

        <ul>
            <li><a href="#" onClick="disp('<?= Url::to(['/member/member/edit/', 'salonId' => $data['salon_id'], 'memberId' => $data['member_id'], 'pos' => $data['pos']]); ?>');
                    window.close();
                    return false;" title="読み込む" class="button_small green">読み込む</a></li>
            <li><a href="#" onClick="disp('<?= Url::to(['/member/member/edit/', 'salonId' => $data['salon_id'], 'memberId' => $data['member_id'], 'pos' => '']); ?>');window.close();
                    return false;" title="破棄する" class="button_small blue">破棄する</a></li>
        </ul>

    </body>
</html>
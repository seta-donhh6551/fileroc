<?php if (isset($listMember) && $listMember != NULL) { ?>
    <?php
    $stt = 0;
    foreach ($listMember as $user) {
        ?>
        <tr class="item <?php
        if ($stt % 2 == 0) {
            echo 'even';
        } else {
            echo 'odd';
        }
        ?> clickable" data-href="<?= Yii::$app->homeUrl . 'member/user_detail/user_detail/'.$salonId.'/'. $user['member_id'] ?>">
            <td class="group"><span class="icon-group"></span></td>
            <td class="id"><?php echo $user['pos_member_cd']; ?><br>ID:<?php echo $user['member_id']; ?></td>
            <td class="name"><span class="icon-<?php
                if ($user['gender'] == 1) {
                    echo 'male';
                } elseif ($user['gender'] == 2) {
                    echo 'female';
                } else {
                    echo '';
                }
                ?>"></span><?php echo $user['user_name']; ?><br><span class="kana"><?php echo $user['user_kana']; ?></span></td>
            <td class="category">
                <?php
                if ($user['salon_membertype_id'] == NULL) {
                    echo "【ビジター】";
                } else {
                    ?>
                    <?php echo $user['membertype_name']; ?><br>標準:<?php echo $user['timelimit_atday']; ?>分
                <?php } ?>
            </td>
            <?php
            $arrstatus = ['0' => '仮会員', '1' => '本会員', '2' => '休会会員', '9' => '退会済み'];
            ?>
            <td clasa="status">
                <?php
                if (array_key_exists($user['status'], $arrstatus)) {
                    echo $user['status'] . '.' . $arrstatus[$user['status']];
                }
                ?>
            </td>
            <td class="tel"><?php echo $user['user_tel']; ?></td>
            <td class="address"><?php echo $user['addr_1'] . $user['addr_2'] . $user['addr_3']; ?></td>
        </tr>
        <?php
        $stt++;
    }
}
?>
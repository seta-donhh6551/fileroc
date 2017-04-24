<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
?>

<script type="text/javascript">
$(document).ready(function(){
    var $items = $("ul#menu li a");
    $items.eq(2).addClass("selected_lk");
});
</script>

<div class="section">
    <!--[if !IE]>start title wrapper<![endif]-->
    <div class="title_wrapper">
        <span class="title_wrapper_top"></span>
        <div class="title_wrapper_inner">
            <span class="title_wrapper_middle"></span>
            <div class="title_wrapper_content">
                <h2 class="menu_title">Thành viên</h2>
            </div>
        </div>
        <span class="title_wrapper_bottom"></span>
    </div>
    <!--[if !IE]>end title wrapper<![endif]-->

    <!--[if !IE]>start section content<![endif]-->
    <div class="section_content">
        <span class="section_content_top"></span>

        <div class="section_content_inner minheight">
            <div class="table_tabs_menu">
                <!--[if !IE]>start  tabs<![endif]-->
                <!--[if !IE]>end  tabs<![endif]-->

            </div>
            <!--[if !IE]>start table_wrapper<![endif]-->
            <div class="table_wrapper" style="background:none;">
                <div class="table_wrapper_inner">
                    <?php $err = $model->getErrors(); ?>
                    <?php if ($err): ?>
                        <div class="error_red">
                            <ul>
                                <?php foreach ($err as $key => $value): ?>
                                    <li><?php echo $value[0] ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div><!-- /.erroBox -->
                    <?php endif; ?>
                    <!-- Begin form -->
                    <?php $form = ActiveForm::begin(['id' => 'user-manage', 'method' => 'post']); ?>
                        <div class="form_items">
                            <div class="form_items_left">Tên tài khoản</div>
                            <div class="form_items_right"><?= Html::activeTextInput($model, 'username', ['size' => 30]); ?></div>
                        </div>
                        <div class="form_items">
                            <div class="form_items_left">Mật khẩu</div>
                            <div class="form_items_right"><?= Html::activePasswordInput($model, 'password', ['size' => 30]); ?></div>
                        </div>
                        <div class="form_items">
                            <div class="form_items_left">Nhập lại mật khẩu</div>
                            <div class="form_items_right">
                                <?= Html::activePasswordInput($model, 'repassword', ['size' => 30]); ?>
                            </div>
                        </div>
                        <div class="form_items">
                            <div class="form_items_left">Cấp độ</div>
                            <div class="form_items_right">
                                <?php
                                    echo $form->field($model, 'level')->dropDownList(
                                            ['1'=>'admin'], ['class' => 'pulldown']
                                    )->label(false);
                                ?>
                            </div>
                        </div>
                        <div class="form_items">
                            <div class="form_items_left">Họ tên</div>
                            <div class="form_items_right">
                                <?= Html::activeTextInput($model, 'name', ['size' => 30]); ?>
                            </div>
                        </div>
                        <div class="form_items">
                            <div class="form_items_left">Giới tính</div>
                            <div class="form_items_right">
                                <?php
                                    echo $form->field($model, 'gender')->dropDownList(
                                            ['1'=>'-- Nam -- ','0'=>'-- Nữ -- '], ['class' => 'pulldown']
                                    )->label(false);
                                ?>
                            </div>
                        </div>
                        <div class="form_items">
                            <div class="form_items_left">Số điện thoại</div>
                            <div class="form_items_right"><?= Html::activeTextInput($model, 'phone', ['size' => 30]); ?></div>
                        </div>
                        <div class="form_items">
                            <div class="form_items_left">Địa chỉ</div>
                            <div class="form_items_right"><?= Html::activeTextInput($model, 'adress', ['size' => 30]); ?></div>
                        </div>
                        <div class="form_items">
                            <div class="form_items_left">Email address</div>
                            <div class="form_items_right"><?= Html::activeTextInput($model, 'email', ['size' => 30]); ?></div>
                        </div>
                        <div class="form_items">
                            <div class="form_items_left">&nbsp;</div>
                            <div class="form_items_right"><input type="submit" name="submit" value="Submit" class="magin"></div>
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
            <!--[if !IE]>end table_wrapper<![endif]-->
        </div>
        <span class="section_content_bottom"></span>
    </div>
    <!--[if !IE]>end section content<![endif]-->
</div>
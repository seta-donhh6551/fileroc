<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
?>

<script type="text/javascript">
$(document).ready(function(){
    var $items = $("ul#menu li a");
    $items.eq(3).addClass("selected_lk");
});
</script>

<div class="section">
    <!--[if !IE]>start title wrapper<![endif]-->
    <div class="title_wrapper">
        <span class="title_wrapper_top"></span>
        <div class="title_wrapper_inner">
            <span class="title_wrapper_middle"></span>
            <div class="title_wrapper_content">
                <h2 class="menu_title">Thêm mới, sửa menu</h2>
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
                    <?php $form = ActiveForm::begin(['id' => 'menu-add', 'method' => 'post', 'options' => ['enctype' => 'multipart/form-data']]); ?>
                        <div class="form_items">
                            <div class="form_items_left">Tên menu</div>
                            <div class="form_items_right"><?= Html::activeTextInput($model, 'name', ['size' => 35]); ?></div>
                        </div>
                        <div class="form_items">
                            <div class="form_items_left">Thứ tự</div>
                            <div class="form_items_right"><?= Html::activeTextInput($model, 'order', ['size' => 35]); ?></div>
                        </div>
						<?php //} ?>
						<div class="form_items">
                            <div class="form_items_left">Trạng thái</div>
                            <div class="form_items_right">
                                <?php if($model->status == null){ $model->status = 1;}?>
                                <input type="radio" name="Categorytutorial[status]" value="1" <?php if($model->status == 1){ echo "checked='checked'";} ?>/>Yes
                                <input type="radio" name="Categorytutorial[status]" value="0" <?php if($model->status == 0){ echo "checked='checked'";} ?>/>No
                            </div>
                        </div>
						<div class="form_items">
                            <div class="form_items_left">Select icon</div>
                            <div class="form_items_right">
								<?php if($model->icon){ ?>
								<img src="<?= '/uploads/icons/'.$model->icon; ?>" width="30" />
								<?php } ?>
								<input type="file" name="Categorytutorial[icon]" size="10" />
							</div>
                        </div>
                        <div class="form_items">
                            <div class="form_items_left">Keywords</div>
                            <div class="form_items_right">
                                <?= $form->field($model, 'keywords')->textArea(['rows' => '5', 'cols' => '40'])->label(false) ?>
                            </div>
                        </div>
                        <div class="form_items">
                            <div class="form_items_left">Description</div>
                            <div class="form_items_right">
                                <?= $form->field($model, 'description')->textArea(['rows' => '5', 'cols' => '40'])->label(false) ?>
                            </div>
                        </div>
                        <div class="form_items">
                            <div class="form_items_left">Mô tả</div>
                            <div class="form_items_right">
                                <?= $form->field($model, 'info')->textArea(['rows' => '7', 'cols' => '50'])->label(false) ?>
                            </div>
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
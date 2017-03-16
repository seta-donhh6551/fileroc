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
                <h2 class="menu_title">Thêm mới, sửa bài viết</h2>
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
                    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
                        <div class="form_items">
                            <div class="form_items_left">Tiêu đề</div>
                            <div class="form_items_right"><?= Html::activeTextInput($model, 'title', ['size' => 35]); ?></div>
                        </div>
                        <div class="form_items">
                            <div class="form_items_left">Thuộc mục</div>
                            <div class="form_items_right">
                                <?php
                                    $listData=ArrayHelper::map($listCate,'id','name');
                                    echo $form->field($model, 'cate_id')->dropDownList(
                                        $listData, ['prompt' => 'Select','class' => 'pulldown']
                                    )->label(false)->error(false);
                                ?>
                            </div>
                        </div>
                        <div class="form_items">
                            <div class="form_items_left">Sub category</div>
                            <div class="form_items_right">
                                <?php
                                    echo $form->field($model, 'sub_id')->dropDownList(
                                        array(), ['prompt' => 'Select submenu','class' => 'pulldown']
                                    )->label(false)->error(false);
                                ?>
                            </div>
                        </div>
                        <div class="form_items">
                            <div class="form_items_left">Kid category</div>
                            <div class="form_items_right">
                                <?php
                                    echo $form->field($model, 'kid_id')->dropDownList(
                                        array(), ['prompt' => 'Select kid','class' => 'pulldown']
                                    )->label(false)->error(false);
                                ?>
                            </div>
                        </div>
                        <div class="form_items">
                            <div class="form_items_left">Publisher</div>
                            <div class="form_items_right"><?= Html::activeTextInput($model, 'author', ['size' => 35]); ?></div>
                        </div>
                        <div class="form_items">
                            <div class="form_items_left">Publisher url</div>
                            <div class="form_items_right"><?= Html::activeTextInput($model, 'author_url', ['size' => 35]); ?></div>
                        </div>
                        <div class="form_items">
                            <div class="form_items_left">Lượt xem</div>
                            <div class="form_items_right"><?= Html::activeTextInput($model, 'views', ['size' => 35]); ?></div>
                        </div>
                        <div class="form_items">
                            <div class="form_items_left">Trạng thái</div>
                            <div class="form_items_right">
                                <?php if($model->status == null){ $model->status = 0;}?>
                                <input type="radio" name="Posts[status]" value="1" <?php if($model->status == 1){ echo "checked='checked'";} ?>/>Yes
                                <input type="radio" name="Posts[status]" value="0" <?php if($model->status == 0){ echo "checked='checked'";} ?>/>No
                            </div>
                        </div>
                        <div class="form_items">
                            <div class="form_items_left">Phân loại</div>
                            <div class="form_items_right">
                                <?php if($model->type == null){ $model->type = 1;}?>
                                <input type="radio" name="Posts[type]" value="1" <?php if($model->type == 1){ echo "checked='checked'";} ?>/>Trial
                                <input type="radio" name="Posts[type]" value="2" <?php if($model->type == 2){ echo "checked='checked'";} ?>/>Free
                            </div>
                        </div>
                        <div class="form_items">
                            <div class="form_items_left">Url file</div>
                            <div class="form_items_right">
                                <?= Html::activeTextInput($model, 'url_soft', ['size' => 35]); ?>
                            </div>
                        </div>
						<div class="form_items">
                            <div class="form_items_left">Url dự phòng 1</div>
                            <div class="form_items_right">
                                <?= Html::activeTextInput($model, 'url_provide1', ['size' => 35]); ?>
                            </div>
                        </div>
						<div class="form_items">
                            <div class="form_items_left">Url dự phòng 2</div>
                            <div class="form_items_right">
                                <?= Html::activeTextInput($model, 'url_provide2', ['size' => 35]); ?>
                            </div>
                        </div>
                        <div class="form_items">
                            <div class="form_items_left">Version</div>
                            <div class="form_items_right">
                                <?= Html::activeTextInput($model, 'version', ['size' => 35]); ?>
                            </div>
                        </div>
						<div class="form_items">
                            <div class="form_items_left">File size</div>
                            <div class="form_items_right">
                                <?= Html::activeTextInput($model, 'filesize', ['size' => 35]); ?>
                            </div>
                        </div>
						<div class="form_items">
                            <div class="form_items_left">Yêu cầu Os</div>
                            <div class="form_items_right">
                                <?= Html::activeTextInput($model, 'required', ['size' => 35]); ?>
                            </div>
                        </div>
						<div class="form_items">
                            <div class="form_items_left">Hạn dùng</div>
                            <div class="form_items_right">
                                <?= Html::activeTextInput($model, 'time_limit', ['size' => 35]); ?>
                            </div>
                        </div>
						<div class="form_items">
                            <div class="form_items_left">Youtube url</div>
                            <div class="form_items_right">
                                <?= Html::activeTextInput($model, 'url_video', ['size' => 35]); ?>
                            </div>
                        </div>
                        <div class="form_items">
                            <div class="form_items_left">Ảnh thumb</div>
                            <div class="form_items_right">
                                <input type="checkbox" name="Posts[autoResize]" value="1" />Auto Resize
                                <?php if($model->thumb){ ?>
                                <img src="<?= '/uploads/thumb/'.$model->thumb; ?>" width="100" />
                                <?php } ?>
                                <?= $form->field($model, 'imgUpload')->fileInput()->label(false); ?>
                            </div>
                        </div>
                        <div class="form_items">
                            <div class="form_items_left">Keywords</div>
                            <div class="form_items_right">
                                <?= $form->field($model, 'keywords')->textArea(['rows' => '4', 'cols' => '40'])->label(false) ?>
                            </div>
                        </div>
                        <div class="form_items">
                            <div class="form_items_left">Description</div>
                            <div class="form_items_right">
                                <?= $form->field($model, 'description')->textArea(['rows' => '4', 'cols' => '40'])->label(false) ?>
                            </div>
                        </div>
						<div class="form_items">
                            <div class="form_items_left">Dòng mô tả</div>
                            <div class="form_items_right">
                                <?= Html::activeTextInput($model, 'short_info', ['size' => 50]); ?>
                            </div>
                        </div>
						<div class="form_items">
                            <div class="form_items_left">Mô tả ngắn</div>
                            <div class="form_items_right">
                                <?= Html::activeTextarea($model, 'short_intro', ['cols' => 50, 'rows' => '7']); ?>
                            </div>
                        </div>
                        <div class="form_items">
                            <div class="form_items_left">Mô tả đầu bài viết</div>
                            <div class="form_items_right">
                            <?php 
                            $fck = new FCKeditor('Posts[info]');
                            $fck->BasePath = sBASEPATH;
                            $fck->Value  = $model->info;
                            $fck->Width  = '100%';
                            $fck->Height = 400;
                            $fck->Create();
                           ?>   
                        </div>
						<div class="form_items">
                            <div class="form_items_left">Chức năng chính</div>
                            <div class="form_items_right">
                            <?php 
                            $fck = new FCKeditor('Posts[info_function]');
                            $fck->BasePath = sBASEPATH;
                            $fck->Value  = $model->info_function;
                            $fck->Width  = '100%';
                            $fck->Height = 400;
                            $fck->Create();
                           ?>   
                        </div>
                        <div class="form_items">
                            <div class="form_items_left">Nội dung chi tiết</div>
                            <div class="form_items_right">
                            <?php 
                            $fck = new FCKeditor('Posts[fullcontent]');
                            $fck->BasePath = sBASEPATH;
                            $fck->Value  = $model->fullcontent;;
                            $fck->Width  = '100%';
                            $fck->Height = 400;
                            $fck->Create();
                           ?>  
                            </div>
                        </div>
                        <div class="form_items">
                            <div class="form_items_left">Ảnh Icon</div>
                            <div class="form_items_right">
								<?php if($model->icon){ ?>
                                <img src="<?= '/uploads/icons/'.$model->icon; ?>" width="35" />
                                <?php } ?>
                                <?= $form->field($model, 'imgIcon')->fileInput()->label(false); ?>
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
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $('#posts-cate_id').change(function(){
        var cate_id = $(this).val();
        getSubMenu(cate_id, null);
    });
    $('#posts-sub_id').change(function(){
        var sub_id = $(this).val();
        getKidMenu(sub_id, null);
    });
    <?php if($model->cate_id){ ?>
    //get sub category
    var cateId = '<?= $model->cate_id ?>';
    var subId = '<?= $model->sub_id ?>';
    getSubMenu(cateId, subId);	
    //end
    <?php } ?>
    <?php if($model->sub_id){ ?>
    //get sub category
    var kidId = '<?= $model->kid_id ?>';
    var subId = '<?= $model->sub_id ?>';
    getKidMenu(subId, kidId);	
    //end
    <?php } ?>
    function getSubMenu(cateId, subId){
        var submenu = $('#posts-sub_id');
        var string = '<option value="">Select submenu</option>';
        if(cateId == ''){
            submenu.val(string);
            return false;
        }
        $.post('<?= Yii::$app->request->baseUrl; ?>/posts/input/getsub', {cate_id:cateId, sub_id:subId}, function(result){
                submenu.html(result);
        });
    }
    function getKidMenu(subId, kidId){
        var kidmenu = $('#posts-kid_id');
        var string = '<option value="">Select kid</option>';
        if(subId == ''){
            kidmenu.val(string);
            return false;
        }
        $.post('<?= Yii::$app->request->baseUrl; ?>/posts/input/getkid', {sub_id:subId, kid_id:kidId}, function(result){
            kidmenu.html(result);
        });
    }
})
</script>
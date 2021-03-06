<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
?>

<script type="text/javascript">
$(document).ready(function()
{
    var $items = $("ul#menu li a");
    $items.eq(1).addClass("selected_lk");
	
	$('#related-soft').keyup(function()
	{
		$('#list-soft').html('');
        $('#list-soft-selected').removeClass('hide');
        $('#show-list-soft').removeClass('hide');
		var keyword = $(this).val();
		var listData = '';
        $.post('<?= Yii::$app->request->baseUrl; ?>/posts/default/search', {keyword:keyword}, function(result){
			var listSoft = jQuery.parseJSON(result);
			for(i=0;i<listSoft.length;++i)
			{
				listData += '<div class="softitem"><input type="checkbox" name="itemsoft" value="'+listSoft[i].id+'" /><span>'+listSoft[i].title+'</span><div>';
			}
			$('#list-soft').html(listData);
        });
	});
    
    $(document).on('click', '.softitem input', function(){
        var id = $(this).val();
        var text = $(this).next().text();
        var append = '<div class="selected-item"><input type="checkbox" name="Tutorials[listsoft][]" value="'+id+'" checked="checked">'+text+'</div>';
        $('#selected-soft').append(append);
        return false;
    });
    
    $(document).on('click', '.selected-item', function(){
        $(this).remove();
    });
    
});
</script>

<div class="section">
    <!--[if !IE]>start title wrapper<![endif]-->
    <div class="title_wrapper">
        <span class="title_wrapper_top"></span>
        <div class="title_wrapper_inner">
            <span class="title_wrapper_middle"></span>
            <div class="title_wrapper_content">
                <h2 class="menu_title">Tạo hoặc sửa tutorial</h2>
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
                     <?php $errorUpload = Yii::$app->session->getFlash('errorUpload'); ?>
                    <?php $err = $model->getErrors(); ?>
                    <?php if($err || $errorUpload): ?>
                        <div class="error_red">
                            <ul>
                                <li><?= $errorUpload ?></li>
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
                            <div class="form_items_left">Lượt xem</div>
                            <div class="form_items_right"><?= Html::activeTextInput($model, 'views', ['size' => 35]); ?></div>
                        </div>
                        <div class="form_items">
                            <div class="form_items_left">Thứ tự hiển thị</div>
                            <div class="form_items_right"><?= Html::activeTextInput($model, 'order_by', ['size' => 35]); ?></div>
                        </div>
                        <div class="form_items">
                            <div class="form_items_left">Trạng thái</div>
                            <div class="form_items_right">
                                <?php if($model->status == null){ $model->status = 0;}?>
                                <input type="radio" name="Tutorials[status]" value="1" <?php if($model->status == 1){ echo "checked='checked'";} ?>/>Yes
                                <input type="radio" name="Tutorials[status]" value="0" <?php if($model->status == 0){ echo "checked='checked'";} ?>/>No
                            </div>
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
                            <div class="form_items_left">Mô tả đầu bài viết</div>
                            <div class="form_items_right">
                            <?php 
                            $fck = new FCKeditor('Tutorials[info]');
                            $fck->BasePath = sBASEPATH;
                            $fck->Value  = $model->info;
                            $fck->Width  = '100%';
                            $fck->Height = 400;
                            $fck->Create();
                           ?>   
                        </div>
						<div class="form_items">
                            <div class="form_items_left">Nội dung bài viết</div>
                            <div class="form_items_right">
                            <?php 
                            $fck = new FCKeditor('Tutorials[fullcontent]');
                            $fck->BasePath = sBASEPATH;
                            $fck->Value  = $model->fullcontent;
                            $fck->Width  = '100%';
                            $fck->Height = 400;
                            $fck->Create();
                            ?>
                            </div>
                        </div>
						<div class="form_items" style="padding: 10px 0px">
                            <div class="form_items_left">Thẻ tags</div>
                            <div class="form_items_right">
								<?php
								$listTags = '';
								foreach($listTagRelated as $tags){
									$listTags .= $tags['name'].', ';
								}
								$listTags = trim($listTags, ', ');
								?>
								<textarea name="Tutorials[tags]" cols="50" rows="4" placeholder="Free chat, Xem video, Trình duyệt web"><?= $listTags; ?></textarea>
                            </div>
                        </div>
						<div class="form_items" style="padding: 10px 0px">
                            <div class="form_items_left">Phần mềm liên quan</div>
                            <div class="form_items_right">
								<input type="text" name="related-soft" id="related-soft" size="35" />
                            </div>
                        </div>
                            <div id="list-soft-selected" class="form_items <?php if(empty($listRelated)){ echo 'hide';} ?>" style="padding: 5px 0px 10px 0px">
							<div class="form_items_left">Đã chọn</div>
							<div id="selected-soft" class="form_items_right">
							<?php foreach($listRelated as $related){ ?>
                                <div class="selected-item"><input type="checkbox" name="Tutorials[listsoft][]" value="<?php echo $related['post_id']; ?>" checked="checked" /><span><?= $related['title']; ?></span></div>
							<?php } ?>
							</div>
						</div>
                            <div id="show-list-soft" class="form_items hide" style="padding: 5px 0px 10px 0px">
							<div class="form_items_left">Những phần mềm liên quan</div>
							<div id="list-soft" class="form_items_right">
							</div>
						</div>
                        <div class="form_items">
                            <div class="form_items_left">Ảnh thumb</div>
                            <div class="form_items_right">
                                <?php if($model->thumb){ ?>
                                    <img src="<?= '/uploads/thumb/'.$model->thumb; ?>" width="100" />
                                <?php } ?>
                                <?= $form->field($model, 'imgUpload')->fileInput()->label(false); ?>
                                <input type="checkbox" name="Tutorials[autoResize]" value="1" />Auto Resize
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
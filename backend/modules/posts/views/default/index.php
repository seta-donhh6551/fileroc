<div class="section">
    <script type="text/javascript">
        //Function confirm
        function askConfirm(){
            if(!confirm('Bạn có muốn xóa không?')){
                return false;
            }
        }
    </script>
    <script type="text/javascript">
    $(document).ready(function(){
        var $items = $("ul#menu li a");
        $items.eq(3).addClass("selected_lk");        
    });
    </script>
    <!--[if !IE]>start title wrapper<![endif]-->
    <div class="title_wrapper">
        <span class="title_wrapper_top"></span>
        <div class="title_wrapper_inner">
            <span class="title_wrapper_middle"></span>
            <div class="title_wrapper_content">
                <h2 class="menu_title">Quản lý Menu</h2>
            </div>
        </div>
        <span class="title_wrapper_bottom"></span>
    </div>
    <!--[if !IE]>end title wrapper<![endif]-->

    <!--[if !IE]>start section content<![endif]-->
    <div class="section_content">
        <span class="section_content_top"></span>
		<div class="section_content_inner" style="padding-bottom:0px;">
			<div class="div_search">
                <form action="" method="get" name="search-form">
					<table cellpadding="0" cellspacing="0">
						<tbody>
							<tr>
								<!--td style="width:100px"><strong style="color:green">Tìm kiếm</strong></td-->
								<td style="width:300px"><input type="text" name="keyword" value="<?= Yii::$app->getRequest()->getQueryParam('keyword') ?>" size="35" style="height:22px;border:1px solid #dbdbdb;border-radius:3px;padding:0px 3px"/></td>
								<td><input type="submit" value="Tìm kiếm" class="magin"></td>
							</tr>
						</tbody>
					</table>
				</form>
			</div>
		</div>
        <div class="section_content_inner minheight">
            <div class="table_tabs_menu">
                <ul class="table_tabs">
                    <li><a href="#" name="tab1" class="selected"><span><span>Danh sách</span></span></a></li>
                    <li><a href="#" name=""><span><span>Tìm kiếm</span></span></a></li>
                    <li><a href="<?= Yii::$app->request->baseUrl.'/posts/input'; ?>" name=""><span><span>Thêm mới</span></span></a></li>
                </ul>
            </div>
            <!--[if !IE]>start table_wrapper<![endif]-->
            <div class="table_wrapper">
                <div class="table_wrapper_inner" id="tab1">
                    <form action="" method="post" name="sac">
                        <table cellpadding="0" cellspacing="0" width="905">
                            <tbody>
                                <tr>
                                    <th width="31"><input type="checkbox" name="checkall" onclick="chkallClick(this)"/></th>
                                    <th width="300"><a href="#">Tiêu đề tin</a></th>
                                    <th width="150"><a href="#">Thuộc mục</a></th>
                                    <th with="60"><a href="#">Tác giả</a></th>
                                    <th width="100"><a href="#">Trạng thái</a></th>
                                    <th width="91">Actions</th>
                                  </tr>
								<?php $listCategory = array_column($listCategory, 'name', 'id'); ?>
                                <?php if (isset($listAll) && $listAll != null) { ?>
                                <?php foreach ($listAll as $items) { ?>
                                        <tr>
                                            <td><input type="checkbox" name="checkDel[]" value="<?= $items->id ?>"/></td>
                                            <td><a href="<?= Yii::$app->request->baseUrl . '/posts/input?id=' . $items->id; ?>"><?= $items->title; ?></a></td>
                                            <td><?= array_key_exists($items['cate_id'], $listCategory) ? $listCategory[$items['cate_id']] : ''; ?></td>
                                            <td></td>
                                            <td><?= $items->status == 1 ? 'Active' : '<font color=red>Not active</font>'; ?></td>
                                            <td>
                                                <div class="actions_menu">
                                                    <ul>
                                                        <li><a href="<?= Yii::$app->request->baseUrl . '/posts/input?id=' . $items->id; ?>" class="edit">Edit</a></li>
                                                        <li><a href="<?= Yii::$app->request->baseUrl . '/posts/default/delete?id=' . $items->id; ?>" class="delete" onclick="return askConfirm()">Del</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                <?php } } ?>
                            </tbody></table>
                    </form>
                    <div id="pagination">
                        <?php echo \yii\widgets\LinkPager::widget([
                            'pagination' => $pages,
                        ]); ?>
                    </div>
                </div>
                <div class="table_wrapper_inner" id="tab2">
                    <div class="form_user">
                        <form action="javascript:void(0)">
                            <div class="form_items">
                                <div class="form_item_left">Tên tài khoản</div>
                                <div class="form_item_right"><input type="text" id="keyword" size="25" /></div>
                            </div>
                            <div class="form_items">
                                <div class="form_item_left">&nbsp;</div>
                                <div class="form_item_right"><input type="submit" id="ok" value="Tìm kiếm" class="padding" /></div>
                            </div>
                        </form>
                    </div>
                    <div id="user_show"></div>
                </div>
            </div>
            <!--[if !IE]>end table_wrapper<![endif]-->
        </div>
        <!--[if !IE]>start pagination<![endif]-->
        <div class="pagination_wrapper">
            <span class="pagination_top"></span>
            <div class="pagination_middle">
            </div>
            <span class="pagination_bottom"></span>
        </div>
        <!--[if !IE]>end pagination<![endif]-->
        <span class="section_content_bottom"></span>
    </div>
    <!--[if !IE]>end section content<![endif]-->
</div>
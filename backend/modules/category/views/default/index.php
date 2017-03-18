<div class="section">
    <script type="text/javascript">
        $(document).ready(function(){
            var $items = $("ul#menu li a");
            $items.eq(3).addClass("selected_lk");
        });
        function checkDel() {
            if(!confirm('Bạn có chắc muốn xóa không ?')) {
                return false;
            }
        }
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

        <div class="section_content_inner minheight">
            <div class="table_tabs_menu">
                <ul class="table_tabs">
                    <li><a href="#" name="tab1" class="selected"><span><span>Danh sách</span></span></a></li>
                    <li><a href="#" name=""><span><span>Tìm kiếm</span></span></a></li>
                    <li><a href="<?= Yii::$app->request->baseUrl.'/category/input'; ?>" name=""><span><span>Thêm mới</span></span></a></li>
                </ul>
            </div>
            <!--[if !IE]>start table_wrapper<![endif]-->
			<?php $listCate = array_column($listCate, 'name', 'id');?>
            <div class="table_wrapper">
                <div class="table_wrapper_inner" id="tab1">
                    <form action="" method="post" name="sac">
                        <table cellpadding="0" cellspacing="0" width="905">
                            <tbody>
                                <tr>
                                    <th width="23">Stt.</th>
                                    <th width="170"><a href="#">Tên chuyên mục</a></th>
                                    <th width="55"><a href="#">Thứ tự</a></th>
									<th width="85"><a href="#">Parent</a></th>
									<th width="93"><a href="#">Children</a></th>
                                    <th width="70"><a href="#">Trạng thái</a></th>
                                    <th width="74">Actions</th>
                                </tr>
                                <?php if (isset($listAll) && $listAll != null) { ?>
                                    <?php $stt = 1;
                                    foreach ($listAll as $items) { ?>
                                        <tr>
                                            <td><?= $stt; ?></td>
                                            <td><a href="<?= Yii::$app->request->baseUrl . '/category/input?id=' . $items['id']; ?>"><?= $items['name']; ?></a></td>
                                            <td><?= $items['order']; ?></td>
											<td><?= array_key_exists($items['parent_id'], $listCate) ? $listCate[$items['parent_id']] : ''; ?></td>
											<td><?= array_key_exists($items['child_id'], $listCate) ? $listCate[$items['child_id']] : ''; ?></td>
                                            <td><?= $items['status'] == 1 ? 'Active' : 'Not active'; ?></td>
                                            <td>
                                                <div class="actions_menu">
                                                    <ul>
                                                        <li><a href="<?= Yii::$app->request->baseUrl . '/category/input?id=' . $items['id']; ?>" class="edit">Edit</a></li>
                                                        <li><a href="<?= Yii::$app->request->baseUrl . '/category/default/delete?id=' . $items['id']; ?>" class="delete">Del</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php $stt++; ?>
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
                <div class="pagination">
                </div>
            </div>
            <span class="pagination_bottom"></span>
        </div>
        <!--[if !IE]>end pagination<![endif]-->
        <span class="section_content_bottom"></span>
    </div>
    <!--[if !IE]>end section content<![endif]-->
</div>
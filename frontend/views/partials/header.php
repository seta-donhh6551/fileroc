<div id="header">
    <div id="hdr-inner">
        <div id="hdr-top">
            <div id="hdr-left">
                <a id="logo" href="<?= Yii::$app->request->baseUrl; ?>" title="Free download software with fileroc"></a>
            </div>
            <div id="hdr-right">
                <div class="top">
                    <div id="hdr-top-link" class="toplink">
                        <table cellpadding="0" cellspacing="0" border="0">
                            <tbody>
                                <tr>
                                    <td id="td_cheap_label">
                                        <img src="<?= Yii::$app->request->baseUrl; ?>img/all-free-download.jpg" alt="Free download" border="0" title="Free download">
                                    </td>
                                    <td id="td_fb_like" valign="top" style="padding-top:3px">
                                        <div id="hdr_fb_like">
                                                <!--div id="top_fb_like" class="fb-like fb_iframe_widget" data-href="https://www.facebook.com/meta.vn" data-send="false" data-layout="button_count" data-width="140" data-show-faces="true" fb-xfbml-state="rendered" fb-iframe-plugin-query="app_id=&amp;container_width=0&amp;href=https%3A%2F%2Fwww.facebook.com%2Fmeta.vn&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey&amp;send=false&amp;show_faces=true&amp;width=140"><span style="vertical-align: bottom; width: 111px; height: 20px;"><iframe name="fa842f6b4" width="140px" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" title="fb:like Facebook Social Plugin" src="http://www.facebook.com/plugins/like.php?app_id=&amp;channel=http%3A%2F%2Fstatic.ak.facebook.com%2Fconnect%2Fxd_arbiter%2F6brUqVNoWO3.js%3Fversion%3D41%23cb%3Df4cbc4474%26domain%3Dmeta.vn%26origin%3Dhttp%253A%252F%252Fmeta.vn%252Ff16ec06ff8%26relation%3Dparent.parent&amp;container_width=0&amp;href=https%3A%2F%2Fwww.facebook.com%2Fmeta.vn&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey&amp;send=false&amp;show_faces=true&amp;width=140" style="border: none; visibility: visible; width: 111px; height: 20px;" class=""></iframe></span></div-->
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!--div id="hdr-tool-link" class="toollink">
                        <a href="#" id="lnkhdrsupport" class="btsupport" title=""><img src="<?= Yii::$app->request->baseUrl; ?>img/phone.gif" border="0" align="absmiddle" alt="Hỗ trợ">Support</a>
                        | <a href="#" title="Click here contact with ours">Contact</a>
                    </div-->
                </div>
                <div class="bot">
                    <div id="searchbox">
                        <div id="srh-form">
                            <form name="frmsearch" id="frmsearch" action="<?= Yii::$app->request->baseUrl; ?>search.html" method="get">
                                <input type="text" name="keyword" tabindex="-1" id="txtquery" autocomplete="off" size="40" value="" title="Enter keyword" placeholder="Enter keyword..." class="ac_input">
                                <div class="_rounded" id="btnfindsubmitpad">
                                    <input type="submit" id="btnfindsubmit" onclick="return Utility.search()" value="Submit" title="Search software">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="hdr-login" class="not-logged">
                        <span class="avatar">
                            <img src="<?= Yii::$app->request->baseUrl; ?>img/icon_user.png" />
                        </span>
                        <span class="info"><span class="name">Login</span></span>
                        <span class="caret"></span>
                        <ul class="profile">
                            <li class="login"><a href="#">Login</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="_top_menu_">
            <div id="tabs">
                <ul id="topnav" class="navigation">
                    <li id="all_tab"><a href="<?= Yii::$app->request->baseUrl; ?>" class="x" title="Home"><i class="icon"></i><span class="t">Home</span></a></li>
                    <?php if (Yii::$app->controller->listMenu) { ?>
                        <?php foreach (Yii::$app->controller->listMenu as $key => $menuTop) { ?>
                            <li><a href="<?= Yii::$app->request->baseUrl . $menuTop['rewrite']; ?>.html" title="<?= $menuTop['name']; ?>" class="x"><?php if ($menuTop['icon']) { ?><img src="<?= Yii::$app->request->baseUrl . 'uploads/icons/' . $menuTop['icon']; ?>" /><?php } ?><span class="t"><?= $menuTop['name']; ?></span></a>
                                <?php if (Yii::$app->controller->listMenu[$key]['listSubMenu']) { ?>
                                    <ul class="clearfix">
                                        <?php foreach (Yii::$app->controller->listMenu[$key]['listSubMenu'] as $subMenu) { ?>
                                            <li>
                                                <a href="<?= Yii::$app->request->baseUrl . $menuTop['rewrite'] . '/' . $subMenu['rewrite']; ?>.html" title="<?= $subMenu['name']; ?>">
                                                    <?php if ($subMenu['icon']) { ?><img src="<?= Yii::$app->request->baseUrl . 'uploads/icons/' . $subMenu['icon']; ?>" /><?php } ?>
                                                    <span><?= $subMenu['name']; ?></span>
                                                </a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                            </li>
                        <?php }
                    } ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!doctype html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <base href="<?php echo site_url(); ?>">
    <title>Amaze UI Admin table Examples</title>
    <meta name="description" content="这是一个 table 页面">
    <meta name="keywords" content="table">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="icon" type="image/png" href="assets/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="assets/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI"/>
    <link rel="stylesheet" href="assets/css/amazeui.min.css"/>
    <link rel="stylesheet" href="assets/css/admin.css">
    <style>
        .book_img {
            width: 80px;
            height: 80px;
        }

        .tbody td {
            line-height: 100px !important;
            padding: 0 8.4px 0 8.4px !important;
            height: 100px;
        }
    </style>
</head>
<body>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
    以获得更好的体验！</p>
<![endif]-->

<header class="am-topbar am-topbar-inverse admin-header">
    <div class="am-topbar-brand">
        <strong>图书销售</strong>
        <small>后台管理系统</small>
    </div>

    <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only"
            data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span
            class="am-icon-bars"></span></button>

    <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

        <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
            <li class="am-dropdown" data-am-dropdown>
                <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
                    <span class="am-icon-users"></span> 管理员 <span class="am-icon-caret-down"></span>
                </a>
                <ul class="am-dropdown-content">
                    <li><a href="user/go_login"><span class="am-icon-power-off"></span> 退出</a></li>
                </ul>
            </li>
            <li class="am-hide-sm-only"><a href="javascript:;" id="admin-fullscreen"><span
                        class="am-icon-arrows-alt"></span> <span class="admin-fullText">开启全屏</span></a></li>
        </ul>
    </div>
</header>

<div class="am-cf admin-main">
    <!-- sidebar start -->
    <div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
        <div class="am-offcanvas-bar admin-offcanvas-bar">
            <ul class="am-list admin-sidebar-list">
                <li><a href="user/books"><span class="am-icon-home"></span> 图书管理</a></li>
                <li><a href="user/users"><span class="am-icon-home"></span> 会员管理</a></li>
                <li><a href="user/order"><span class="am-icon-home"></span> 订单管理</a></li>
                <li><a href="javascript:;"><span class="am-icon-home"></span> 标注热卖</a></li>
                <li><a href="user/go_login"><span class="am-icon-home"></span> 注销</a></li>
            </ul>

            <div class="am-panel am-panel-default admin-sidebar-panel">
                <div class="am-panel-bd">
                    <p><span class="am-icon-bookmark"></span> 公告</p>
                    <p>时光静好，与君语；细水流年，与君同。—— Amaze UI</p>
                </div>
            </div>

            <div class="am-panel am-panel-default admin-sidebar-panel">
                <div class="am-panel-bd">
                    <p><span class="am-icon-tag"></span> wiki</p>
                    <p>Welcome to the Amaze UI wiki!</p>
                </div>
            </div>

            <div class="am-panel am-panel-default admin-sidebar-panel">
                <div class="am-panel-bd">
                    <p><span class="am-icon-tag"></span> Writer</p>
                    <p></p>
                </div>
            </div>
        </div>
    </div>
    <!-- sidebar end -->

    <!-- content start -->
    <div class="admin-content">
        <div class="admin-content-body">
            <div class="am-cf am-padding am-padding-bottom-0">
                <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">图书管理</strong></div>
            </div>

            <hr>

            <div style="margin-left: 23px;" class="am-btn am-btn-primary" data-am-modal="{target: '#add-book'}">添加书籍
            </div>
            <!--            <div id="add-book"  class="am-modal am-modal-alert" tabindex="-1">添加书籍</div>-->

            <div class="am-modal am-modal-alert" tabindex="-1" id="add-book">
                <div class="am-modal-dialog">
                    <form class="am-form" style="text-align: left;" action="user/add_book" method="post" enctype="multipart/form-data">
                        <fieldset>
                            <legend>添加图书</legend>

                            <div class="am-form-group">
                                <label for="doc-ipt-email-1">书籍名称</label>
                                <input type="text" name="book_name" class="" id="doc-ipt-email-1" placeholder="输入书籍名称">
                            </div>

                            <div class="am-form-group">
                                <label for="doc-ipt-email-1">单价</label>
                                <input type="text" name="book_price" class="" id="doc-ipt-email-2" placeholder="书籍单价(元)">
                            </div>

                            <div class="am-form-group am-form-file">
                                <label for="doc-ipt-file-2">上传书籍图片</label>
                                <div>
                                    <button type="button" class="am-btn am-btn-default am-btn-sm">
                                        <i class="am-icon-cloud-upload"></i> 选择要上传的文件
                                    </button>
                                </div>
                                <input type="file" id="doc-ipt-file-2" name="book_img">
                            </div>

                            <div class="am-form-group">
                                <label for="doc-select-1">书籍类别</label>
                                <select id="doc-select-1" name="book_type">
                                    <option value="外语">外语</option>
                                    <option value="文学">文学</option>
                                    <option value="小说">小说</option>
                                    <option value="历史">历史</option>
                                    <option value="少儿">少儿</option>
                                    <option value="经济管理">经济管理</option>
                                </select>
                                <span class="am-form-caret"></span>
                            </div>

                            <p>
                                <button type="submit" class="am-btn am-btn-secondary" style="float: left;">提交</button>
                                <button
                                    style="float: left;margin-left: 30px;height: 37px;padding: 0;line-height: 37px;width: 66px;color: #fff;"
                                    type="button" class="am-modal-btn am-btn am-btn-success">取消
                                </button>
                            </p>
                        </fieldset>
                    </form>
                </div>
            </div>

            <div class="am-g">
                <div class="am-u-sm-12">
                    <form class="am-form">
                        <table class="am-table am-table-striped am-table-hover table-main">
                            <thead>
                            <tr>
                                <th class="table-check" style="opacity: 0;"><input type="checkbox"/></th>
                                <th class="table-id">ID</th>
                                <th class="table-title">图片</th>
                                <th class="table-type">书名</th>
                                <th class="table-author am-hide-sm-only">类别</th>
                                <th class="table-date am-hide-sm-only">单价</th>
                                <th class="table-set">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($books as $val) { ?>
                                <tr class="tbody">
                                    <td><input type="checkbox"/></td>
                                    <td><?php echo $val->book_id; ?></td>
                                    <td><a href="javascript:;"><img class="book_img" src="<?php echo $val->book_img ?>"
                                                                    alt=""></a></td>
                                    <td><?php echo $val->book_name; ?></td>
                                    <td class="am-hide-sm-only"><?php echo $val->book_type; ?></td>
                                    <td class="am-hide-sm-only">￥<?php echo $val->book_price; ?></td>
                                    <td>
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs" style="margin-top: 36px;">
                                                <button onclick="aa()" id="editor" type="button"
                                                        class="am-btn am-btn-default am-btn-xs am-text-secondary"><span
                                                        class="am-icon-pencil-square-o"></span> 编辑
                                                </button>
                                                </button>
                                                <button type="button" onclick="Delete('<?php echo $val->book_id; ?>')" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only">
                                                    <span class="am-icon-trash-o"></span> 删除
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <? } ?>
                            </tbody>
                        </table>
                        <div class="am-cf">
                            共 <?php echo count($books); ?> 条记录
                        </div>
                        <hr/>
                        <p>注：参考Amaze UI后台管理模版</p>
                    </form>
                </div>

            </div>
        </div>

        <footer class="admin-content-footer">
            <hr>
            <p class="am-padding-left">© 2014 AllMobilize, Inc. Licensed under MIT license.</p>
        </footer>

    </div>
    <!-- content end -->
</div>

<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu"
   data-am-offcanvas="{target: '#admin-offcanvas'}"></a>

<footer>
    <hr>
    <p class="am-padding-left">© 2014 AllMobilize, Inc. Licensed under MIT license.</p>
</footer>


<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="assets/js/amazeui.min.js"></script>
<script src="assets/js/app.js"></script>
<script>
    function Delete(id){
        window.location = "user/delete_book?book_id=" + id;
        return false;
    }
    function aa(){
        alert("您没有权限编辑！");
    }
</script>
</body>
</html>

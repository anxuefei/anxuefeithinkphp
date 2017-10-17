<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>后台</title>
    <meta name="description" content="">
    <meta name="author" content="templatemo">
    <link href="/static/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/static/css/font-awesome.css">
    <link href="/static/css/bootstrap.min.css" rel="stylesheet">
    <link href="/static/css/templatemo-style.css" rel="stylesheet">
    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/js/jquery-1.11.2.min.js"></script>
    <script src="/static/js/layer.js"></script>
    <link rel="stylesheet" href="/static/css/layer.css">
    <script src="/static/js/vue.js"></script>
    <script src="/static/js/axios.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="/static/js/html5shiv.min.js"></script>
    <script src="/static/js/respond.min.js"></script>
    <![endif]-->
    <script>
        //HDJS组件需要的配置
        hdjs = {
            'base': '/static/node_modules/hdjs',
            'uploader': '/admin/upload/upload',
            'filesLists': '/admin/upload/filelists?',
            'removeImage': '?s=component/upload/removeImage&siteid=11',
            'ossSign': '?s=component/oss/sign&siteid=11',
        };
        window.system = {
            attachment: "/attachment",
            root: "",
            url: "/?s=site/entry/home&siteid=11",
            siteid: "11",
            module: "",
            //用于上传等组件使用标识当前是后台用户
            user_type: 'user'
        }
    </script>

    <script src="/static/node_modules/hdjs/app/util.js"></script>
    <script src="/static/node_modules/hdjs/require.js"></script>
    <script src="/static/node_modules/hdjs/config.js"></script>
    <link href="/static/css/hdcms.css" rel="stylesheet">
</head>
<body>
<!-- Left column -->
<div class="templatemo-flex-row">
    <div class="templatemo-sidebar">
        <header class="templatemo-site-header">
            <div class="square"></div>
            <h1><?php echo \think\Session::get('user.username') ?></h1>
        </header>
        <div class="mobile-menu-icon">
            <i class="fa fa-bars"></i>
        </div>
        <nav class="templatemo-left-nav">
            <ul>
                <li><a href="/admin/goods" class="<?php echo __PATH__ == 'goods'||__PATH__ == 'category'?'active':'';?>"><i class="fa fa-home fa-fw"></i>商城管理</a></li>
                <li><a href="/admin/order" class="<?php echo __PATH__ == 'order'?'active':'';?>"><i class="fa fa-database fa-fw"></i>订单管理</a></li>
                <li><a href="/admin/index/changepassword"class="<?php echo __PATH__ == 'index'?'active':'';?>"><i class="fa fa-users fa-fw"></i>用户管理</a></li>
                <li><a href="/"><i class="fa fa-map-marker fa-fw"></i>返回前台</a></li>
                <li><a href="/admin/index/logout"><i class="fa fa-eject fa-fw"></i>退出</a></li>
            </ul>
        </nav>
    </div>
    {block name="content"}
    {/block}
        <footer class="text-right">
            <p>版权所有 &copy; 小飞
            </p>
        </footer>
    </div>

</div>
</div>

<!-- JS -->
<script src="/static/js/jquery-1.11.2.min.js"></script>      <!-- jQuery -->
<script src="/static/js/jquery-migrate-1.2.1.min.js"></script> <!--  jQuery Migrate Plugin -->
<script src="https://www.google.com/jsapi"></script> <!-- Google Chart -->
<script type="text/javascript" src="/static/js/templatemo-script.js"></script>      <!-- Templatemo Script -->

</body>
</html>
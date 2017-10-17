{extend name='common'}
{block name='header'}
<!DOCTYPE HTML>
<!--[if IE 8]>
<html class="lt8" lang="en-US"><![endif]-->
<!--[if gt IE 9]><!-->
<html lang="en-US"><!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <title>我的订单</title>
    <link href="/order/common-font.css" class="J_replace_public"
          rel="stylesheet">
    <link href="/order/global_8f73c7a.css" rel="stylesheet" type="text/css"/>
    <link href="/order/common_9277b03.css" class="J_replace_public"
          rel="stylesheet">
    <link href="/order/layout_ea3c79a.css" rel="stylesheet" type="text/css"/>
    <link href="/order/dialog_bc2edaf.css" rel="stylesheet"
          type="text/css"/>

    <link href="/order/home_f703714.css" type="text/css" rel="stylesheet">


    <link href="/order/member-center_9ab02c9.css" rel="stylesheet"
          type="text/css"/>
    <link href="/order/dialog_bc2edaf.css" rel="stylesheet"
          type="text/css"/>
    <link href="/order/buy-process_ef1e513.css" rel="stylesheet"
          type="text/css"/>
    <link href="/order/member-order_edcab06.css" rel="stylesheet"
          type="text/css"/>
    <style>
        .a_style {
            color: #0073ea;
        }

        .hrefClass {
            text-align: right;
            padding-right: 10px;
        }
    </style>

    <!--[if lt IE 9]>
    <script src="https://swsdl.vivo.com.cn/vivoshop/web/dist/js/bower_components/html5shiv/dist/html5shiv.min_40bd440.js"></script>
    <![endif]-->

</head>
{/block}
{block name='content'}
<div id="content" class="cl">
    <div class="wrapper">
        <div class="crumbs"><a href="/">商城首页</a><b></b><a href="/index/login/user">会员中心</a><b></b>我的订单</div>
    </div>
    <div class="wrapper">
        <aside class="menu-bar">
            <ul class="portrait-box">
                <li>
                    <a href="/index/login/user" title="编辑资料">
                        <img width="160" src="https://bbs.vivo.com.cn/avatar/73885440/big"/>
                    </a>
                </li>
                <li class="mem-name member-menu-nickName"><?php echo \think\Session::get('webuser.username'); ?></li>

            </ul>
            <dl id="j_MyCenterMenus" class="menu">
                <dt class="menu-title">交易管理</dt>
                <dd class="menu-item"><a href="/index/order/lists">我的订单</a></dd>

                <dt class="menu-title">我的账户</dt>
                <dd class="menu-item"><a href="/index/login/user">个人资料</a></dd>
<!--                <dd class="menu-item"><a href="/my/address">收货地址</a></dd>-->
            </dl>
        </aside>
        <?php
        $ordermodel = new \app\index\model\Orders;
        //        获取未支付的订单
        $paynum = $ordermodel->where('user_id','=',$user['id'])->where('is_pay', '=', 0)->count();
        //        获取待收货的订单数量
        $expressnum = $ordermodel->where('user_id','=',$user['id'])->where('is_express','=',1)->where('is_over','=',0)->count();
        //        获取完成订单的数量
        $overnum = $ordermodel->where('user_id','=',$user['id'])->where('is_over', '=', 1)->count();
        //        p($overnum);
        ?>
        <article class="content">
            <dl id="member-order-list">
                <dt class="module-title">我的订单</dt>
                <dd class="module-item">
                    <ul class="statistic-tags cl">
                        <li class="on"><a href="/index/order/lists">全部</a></li>
                        <li><a
                                    href="/index/order/pay">待付款</a>
                            <?php if ($paynum > 0) { ?>
                                <span class="badge">{$paynum}</span>
                            <?php }; ?>
                        </li>
                        <li><a
                                    href="/index/order/express">待收货</a>
                            <?php if ($expressnum > 0) { ?>
                                <span class="badge">{$expressnum}</span>
                            <?php }; ?>
                        </li>
                        <li><a
                                    href="/index/order/over">已完成</a>
                            <?php if ($overnum > 0) { ?>
                                <span class="badge">{$overnum}</span>
                            <?php }; ?>
                        </li>
                    </ul>
                    <?php if ($orderdata) { ?>
                        <div class="list-caption">
                            <div class="col col0">商品</div>
                            <div class="col col1">数量</div>
                            <div class="col col2">价格</div>
                            <div class="col col3">状态</div>
                            <div class="col col4">操作</div>
                        </div>
                        <?php foreach ($orderdata as $k => $order): ?>
                            <table class="order-table">
                                <colgroup>
                                    <col width="155"/>
                                    <col/>
                                    <col class="col1"/>
                                    <col class="col2"/>
                                    <col class="col3"/>
                                    <col class="col4"/>
                                </colgroup>
                                <tbody>
                                <tr>
                                    <th colspan="6" class="order-title">
                                        <ul>
                                            <li class="order-number">订单号：<span
                                                >{$order['order_number']}</span>
                                            </li>
                                            <li class="order-time">成交时间:
                                                {$order['create_time']}
                                            </li>
                                        </ul>
                                    </th>
                                </tr>
                                </tbody>

                                <tr class="order-line">

                                    <td colspan="4">
                                        <?php foreach ($cartdata[$k] as $cart): ?>
                                            <table class="order-sub-table">
                                                <colgroup>
                                                    <col width="155"/>
                                                    <col/>
                                                    <col class="col1"/>
                                                    <col class="col2"/>
                                                </colgroup>
                                                <tbody class="prod-item ">
                                                <tr class="prod-line">
                                                    <td class="prod-pic">
                                                        <a class="figure"
                                                           href="/index/index/content?id={$cart['id']}"><img
                                                                    src="{$cart['img']}" alt=""/></a>
                                                    </td>
                                                    <td colspan="3">
                                                        <table class="prods-info-table">
                                                            <colgroup>
                                                                <col width="80">
                                                                <col>
                                                                <col width="66">
                                                                <col width="108">
                                                            </colgroup>
                                                            <tbody>
                                                            <tr class="prod-info">
                                                                <td class="prod-name" colspan="2">
                                                                    <a href="/index/index/content?id={$cart['id']}"
                                                                    >{$cart['name']}</a>
                                                                    <br>颜色：{$cart['attr']}
                                                                </td>
                                                                <td>{$cart['num']}</td>
                                                                <td>
                                                                    {$cart['total']}
                                                                </td>
                                                            </tr>

                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        <?php endforeach; ?>
                                    </td>

                                    <td class="status">
                                        <?php
                                        switch (true) {
                                            case $order['is_pay'] == 0:
                                                echo '未付款';
                                                break;
                                            case $order['is_express'] == 0:
                                                echo '未发货';
                                                break;
                                            case $order['is_over'] == 0:
                                                echo '等待收货';
                                                break;
                                            default:
                                                echo '已完成';
                                                break;
                                        } ?>
                                    </td>
                                    <td class="operation">
                                        <ul>
                                            <?php if ($order['is_pay'] == 0) { ?>
                                                <li> <a href="javascript:del({$order['id']});">删除订单</a>
                                                    <a href="javascript:update({$order['id']});" >去支付</a></li>
                                            <?php } else { ?>
                                            <li> <a href="javascript:del({$order['id']});">删除订单</a>
                                            <?php }; ?>
                                        </ul>
                                    </td>
                                </tr>
                                <tr class="operation-line">
                                    <td colspan="6">
                                        应付金额：<span class="red">
                            <dfn>&yen;</dfn>{$order['total']}
                           </span>
                                    </td>
                                </tr>
                            </table>
                        <?php endforeach; ?>
                    <?php } else { ?>
                        <div>
                            <form id="orderPayform" method="post"></form>
                        </div>
                        <div class="no-record no-order"><img
                                    src="https://swsdl.vivo.com.cn/vivoshop/web/dist/img/member/no-order-icon_3030d23.png"/><span>您还没有订单</span>
                        </div>

                        <div class="cl">
                            <div class="pull-right">
                                <div class="span12 clearfix">
                                </div>
                            </div>
                        </div>
                    <?php }; ?>
                </dd>
            </dl>

        </article>
    </div>
</div>
{/block}
{block name='base'}
<script>
    function update(id) {
        $.ajax({
            url: '/index/order/update',
            type: 'post',
            data: {orderid:id},
            success: function (status) {
                alert('支付成功');
                setTimeout(function () {
                    window.location.reload();
                },1000)
            }
        })
    }
    function del(id) {
        if(confirm('确定删除吗？')){
            location.href='/index/order/delete?id=' + id;
        }
    }
</script>
<script>
    var webCtx = '',
        HOMEURL = 'https://www.vivo.com.cn',
        IMGHOSTURL = 'https://swsdl.vivo.com.cn/vivoshop/',
        passportLoginUrlPrefix = 'https://passport.vivo.com.cn/v3/web/login/authorize?client_id=3&redirect_uri=';
</script>
<script src="/order/jquery.min_f03e5a3.js"></script>
<script src="/order/TweenMax.min_92cf05a.js"></script>
<script src="/order/header_7e581c3.js"></script>
{/block}
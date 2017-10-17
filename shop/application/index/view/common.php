{block name='header'}
{/block}
<body class="">
<div id="vivo-head-wrap" class="expand-size">
    <div class="gb-vivo-head">
        <a class="gb-vivo-h-logo J_replace_link" href="/" style="color: white;font-size: 20px">
            首页
        </a>
        <ul class="gb-vivo-h-nav">
            <?php
            $categorydata = \app\admin\model\Category::where('Pid', '=', 0)->select();
            ?>
            <?php foreach ($categorydata as $v): ?>
                <li class="nav-gb series" data-wrap="cvs-box1" data-type="circle"><a
                        burying="cfrom=1102&name=Xplay系列&series=3" href="/index/index/lists?id={$v['id']}">{$v['name']}</a>
                </li>
            <?php endforeach; ?>
        </ul>
        <div class="gb-nav-tool">
<!--            <a class="nav-t-search"></a>-->
            <a class="nav-t-bag" href="javascript:;"></a>
            <a class="nav-t-user" burying="cfrom=1107&name=个人中心&position=0"></a>
        </div>
        <div class="v_h_search">
<!--            <div class="search-top">-->
<!--                <input type="text" placeholder="搜索需要查找的内容">-->
<!--                <a class="search-close"></a>-->
<!--            </div>-->
<!--            <div class="search-content">-->
<!--            </div>-->
        </div>
        <?php $user = \think\Session::get('webuser'); ?>
        <ul class="v_h_usercenter">
            <?php $num = session('cart')['total_rows']; ?>
            <li class="userlink-1"><a href="/index/cart/index" burying="cfrom=1107&name=个人中心&position=1"><b></b><span>购物车<i
                        >{$num?:0}</i></span></a></li>
            <li class="userlink-2"><a href="<?php echo isset($user) ? '/index/order/lists' : '/index/login';
                ?>"
                                      burying="cfrom=1107&name=个人中心&position=2"><b></b><span>我的订单</span></a></li>
            </li>
            <li class="userlink-4"><a id="J_login_home_head"
                                      href="<?php $url = isset($user) ? '/index/login/user' : '/index/login';
                                      echo $url; ?>"><b></b><span><?php $data = isset($user) ? '个人中心' : '登录/注册';
                        echo $data; ?></span></a></li>
        </ul>
    </div>

</div>
{block name='content'}
{/block}
<div class="shop-foot-area home-foot-area">
    <div class="wrapper cl">
        <ul class="vvs-agree">
            <li class="vvs-agree-item">
                <a data-vs="12,1,信任图标,,">
                    <b class="b1"></b>官方正品
                </a>
            </li>
            <li class="vvs-agree-item">
                <a data-vs="12,2,信任图标,,">
                    <b class="b2"></b>满68包邮
                </a>
            </li>
            <li class="vvs-agree-item">
                <a data-vs="12,3,信任图标,,">
                    <b class="b3"></b>30天退换货
                </a>
            </li>
            <li class="vvs-agree-item">
                <a data-vs="12,4,信任图标,,">
                    <b class="b4"></b>全国网点售后
                </a>
            </li>
        </ul>
    </div>
</div>
<div id="vivo-foot-wrap">
    <div id="gb-vivo-foot">
        <div class="gb-foot-directory">
            <ul class="directory-list">
                <li data-open="false">
                    <dd class="f-d-title">友情链接<b></b></dd>
                    <dd class="t-d-title"><a href="http://www.baidu.com" target="_blank">百度</a></dd>
                    <dd><a href="https://www.jd.com" target="_blank">京东</a></dd>
                    <dd><a href="https://www.taobao.com" target="_blank">淘宝</a></dd>
                </li>
                <li data-open="false">
                    <dd class="f-d-title">友情链接<b></b></dd>
                    <dd class="t-d-title"><a href="http://www.baidu.com" target="_blank">百度</a></dd>
                    <dd><a href="https://www.jd.com" target="_blank">京东</a></dd>
                    <dd><a href="https://www.taobao.com" target="_blank">淘宝</a></dd>
                </li>
                <li data-open="false">
                    <dd class="f-d-title">友情链接<b></b></dd>
                    <dd class="t-d-title"><a href="http://www.baidu.com" target="_blank">百度</a></dd>
                    <dd><a href="https://www.jd.com" target="_blank">京东</a></dd>
                    <dd><a href="https://www.taobao.com" target="_blank">淘宝</a></dd>
                </li>
                <li data-open="false">
                    <dd class="f-d-title">友情链接<b></b></dd>
                    <dd class="t-d-title"><a href="http://www.baidu.com" target="_blank">百度</a></dd>
                    <dd><a href="https://www.jd.com" target="_blank">京东</a></dd>
                    <dd><a href="https://www.taobao.com" target="_blank">淘宝</a></dd>
                </li>
                <li data-open="false">
                    <dd class="f-d-title">友情链接<b></b></dd>
                    <dd class="t-d-title"><a href="http://www.baidu.com" target="_blank">百度</a></dd>
                    <dd><a href="https://www.jd.com" target="_blank">京东</a></dd>
                    <dd><a href="https://www.taobao.com" target="_blank">淘宝</a></dd>
                </li>

            </ul>
            <ul class="directory-phone">
                <li>
                    <dd>24小时全国服务热线: <span><a href="tel:400-678-9688">15933071847</a></span></dd>
                    <dd class="phone-num">15933071847</dd>

                </li>
            </ul>
        </div>
        <div class="gb-foot-copyright">

            <span class="copyright-text">xiaofeishangcheng| 京ICP备17044433号</span>
        </div>
    </div>

</div>
<ul id="side-bar" style="display: none" >
    <li class="shopcart">
        <!--        <div class="prompt"><span class="triangle"></span>购物车</div>-->
        <div class="shopcart-fixbox">
        </div>
        <!--        <span class="prodnum"></span>-->
    </li>
</ul>
{block name='base'}
{/block}
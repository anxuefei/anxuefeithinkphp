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
    <title>商城</title>
    <link href="/static/shop/css/common-font.css" class="J_replace_public" rel="stylesheet">
    <link href="/static/shop/css/global_8f73c7a.css" rel="stylesheet" type="text/css"/>
    <link href="/static/shop/css/common_9277b03.css" class="J_replace_public" rel="stylesheet">
    <link href="/static/shop/css/layout_ea3c79a.css" rel="stylesheet" type="text/css"/>
    <link href="/static/shop/css/dialog_bc2edaf.css" rel="stylesheet" type="text/css"/>

    <link href="/static/shop/css/home_f703714.css" type="text/css" rel="stylesheet">
    <link href="/static/shop/css/dialog_bc2edaf.css" rel="stylesheet" type="text/css">
    <link href="/static/shop/css/home_712a6fd.css" rel="stylesheet" type="text/css"/>
</head>
{/block}
{block name='content'}
</svg>
       <script>
    var ISHOMEHEAD = true;
</script>
<div id="content" class="cl">
    <div class="wrapper">
        <div class="banner">
            <ul class="img-list">
                <li class="loading current" data-name="VIVO X20">
                    <a  href="/index/index/content?id=8">
                        <div class="structure-module">
                            <div class="sm-wrapper">
                                <img class="j_bgImage" data-ratio="1.20" src="/static/images/vivox20.jpg">
                            </div>
                        </div>
                    </a>
                </li>
                <li class="loading current" data-name="华为手机">
                    <a  href="/index/index/content?id=7">
                        <div class="structure-module">
                            <div class="sm-wrapper">
                                <img class="j_bgImage" data-ratio="1.20" src="/static/images/huawei.jpg">
                            </div>
                        </div>
                    </a>
                </li>
                <li class="loading current" data-name="华为手机">
                    <a  href="/index/index/content?id=6">
                        <div class="structure-module">
                            <div class="sm-wrapper">
                                <img class="j_bgImage" data-ratio="1.20" src="/static/images/huawei2.jpg">
                            </div>
                        </div>
                    </a>
                </li>
                <li class="loading current" data-name="自行车">
                    <a  href="/index/index/content?id=10">
                        <div class="structure-module">
                            <div class="sm-wrapper">
                                <img class="j_bgImage" data-ratio="1.20" src="/static/images/che.jpg">
                            </div>
                        </div>
                    </a>
                </li>
            </ul>
            <ul class="thumb-list">
                <li class="current">
                    <span></span>
                    <div class="progress"></div>
                </li>
                <li class="current">
                    <span></span>
                    <div class="progress"></div>
                </li>
                <li class="current">
                    <span></span>
                    <div class="progress"></div>
                </li>
                <li class="current">
                    <span></span>
                    <div class="progress"></div>
                </li>
            </ul>
        </div>
        <ul class="floor-list">
            <li class="floor c_3">
                <div class="info">
                    <p class="subject">新品推荐</p>
<!--                    <ul class="more-wrapper">-->
<!--                        <li><a target="_blank" href="/product/phone"-->
<!--                               class="more">更多</a></li>-->
<!--                    </ul>-->
                </div>
                <ul class="box-list">
                    <?php foreach ($newgoods as $v):?>
                    <li class="box">
                        <a target="_blank" data-name="{$v['name']}"
                           href="/index/index/content?id={$v['id']}">
                            <span></span>
                            <img src="{$v['list_image']}">
                        </a>
                        <div class="color-wrapper">
                            <ul class="color-list" data-name="X9s 全网通">
                                <li class=""
                                    style="display: none"
                                    data-img="{$v['list_image']}"
                                    data-href="/index/index/content?id={$v['id']}"
<!--                                    data-skuid="4366"-->
<!--                                    data-saleable="1"></li>-->
                            </ul>
                            <div>
<!--                                <span class="prompt" title="已选：X9s 全网通 磨砂黑">已选：X9s 全网通 磨砂黑</span>-->
<!--                                <span class="prompt-price rmb-symbol">2498.00</span>-->
                            </div>
                            <div class="btn-wrapper">
                                <a class="btn"
                                   href="/index/index/content?id={$v['id']}"></a>
<!--                                <a class="btn putin-shopcart"  data-name="X9s 全网通" data-spustr="/product/10041?colorSkuid=4366"></a>-->
                            </div>
                        </div>
                        <div class="prodinfo">
                            <p class="name">{$v['name']}</p>
                            <p class="feature"></p>
                            <p class="price rmb-symbol">{$v['price']}</p>
                        </div>
                    </li>
                    <?php endforeach;?>
                </ul>
            </li>

            <li class="floor c_8">
                <div class="info">
                    <p class="subject">热门推荐</p>
<!--                    <ul class="more-wrapper">-->
<!--                        <li><a target="_blank" href="/product/parts?category=8"-->
<!--                            >充电器/数据线</a></li>-->
<!--                        <li><a target="_blank" href="/product/parts?category=73"-->
<!--                            >保护壳/保护膜</a></li>-->
<!--                        <li><a target="_blank" href="/product/parts?category=9"-->
<!--                            >耳机/音箱</a></li>-->
<!--                        <li><a target="_blank" href="/product/parts"-->
<!--                               class="more">更多</a></li>-->
<!--                    </ul>-->
                </div>
                <ul class="box-list">
                    <?php foreach ($hotgoods as $v):?>
                    <li class="box">
                        <a
                           href="/index/index/content?id={$v['id']}">
                            <span></span>
                            <img src="{$v['list_image']}">
                        </a>
                        <div class="color-wrapper">
                            <ul class="color-list" data-name="{$v['name']}">
                                <li class="white"
                                    style="display: none"

                                    data-img="{$v['list_image']}" data-href="/index/index/content?id={$v['id']}"
<!--                                    data-skuid="4020"-->
<!--                                    data-saleable="1"></li>-->
                            </ul>
                            <div>
<!--                                <span class="prompt" ></span>-->
<!--                                <span class="prompt-price rmb-symbol"></span>-->
                            </div>
                            <div class="btn-wrapper">
                                <a class="btn"
                                   href="/index/index/content?id={$v['id']}"></a>
<!--                                <a class="btn putin-shopcart"   data-spustr="/index/index/addcart"></a>-->
                            </div>
                        </div>
                        <div class="prodinfo">
                            <p class="name">{$v['name']}</p>
                            <p class="feature">{$v['describe']}</p>
                            <p class="price rmb-symbol">{$v['price']}</p>
                        </div>
                    </li>
                   <?php endforeach;?>
                </ul>
            </li>
        </ul>
    </div>
</div>

{/block}
{block name='base'}
<script>
    var webCtx = '',
        HOMEURL = 'https://www.vivo.com.cn',
        IMGHOSTURL = 'https://swsdl.vivo.com.cn/vivoshop/',
        passportLoginUrlPrefix = 'https://passport.vivo.com.cn/v3/web/login/authorize?client_id=3&redirect_uri=';
</script>


<script src="/static/shop/js/jquery.min_f03e5a3.js"></script>
<script src="/static/shop/js/tweenmax.min_92cf05a.js"></script>
<script src="/static/shop/js/jquery.cookie_d5528dd.js"></script>
<script src="/static/shop/js/jquery.lazyload_8b427f9.js"></script>
<script src="/static/shop/js/jquery.nicescroll.min_f01d838.js"></script>
<script src="/static/shop/js/jquery-placeholder_e51dc06.js"></script>
<script src="/static/shop/js/clamp_a80c754.js" async defer></script>
<script src="/static/shop/js/login_confirm_485e7b4.js" async defer></script>
<script src="/static/shop/js/dialog_5ba8a81.js" async defer></script>
<script src="/static/shop/js/vivo-stat_dc86f87.js" async defer></script>
<script src="/static/shop/js/vivo-track_c52a12f.js"></script>
<script src="/static/shop/js/vivo-common_15bdb7d.js"></script>
<script src="/static/shop/js/clamp_a80c754.js"></script>
<script src="/static/shop/js/modernizr_efebc45.js"></script>
<script src="/static/shop/js/easeljs-0.8.2.min_3cf4a98.js"></script>
<script src="/static/shop/js/header_7e581c3.js"></script>
<script src="/static/shop/js/dialog_5ba8a81.js"></script>
<script src="/static/shop/js/jquery.validate.min_3b00d60.js"></script>
<script src="/static/shop/js/jquery.easing_6516449.js"></script>
<script src="/static/shop/js/index_0f7e03e.js"></script>
<script src="/static/shop/js/index_728c93e.js"></script>

<script>
    //百度统计代码
    var _hmt = _hmt || [];
    (function () {
        var hm = document.createElement("script");
        hm.src = "//hm.baidu.com/hm.js?0a38f90134ba281b974d46dfeec121e0";
        hm.async = true;
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>
</body>
</html>
{/block}
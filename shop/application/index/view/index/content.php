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

    <script src="/static/js/jquery.js"></script>
    <script src="/static/shop/js/lib_490e13f.js"></script>
    <link href="/static/shop/css/common-font_5.css" class="J_replace_public" rel="stylesheet">
    <link href="/static/shop/css/global_8f73c7a_5.css" rel="stylesheet" type="text/css"/>
    <link href="/static/shop/css/common_9277b03_5.css" class="J_replace_public" rel="stylesheet">
    <link href="/static/shop/css/layout_ea3c79a_5.css" rel="stylesheet" type="text/css"/>
    <link href="/static/shop/css/dialog_bc2edaf_5.css" rel="stylesheet" type="text/css"/>
    <link href="/static/shop/css/home_f703714_5.css" type="text/css" rel="stylesheet">
    <link href="/static/shop/css/prod-detail_293c290.css" rel="stylesheet" type="text/css"/>
</head>
{/block}
{block name='content'}
<script>
    var ISHOMEHEAD = true;
</script>

<div id="content" class="cl">
    <input type="hidden" name="pageNavMappingIndex" id="pageNavMappingIndex"
           value="1"/>
    <input type="hidden" id="preview" name="preview" value=""/>
    <input type="hidden" id="salePrice" name="salePrice" value="{$goods['price']}"/>
    <div class="wrapper">
        <div class="crumbs">
            <a class="first" href="/">商城首页</a><b></b>
            <a href="/index/index/lists?id={$category['id']}">{$category['name']}</a>
            <b></b>
            <span>{$goodscategory['name']}</span>
        </div>
    </div>

    <div class="prod-container cl">

        <div class="wrapper">
            <div class="prod-container-top cl">

                <div class="prod-container-left">
                    <div id="prod-container-left">
                        <div id="j_SpecImgs" class="figure">
                            <ul id="bigImgUl">
                                <?php foreach ($contentimage as $v): ?>
                                    <li><img src="{$v}" alt="商品图片"/></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div id="j_SpecItems" class="spec-items">
                            <div id="smallImgUl" class="spec-items-box  ">
                                <ul class="cl">
                                    <?php foreach ($contentimage as $v): ?>
                                        <li><a href="javascript:;"><img src="{$v}"></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <div class="figure-btn-wrap hidden">
                                <a href="javascript:;" class="figure-btn-l figure-btn-disabled"></a>
                                <a href="javascript:;" class="figure-btn-r figure-btn-disabled"></a>
                            </div>
                        </div>


                        <!--                        <div class="prod-corner-icon" style="background-image: url('/static/shop/images/1707083306578526_100x100_4.png')"></div>-->


                    </div>
                </div>
                <div class="prod-container-right" default-skuId="4163">
                    <h1>{$goods['name']}</h1>
                    <p class="promotion-words">{$goods['describe']}</p>
                    <div class="prod-summary-box cl">
                        <div class="table-cell summary-price">
                            <span class="now-price"><dfn>&yen;</dfn>{$goods['price']}</span>
                        </div>


                    </div>

                    <form id="prod-detail-form" method="post" action="/index/index/addcart">
                        <input type="hidden" id="shopid" name="shopid" value="{$goods['id']}"/>
                        <dl class="prod-params cl">
                            <dt>选择规格</dt>
                            <dd class="package-box">
                                <ul class="tags package-tags cl J_package_tags">
                                    <?php foreach ($goodslists as $v): ?>
                                        <li class="listid" salePrice="{$goods['price']}">
                                            <h2 class="pkg-title">{$v['attr']}</h2>
                                            <input type="hidden" name="goodslistid" value="{$v['id']}" class="list"/>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </dd>

                            <dt>数量</dt>
                            <dd class="order-num">
                                <label id="dec" class="disabled">&nbsp;</label>
                                <input id="add-num" type="text" maxlength="1" name="num" value="1"/>
                                <label id="inc">&nbsp;</label>
                                <!--                                <small class="order-num-msg" id="order-num-msg">-->
                                <!--                                    (仅限购5部)-->
                                <!--                                </small>-->
                            </dd>
                        </dl>
                        <div class="choiceTotal-box" id="J_choiceTotal">
                            <div class="table-cell">
                                <div class="totalPrice">
                                    <dfn>&yen;</dfn>{$goods['price']}
                                </div>
                            </div>
                            <div class="table-cell" id="attr">
                                已选：
                            </div>
                        </div>

                    </form>
                    <button type="button" class="btn--lg btn-next J_buy-button btn-confirm add-cart">
                        <span class="btn-inner" id="cart">加入购物车</span>
                    </button>
                    <script>
                        $(function () {
                            $('#cart').click(function (e) {
                                e.preventDefault();
                                var shopid = $('#shopid').val();
                                var num = $('#add-num').val();
                                if ($('.listid').hasClass('on')) {
                                    var listid = $('.on').find('.list').val();
                                }
                                if (listid == null) {
                                    alert('请先选择规格属性');
                                    return
                                }
//                               var data = shopid + num + listid;
//                               console.log(data);
                                $.ajax({
                                    url: '/index/index/addcart',
                                    type: 'post',
                                    data: {shopid: shopid, num: num, listid: listid},
                                    success: function (status) {
                                        location.reload()
                                    }
                                })
                            })
                        })

                    </script>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="prod-main-info">
    <div class="prod-main-tab">
        <div class="prod-tab-box cl">

            <ul class="pull-left">
                <li class="tab-information current" v='information'><a href="#">详细信息<b></b></a></li>
            </ul>

        </div>

        <!--[if lt IE 9]>
        <div class="box-shadow"></div>
        <![endif]-->
    </div>
    <div class="prod-main-box">
        <div class="prod-main-information" style="display: block">
            <div class="section">
               {$goods['content']}
            </div>
        </div>

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
<script src="/static/shop/js/tweenmax.min_92cf05a_5.js"></script>
<script src="/static/shop/js/vivo-track_c52a12f_5.js"></script>
<script src="/static/shop/js/header_7e581c3_5.js"></script>
<script>
    var spuId = "1";
    var imgHost = "/static/shop/images";
    var skuImageJsonStr = '([{"bigPic":"commodity/63/4163_1481766946704_530x530.png","hdPic":"commodity/63/4163_1481766946704_530x530.png","imageNo":"1481766946704","imageType":"","skuId":"4163","smallPic":"commodity/63/4163_1481766946704_250x250.png","thumbnailPic":"commodity/63/4163_1481766946704_100x100.png"},{"bigPic":"commodity/63/4163_1480331731031_530x530.png","hdPic":"commodity/63/4163_1480331731031_530x530.png","imageNo":"1480331731031","imageType":"","skuId":"4163","smallPic":"commodity/63/4163_1480331731031_250x250.png","thumbnailPic":"commodity/63/4163_1480331731031_100x100.png"},{"bigPic":"commodity/63/4163_1480331732086_530x530.png","hdPic":"commodity/63/4163_1480331732086_530x530.png","imageNo":"1480331732086","imageType":"","skuId":"4163","smallPic":"commodity/63/4163_1480331732086_250x250.png","thumbnailPic":"commodity/63/4163_1480331732086_100x100.png"},{"bigPic":"commodity/63/4163_1480331732602_530x530.png","hdPic":"commodity/63/4163_1480331732602_530x530.png","imageNo":"1480331732602","imageType":"","skuId":"4163","smallPic":"commodity/63/4163_1480331732602_250x250.png","thumbnailPic":"commodity/63/4163_1480331732602_100x100.png"}])';
    var skuImageJson = eval(skuImageJsonStr);
    var fullpaySkuIdSet = "";
    var defaultSkuId = '4163';
    var showBuyNow = "1";
    var isSecondBuy = false;
    var maxNumberPerUser = 100;
</script>
<script src="/static/shop/js/view_e1bdf1e.js"></script>
</body>
</html>
{/block}
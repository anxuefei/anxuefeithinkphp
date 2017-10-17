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
    <script src="/static/js/vue.js"></script>
    <script src="/static/js/jquery.js"></script>
    <link href="/cart/indent/common-font.css" class="J_replace_public" rel="stylesheet">
    <link href="/cart/indent/global_8f73c7a.css" rel="stylesheet" type="text/css"/>
    <link href="/cart/indent/common_9277b03.css" class="J_replace_public" rel="stylesheet">
    <link href="/cart/indent/layout_ea3c79a.css" rel="stylesheet" type="text/css"/>
    <link href="/cart/indent/dialog_bc2edaf.css" rel="stylesheet" type="text/css"/>
    <link href="/cart/indent/home_f703714.css" type="text/css" rel="stylesheet">
    <link href="/cart/indent/buy-process_884d486.css" rel="stylesheet" type="text/css"/>
    <link href="/cart/indent/region-receivingAddress_fbcc76e.css" rel="stylesheet" type="text/css"/>
    <link href="/cart/indent/order-detail_3e72c5d.css" rel="stylesheet" type="text/css"/>
</head>
{/block}
{block name='content'}
<div id="box">
    <div id="content" class="cl">
        <form id="orderPayform" method="post" action="/index/order/index">
            <div class="wrapper">
                <div class="main-title-module">
                    <h1 class="main-title-txt">核对订单信息</h1>
                </div>
                <dl class="confirm-module">
                    <dt class="module-title">收货人信息</dt>
                    <dd class="address-info" id="J_adressList">
                        <ul class="adress-list url_ul">
                            <?php if ($urls!=null){?>
                            <li class="address-item J_address-item url" name="address" value="40647" v-for="v in urls"
                                @click="verify(v)">
                                <label class="inner">
                                    <div class="item-top">
                                        <span name="address.receiverName">{{v.name}}</span>
                                        <span name="address.mobilePhone">{{v.phone}}</span>
                                    </div>
                                    <div class="cl">
                                        <p class="mlellipsis">
                                            <span name="province">{{v.province}}</span>
                                            <span name="city">{{v.city}}</span>
                                            <span name="county">{{v.county}}</span>
                                            <span name="house">{{v.house}}</span>
                                        </p>
                                    </div>
                                </label>
                                <ul class="operations ">
<!--                                    <li class="operations-address-edit" @click="update">编辑</li>-->
                                    <li @click="del(v.id)" >删除</li>
                                </ul>
                            </li>
                            <?php }else{?>
                            <?php }?>
                            <li class="address-item new">
                                <a href="/index/location/create">
                               <label class="inner" >添加新地址 </label></a>
                            </li>
                        </ul>
                    </dd>
                </dl>
                <div class="confirm-module confirm-cart-module">
                    <table class="main-title-module">
                        <tr>
                            <td class="main-title-txt">确认商品</td>
                            <td></td>
                            <td>
                                <a class="continue-shopping" href="/index/cart/index">返回购物车修改 <b>&gt; </b></a>
                            </td>
                        </tr>
                    </table>
                    <div class="cart-head">
                        <table class="order-table">
                            <tr>
                                <th class="goods-col">商品名称</th>
                                <th class="price-col">价格（元）</th>
                                <th class="quantity-col">数量</th>
                                <th class="sum-col">小计（元）</th>
                            </tr>
                        </table>
                    </div>
                    <input type="hidden" class="order-commodity-main" skuId="4183"
                           spuId="9970" num="1"/>
                    <div class="prod-list-wrap">
                        <table class="order-table J_viewTBody">
                            <?php foreach ($shopdata['goods'] as $v) ?>
                            <tr class="prod-line">
                                <td class="prod-pic">
                                    <a href="/product/9970" target="_blank">
                                        <div class="figure">
                                            <img src="{$v['options']['img']}">
                                        </div>
                                    </a>
                                </td>
                                <td class="goods-col">
                                    <a class="goods-link" href="/index/index/content?id={v['id']}"
                                       target="_blank">{$v['name']}</a>
                                    <br>{$v['options']['goodstype']}
                                </td>
                                <td class="price-col">{$v['price']}</td>
                                <td>{$v['num']}</td>
                                <td class="total-price J_total-price">{$v['total']}.00</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="confirm-module confirm-order-remark">
                    <div class="module-title">订单备注</div>
                    <div class="order-remark cl">
                        <textarea id="order-memo" name="remark" class="tta-order-remark"
                                  placeholder="限300字（若有特殊需求，请联系商城在线客服）" rows="3" autocomplete="off"></textarea>
                    </div>
                </div>
                <div class="confirm-module confirm-total-amount cl ">
                    <div class="other-info right-box ">
                        <table>
                            <tr class="order-sum">
                                <td><label>已选<em>{$shopdata['total_rows']}</em>件商品，合计：</label></td>
                                <td><span
                                            class="price"><dfn>&yen;</dfn>{$shopdata['total']}.00</span>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="real-price-box">
                        <label>应付总额：</label><span
                                class="real-price red"><dfn>&yen;</dfn><span
                                    id="payTotal">{$shopdata['total']}.00</span></span>
                    </div>
                    <?php if ($urls!=null){?>
                    <div class="confirm-btn-box">
                        <button type="submit" class="btn--lg confirm-btn--submit" id="btn-submit-order" title="提交订单">
                            <i class="btn-inner">提交订单</i>
                        </button>
                    </div>
                        <?php } else{ ?>
                    <div class="confirm-btn-box" >
                            <button type="button" class="btn--lg confirm-btn--submit"  value="添加地址">
                                <a href="/index/location/create">
                                <i class="btn-inner" >请先添加一个地址</i></a>
                            </button>
                        <?php }?>
                    </div>
                    <textarea hidden name="userurl" id="" cols="30" rows="10">{{userurl}}</textarea>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    var order = new Vue({
        el: "#box",
        data: {
            urls: {$urls},
            userurl: {$userurl},
        },
        methods: {
            verify(v) {
                order.userurl = v;
            },
            del(id){
                location.href='/index/location/delete?id='+id;
            },
            update() {
                location.href = '/index/location/update';
            }
        }
    })
</script>
<script>
    $(function () {
        $('.url').click(function () {
            $(this).addClass('on').siblings('.url').removeClass('on');
        })
        $('.url_ul').find('li').first().addClass('on')
    })

</script>
{/block}
{block name='base'}
<script>
    var webCtx = '',
        HOMEURL = 'https://www.vivo.com.cn',
        IMGHOSTURL = 'https://swsdl.vivo.com.cn/vivoshop/',
        passportLoginUrlPrefix = 'https://passport.vivo.com.cn/v3/web/login/authorize?client_id=3&redirect_uri=';
</script>
<script src="/cart/indent/jquery.min_f03e5a3.js"></script>
<script src="/cart/indent/TweenMax.min_92cf05a.js"></script>
<script src="/cart/indent/header_7e581c3.js"></script>
</body>
</html>
{/block}
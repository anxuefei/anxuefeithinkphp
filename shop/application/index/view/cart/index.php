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
    <script src="/static/js/axios.min.js"></script>

    <link href="/cart/common-font.css" class="J_replace_public" rel="stylesheet">
    <link href="/cart/global_8f73c7a.css" rel="stylesheet" type="text/css"/>
    <link href="/cart/common_9277b03.css" class="J_replace_public" rel="stylesheet">
    <link href="/cart/layout_ea3c79a.css" rel="stylesheet" type="text/css"/>
    <link href="/cart/dialog_bc2edaf.css" rel="stylesheet" type="text/css"/>

    <link href="/cart/home_f703714.css" type="text/css" rel="stylesheet">
    <link href="/cart/dialog_bc2edaf.css" rel="stylesheet" type="text/css"/>
    <link href="/cart/buy-process_884d486.css" rel="stylesheet" type="text/css"/>
    <link href="/cart/shopcart_5c4e1ce.css" rel="stylesheet" type="text/css"/>
</head>
{/block}
{block name='content'}
<?php if ($num != 0){?>
<div id="app">
    <div id="content" class="cl">
        <div class="wrapper ">
            <table class="main-title-module">
                <tr>
                    <td></td>
                    <th class="main-title-txt">我的购物车</th>
                    <td><a class="continue-shopping" href="/">继续购物 <b>&gt; </b></a></td>
                </tr>
            </table>
            <div class="cart-head">
                <table class="order-table">
                    <tr>
                        <th class="check-col">
                            <label class="J_viewCheckAll">
                                <span>商品序号</span>
                            </label>
                        </th>
                        <th class="goods-col" >商品名称</th>
                        <th class="price-col">价格（元）</th>
                        <th class="quantity-col">数量</th>
                        <th class="sum-col">小计（元）</th>
                        <th class="action-col">操作</th>
                    </tr>

                </table>
            </div>
            <div class="prod-list-wrap J_viewWrap" data-uniqueCode="1_1882">
                <table class="order-table ">

                    <tr class="prod-line" v-for="(v,k) in allgoods.goods">
                        <td class="check-col">
                            <i>{{k}}</i>
                        </td>
                        <td class="prod-pic">
                            <a :href="'/index/index/content?id=' + v.id"
                               target="_blank">
                                <div class="figure">
                                    <img :src="v.options.img"/>
                                </div>
                            </a>
                        </td>
                        <td class="goods-col">

                            <a class="goods-link"
                               :href="'/index/index/content?id=' + v.id"
                               target="_blank">{{v.name}}</a>
                            <br>规格：{{v.options.goodstype}}
                        </td>
                        <td class="price-col">{{v.price}}</td>

                        <td>
                                    <span class="number-box">
                                        <a class="reduce-num J_reduceNum J_operate" @click.prevent="del(v,k)">-</a>
                                        <input type="number" class="prod-num J_viewNum J_operate" min="1" :value="v.num">
                                        <a class="add-num" @click.prevent="add(v,k)">+</a></span>
                            <span class="help-line J_tip" style="display: none"></span>
                        </td>
                        <td class="total-price J_viewSalePrice">{{v.total}}</td>
                        <td>
                            <input type="hidden" class="J_viewMarketPrice"/>
                           <a href="javascript:;" class="J_delSingle"
                                     data-uniqueCode="1_1882" @click.prevent="remove(k)">删除</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="cart-toolbar-wrap">
            <div class="fixed-bottom-bar" id="fixed-bottom-bar">

                <div class="wrapper ">
                    <div class="cart-toolbar-inner cl">
                        <div class="option-operation">
                            <ul>
                                <li><a class="J_delMultiple"  @click.prevent="destory">清空购物车</a></li>
                            </ul>
                        </div>

                        <div class="cart-toolbar-right">
                            <table class="cart-toolbar-table">
                                <tr>
                                    <td class="sum-area">


                                        <p class="sum-area-infoI">
                                            已选商品<em><b id="J_totalSkuNum">{{allgoods.total_rows}}</b></em>件，合计：<b class="price"><dfn>¥</dfn><span
                                                        id="J_totalSalePrice">{{allgoods.total}}</span></b>
                                        </p>
                                    </td>
                                    <td class="btn-area">
                                        <?php if(isset($user)){?>
                                        <a href="/index/cart/indent" class="btn--lg cart-btn-submit J_btnConfirm"><i class="btn-inner">去结算</i></a>
                                        <?php }else{?>
                                            <a href="/index/login/index" class="btn--lg cart-btn-submit J_btnConfirm"><i class="btn-inner">去结算</i></a>
                                        <?php }?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }else{?>
    <div id="content" class="cl">
        <div class="wrapper">
            <div class="prod-list">
                <div class="no-result">
                    <img src="images/shopping-cart_50507a3.png"/>

                    <p class="comment">亲，您的购物车里还没有物品哦，赶紧去<a href="/">逛逛</a>吧</p>
                </div>
            </div>
        </div>

    </div>
<?php };?>
<script>
   var showgoods =  new Vue({
        el:'#app',
        data:{
            allgoods:{$allgoods}
        },
        methods:{
//            商品数量减少
            del(v,k){
                if (v.num<=1){
                    v.num=1;
                }else{
                    v.num = v.num*1-1
                };
               axios.get('/index/cart/update?sid='+k+"&num="+v.num).then((response)=>{
                   showgoods.allgoods = response.data;
               })
            },
//            商品数量增加
            add(v,k){
                v.num = v.num*1+1;
                axios.get('/index/cart/update?sid='+k+"&num="+v.num).then((response)=>{
                    showgoods.allgoods = response.data;
                })
            },
//            删除单个商品
            remove(k){
                axios.get('/index/cart/remove?sid='+k).then((response)=>{
                    console.log(response.data);
                    if (response.data!=1){
                        showgoods.allgoods = response.data;
                    }else {
                        location.reload();
                    }

                })
            },
            destory(){
                axios.get('/index/cart/delete').then((response)=>{
                        location.reload();
                })
            }
        }
    })
</script>
{/block}
{block name='base'}
<script src="/cart/jquery.min_f03e5a3.js"></script>
<script src="/cart/TweenMax.min_92cf05a.js"></script>
<script src="/cart/vivo-common_15bdb7d.js"></script>
</body>
</html>
{/block}
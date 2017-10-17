{{extend name="common" /}
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

    <link href="/static/shop/css/common-font_4.css" class="J_replace_public" rel="stylesheet">
    <link href="/static/shop/css/global_8f73c7a_4.css" rel="stylesheet" type="text/css"/>
    <link href="/static/shop/css/common_9277b03_4.css" class="J_replace_public" rel="stylesheet">
    <link href="/static/shop/css/layout_ea3c79a_4.css" rel="stylesheet" type="text/css"/>
    <link href="/static/shop/css/dialog_bc2edaf_4.css" rel="stylesheet" type="text/css"/>

    <link href="/static/shop/css/home_f703714_4.css" type="text/css" rel="stylesheet">
    <link href="/static/shop/css/prod-list_0e0978d_3.css" rel="stylesheet" type="text/css" />
</head>
{/block}
{block name="content"}
<div id="content" class="cl">
    <input type="hidden" name="pageNavMappingIndex" id="pageNavMappingIndex" value="1"/>
    <div class="wrapper">
        <div class="crumbs">
            <a class="first" href="/">商城首页</a><b></b>
            <span>{$categoryname['name']}</span>
        </div>
    </div>


    <div class="wrapper cl">
        <div class="filter-wrap" id="J_filterWrap">
            <!--            <ul class="filter-tab cl">-->
            <!--                <li class="filter-tab-menu" data-typePath="phone">-->
            <!--                    <a href="javascript:void(0);"  >选购手机</a>-->
            <!--                </li>-->
            <!--                <li class="filter-tab-menu " data-typePath="parts">-->
            <!--                    <a href="javascript:void(0);" class="active" >选购配件</a>-->
            <!--                </li>-->
            <!--                <li class="filter-tab-menu" data-typePath="brokenScreen">-->
            <!--                    <a href="javascript:void(0);"  >选购碎屏宝</a>-->
            <!--                </li>-->
            <!--            </ul>-->
<!--            <ul class="filter-tags cl">-->
<!--                <li class="filter-tab-cont">-->
<!---->
<!--                    <a href="/product/parts" class="on" category="">全部</a>-->
<!--                    --><?php //foreach ($category as $v): ?>
<!--                        <a href="/index/index/lists?id={$v['id']}" category="8">{$v['name']}</a>-->
<!--                    --><?php //endforeach; ?>
<!--                </li>-->
<!--            </ul>-->
        </div>
        <dl class="filter-sort cl">
<!--            <dd class="fl-item on">-->
<!--                <a href="/product/parts?category=&hasStore=">默认</a>-->
<!--            </dd>-->
<!--            <dd class="fl-item ">-->
<!--                <a href="/product/parts?category=&sortType=price_asc&hasStore=">价格<i class="icon-sort"></i></a>-->
<!--            </dd>-->
<!--            <dd class="fl-item ">-->
<!--                <a href="/product/parts?category=&sortType=market_time_asc&hasStore=">上架时间<i class="icon-sort"></i></a>-->
<!--            </dd>-->
<!--            <dd class="fl-item">-->
<!--                <a href="/product/parts?category=&sortType=&hasStore=1">-->
<!--                    <i class="icon-checkbox "></i>仅看有货</a>-->
<!--            </dd>-->
        </dl>
    </div>

    <div class="container wrapper">
        <ul class="spu-item-list">
            <?php foreach ($goodsdata as $good): ?>
                <?php if (isset($good['id'])) { ?>
                    <li class="spu-item">
                        <a href="/index/index/content?id={$good['id']}" title="{$good['name']}">
                            <div class="figure">
                                <img src="{$good['list_image']}"/>
                            </div>
                            <div class="spu-info">
                                <p class="name">{$good['name']}</p>
                                <p class="feature" title="{$goods['describe']}">
                                    {$good['describe']}
                                <p class="price rmb-symbol">{$good['price']}</p>
                            </div>
                        </a>
                    </li>
                <?php } else { ?>
                    <?php foreach ($good as $v): ?>
                        <li class="spu-item">
                            <a href="/index/index/content?id={$v['id']}" title="{$v['name']}">

                                <div class="figure">
                                    <img src="{$v['list_image']}"/>
                                </div>
                                <div class="spu-info">
                                    <p class="name">{$v['name']}</p>
                                    <p class="feature" title="{$v['describe']}">
                                        {$v['describe']}
                                    <p class="price rmb-symbol">{$v['price']}</p>
                                </div>
                            </a>
                        </li>
                    <?php endforeach; ?>
                <?php } ?>

            <?php endforeach; ?>
        </ul>
    </div>
</div>
{/block}
{block name='base'}
<script src="/static/shop/js/jquery.min_f03e5a3_4.js"></script>
<script src="/static/shop/js/tweenmax.min_92cf05a_4.js"></script>
<script src="/static/shop/js/jquery.cookie_d5528dd_4.js"></script>
<script src="/static/shop/js/vivo-common_15bdb7d_4.js"></script>
</body>
</html>
{/block}
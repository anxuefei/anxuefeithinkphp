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
    <!--    添加订单css-->
    <link href="/static/shop/css/common-font.css" class="J_replace_public" rel="stylesheet">
    <link href="/static/css/layout_ea3c79a.css" rel="stylesheet" type="text/css"/>
    <link href="/static/css/home_f703714.css" type="text/css" rel="stylesheet">
    <link href="/static/shop/css/main.css" rel="stylesheet" type="text/css"/>
    <link href="/static/shop/css/home.css" rel="stylesheet">
    <link href="/static/shop/css/common-font_8a036c3.css" rel="stylesheet">
    <link href="/static/order/home.css" rel="stylesheet">

</head>
{/block}
{block name='content'}
<div class="body">

    <!-- 标题 -->
    <div class="title">收银台</div>

    <!--订单基本信息-->
    <div class="order-detail mt-divid" id="orderDetail">
        <div class="content">订单提交成功，请您尽快付款！应付金额：<span class="red">&yen;<em class="J-pay-total">{$orderdata['total']}</em></span></div>
<!--        <div class="submit-desc">请您在提交订单后<span class="blue">72小时</span>内完成支付，否则订单自动会取消。</div>-->
        <div class="info">
            <dl class="myDetail">
                <dt>订单编号：</dt>
                <dd>{$orderdata['order_number']}</dd>
            </dl>
            <dl class="myDetail">
                <dt>商品名称：</dt>
                <?php foreach($cartData as $v):?>
                    <dd>
                        {$v['goodsname']}{$v['goodslists']} x {$v['num']}
                    </dd>
                <?php endforeach;?>
            </dl>
            <dl class="myDetail show">
                <dt>收货信息：</dt>
                <dd class="order-detail-val">{$urldata['name']}&nbsp;{$urldata['phone']}&nbsp;{$urldata['province']}{$urldata['city']}{$urldata['house']}</dd>
            </dl>

            <div class="triangle">
                <span>订单详情</span>
                <span class="bottem showDetail">
						<span class="first"></span>
						<span class="second"></span>
					</span>
            </div>
        </div>
    </div>

    <div class="pay-platform mt-divid">
<!--        <div class="pay-box" id="payBox">-->
<!--            <div class="header">平台支付</div>-->
<!--            <div class="row">-->
<!--                <div class="col-item active" paychannel="1"><img src="/static/shop/images/icon.zfb.png"/>支付宝</div>-->
<!---->
<!--                <div class="col-item " paychannel="2"><img src="/static/shop/images/icon.weixin.png"/>微信支付</div>-->
<!--                <div class="col-item " paychannel="4"><img src="/static/shop/images/icon.unionpay.png"/>银行卡</div>-->
<!--                <div class="col-item " paychannel="3"><img src="/static/shop/images/icon.cft.png"/>财付通</div>-->
<!--            </div>-->
<!--        </div>-->
        <div id="fixedMark">
            <div id="fixedNav">
                <div class="pay-body">

                    <div class='voucher hidden'>
                        <div class="checkbox">
								<span id="voucherToggle">


									<i class="icon-checkbox"></i>换新鼓励金<em class="line"></em>

									<span class="hidden" id="usage">已使用<strong class="yen">&yen;<em
                                                    class="J-usable">0</em></strong>剩余<strong class="surplus">&yen;<em
                                                    class="J-residue">0</em></strong></span>

									<span id="account">共<strong class="surplus">&yen;0.00</strong>可用<strong class="yen">&yen;<em
                                                    class="J-usable">0</em></strong></span>



									<input type="hidden" id="isVoucher" value="0">

									<input type="hidden" id="voucherSurplus" value="0.00">

									<input type="hidden" id="totalPay" value="2798.00">
								</span>
                        </div>
                    </div>

                    <div class="stage-pay">
                        <div class="super">实付金额：&nbsp;<span class="money showPrintAndFee">&yen;2798.00</span></div>
                        <div class="sub showHbfqAll">(每期需付：&nbsp;&yen;<span class="showEachPrinAndFee"></span>&nbsp;&nbsp;共&nbsp;<span
                                    class="showHbfqNum"></span>&nbsp;期)
                        </div>
                    </div>
                    <div class="common-pay">实付金额：&nbsp;<span class="money">&yen;<em class="J-pay-total">{$orderdata['total']}</em></span></div>
                    <button class="pay-btn surePay" id="pay">立即支付</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 弹出层 -->
<div class="mask"></div>

<!--<div class="safe-verify">-->
<!--    <div class="close">-->
<!--        <img src="/static/shop/images/icon_close.png"/>-->
<!--    </div>-->
<!--    <div class="caption">安全验证</div>-->
<!--    <div class="safe-verify-box">-->
<!--        <div class="opeartion">当前使用了换新鼓励金，请先通过手机号进行安全认证</div>-->
<!--        <div class="phone"></div>-->
<!--        <div class="input-box">-->
<!--            <input type="text" class="txt" id="code" placeholder="请输入手机验证码" maxlength="6">-->
<!--            <span class="get-code">获取验证码</span>-->
<!--        </div>-->
<!--        <div class="err-tip hidden"></div>-->
<!--        <div class="tip">（如无法通过手机号验证,请联系官方客服400-678-9688）</div>-->
<!--    </div>-->
<!--    <div class="div-btn">-->
<!--        <button class="btn-payed disabled" id="submitCode">立即验证</button>-->
<!--    </div>-->
<!--</div>-->
<!--<div class="tip-verify">-->
<!--    <div class="close">-->
<!--        <img src="/static/shop/images/icon_close.png"/>-->
<!--    </div>-->
<!--    <div class="caption">你选择使用的换新鼓励金额发生了变化</div>-->
<!--    <div class="div-btn">-->
<!--        <button class="btn-payed">确认</button>-->
<!--    </div>-->
<!--</div>-->
<!--<!-- 微信支付加载中 -->
<!--<div class="weixin-loading showPopPuBox">-->
<!--    <div class="close">-->
<!--        <img src="/static/shop/images/icon_close.png"/>-->
<!--    </div>-->
<!--    <div class="caption">微信支付</div>-->
<!--    <div class="loading">加载中</div>-->
<!--</div>-->

<!-- 微信支付中-->
<div class="weixin-paying showPopPuBox">
    <div class="close">
        <img src="/static/images/icon_close.png"/>
    </div>
    <div class="caption">正在支付...</div>
    <div class="opeartion"></div>
    <div class="question"><a class="paygowrong" onclick="payHelpCenter()" target="_blank"></a></div>
    <div class="div-btn">
        <button class="btn-payed" id="order">已完成支付</button>
        <button class="pay-other-way">其他支付方式</button>
    </div>
</div>
<!-- 微信支付加载失败 -->
<!--<div class="weixin-failure showPopPuBox">-->
<!--    <div class="close">-->
<!--        <img src="/static/shop/images/icon_close.png"/>-->
<!--    </div>-->
<!--    <img class="pay-failure" src="/static/shop/images/icon_n.png"/>-->
<!--    <div class="failure-text">很抱歉，微信支付二维码加载失败</div>-->
<!--    <div class="div-btn">-->
<!--        <button class="btn-payed paySuccess">已完成支付</button>-->
<!--        <button class="pay-other-way close-pay">其他支付方式</button>-->
<!--    </div>-->
<!--</div>-->

<!-- 微信支付扫码 -->
<!--<div class="weixin-scan showPopPuBox">-->
<!--    <div class="close">-->
<!--        <img src="images/icon_close.png"/>-->
<!--    </div>-->
<!--    <div class="caption">微信支付</div>-->
<!--    <div class="qr">-->
<!--        <img class="showWechatPayQR img-left" src="images/scan.png"/>-->
<!--        <img src="images/scan.png" class="img-right"/>-->
<!--    </div>-->
<!--    <div class="ex">-->
<!--        <div class="pay-desc">实付金额：<span class="red">&yen;2798.00</span></div>-->
<!--        <div class="scan-desc">使用微信扫描左侧二维码进行支付</div>-->
<!--    </div>-->
<!--</div>-->
{/block}
{block name='base'}
<script>
    $(function () {
//        $('#pay').click(function () {
//            alert({$orderdata['id']})
//            var orderid = {$orderdata['id']};
//
//        })
        $('#order').click(function () {
            location.href='/index/order/lists'
        })
    })
</script>
<script type="text/javascript">
    var outTradeOrderNo = '17092167935836317633';
    var ctx = '/webpay';
</script>
<script type="text/javascript" src="/static/shop/js/jquery.cookie.js"></script>
<script type="text/javascript" src="/static/shop/js/webpay.js"></script>
<script>    var vivoportalWebUrl = "//www.vivo.com.cn/";
    var searchUrlConfig = {
        getKeyWords: vivoportalWebUrl + 'search/ajax/recWords',
        /** 获取关键词 */        getAssciate: vivoportalWebUrl + 'search/ajax/assResult',
        /** 获取联想结果 */        globalSearch: vivoportalWebUrl + 'search' /** 全局搜索的路由 */
    };</script>
<script src="/static/shop/js/header_23f8c9b.js"></script>
<script src="/static/shop/js/header_extend_ac8af3e.js"></script>
{/block}
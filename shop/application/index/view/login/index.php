<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>帐号登录</title>
    <link href="/static/shop/css/reset.css" rel="stylesheet" type="text/css">
    <link type="text/css" rel="stylesheet" href="/static/shop/css/login.css">
</head>
<body>
<div class="bg-ctn">
    <img width="100%" height="710"
         src="/static/images/beijing.jpg" id="bgiframe" frameborder="0"
         scrolling="no"/>
</div>
<div class="wrapper">
    <div class="wrap">
<!--        <div class="h_panel">-->
<!--            <a class="h_logo" target="_blank" href="https://www.vivo.com.cn"></a>-->
<!--        </div>-->
        <div class="layout">
            <input type="hidden" id="client_id" value="">
            <input type="hidden" id="redirect_uri"
                   value="">
            <div class="n-frame device-frame reg_frame" id="main_container">
                <div class="external_logo_area">
                    <a class="vivologo" id="logo_link" href="javascript:void(0);"></a>
                </div>
                <div class="title-item t_c">
                    <h4 class="title_big30">帐号登录</h4>
                </div>
                <div class="outer-box">
                    <div class="inner-box">
                        <form id="loginForm" class="login-form" action="/index/login/index" method="post">
                            用户名：
                            <label class="labelbox" for="accountInput">
                                <input type="text" class="account" id="accountInput" name="username" placeholder="用户名"/>
                            </label>
                            密码：
                            <label class="labelbox" for="passwordInput"> <input id="passwordInput" class="password-field" type="password" placeholder="密码" name="password">
                                <input type="hidden" id="_pwdMd5" >
                            </label>
<!--                            <label class="labelbox" for="codeInput" style="display: none" id="web_login_piccode">-->
<!--                                <input id="codeInput" class="pic-code-input" type="text" name="piccode" autocomplete="off" placeholder="请输入验证码" autocomplete="off">-->
<!--                                <img src="" alt="图片验证码" title="看不清换一张" class="code_image chkcode_img"/>-->
<!--                            </label>-->
                            <div class="err_tip">
                                <div class="dis_box">
                                    <span></span>
                                </div>
                            </div>
                            <div class="auto-box">
                                <!--<div class="auto-login">
                                    <input class="auto-login-input" id="autoLogin" type="checkbox" />
                                    <label for="autoLogin">两周内自动登录</label>
                                </div>-->
<!--                                <div class="auto-login">-->
<!--                                    <div class="check-ctn check-outer">-->
<!--                                        <input  class="checked no"type="checkbox" value="1" name="mian">-->
<!--                                        <label for="autoLogin">两周内自动登录</label>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="link">-->
<!--                                    <a-->
<!--                                            href="/v3/web/findpwd/findPwd?isPc=1&client_id=&redirect_uri=">忘记密码？</a>-->
<!--                                </div>-->
                            </div>
                            <div class="submit-btn">
                                <input type="submit" class="btn" value="登录" id="login_web">
                            </div>
                        </form>
                        <div class="link-btn">
                            <a class="link "
                               href="/index/login/create">注册帐号</a>
                        </div>
                        <div class="link-btn">
                            <a class="link "
                               href="/">返回商城</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  <div class="n-footer">
    <div class="nf-link-area clearfix">
        <ul class="service-list">
            <li><a class="service-li online-service"
                href="https://kefu.vivo.com.cn/robot-vivo/pcChat.html"
                target="_blank">在线客服</a></li>
            <li><a class="service-li tel-service" href="javascript:void(0)"
                data-lang="zh_TW">400-678-9688(24小时全国服务热线)</a></li>
        </ul>
    </div>
    <div class="copyright">COPYRIGHT&nbsp;&copy;&nbsp;1996-2017&nbsp;&nbsp;ALL
        RIGHTS RESERVED.粤ICP备05100288号</div>
</div>-->

<div class="n-footer" style="position: absolute;z-index:99999">
    <div class="nf-link-area clearfix">
        <ul class="service-list">
            <li><a class="service-li"
                   href="https://kefu.vivo.com.cn/robot-vivo/pcChat.html"
                   target="_blank"> <img class="online-service"
                                         src="images/online-service.png"/><img
                            class="online-service-active"
                            src="images/online-service-active.png"/> 在线客服
                </a></li>
            <li><a class="service-li tel" href="javascript:void(0)"
                   data-lang="zh_TW"><img class="tel-service"
                                          src="images/tel.png"/>15933071847</a></li>
        </ul>
    </div>
    <div class="copyright">xiaofeishangcheng| 京ICP备17044433号
    </div>
</div>

<!--<script type="text/template" id="verifyTpl">-->
<!--    <div class="modal-container">-->
<!--        <header class="close-ctn">-->
<!--            <img class="x-icon" src="images/x_icon.png"/>-->
<!--        </header>-->
<!--        <nav class="nav-ctn">-->
<!--            <div class="text1">{{title}}</div>-->
<!--            <div class="text2">为了保护您的帐号安全，需要验证您的身份</div>-->
<!--        </nav>-->
<!--        <div class="code-to-ctn">-->
<!--            <div class="tip"><span class="desc">验证码已发送至</span><span class="account"></span></div>-->
<!--        </div>-->
<!--        <label class="labelbox" for="codeInput">-->
<!--            <input id="codeInput" class="msg-code-input" placeholder="请输入验证码" autocomplete="off"/>-->
<!--            <span class="separator"></span>-->
<!--            <input type="button" class="get-code-btn text-link text-link-disabled" value="重新获取(60)"-->
<!--                   id="login_validate_get_code"/>-->
<!--        </label>-->
<!--        <div class="err_tip">-->
<!--            <div class="dis_box"><span></span></div>-->
<!--        </div>-->
<!--        <div class="submit-btn">-->
<!--            <input type="submit" class="btn " name="login" value="完成" id="login_validate_sub_code">-->
<!--        </div>-->
<!--        <div class="verify-tip-ctn">-->
<!--            <p class="desc">{{type}}可能会延时，请耐心等待，如果长时间未收到短信，请60秒后重新获取。</p>-->
<!--        </div>-->
<!--    </div>-->
<!--</script>-->
<!--<script type="text/javascript" src="/static/shop/js/jquery-1.7.2.min.js"></script>-->
<script type="text/javascript" src="/static/shop/js/es5-shim.min.js"></script>
<script type="text/javascript" src="/static/shop/js/es5-sham.min.js"></script>
<script type="text/javascript" src="/static/shop/js/json3.min.js"></script>
<script type="text/javascript" src="/static/shop/js/common.js"></script>
<script type="text/javascript" src="/static/shop/js/login.js"></script>
<script type="text/javascript" src="/static/shop/js/link.js"></script>
<script type="text/javascript" src="/static/shop/js/jquery-md5-min.js"></script>
<script type="text/javascript" src="/static/shop/js/template-web.js"></script>
</body>
</html>
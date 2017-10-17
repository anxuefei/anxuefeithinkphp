<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>帐号中心</title>
    <link type="text/css" rel="stylesheet" href="/static/shop/css/reset.min.css">
    <link rel="stylesheet" href="/static/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="/static/shop/css/account_center.min.css">
    <link rel="shortcut icon" href="/static/shop/images/favicon.ico" type="image/x-icon"/>
</head>

<body>
<!--<input type="hidden" id="ibe" value='0'/>-->
<!--<input type="hidden" id="ibp" value='1'/>-->
<!--<input type="hidden" id="ibpp" value='0'/>-->
<!--<input type="hidden" id="bindType"/>-->
<!--<input type="hidden" id="identityValidateType"/>-->
<!--<input type="hidden" id="openId" value="3c67d7f6d04bec40"/>-->
<!--<input type="hidden" id="client_id" value=""/>-->
<!--<input type="hidden" id="redirect_uri" value=""/>-->
<!--<input type="hidden" id="fromtype" value=""/>-->
<div class="wrapper">
    <div class="wrap">
        <div class="layout">
            <div class="n-frame device-frame reg_frame" id="main_container">

                <div class="title-item t_c">
                    <h4 class="title_big30">帐号中心</h4>
                </div>


                <div class="outer-box">
                    <div class="inner-box">


                        <div class="user-box">
                            <div class="user-wrap">
                                <div class="avatar">
                                    <img src="https://bbs.vivo.com.cn/avatar/73885440/small?t=1505998157424"
                                         class="img"> <span class="nickname"><?php echo \think\Session::get('webuser.username');?></span>
                                </div>
                                <a href="/index/login/logout" class="login-out" id="logout">退出帐号</a>
                            </div>
                        </div>
                        <div class="lv-box">
                            <!-- lv1：等级低， lv2：等级一般， lv3：等级高  文案动态获取-->
                            <div class="lv-content lv2">
                                <span>安全等级一般</span><i></i>
                            </div>
                        </div>
                        <div class="items-ctn">
                            <ul class="items-list">
                                <li class="safe-item account-password-item">
                                    <div class="img-ctn">
                                        <img class="img"
                                             src="/web/webdist/images/account_center/acnt_pwd.png?v=2017091817final"/>
                                    </div>
                                    <div class="item-info">
                                        <div class="title">
                                            帐号密码
                                        </div>
                                        <div class="desc">用户保护帐号信息和登录安全</div>
                                    </div>
                                    <div class="btn-ctn">
                                        <a id="modifyBtn" class="btn btn-modify btn-acnt-pwd" href="/index/login/changepassword">修改</a>

                                    </div>
                                </li>
                                <li class="item-separator">
                                    <div class="separator"></div>
                                </li>
                                <li class="item-separator">
                                    <div class="separator"></div>
                                </li>
                                <li class="safe-item account-password-item">
                                    <div class="btn-ctn">
                                        <a id="modifyBtn" class="btn btn-modify btn-acnt-pwd" href="/">返回商城</a>
                                    </div>
                                </li>

<!--                                <li class="safe-item safe-phone-item">-->
<!--                                    <div class="img-ctn">-->
<!--                                        <img class="img"-->
<!--                                             src="/web/webdist/images/account_center/safe_phone.png?v=2017091817final"/>-->
<!--                                    </div>-->
<!--                                    <div class="item-info">-->
<!--                                        <div class="title">-->
<!--                                            安全手机-->
<!---->
<!---->
<!--                                            <span class="account phone account-bind">159****1847</span>-->
<!---->
<!---->
<!--                                        </div>-->
<!--                                        <div class="desc">-->
<!--                                            安全手机可用于登录vivo帐号，找回密码或其它安全验证<span class="suggest phone">-->
<!--														-->
<!--														-->
<!--													</span>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="btn-ctn">-->
<!---->
<!---->
<!--                                        <input class="btn btn-modify btn-phone" id="modifyBtn" type="button" value="修改"-->
<!--                                               onclick="_gaq('update_phone_busi=1&client_id=')"-->
<!--                                        />-->
<!---->
<!---->
<!--                                    </div>-->
<!--                                </li>-->
<!--                                <li class="item-separator">-->
<!--                                    <div class="separator"></div>-->
<!--                                </li>-->
<!--                                <li class="safe-item safe-mail-item">-->
<!--                                    <div class="img-ctn">-->
<!--                                        <img class="img"-->
<!--                                             src="/web/webdist/images/account_center/safe_mail.png?v=2017091817final"/>-->
<!--                                    </div>-->
<!--                                    <div class="item-info">-->
<!--                                        <div class="title">-->
<!--                                            安全邮箱-->
<!---->
<!---->
<!--                                            <span class="account mail account-unbind">未绑定</span>-->
<!---->
<!---->
<!--                                        </div>-->
<!--                                        <div class="desc">-->
<!--                                            安全邮箱可用于登录vivo帐号，找回密码或其它安全验证<span class="suggest">-->
<!--														建议立即绑定-->
<!--														-->
<!--													-->
<!--												</span>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="btn-ctn">-->
<!---->
<!---->
<!--                                        <input class="btn btn-set btn-mail" id="modifyBtn" type="button" value="绑定"-->
<!--                                               onclick="_gaq('set_email_busi=1&client_id=')"-->
<!--                                        />-->
<!---->
<!---->
<!--                                    </div>-->
<!--                                </li>-->
<!--                                <li class="item-separator">-->
<!--                                    <div class="separator"></div>-->
<!--                                </li>-->
<!--                                <li class="safe-item question-item">-->
<!--                                    <div class="img-ctn">-->
<!--                                        <img class="img"-->
<!--                                             src="/web/webdist/images/account_center/question.png?v=2017091817final"/>-->
<!--                                    </div>-->
<!--                                    <div class="item-info">-->
<!--                                        <div class="title">-->
<!--                                            密保问题-->
<!---->
<!---->
<!--                                            <span class="account question-text account-unbind">未设置</span>-->
<!---->
<!---->
<!--                                        </div>-->
<!--                                        <div class="desc">-->
<!--                                            密保问题可用于登录vivo帐号，找回密码或其它安全验证<span class="suggest account-unbind">-->
<!--														建议立即设置-->
<!--														-->
<!--													-->
<!--												</span>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="btn-ctn">-->
<!---->
<!---->
<!--                                        <input class="btn btn-set btn-question" id="modifyBtn" type="button" value="设置"-->
<!--                                               onclick="_gaq('set_pwdpro_busi=1&client_id=')"-->
<!--                                        />-->
<!---->
<!---->
<!--                                    </div>-->
<!--                                </li>-->


                                <!--

                                -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="n-footer">
    <div class="nf-link-area clearfix">
        <ul class="service-list">
            <li>
                <a class="service-li" href="https://kefu.vivo.com.cn/robot-vivo/pcChat.html" target="_blank">
                    <img class="online-service" src="/web/webdist/images/online-service.png"/>
                    <img class="online-service-active" src="/web/webdist/images/online-service-active.png"/> 在线客服</a>
            </li>
            <li><a class="service-li tel" href="javascript:void(0)" data-lang="zh_TW"><img class="tel-service"
                                                                                           src="/web/webdist/images/tel.png"/>400-678-9688(24小时全国服务热线)</a>
            </li>
        </ul>
    </div>
    <div class="copyright">COPYRIGHT&nbsp;&copy;&nbsp;1996-2017&nbsp;&nbsp;ALL RIGHTS RESERVED.粤ICP备05100288号</div>
</div>




<!--[if IE]>
<script type="text/javascript" src="/web/js/lib/art_template/es5-shim.min.js"></script>
<script type="text/javascript" src="/web/js/lib/art_template/es5-sham.min.js"></script>
<script type="text/javascript" src="/web/js/lib/art_template/json3.min.js"></script>
<![endif]-->
<script type="text/javascript" src="/web/js/lib/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/web/js/lib/art_template/template-web.js"></script>
<script type="text/javascript" src="/web/js/lib/jquery-md5-min.js"></script>
<script type="text/javascript" src="/web/webdist/js/account_center_main.min.js?v=2017091817final"></script>
</body>

</html>
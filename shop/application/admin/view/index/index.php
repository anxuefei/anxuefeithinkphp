{extend name="base" /}
{block name="content"}
<!-- Main content -->
<div class="templatemo-content col-1 light-gray-bg">
    <div class="templatemo-top-nav-container">
        <div class="row">
           <h1>Hello,<?php echo \think\Session::get('user.username')?></h1>
        </div>
    </div>
    <ul class="nav nav-tabs nav-justified" role="tablist">
       <h2>欢迎你来到商城后台！！</h2>
    </ul>
</div>
{/block}
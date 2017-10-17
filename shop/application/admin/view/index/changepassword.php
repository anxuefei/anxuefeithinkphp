{extend name="base" /}
{block name="content"}
<!-- Main content -->
<div class="templatemo-content col-1 light-gray-bg">
    <div class="templatemo-top-nav-container">
        <div class="row">
            <nav class="templatemo-top-nav col-lg-12 col-md-12">
                <ul class="text-uppercase">
                    <li><a href="/admin/index/changepassword" class="active">修改密码</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="templatemo-content-container">
        <form action="/admin/index/changepassword" method="post" class="form-horizontal" role="form">
            <div class="form-group">
                <label for="inputID" class="col-sm-2 control-label">原密码:</label>
                <div class="col-sm-10">
                    <input type="text" name="oldpassword" id="inputID" class="form-control" value="" title=""
                           required="required">
                </div>
            </div>
            <div class="form-group">
                <label for="inputID" class="col-sm-2 control-label">新密码:</label>
                <div class="col-sm-10">
                    <input type="password" name="newpassword" id="inputID" class="form-control" value="" title=""
                           required="required">
                </div>
            </div>
            <div class="form-group">
                <label for="inputID" class="col-sm-2 control-label">确认密码:</label>
                <div class="col-sm-10">
                    <input type="password" name="password" id="inputID" class="form-control" value="" title=""
                           required="required">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-10">
                    <input type="hidden" name="username" id="inputID" class="form-control" value="<?php echo \think\Session::get('user.username')?>" >
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2">
                    <button type="submit" class="btn btn-primary">修改</button>
                </div>
            </div>
        </form>
        

{/block}
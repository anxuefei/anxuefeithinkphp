{extend name="base" /}
{block name="content"}
<!-- Main content -->
<div class="templatemo-content col-1 light-gray-bg">
    <div class="templatemo-top-nav-container">
        <div class="row">
            <nav class="templatemo-top-nav col-lg-12 col-md-12">
                <ul class="text-uppercase">
                    <li><a href="/admin/goods">商品管理</a></li>
                    <li><a href="/admin/category" class="active">栏目管理</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="templatemo-content-container">
        <ul class="nav nav-tabs nav-justified" role="tablist">
            <li><a href="/admin/category">栏目列表</a></li>
            <li><a href="/admin/category/create">新增</a></li>
        </ul>
        <br>
        <form action="/admin/category/{$editdata['id']}" method="post" class="form-horizontal" role="form">
            <input type="hidden" name="_method" value="PUT" >
            <div class="form-group">
                <label for="inputID" class="col-sm-2 control-label">栏目名称:</label>
                <div class="col-sm-10">
                    <input type="text" name="name" id="inputID" class="form-control" value="{$editdata['name']}" title=""
                    >
                </div>
            </div>
            <div class="form-group">
                <label for="inputID" class="col-sm-2 control-label">所属栏目:</label>
                <div class="col-sm-10">
                    <select name="Pid" id="inputID" class="form-control">
                        <option value="0"> -- 顶级栏目--</option>
                        <?php foreach ($data as $v):?>
                        <option value="{$v['id']}" {$v['_disabled']} {$editdata['Pid']==$v['id']?'selected':'';}>{$v['_name']}</option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>


            <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2">
                    <button type="submit" class="btn btn-primary">保存</button>
                </div>
            </div>
        </form>
    </div>
    {/block}
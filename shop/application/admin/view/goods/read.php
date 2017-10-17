{extend name="base" /}
{block name="content"}
<!-- Main content -->
<div class="templatemo-content col-1 light-gray-bg">
    <div class="templatemo-top-nav-container">
        <div class="row">
            <nav class="templatemo-top-nav col-lg-12 col-md-12">
                <ul class="text-uppercase">
                    <li><a href="/admin/goods" class="active">商品管理</a></li>
                    <li><a href="/admin/category" >栏目管理</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="templatemo-content-container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">{$goods['name']}的货品表</h3>
            </div>
            <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>货品型号</th>
                        <th>库存</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($data as $v):?>
                    <tr>
                        <td>{$v['attr']}</td>
                        <td>{$v['inventory']}</td>
                    </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
        <a href="/admin/goods" class="btn btn-primary">返回商品列表</a>

    {/block}
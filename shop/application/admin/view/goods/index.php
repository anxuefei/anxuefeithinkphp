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
        <ul class="nav nav-tabs nav-justified" role="tablist">
            <li class="active"><a href="/admin/goods">商品列表</a></li>
            <li><a href="/admin/goods/create">新增</a></li>
        </ul>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>编号</th>
                <th>商品名称</th>
                <th>列表图</th>
                <th>价格</th>
                <th>所属栏目</th>
                <th width="200">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($data as $k => $v): ?>
            <tr>
                <td>{$k+1}</td>
                <td>{$v['name']}</td>
                <td>
                    <img src="{$v['list_image']}" width="80">
                </td>
                <td>{$v['price']}</td>
                <td>{$v->category->name}</td>
                <td>
                    <div class="btn-group">
                        <a href="goods/{$v['id']}" class="btn btn-success btn-xs">预览</a>
                        <a href="goods/{$v['id']}/edit" class="btn btn-primary btn-xs">编辑</a>
                        <a href="javascript:del({$v['id']});" class="btn btn-danger btn-xs">删除</a>
                </td>
                    </div>

            </tr>
            </tbody>
            <?php endforeach; ?>
        </table>
    </div>
    <script>
            function del(id) {
                layer.msg('你确定要删除吗？', {
                    time: 0 //不自动关闭
                    ,btn: ['确定', '取消']
                    ,yes: function(index){
                        $.ajax({
                            url:'/admin/goods/' + id,
                            method:'DELETE',
                            success:function(response){
                                layer.msg(response.msg,{});
                                setTimeout(function () {
                                    window.location.reload();
                                },1000)

                            }
                        })
                    }
                });
            }
    </script>
    {/block}
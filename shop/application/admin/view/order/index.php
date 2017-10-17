{extend name="base" /}
{block name="content"}
<!-- Main content -->
<div class="templatemo-content col-1 light-gray-bg">
    <div class="templatemo-top-nav-container">
        <div class="row">
            <nav class="templatemo-top-nav col-lg-12 col-md-12">
                <ul class="text-uppercase">
                    <li><a href="/admin/order" class="active">订单管理</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="templatemo-content-container">
        <ul class="nav nav-tabs nav-justified" role="tablist">
            <li class="active"><a href="/admin/order">订单列表</a></li>
        </ul>
        <table class="table table-hover">
            <thead>
            <tr>
                <th width="30">订单号</th>
                <th>订单状态</th>
                <th>所属用户</th>
                <th>联系人</th>
                <th>联系电话</th>
                <th>发货地址</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($orderdata as $k => $v): ?>
            <tr>
                <td>{$v['order_number']}</td>
                <td>
                    <?php
                    switch (true){
                        case $orderdata[$k]['is_pay']==0:
                            echo '未付款';
                            break;
                        case $orderdata[$k]['is_express']==0:
                            echo '未发货';
                            break;
                        case $orderdata[$k]['is_over']==0:
                            echo '等待收货';
                            break;
                        default:
                            echo '已完成';
                            break;
                    }?>
                </td>
                <td>{$v['name']}</td>
                <td>{$v['location']['name']}</td>
                <td>{$v['location']['phone']}</td>
                <td>{$v['location']['province']}{$v['location']['city']}{$v['location']['county']}{$v['location']['house']}</td>
                <td>
                    <div class="btn-group">
                        <a href="javascript:express({$v['id']});" class="btn btn-success btn-xs">发货</a>
                        <a href="/admin/order/read?orderid={$v['id']}" class="btn btn-primary btn-xs">查看订单</a>
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
                            url:'/admin/order/delete',
                            type:'post',
                            data: {orderid:id},
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
            function express(id) {
                $.ajax({
                    url:'/admin/order/update',
                    type:'post',
                    data: {orderid:id},
                    success:function(response){
                        layer.msg(response.msg,{});
                        setTimeout(function () {
                            window.location.reload();
                        },1000)

                    }
                })
            }
    </script>
    {/block}
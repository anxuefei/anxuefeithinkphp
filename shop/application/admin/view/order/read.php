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
            <li class="active"><a href="javascript:;">订单详情</a></li>
        </ul>
        <ul style="font-size: 16px">
            <li>订单编号：{$orderdata['order_number']}</li>
            <br>
            <li>订单状态：<?php
                switch (true){
                    case $orderdata['is_pay']==0:
                        echo '未付款';
                        break;
                    case $orderdata['is_express']==0:
                        echo '未发货';
                        break;
                    case $orderdata['is_over']==0:
                        echo '等待收货';
                        break;
                    default:
                        echo '已完成';
                        break;
                }?>
            </li>
            <br>
            <li>
                所属用户：{$orderdata['name']}
            </li>
            <br>
            <li>
                联系人：{$orderdata['location']['name']}

            </li>
            <br>
            <li>
                电话：{$orderdata['location']['phone']}
            </li>
            <br>
            <li>
                所属地区：{$orderdata['location']['province']}{$orderdata['location']['city']}{$orderdata['location']['county']}
            </li>
            <br>
            <li>
                详细地址：{$orderdata['location']['house']}
            </li>
            <br>
            <li>
                订单备注：{$orderdata['remark']}
            </li>
        </ul>
    </div>
    
    {/block}
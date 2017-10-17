<?php

namespace app\admin\controller;

use app\admin\model\Goodslist;
use app\common\model\Users;
use app\index\model\Locations;
use app\index\model\Orders;
use app\index\model\Orderslists;
use think\Controller;
use think\Request;
use app\admin\model\Goods;

class Order extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
//        获取所有的订单信息
        $orderdata = Orders::select();
//        遍历获取的订单数据，获取对应的用户信息和地址信息
        foreach ($orderdata as $k=>$order){
            $order['name'] = Users::find($order['user_id'])['username'];
            $order['location'] = json_decode(Locations::find($order['url_id'])['url'],true);
        }
//        p($orderdata);
        return view('', compact('orderdata'));
    }
    public function read(){
        $id = $_GET['orderid'];
        $orderdata = Orders::find($id);
        //        遍历获取的订单数据，获取对应的用户信息和地址信息
        $orderdata['name'] = Users::find($orderdata['user_id'])['username'];
        $orderdata['location'] = json_decode(Locations::find($orderdata['url_id'])['url'],true);
//        p($orderdata);
        return view('/order/read',compact('orderdata'));
    }
//删除订单
    public function delete()
    {

        $id = $_POST['orderid'];
        //        删除订单表数据
        Orders::destroy($id);
//       删除订单列表的数据
        Orderslists::where('orders_id', '=', $id)->delete();
//        返回删除成功信息
        return ['msg' => '删除成功'];
        exit;
    }

//    发货
    public function update()
    {
//        获取异步提交的要发货订单ID
        $id = $_POST['orderid'];
//        更新对应的订单状态信息
        Orders::where('id', '=', $id)->update(['is_express' => 1]);
//        返回提示信息
        return ['msg' => '发货成功'];
        exit;
    }
}

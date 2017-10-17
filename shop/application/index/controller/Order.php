<?php

namespace app\index\controller;

use app\admin\model\Goods;
use app\admin\model\Goodslist;
use app\index\model\Locations;
use app\index\model\Oorderslists;
use app\index\model\Orders;
use app\index\model\Orderslists;
use think\Controller;
use think\Request;
use helper\Cart;

class Order extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
//        获得订单页提交的数据
        $post = $_POST;
//        获取当前登录的用户信息，添加订单时添加到对应的用户订单信息中
        $userdata = session('webuser');
//        p($userdata['id']);exit;
//        获得对应的订单地址
        $urldata = json_decode($post['userurl'], true);
//        实例化购物车类
        $model = new Cart();
//        生成订单号
        $order = $model->getOrderId();
//        获得购物车数据
        $cartData = session('cart');
//        p($cartData);
//        组合订单表添加的数据
//        判断如果备注不为空的话组合所有数据，如果没有备注就组合备注为空
        if (!empty($post['remark'])) {
//            组合备注存在要添加到订单表的数据
            $orderdata = [
                'order_number' => $order,
                'total' => $cartData['total'],
                'url_id' => $urldata['id'],
                'remark' => $post['remark'],
                'user_id'=>$userdata['id']
            ];
        } else {
//            组合备注不存在要添加到订单表的数据
            $orderdata = [
                'order_number' => $order,
                'total' => $cartData['total'],
                'url_id' => $urldata['id'],
                'remark' => '',
                'user_id'=>$userdata['id']
            ];
        };
//        p($orderdata);
//        实例化订单表的模型
        $orders = new Orders();
//        将组合的数据添加到订单表并获得自增ID
        $orderid = $orders->insertGetId($orderdata);
//        判断如果备注不为空的话组合所有数据，如果没有备注就组合备注为空
        if (!empty($post['remark'])) {
//            循环购物车中的所有商品，组合每次添加到订单列表表中的数据
            foreach ($cartData['goods'] as $v) {
//                组合添加到听到列表的数据
                $orderslistsdata = [
                    'remark' => $post['remark'],
                    'total' => $v['total'],
                    'num' => $v['num'],
                    'orders_id' => $orderid,
                    'goods_id' => $v['id']
                ];
//                每次循环完事将组合的数据添加到订单列表
                $orderslists = new Orderslists();
                $orderslists->save($orderslistsdata);
            }
        } else {
//           循环购物车中的所有商品，组合每次添加到订单列表表中的数据
            foreach ($cartData['goods'] as $v) {
//                组合添加到听到列表的数据，因为备注没填所以要默认为空
                $orderslistsdata = [
                    'remark' => '',
                    'total' => $v['total'],
                    'num' => $v['num'],
                    'orders_id' => $orderid,
                    'goods_id' => $v['id'],
                    'goodslists_id' => $v['options']['id']
                ];
                $orderslists = new Orderslists();
                $orderslists->save($orderslistsdata);
            }
        }
//        清空购物车
        $model->flush();
//        获取新添加的数据显示在页面
        $orderdata = $orders->find($orderid);
//        p($orderdata['id']);exit;
//        获取对应的订单列表的信息来获取对应的商品和规格
        $orderslistsdata = Orderslists::where('orders_id','=',$orderdata['id'])->select();
//        p($orderslistsdata);exit;
//        遍历订单列表信息获取订单需要的数据存到新的数组中
        $cartData = [];
        foreach ($orderslistsdata as $k=>$v){
            $cartData[$k]['goodsname']=Goods::find($v['goods_id'])['name'];
            $cartData[$k]['goodslists']=Goodslist::find($v['goodslists_id'])['attr'];
            $cartData[$k]['num']=$v['num'];
        }
//        p($cartData);exit;
//        组合订单列表表需要的数据
        return view('/order/index',compact('urldata','orderdata','cartData'));
    }

    /**获取订单信息
     * @return \think\response\View
     */
    public function lists(){
        $userdata= session('webuser');
//        获得所有的订单信息
        $orderdata = Orders::where('user_id','=',$userdata['id'])->select();
//        p($orderdata);
//        获得单个订单信息对应的订单数据
        $orderlistsdata=[];
        foreach ($orderdata as $v){
            $orderlistsdata[]= Orderslists::where('orders_id','=',$v['id'])->select();
        }
//        p($orderlistsdata);
        $cartdata = [];
//        组合页面需要的信息
//        创建一个变量用来用作每次遍历商品数组是的下标防止商品信息被覆盖
        $i=0;
        foreach ($orderlistsdata as $k=>$orders){
            //        获取对应的商品信息和规格信息
            foreach ($orders as  $v){
                $i++;
//            获取订单列表对应的每个商品信息
            $goodsdata = Goods::find($v['goods_id']);
//            p($goodsdata);
            $cartdata[$k][$i]['id'] = $v['goods_id'];
            $cartdata[$k][$i]['img'] = $goodsdata['list_image'];
            $cartdata[$k][$i]['name']= $goodsdata['name'];
            $cartdata[$k][$i]['attr']= Goodslist::find($v['goodslists_id'])['attr'];
            $cartdata[$k][$i]['num']= $v['num'];
            $cartdata[$k][$i]['total']= $v['total'];
            }

        }
//        p($cartdata);
        return view('/order/lists',compact('orderdata','cartdata'));
    }
    public function update(){
//        点击支付异步过来的id
        $id = $_POST['orderid'];
//        改变他的未支付的值
        Orders::where('id','=',$id)->update(['is_pay'=>1]);
//        减少库存
        $orderdata = Orderslists::where('orders_id','=',$id)->select();
//        便利所有的订单商品信息，删除对应的商品规格库存
        foreach ($orderdata as $order){
            $goods = new Goodslist();
           $goodsdata =  $goods->find($order['goodslists_id']);
           $num = $goodsdata['inventory'] - $order['num'];
           $goods -> where('id','=',$order['goodslists_id'])->update(['inventory'=>$num]);
        }
//        exit;
    }
    /**
     * 未发货页面
     */
    public function express(){
        $userdata= session('webuser');
     //        获得当前用户所有发货的订单信息
        $orderdata = Orders::where('user_id','=',$userdata['id'])->where('is_express','=',1)->where('is_over','=',0)->select();

//        p($orderdata);
//        获得单个订单信息对应的订单数据
        $orderlistsdata=[];
        foreach ($orderdata as $v){
            $orderlistsdata[]= Orderslists::where('orders_id','=',$v['id'])->select();
        }
//        p($orderlistsdata);
        $cartdata = [];
//        组合页面需要的信息
//        创建一个变量用来用作每次遍历商品数组是的下标防止商品信息被覆盖
        $i=0;
        foreach ($orderlistsdata as $k=>$orders){
            //        获取对应的商品信息和规格信息
            foreach ($orders as  $v){
                $i++;
//            获取订单列表对应的每个商品信息
                $goodsdata = Goods::find($v['goods_id']);
//            p($goodsdata);
                $cartdata[$k][$i]['id'] = $v['goods_id'];
                $cartdata[$k][$i]['img'] = $goodsdata['list_image'];
                $cartdata[$k][$i]['name']= $goodsdata['name'];
                $cartdata[$k][$i]['attr']= Goodslist::find($v['goodslists_id'])['attr'];
                $cartdata[$k][$i]['num']= $v['num'];
                $cartdata[$k][$i]['total']= $v['total'];
            }
        }
//        p($cartdata);
        return view('/order/express',compact('orderdata','cartdata'));
    }

    /**未支付页面
     * @return \think\response\View
     */
    public function pay(){
        $userdata= session('webuser');
        //        获得当前用户所有未支付的订单信息
        $orderdata = Orders::where('user_id','=',$userdata['id'])->where('is_pay','=',0)->select();
//        p($orderdata);
//        获得单个订单信息对应的订单数据
        $orderlistsdata=[];
        foreach ($orderdata as $v){
            $orderlistsdata[]= Orderslists::where('orders_id','=',$v['id'])->select();
        }
//        p($orderlistsdata);
        $cartdata = [];
//        组合页面需要的信息
//        创建一个变量用来用作每次遍历商品数组是的下标防止商品信息被覆盖
        $i=0;
        foreach ($orderlistsdata as $k=>$orders){
            //        获取对应的商品信息和规格信息
            foreach ($orders as  $v){
                $i++;
//            获取订单列表对应的每个商品信息
                $goodsdata = Goods::find($v['goods_id']);
//            p($goodsdata);
                $cartdata[$k][$i]['id'] = $v['goods_id'];
                $cartdata[$k][$i]['img'] = $goodsdata['list_image'];
                $cartdata[$k][$i]['name']= $goodsdata['name'];
                $cartdata[$k][$i]['attr']= Goodslist::find($v['goodslists_id'])['attr'];
                $cartdata[$k][$i]['num']= $v['num'];
                $cartdata[$k][$i]['total']= $v['total'];
            }
        }
//        p($cartdata);
        return view('/order/pay',compact('orderdata','cartdata'));
    }
    /**
     * 未完成页面
     */
    public function over(){
        $userdata= session('webuser');
        //        获得当前用户所有未支付的订单信息
        $orderdata = Orders::where('user_id','=',$userdata['id'])->where('is_over','=',1)->select();
//        p($orderdata);
//        获得单个订单信息对应的订单数据
        $orderlistsdata=[];
        foreach ($orderdata as $v){
            $orderlistsdata[]= Orderslists::where('orders_id','=',$v['id'])->select();
        }
//        p($orderlistsdata);
        $cartdata = [];
//        组合页面需要的信息
//        创建一个变量用来用作每次遍历商品数组是的下标防止商品信息被覆盖
        $i=0;
        foreach ($orderlistsdata as $k=>$orders){
            //        获取对应的商品信息和规格信息
            foreach ($orders as  $v){
                $i++;
//            获取订单列表对应的每个商品信息
                $goodsdata = Goods::find($v['goods_id']);
//            p($goodsdata);
                $cartdata[$k][$i]['id'] = $v['goods_id'];
                $cartdata[$k][$i]['img'] = $goodsdata['list_image'];
                $cartdata[$k][$i]['name']= $goodsdata['name'];
                $cartdata[$k][$i]['attr']= Goodslist::find($v['goodslists_id'])['attr'];
                $cartdata[$k][$i]['num']= $v['num'];
                $cartdata[$k][$i]['total']= $v['total'];
            }
        }
//        p($cartdata);
        return view('/order/over',compact('orderdata','cartdata'));
    }
    public function expressupdate(){
        $id= $_POST['orderid'];
        Orders::where('id','=',$id)->update(['is_over'=>1]);
        echo '确认收货成功';
        exit;
    }
    /**
     * 删除指定资源
     *
     * @param  int $id
     * @return \think\Response
     */
    public function delete()
    {
        $id = $_GET['id'];
        Orders::destroy($id);
        Orderslists::where('orders_id','=',$id)->delete();
        return $this->success('删除成功');
    }
}

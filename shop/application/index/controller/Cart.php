<?php

namespace app\index\controller;

use app\admin\model\Goods;
use app\index\model\Locations;
use think\Controller;
use think\Request;
use helper\Cart as ModelCart;
class Cart extends Controller
{
    public function __construct(Request $request = null)
    {
       $webuser= session('webuser');
        if(!isset($webuser)){
            return $this->redirect('/index/login/index');
        }
    }

    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
//        获取购物车中的所有商品
        $allgoods = session('cart');
//        转成json赋值给要循环的变量
        $allgoods = json_encode($allgoods,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
//        p($allgoods);
//        p($goods);
        return view('/cart/index',compact('allgoods'));
    }


    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update()
    {
//        获得要更新的商品的sid和数量
        $data = [
            'sid'=>$_GET['sid'],
            'num'=>$_GET['num']
        ];
//        通过update方法更新
        $cart = new ModelCart();
        $cart->update($data);
//重新获取数据返回页面
        $allgoods = session('cart');
        $allgoods = json_encode($allgoods,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
//        p($allgoods);
        echo $allgoods;exit;
    }
//删除单挑商品
    public function remove(){
//        实例化购物车
        $cart = new ModelCart();
//        删除的对应的SID商品
        $cart->del($_GET['sid']);
        //重新获取数据返回页面
        $allgoods = session('cart');
//        判断购物车是不是为空
        if (!empty($allgoods['goods'])){
//            不为空就获取数据转成JSON
            $allgoods = json_encode($allgoods,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
        }else{
//            为空就赋值给1让页面JS判断刷新页面
            $allgoods = 1;
        }
//        p($allgoods);
        echo $allgoods;exit;
    }

    /**创建订单页
     * @return \think\response\View
     */
    public function indent(){
//        获取用户的id
        $userid = session('webuser')['id'];
//        获取所有的地址信息
        $data = Locations::where('user_id','=',$userid)->select();
//        遍历所有的地址信息，获得所有的地址
        if ($data){
            $url= [];
            foreach ($data as $k=>$v){
                $url[]=json_decode($v['url'],true);
//            将对应的地址id传到数组中，方便删除地址和编辑地址使用
                $url[$k]['id']=$v['id'];
            }
//        p($url);
            //        获得第一条地址信息用来默认选中效果
            $userurl = json_decode($data[0]['url'],true);
//            将地址对应的id添加到数组中，方便订单页使用
            $userurl['id']= $data[0]['id'];
            $userurl = json_encode($userurl,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
//        P($userurl);
//        将所有的地址信息转成json传到页面
            $urls = json_encode($url,JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        }else{
            $urls='';
            $userurl='';
        }

//        p($urls);
        $model =new ModelCart();
        $shopdata= $model->getAllData();
//        p($shopdata);
        return view('/cart/indent',compact('urls','userurl','shopdata'));
    }
    /**
     * 清空购物车
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete()
    {
//        清空购物车
        (new  ModelCart())->flush();
        exit;
    }
}

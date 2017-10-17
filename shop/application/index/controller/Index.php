<?php

namespace app\index\controller;

use app\admin\model\Category;
use app\admin\model\Goods;
use app\admin\model\Goodslist;
use helper\Cart;
use think\Db;
use think\Request;

class Index
{
    public function index()
    {
//        $user =  \think\Session::get('webuser');
//        p($user);
//        获得所有的父级栏目
//       获得创建日期最新的几条数据来显示为新品
        $newgoods = cache('newgoods');
//        p( CACHE_PATH);
        if (!$newgoods){
//            echo 123;
            $newgoods = Db::table('goods')->order('create_time desc')->limit(3)->select();
            //            利用memcache将数据存到内存
            cache('newgoods',$newgoods);
        }

//       获得点击次数最多的产品来显示为热门商品
        $hotgoods = cache('hotgoods');
        if (!$hotgoods){
//            echo 123;
            $hotgoods = Db::table('goods')->order('click desc')->limit(8)->select();
//            利用memcache将数据存到内存
            cache('hotgoods',$hotgoods);
        }

//        载入主页面
//        p($newgoods);
        return view('/index/index', compact('newgoods', 'hotgoods'));
    }

    public function lists()
    {
//        p($_GET['id']);
//        获得要获取的栏目ID
        $id = $_GET['id'];
        $categoryname = Category::find($id);
//        获得对应的栏目对应的子栏目，在通过子栏目获取所有的子栏目下的商品
        $category = Category::where('Pid', '=', $id)->select();
//        遍历所有的子栏目将对应每个子栏目的商品重新存到一个数组中
        if ($category) {
            $goodsid = [];
//            所有的子栏目id
            foreach ($category as $v) {
                $goodsid[] = $v['id'];
            }
            $goodsdata = [];
//            遍历所有的子栏目id或的所有的子栏目对应的商品
            foreach ($goodsid as $v) {
                $goodsdata[] = Goods::where('category_id', '=', $v)->select();
            }
        } else {
//            如果栏目id没有子栏目就直接或的对应的商品
            $goodsdata = Goods::where('category_id', '=', $id)->select();
        }


//        p($goodsdata);exit;
//        载入列表页面
        return view('/index/lists', compact('category', 'goodsdata','categoryname'));
    }

    public function content()
    {
//        获取对应的商品信息
        $goods = Goods::find($_GET['id']);
//        因为商品的列表图片是一个json格式所以要转换成数组加载到页面
        $contentimage = json_decode($goods['content_images'], true);
//        p($goods)
//        获取商品对应的栏目
        $goodscategory = Category::where('id','=',$goods['category_id'])->find();
//        获取商品栏目的父级栏目
        $category = Category::find($goodscategory['Pid']);
//        p($category);
//        获得这个商品下的所有商品规格
        $goodslists = Goodslist::where('goods_id', '=', $_GET['id'])->select();
//        p($goodslists[0]['attr']);
//        载入商品内容页
        return view('/index/content', compact('goods', 'contentimage', 'goodslists','goodscategory','category'));
    }

    /**
     * 购物车添加
     */
    public function addcart()
    {
//        获得西部过来的商品id
        $shopid = $_POST['shopid'];
//        或的选购的数量
        $num = $_POST['num'];
//        或的对应的类型的数据id
        $listid = $_POST['listid'];
//        或的对应的商品数据
        $goodsdata = Goods::find($shopid);
//        或的这条商品对应的类型
        $listdata = Goodslist::find($listid);
//        将购物车需要的东西组建一个数组
        $data = array(
            "id" => $shopid,                        //商品ID
            "name" => $goodsdata['name'],         //商品名称
            "num" => $num,                       //商品数量
            "price" => $goodsdata['price'],                //商品价格
            "options" => array(               //其他参数，如价格、颜色可以是数组或字符串|可以不添加"color"=>"red",
                'id'=>$listdata['id'],
                "goodstype" => $listdata['attr'],
                "img" =>$goodsdata['list_image']
            )
        );
//        p($data);
//        将商品添加到购物车
        $cart = new Cart();
        $cart->add($data);
        exit;
    }

}

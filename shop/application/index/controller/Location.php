<?php

namespace app\index\controller;

use app\index\model\Locations;
use think\Controller;
use think\Request;

class Location extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        if (IS_POST){
//            p(session('webuser'));exit;
            $user = session('webuser');
//            获取提交的数据
            $post = $_POST;
//            p($post);exit();
//            组合要添加到地址表的信息
            if (isset($post['county'])){
                $url = [
                    'name'=>$post['name'],
                    'phone'=>$post['phone'],
                    'province'=>$post['province'],
                    'city'=>$post['city'],
                    'county'=>$post['county'],
                    'house'=>$post['house'],
                ];
            }else{
                $url = [
                    'name'=>$post['name'],
                    'phone'=>$post['phone'],
                    'province'=>$post['province'],
                    'city'=>$post['city'],
                    'county'=>'',
                    'house'=>$post['house'],
                ];
            }
            $url = json_encode($url,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
            $data = [
                'url'=>$url,
                'user_id'=>$user['id']
            ];
            $model = new Locations();
            $model->save($data);
            $this->success('添加成功', '/index/cart/indent');
        }

       return view('/location/create');
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

        return view('/location/update');
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete()
    {
//        获得要删除的地址ID
        $id = $_GET['id'];
//        p($id);exit;
//        删除对应的信息
        Locations::destroy($id);
//        弹出提示信息
        return $this->success('删除成功');
    }
}

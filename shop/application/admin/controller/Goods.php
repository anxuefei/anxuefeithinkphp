<?php

namespace app\admin\controller;

use app\admin\model\Goodslist;
use houdunwang\arr\Arr;
use think\Controller;
use think\Request;
use app\admin\model\Goods as ModelGoods;
use app\admin\model\Category;

class Goods extends Common
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
//        p(__PATH__);
        $data = ModelGoods::all();
        //        获得所有数据
//        $data = modelCategory::all();
////        将数据转换成树状结构
//        $data = Arr::tree($data, 'name', 'id', 'Pid');
        return view('index', compact('data'));
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //        获得所有数据
        $data = Category::all();
//        将数据转换成树状结构
        $data = Arr::tree($data, 'name', 'id', 'Pid');
        return view('/goods/create', compact('data'));
    }


    /**
     * 保存新建的资源
     *
     * @param  \think\Request $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
//        p($data);exit;
//        获得上传的详细页图册
        $files = request()->file('content_images');
        $path = [];
//        因为他是一个多文件上传所以要便利并存到服务器
        foreach ($files as $file) {
            // 移动到框架应用根目录/public/uploads/ 目录下
            $info = $file->validate(['ext'=>'jpg,png,gif'])->move(ROOT_PATH . 'public' . DS . 'uploads');
//            保存图片路径
            if($info){
               array_push($path,'/uploads/' . $info->getSaveName());
            }else{
                // 上传失败获取错误信息

                return $this->error('多文件上传'.$file->getError());;
            }
        }
//        将上传的路径转成JSON，方便存到商品表字段时使用
        $path = json_encode($path,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
//        p($path);
//        获取商品表字段对应的数据
        $data = [
            'name' => $request->post('name'),
            'category_id' => $request->post('category_id'),
            'list_image' => $request->post('list_image'),
            'price' => $request->post('price'),
            'describe'=> $request->post('describe'),
            'content_images' => $path,
            'content' => $request->post('content'),
            'click' => $request->post('click'),
        ];
//        实例化商品表
        $goodsmodel = new ModelGoods();
//        验证并将所提交的数据存到商品表中，并或去新增的主键id方便货品表使用
        $result = $goodsmodel->validate(true)->save($data);

//        p($goodsid);exit;
        //        判断如果验证不通过弹出错误信息
        if (false === $result) {
            $this->error($goodsmodel->getError());
        }
//        获得添加的数据自增的ID
        $goodsid = $goodsmodel['id'];
//        将提交的货品信息转成数组
        $goodsarray = json_decode($request->post('goods'),true);
//        遍历提交的货品信息并添加到货品表中
        foreach ($goodsarray as $v){
            $data = [
                'attr'=>$v['attr'],
                'inventory'=>$v['inventory'],
                'goods_id'=>$goodsid
            ];
            $model = new Goodslist();
            $model ->save($data);
        }
//        返回添加成功信息，并跳到列表页
        $this->success('添加成功', '/admin/goods');
    }

    /**
     * 显示指定的资源
     *
     * @param  int $id
     * @return \think\Response
     */
    public function read($id)
    {
//        获得对应商品的信息用来显示页面的商品名字
        $goods = ModelGoods::find($id);
//        获得对应的所有货品信息
        $data =Goodslist::where('goods_id','=',$id)->select();
//        p($data);
//        载入预览页面
       return view('/goods/read',compact('data','goods'));
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int $id
     * @return \think\Response
     */
    public function edit($id)
    {
//        获得商品表中的数据
        $goods = ModelGoods::find($id);
//        p($goods['name']);
        $contentimages= json_decode($goods['content_images']);
//        p(json_decode($goods['content_images']));
//        获得货品表中的数据
//        p($contentimages);
        $goodslist = Goodslist::where('goods_id','=',$id)->select();
//        p($goodsdata);
        $gooddata = json_encode($goodslist,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
//        p($gooddata);
        //        获得所有数据
        $data = Category::all();
//        将数据转换成树状结构
        $data = Arr::tree($data, 'name', 'id', 'Pid');
        return view('/goods/edit', compact('data','goods','gooddata','contentimages'));
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request $request
     * @param  int $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
//
//        p(!empty(request()->file('content_images')));
//        p($request->post());exit;
//        组合详细图册的路径
        $path = [];
//        p($images);exit;
//        判断原来的图片还存不存在？
        if (isset($_POST['oldimages'])){
//            如果存在获取所有的数据，因为是一个数组所以要遍历
            $images = $_POST['oldimages'];
                foreach ($images as $v){
//                    将每个图片的路径存到$path数组中，到时转成json存到对应的表字段里
                    $path[] = $v;
            }
        }
//        判断提交的数据中name值为content_images这个属性存不存在，如果存在表示有新文件上传
        $files = request()->file('content_images');
//        p($files);exit;
        if(!empty($files)){

//        因为他是一个多文件上传所以要便利并存到服务器
            foreach ($files as $file) {
                // 移动到框架应用根目录/public/uploads/ 目录下
                $info = $file->validate(['ext'=>'jpg,png,gif'])->move(ROOT_PATH . 'public' . DS . 'uploads');
//            保存图片路径
                if($info){
                    array_push($path,'/uploads/' . $info->getSaveName());
                }else{
                    // 上传失败获取错误信息
                    return $this->error('多文件上传'.$file->getError());;
                }
            }
        }
//        将组合的图片路径转成JSON，方便存到表字段中
        $path = json_encode($path,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
//        p($path);
//        获取商品表字段对应的数据
        $data = [
            'name' => $request->post('name'),
            'category_id' => $request->post('category_id'),
            'list_image' => $request->post('list_image'),
            'price' => $request->post('price'),
            'describe'=> $request->post('describe'),
            'content_images' => $path,
            'content' => $request->post('content'),
            'click' => $request->post('click'),
        ];
//        p($data);exit;
//        实例化商品表
        $goodsmodel = ModelGoods::find($id);
//        验证并将所提交的数据存到商品表中，并或去新增的主键id方便货品表使用
        $result = $goodsmodel->validate(true)->save($data);

//        p($goodsid);exit;
        //        判断如果验证不通过弹出错误信息
        if (false === $result) {
            $this->error($goodsmodel->getError());
        }
        Goodslist::where('goods_id','=',$id)->delete();
//        将提交的货品信息转成数组
        $goodsarray = json_decode($request->post('goods'),true);
//        遍历提交的货品信息并添加到货品表中
        foreach ($goodsarray as $v){
            $data = [
                'attr'=>$v['attr'],
                'inventory'=>$v['inventory'],
                'goods_id'=>$id
            ];
            $model = new Goodslist();
            $model ->save($data);
        }
//        返回添加成功信息，并跳到列表页
        $this->success('修改成功', '/admin/goods');
    }

    /**
     * 删除指定资源
     *
     * @param  int $id
     * @return \think\Response
     */
    public function delete($id)
    {
//        删除商品列表的数据
        ModelGoods::destroy($id);
//        删除对应的货品数据
        Goodslist::where('goods_id','=',$id)->delete();
//        返回删除成功信息
        return ['msg'=>'删除成功'];exit;
    }
}

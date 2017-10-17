<?php

namespace app\admin\controller;

use houdunwang\arr\Arr;
use think\Controller;
use think\Request;
use app\admin\model\Category as modelCategory;

class Category extends Common
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {

//        获得栏目表的所有数据
        $data = modelCategory::all();
//        p($data);
//        将获得的数据转成树状结构
        $data = Arr::tree($data, 'name', 'id', 'Pid');
//        p($data);
//        载入页面并将数据传递到页面
        return view('/category/index', compact('data'));
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
//        p($_SERVER);exit;
//        获得所有数据
        $data = modelCategory::all();
//        将数据转换成树状结构
        $data = Arr::tree($data, 'name', 'id', 'Pid');
//        载入添加模版并将项目数据载入页面
        return view('/category/create', compact('data'));
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
//        实例化模型
        $model = new modelCategory();
//        验证并添加
        $result = $model->validate(true)->save($request->post());
//        p($result);exit;
//        判断如果验证不通过弹出错误信息
        if(false === $result){
            $this->error($model->getError());
        }
//        弹出提示信息
        $this->success('添加成功', '/admin/category');
    }

    /**
     * 显示指定的资源
     *
     * @param  int $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int $id
     * @return \think\Response
     */
    public function edit($id)
    {
//        获得要编辑的数据
        $editdata = modelCategory::where('id', $id)->find();
//        获得栏目的数据
        $data = modelCategory::all();
//        p($data);
//        将栏目数据转换成树状结构
        $data = Arr::tree($data, 'name', 'id', 'Pid');
//        便利得到的栏目数据判断对应的子栏目，编辑时不能
        foreach ($data as $k => $v) {
            //如果是自己的子栏目不能被选择
            if (Arr::isChild($data, $v['id'], $id, 'id', 'Pid')) {
                $data[$k]['_disabled'] = 'disabled';
            } else {
                //如果是自己也不能被选择
                $data[$k]['_disabled'] = $v['id'] == $id ? 'disabled' : '';
            }
        }
//        p($data);
//        载入编辑模版，并将原来的数据载入
        return view('/category/edit', compact('editdata', 'data'));
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
//        p($_POST);exit;
//        将提交的数据存到一个数组
        $data = [
            'name' => $request->post('name'),
            'Pid' => $request->post('Pid')
        ];
//        p($data);exit;
//        获得要修改的数据
        $model =modelCategory::find($id);
//        获得要修改的数据，通过save方法将新提交的数据存到数据库
        $result = $model->validate(true)->save($data);
//        判断如果不通过的话弹出验证的错误结果
        if(false === $result){
            $this->error($model->getError());
        }
//        提示修改成功信息
        $this->success('修改成功','/admin/category');
    }

    /**
     * 删除指定资源
     *
     * @param  int $id
     * @return \think\Response
     */
    public function delete($id)
    {
//        判断要删除的数据对应的pid是否有数据，如果有表示此栏目下还有子栏目不能删除
        if(modelCategory::where('Pid','=',$id)->find()){
            $this->error('该栏目下有子栏目不能删除');
        };
//        判断这个栏目下还有没有商品，如果有表示这个栏目还不能删除
        if (\app\admin\model\Goods::where('category_id','=',$id)->find()){
            $this->error('该栏目下有商品不能删除');
        }
//        删除对应的数据
        modelCategory::destroy($id);
//        返回删除成功信息
        return ['msg'=>'删除成功'];exit;
    }
}

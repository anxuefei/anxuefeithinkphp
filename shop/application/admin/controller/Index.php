<?php

namespace app\admin\controller;

use app\common\model\Users;
use think\Controller;
use think\Request;
use think\Session;

class Index extends Common
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {

//        载入后台页面
        return view();
    }

    public function logout()
    {
//        清除所有sesson完成退出
        Session::delete('user');
//        弹出提示信息
        $this->success('退出成功', 'index');
    }

    public function changepassword()
    {

//        p($data);
        if (IS_POST) {
//            p($_POST);
//            获得提交的数据
            $post = $_POST;
//            获得原来的数据
            $data = Users::where('username', '=',$post['username'])->where('is_admin', '=', 1)->find();
//            p($data->toArray());

//            如果原数据不存在表示原密码不正确
            if ($data['password']!=md5($post['oldpassword'])) {
//                弹出提示信息
                $this->error('原密码不正确');
            }
            if (strlen($post['newpassword'])<6){
                $this->error('密码不得少于6位');
            }

//                判断两次新密码输入的是否一样
            if ($post['newpassword'] != $post['password']) {
                $this->error('两次密码输入不一致');
            }
//            更新原来的数据信息
            Users::where('username', '=',$post['username'])->where('is_admin', '=', 1)->update(['password' => md5($post['newpassword'])]);
//            清楚session重新登录
            Session::delete('user');
//            弹出修改成功信息
            $this->success('修改成功', '/admin/login/index');
        }
//        载入修改密码页面
        return view('index/changepassword');
    }
}

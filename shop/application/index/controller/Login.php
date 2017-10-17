<?php

namespace app\index\controller;

use app\common\model\Users;
use think\Controller;
use think\Request;
use think\Session;

class Login extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        if (IS_POST){
            //            获取提交的内容
            $post = input('post.');
//            p($post);exit;
//            获取数据库中对应的数据
            $userdata = Users::where('username', '=', $post['username'])->where('is_admin', '=', 0)->find();
//            p($userdata->toArray());
//            判断这条数据存不存在，如果不存在表示用户不存在，判断输入的密码和获得的数据密码是否一样，不一样表示密码输入错误、
            if (!$userdata || $userdata['password'] != md5($post['password'])) {
//                提示错误信息
                $this->error('用户名或密码错误');
            } else {
//                如果都一样将sesson存起来，证明登录成功
                Session::set('webuser', $userdata->toArray());
//                提示多登录成功
                $this->success('登录成功', 'Index/index');
            }

        }
      return view('/login/index');
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
//    注册新用户
    public function create()
    {
        if (IS_POST){
           $post = $_POST;
            $user = Users::where('username','=',$post['username'])->find();
            if ($user){
                return $this->error('用户名已经存在');
            }
            if ($post['password']!=$post['verify']){
                return $this->error('两次密码不一致');
            }
            $data = [
                'username'=>$post['username'],
                'password'=>md5($post['password'])
            ];
            $model = new Users();
            $model->save($data);
            return $this->success('注册成功','/index/login/index');
        }
        return view('/login/create');
    }
//    载入用户信息页面
    public function user(){
//        载入用户信息页面
        return view('/login/user');
    }
//    退出登录
    public function logout(){
        //        清除所有sesson完成退出
        Session::delete('webuser');
//        弹出提示信息
        $this->success('退出成功', '/index/index');
    }
//    修改密码
    public function changepassword(){
//        p($data);
            if (IS_POST) {
//            p($_POST);exit;
//            获得提交的数据
                $post = $_POST;
//            获得原来的数据
                $data = Users::where('username', '=',$post['username'])->where('is_admin', '=', 0)->find();
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
                Users::where('username', '=',$post['username'])->where('is_admin', '=', 0)->update(['password' => md5($post['newpassword'])]);
//            清楚session重新登录
                Session::delete('webuser');
//            弹出修改成功信息
                $this->success('修改成功', '/');
            }
        return view('/login/changepassword');
    }
}

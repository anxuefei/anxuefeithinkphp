<?php

namespace app\admin\controller;

use app\common\model\Users;
use think\Controller;
use think\Cookie;
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
//        判断是不是post模式
        if (IS_POST) {
//            获取提交的内容
            $post = input('post.');
//            p($post);exit;
//            获取数据库中对应的数据
            $userdata = Users::where('username', '=', $post['username'])->where('is_admin', '=', 1)->find();
//            p($userdata->toArray());
//            判断这条数据存不存在，如果不存在表示用户不存在，判断输入的密码和获得的数据密码是否一样，不一样表示密码输入错误、
            if (!$userdata || $userdata['password'] != md5($post['password'])) {
//                提示错误信息
                $this->error('用户名或密码错误');
            } else {
//                如果都一样将sesson存起来，证明登录成功
                Session::set('user', $userdata->toArray());
//                提示多登录成功
                $this->success('登录成功', 'Index/index');
            }
        }
//        载入登录页面
//        p(__PATH__);
        return view();
    }

/**
 * 显示创建资源表单页.
 *
 * @return \think\Response
 */
public
function create()
{
    //
}

/**
 * 保存新建的资源
 *
 * @param  \think\Request $request
 * @return \think\Response
 */
public
function save(Request $request)
{
    //
}

/**
 * 显示指定的资源
 *
 * @param  int $id
 * @return \think\Response
 */
public
function read($id)
{

}

/**
 * 显示编辑资源表单页.
 *
 * @param  int $id
 * @return \think\Response
 */
public
function edit($id)
{
//        echo 123;
}

/**
 * 保存更新的资源
 *
 * @param  \think\Request $request
 * @param  int $id
 * @return \think\Response
 */
public
function update(Request $request, $id)
{
    //
}

/**
 * 删除指定资源
 *
 * @param  int $id
 * @return \think\Response
 */
public
function delete($id)
{
    //
}
}

<?php
namespace app\common\validate;
use think\Validate;

class Category extends Validate{
//    验证的字段
    protected $rule = [
        'name'  =>  'require|max:5',
    ];
//    验证不通过时弹出的信息
    protected $message = [
        'name.require'  =>  '栏目名字不能为空',
        'name.max'  =>  '栏目名称最多为5个字',
    ];
    //验证场景
    protected $scene = [
        'save'   =>  ['name'],
        'update'  =>  ['name'],
    ];

}


<?php
namespace app\common\validate;
use think\Validate;

class Goods extends Validate{
//    验证的字段
    protected $rule = [
        'name'  =>  'require|max:20',
        'category_id'  =>  'require',
        'price'  =>  'require|number',
        'describe'=>'require',
        'list_image'  =>  'require',
        'content_images'  =>  'require',
        'content'  =>  'require',
        'click'  =>  'require|number',
    ];
//    验证不通过时弹出的信息
    protected $message = [
        'name.require'  =>  '栏目名字不能为空',
        'name.max'  =>  '栏目名称最多为20个字',
        'category_id.require'  =>  '所属栏目必须选择',
        'price.require'  =>  '商品价格必填',
        'price.number'  =>  '商品价格必须是数字',
        'list_image.require'  =>  '列表页图片必填',
        'content_images.require'  =>  '详情页图片必须有一张',
        'click.require'  =>  '浏览数必填',
        'click.number'  =>  '浏览数必须是数字',
        'describe.require'  =>  '描述不能为空',
    ];
    //验证场景
    protected $scene = [
        'save'   =>  ['name','category_id','price','list_image','content_images','content','click'],
        'update'  =>  ['name','category_id','price','list_image','content_images','content','click'],
    ];

}


<?php

namespace app\admin\model;

use think\Model;

class Goodslist extends Model
{
    public function goods(){
        return $this->belongsTo(Goods::class);
    }
}

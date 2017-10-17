<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Upload extends Controller
{
    public function upload(Request $request){
//        p($request->file('file'));exit;
        $file = $request->file('file');
        if($file){
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
            if($info){
                $json = json_encode(['valid' => 1, 'message' => '/uploads/'.$info->getSaveName()]);
            }else{
                $json = json_encode(['valid' => 0, 'message' => '上传失败']);
            }
        }
        exit($json);

    }
    public function filelists(){

    }

}

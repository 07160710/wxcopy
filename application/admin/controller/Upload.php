<?php



namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\File;

use think\Request;



class Upload extends Base

{

	//图片上传

    public function upload(){

       $file = request()->file('file');

       $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/images');

       if($info){

            echo $info->getSaveName();

        }else{

            echo $file->getError();

        }

    }



    //会员头像上传

    public function uploadface(){

       $file = request()->file('file');

       $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/face');

       if($info){

            echo $info->getSaveName();

        }else{

            echo $file->getError();

        }

    }


    public function uploadwechat()
    {
        $file = request()->file('file');
        $info = $file->move(ROOT_PATH.'public'.DS.'uploads/wechats/',$file->getInfo()['name']);
        if($info){
            $data = [
                'img_name' => $info->getSaveName(),
                'img_url' => 'wechats/'.$info->getSaveName(),
                'img_type' => $file->getInfo()['type'],
                'img_size' => round($file->getInfo()['size']/1024 , 1),
                'admin_id' => session('uid'),
                'ip' => request()->ip(),
                'img_upload_time' => time()
            ];

            Db::name('img')->insert($data);

            echo $info->getSaveName();
        }else{
            echo $file->getError();
        }
    }



}
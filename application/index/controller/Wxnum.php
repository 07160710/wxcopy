<?php

namespace app\index\controller;

use think\Db;

class Wxnum
{
    /**
     * [index]
     * @author 【zero】 [1056258716@qq.com]
     */
    public function index()
    {
        header('Content-Type:text/html;Charset=utf-8');
        $pathname = input("get.path");
        if ($pathname != '') {
            $wx_info = Db::name('article')->where("path ='" . $pathname . "'")->find();
            $wxh = explode(",", $wx_info['wxnum']);
            $n = rand(0, count($wxh) - 1);
            if ($wx_info == '') {
                $data = array(
                    "INFO"      => "ERROR",
                    "wxnum"     => "Undefined",
                );
            } else {
                $data = array(
                    "INFO"      => "SUCCESS",
                    "wxnum"     => $wxh[$n],
                    "toji"      => $wx_info['toji'],
                    "cnzz"      => $wx_info['cnzz'],
                    "company"   => $wx_info['company'],
                    "e"         => $wx_info['e'],
                    "account"   => $wx_info['account'],
                    "uid"       => $wx_info['id']
                );
            }
            echo json_encode($data);
        }
    }
}
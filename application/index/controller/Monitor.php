<?php

    namespace app\index\controller;

    use think\Db;

    class Monitor
    {
        /**
         * [index]
         * @author 【zero】 [1056258716@qq.com]
         */
        public function index()
        {
            header('Content-Type:text/html;Charset=utf-8');
            $ipAddr = input("get.ipAddr");
            $address = input("get.address");
            $engine = input("get.engine");
            $account = input("get.account");
            $emp = input("get.emp");
            $uid = input("get.uid");
            $ope = input("get.ope");
            $wxnum = input("get.wxnum");
            $keyword = input("get.keyword");
            $url = input("get.path");

            $data = array(
                "ipAddr" => $ipAddr,
                "address" => $address,
                "engine" => $engine,
                "account" => $account,
                "emp" => $emp,
                "uid" => $uid,
                "ope" => $ope,
                "wxnum" => $wxnum,
                "url" => $url,
                "keyword" => $keyword,
                "createtime" => time(),
            );
         

            Db::name('monitor')->insert($data);
        }
        
        


    }
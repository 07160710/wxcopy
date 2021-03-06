<?php

namespace app\admin\controller;
use think\Config;
use think\Loader;
use think\Db;

class Index extends Base
{
    public function index()
    {
        return $this->fetch('/index');
    }


    /**
     * [indexPage 后台首页]
     * @return [type] [description]
     * @author 【zero】 [1056258716@qq.com]
     */
    public function indexPage()
    {
        if (session('uid') == 1) {
            $list = Db::name('monitor')->field("*,count(*) as total")->group('account')->whereTime('createtime', 'today')->select();
            $account = Db::name('monitor')->field("*,count(*) as total")->group('engine')->whereTime('createtime', 'today')->select();
            $wxnum = Db::name('monitor')->field("*,count(*) as total")->group('wxnum')->whereTime('createtime', 'today')->select();

        }else{
            $map = [];
            $map["emp"] = session('uid');
            $list = Db::name('monitor')->where($map)->field("*,count(*) as total")->group('account')->whereTime('createtime', 'today')->select();
            $account = Db::name('monitor')->where($map)->field("*,count(*) as total")->group('engine')->whereTime('createtime', 'today')->select();
            $wxnum = Db::name('monitor')->where($map)->field("*,count(*) as total")->group('wxnum')->whereTime('createtime', 'today')->select();

        }

        $info = array(
            'web_server' => $_SERVER['SERVER_SOFTWARE'],
            'onload'     => ini_get('upload_max_filesize'),
            'think_v'    => THINK_VERSION,
            'phpversion' => phpversion(),
        );
//        dump($list);
        $this->assign('wxnum', $wxnum);
        $this->assign('account', $account);
        $this->assign('list', $list);
        $this->assign('info',$info);
        return $this->fetch('index');
    }



    /**
     * [userEdit 修改密码]
     * @return [type] [description]
     * @author 【zero】 [1056258716@qq.com]
     */
    public function editpwd(){

        if(request()->isAjax()){
            $param = input('post.');
            $user=Db::name('admin')->where('id='.session('uid'))->find();
            if(md5(md5($param['old_password']) . config('auth_key'))!=$user['password']){
               return json(['code' => -1, 'url' => '', 'msg' => '旧密码错误']);
            }else{
                $pwd['password']=md5(md5($param['password']) . config('auth_key'));
                Db::name('admin')->where('id='.$user['id'])->update($pwd);
                session(null);
                cache('db_config_data',null);//清除缓存中网站配置信息
                return json(['code' => 1, 'url' => 'index/index', 'msg' => '密码修改成功']);
            }
        }
        return $this->fetch();
    }


    /**
     * 清除缓存
     */
    public function clear() {
        if (delete_dir_file(CACHE_PATH) && delete_dir_file(TEMP_PATH)) {
            return json(['code' => 1, 'msg' => '清除缓存成功']);
        } else {
            return json(['code' => 0, 'msg' => '清除缓存失败']);
        }
    }

}

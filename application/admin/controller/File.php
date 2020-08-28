<?php
namespace app\admin\controller;

use app\admin\model\ImgModel;
use think\Db;

class File extends Base{

    /**
     * 文件上传首页
     * 视图渲染
     */
    public function index(){
        $key = input('key');
        $map = [];

        if($key&&$key!==""){
            $map['img_name'] = ['like',"%" . $key . "%"];
        }

        $Nowpage = input('get.page') ? input('get.page') : 1;
        $limits = config('list_rows');// 获取总条数
        $count = Db::name('img')->where($map)->count();
        $allpage = intval(ceil($count / $limits));
        $img = new ImgModel();
        $lists = $img->getImgsByWhere($map, $Nowpage, $limits);
        foreach($lists as $k=>$v)
        {
            $lists[$k]['img_upload_time']=date('Y-m-d H:i:s',$v['img_upload_time']);
        }

        $this->assign('Nowpage', $Nowpage); //当前页
        $this->assign('allpage', $allpage); //总页数 
        $this->assign('val', $key);
        if(input('get.page'))
        {
            return json($lists);
        }

        return $this->fetch();
    }

    public function wechatAdd(){
        if(request()->isAjax()){
            //TODO::图片路径及其相关信息上传数据库
            $param = input('post.');
        }

        return $this->fetch();
    }
}
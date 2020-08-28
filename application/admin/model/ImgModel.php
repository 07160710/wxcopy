<?php
namespace app\admin\model;
use think\Model;
use think\Db;

class ImgModel extends Model{
    protected $name = 'img';

    /**
     * 搜索条件
     */
    public function getImgsByWhere($map, $Nowpage, $limits)
    {
        return $this->field('think_img.*,username')->join('think_admin', 'think_admin.id = think_img.admin_id')
            ->where($map)->page($Nowpage, $limits)->order('id desc')->select();
    }
}
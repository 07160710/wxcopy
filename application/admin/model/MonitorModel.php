<?php

namespace app\admin\model;
use think\Model;
use think\Db;

class MonitorModel extends Model
{
    protected $name = 'monitor';

    // 开启自动写入时间戳字段
    protected $autoWriteTimestamp = true;


    /**
     * 根据搜索条件获取用户列表信息
     * @author 【zero】 [1056258716@qq.com]
     */
    public function getDetailsByWhere($map, $Nowpage, $limits)
    {
        return $this->field('think_monitor.*')->where($map)->page($Nowpage, $limits)->order('id desc')->paginate($limits);
    }
}
<?php

namespace app\admin\validate;
use think\Validate;

class ArticleValidate extends Validate
{
    protected $rule = [
        ['path', 'unique:article', 'URL链接已经存在']
    ];

}
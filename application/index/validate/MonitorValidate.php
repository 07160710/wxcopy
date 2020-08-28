<?php

    namespace app\index\validate;

    use think\Validate;

    class MonitorValidate extends Validate
    {
        protected $rule = [
            ['ipAddr', 'unique:monitor', '已经存在'],

        ];

    }
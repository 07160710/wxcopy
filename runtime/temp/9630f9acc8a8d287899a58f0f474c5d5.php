<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:81:"/www/wwwroot/vip1.runjimima.com/public/../application/admin/view/index/index.html";i:1597827452;s:83:"/www/wwwroot/vip1.runjimima.com/public/../application/admin/view/public/header.html";i:1597827032;s:83:"/www/wwwroot/vip1.runjimima.com/public/../application/admin/view/public/footer.html";i:1597811411;}*/ ?>
<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">

	<meta name="viewport" content="width=device-width,initial-scale=0.8">

    <title><?php echo config('WEB_SITE_TITLE'); ?></title>

    <link href="/static/admin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">

    <link href="/static/admin/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">

    <link href="/static/admin/css/animate.min.css" rel="stylesheet">

    <link href="/static/admin/css/plugins/iCheck/custom.css" rel="stylesheet">

    <link href="/static/admin/css/plugins/chosen/chosen.css" rel="stylesheet">

    <link href="/static/admin/css/plugins/switchery/switchery.css" rel="stylesheet">

    <link href="/static/admin/css/style.min.css?v=4.1.0" rel="stylesheet">

    <link href="/static/admin/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">

  

    <style type="text/css">

    .long-tr th{
        text-align: center;
    }
    .long-td td{
        text-align: center;
    }

    </style>



</head>

<body class="gray-bg">
<div class="wrapper wrapper-content">
    <div class="alert alert-danger alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <div>尊敬的用户<span id="weather"></span></div>
    </div>

    <!-- 中间折线 -->
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-3">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <i class="fa fa-cogs"></i> 微信号复制信息
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered" style="word-wrap:break-word;word-break:break-all;">
                            <thead>
                            <tr class="long-tr">
                                <th width="10%">微信号</th>
                                <th width="10%">合计</th>
                            </tr>
                            </thead>
                            <!--<?php if(is_array($wxnum) || $wxnum instanceof \think\Collection || $wxnum instanceof \think\Paginator): $i = 0; $__LIST__ = $wxnum;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>-->
                            <tr class="long-td">
                                <td style="color: #4c4c4c"><?php echo $vo['wxnum']; ?></td>
                                <td style="color: #4c4c4c"><?php echo $vo['total']; ?></td>
                            </tr>
                            <!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">

                <div class="panel panel-info">
                    <div class="panel-heading">
                        <i class="fa fa-cogs"></i>推广户信息
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered" style="word-wrap:break-word;word-break:break-all;">
                            <thead>
                            <tr class="long-tr">
                                <th>推广户</th>
                                <th>合计</th>
                            </tr>
                            </thead>
                            <!--<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>-->
                            <tr class="long-td">
                                <td><?php echo $vo['account']; ?></td>
                                <td><?php echo $vo['total']; ?></td>
                            </tr>
                            <!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">

                <div class="panel panel-info">
                    <div class="panel-heading">
                        <i class="fa fa-cogs"></i> 端口访问信息
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered" style="word-wrap:break-word;word-break:break-all;">
                            <thead>
                            <tr class="long-tr">
                                <th width="10%">搜索引擎</th>
                                <th width="10%">合计</th>
                            </tr>
                            </thead>
                            <!--<?php if(is_array($account) || $account instanceof \think\Collection || $account instanceof \think\Paginator): $i = 0; $__LIST__ = $account;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>-->
                            <tr class="long-td">
                                <td style="color: #4c4c4c"><?php echo $vo['engine']; ?></td>
                                <td style="color: #4c4c4c"><?php echo $vo['total']; ?></td>
                            </tr>
                            <!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

<script src="__JS__/jquery.min.js?v=2.1.4"></script>
<script src="__JS__/bootstrap.min.js?v=3.3.6"></script>
<script src="__JS__/content.min.js?v=1.0.0"></script>
<script src="__JS__/plugins/chosen/chosen.jquery.js"></script>
<script src="__JS__/plugins/iCheck/icheck.min.js"></script>
<script src="__JS__/plugins/layer/laydate/laydate.js"></script>
<script src="__JS__/plugins/switchery/switchery.js"></script><!--IOS开关样式-->
<script src="__JS__/jquery.form.js"></script>
<script src="__JS__/layer/layer.js"></script>
<script src="__JS__/laypage/laypage.js"></script>
<script src="__JS__/laytpl/laytpl.js"></script>
<script src="__JS__/lunhui.js"></script>
<script>
    $(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})});
</script>
<script src="/static/admin/js/jquery.leoweather.min.js"></script>

<script type="text/javascript">
    $('#weather').leoweather({format:'，{时段}好！<span id="colock">现在时间是：<strong>{年}年{月}月{日}日 星期{周} {时}:{分}:{秒}</strong></span> '});
</script>

</body>
</html>
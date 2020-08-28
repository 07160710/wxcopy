<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:85:"/www/wwwroot/vip1.runjimima.com/public/../application/admin/view/article/details.html";i:1598252614;s:83:"/www/wwwroot/vip1.runjimima.com/public/../application/admin/view/public/header.html";i:1597827032;s:83:"/www/wwwroot/vip1.runjimima.com/public/../application/admin/view/public/footer.html";i:1597811411;}*/ ?>
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
<style>
    a{color: #0a0a0a;}
</style>
<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <!-- Panel Other -->
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>微信号-复制数列表</h5>
        
        </div>
        
        <div class="ibox-content">

            <div style="clear: both"></div>
            <!--搜索框结束-->
            <div class="col-sm-2">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <i class="fa fa-cogs"></i> 今天信息
                    </div>
                    <div class="panel-body">

                              <!--<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>-->

                                <p style="margin: 0"><b><?php echo $vo['wxnum']; ?></b> : <span style="color: #2f2f2f"><?php echo $vo['total']; ?></span></p>

                            <!--<?php endforeach; endif; else: echo "" ;endif; ?>-->

                    </div>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <i class="fa fa-cogs"></i> 昨天信息
                    </div>
                    <div class="panel-body">


                            <!--<?php if(is_array($list1) || $list1 instanceof \think\Collection || $list1 instanceof \think\Paginator): $i = 0; $__LIST__ = $list1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>-->

                            <p style="margin: 0"><b><?php echo $vo['wxnum']; ?></b> : <span style="color: #2f2f2f"><?php echo $vo['total']; ?></span></p>

                            <!--<?php endforeach; endif; else: echo "" ;endif; ?>-->

                    </div>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <i class="fa fa-cogs"></i> 本周信息
                    </div>
                    <div class="panel-body">


                            <!--<?php if(is_array($week) || $week instanceof \think\Collection || $week instanceof \think\Paginator): $i = 0; $__LIST__ = $week;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>-->

                            <p style="margin: 0"><b><?php echo $vo['wxnum']; ?></b> : <span style="color: #2f2f2f"><?php echo $vo['total']; ?></span></p>

                            <!--<?php endforeach; endif; else: echo "" ;endif; ?>-->

                    </div>
                </div>
            </div>

            <div style="clear: both"></div>
            
            <div class="hr-line-dashed"></div>
            
            
            <div class="example-wrap">
                
                
                <p><a href="<?php echo url('Article/today'); ?>">今天数据</a>&nbsp;&nbsp;
                <a href="<?php echo url('Article/yesterday'); ?>">昨天数据</a>&nbsp;&nbsp;
                <a href="<?php echo url('Article/excel'); ?>">全部数据</a></p>
                
                
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr class="long-tr">
                        <th width="10%">创建时间</th>
                        <th width="10%">IP地址</th>
                        <th width="10%">IP地区</th>
                        <th width="5%">微信号</th>
                        <th width="5%">操作</th>
                        <th width="10%">关键字</th>
                        <th width="10%">引擎</th>
                        <th width="20%">URL链接</th>
                    
                    </tr>
                    </thead>
                    <!--<?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>-->
                    <tr class="long-td">
                        <td><?php echo date('Y-m-d H:i:s',$vo['createtime']); ?></td>
                        <td><?php echo $vo['ipAddr']; ?></td>
                        <td><?php echo $vo['address']; ?></td>
                        <td><?php echo $vo['wxnum']; ?></td>
                        <td><?php echo $vo['ope']; ?></td>
                        <td><?php echo $vo['keyword']; ?></td>
                        <td><?php echo $vo['engine']; ?></td>
                        <td><a href="<?php echo $vo['url']; ?>" target="_blank"><?php echo $vo['url']; ?></a></td>
                    </tr>
                    <!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
                    
                    
                    <tbody id="list-content"></tbody>
                </table>
                <div style="text-align:right;">
                    <?php echo $data->render(); ?>
                </div>
                <div style="text-align: right;">
                    共<?php echo $count; ?>条数据,第<?php echo $Nowpage; ?>页，共<?php echo $allpage; ?>页
                </div>
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
<script>
    $(document).ready(function () {
        $(".table").dataTable();
        var oTable = $("#editable").dataTable();
        oTable.$("td").editable("../example_ajax.php", {
            "callback": function (sValue, y) {
                var aPos = oTable.fnGetPosition(this);
                oTable.fnUpdate(sValue, aPos[0], aPos[1])
            }, "submitdata": function (value, settings) {
                return {"row_id": this.parentNode.getAttribute("id"), "column": oTable.fnGetPosition(this)[2]}
            }, "width": "90%", "height": "100%"
        })
    });
</script>

</body>
</html>
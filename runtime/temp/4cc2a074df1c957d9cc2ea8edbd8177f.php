<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:83:"/www/wwwroot/vip1.runjimima.com/public/../application/admin/view/article/index.html";i:1598253093;s:83:"/www/wwwroot/vip1.runjimima.com/public/../application/admin/view/public/header.html";i:1597827032;s:83:"/www/wwwroot/vip1.runjimima.com/public/../application/admin/view/public/footer.html";i:1597811411;}*/ ?>
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
    .long-tr
</style>
<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <!-- Panel Other -->
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>列表</h5>
        </div>
        <div class="ibox-content">
            <!--搜索框开始-->
            <div class="row">
                <div class="col-sm-12">
                    <div class="col-sm-2" style="width: 100px">
                        <div class="input-group">
                            <a href="<?php echo url('add_article'); ?>">
                                <button class="btn btn-outline btn-primary" type="button">添加</button>
                            </a>
                        </div>
                    </div>
                    <form name="admin_list_sea" class="form-search" method="post" action="<?php echo url('index'); ?>">
                        <div class="col-sm-3">
                            <div class="input-group">
                                <input type="text" id="key" class="form-control" name="key" value="<?php echo $val; ?>"
                                       placeholder="输入需查询URL链接"/>
                                <span class="input-group-btn"> 
                                    <button type="submit" class="btn btn-primary"><i
                                            class="fa fa-search"></i> 搜索</button>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--搜索框结束-->
            <div class="hr-line-dashed"></div>
            <div class="example-wrap">
                <div class="example">
                    <table class="table table-bordered table-hover" style="word-wrap:break-word;word-break:break-all;">
                        <thead>
                        <tr class="long-tr">
                            <th width="5%">优化师</th>
                            <th width="15%">推广账户</th>
                            <th width="20%">微信号</th>
                            <th width="15%">版权</th>
                            <th width="15%">百度统计</th>
                            <th width="15%">URL链接</th>
                            <th width="15%">操作</th>
                        </tr>
                        </thead>
                        <script id="list-template" type="text/html">
                            {{# for(var i=0;i
                            <d.length;i++){  }}
                            <tr class="long-td">
                                <td>{{d[i].username}}</td>
                                <td>{{d[i].account}}</td>
                                <td>{{d[i].wxnum}}</td>
                                <td>{{d[i].company}}</td>
                                <td>{{d[i].toji}}</td>
                                <td><a href="{{d[i].path}}" target="_blank">{{d[i].path}}</a></td>
                                <td>
                                    <a href="javascript:;" onclick="details({{d[i].id}})"  class="btn btn-danger btn-xs btn-outline">
                                        <i class="fa fa-paste"></i> 查看</a>&nbsp;
                                    <a href="javascript:;" onclick="edit_article({{d[i].id}})"
                                       class="btn btn-primary btn-xs btn-outline">
                                        <i class="fa fa-gear"></i> 编辑</a>&nbsp;
                                    <a href="javascript:;" onclick="del_article({{d[i].id}})"
                                       class="btn btn-danger btn-xs btn-outline">
                                        <i class="fa fa-trash-o"></i> 删除</a>
                                </td>
                            </tr>
                            {{# } }}
                        </script>
                        <tbody id="list-content"></tbody>
                    </table>
                    <div id="AjaxPage" style="text-align:right;"></div>
                    <div style="text-align: right;">
                        共<?php echo $count; ?>条数据，<span id="allpage"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- 加载动画 -->
<div class="spiner-example">
    <div class="sk-spinner sk-spinner-three-bounce">
        <div class="sk-bounce1"></div>
        <div class="sk-bounce2"></div>
        <div class="sk-bounce3"></div>
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

<script type="text/javascript">

    /**
     * [Ajaxpage laypage分页]
     * @param {[type]} curr [当前页]
     */
    Ajaxpage();

    function Ajaxpage(curr) {
        var key = $('#key').val();
        $.getJSON('<?php echo url("article/index"); ?>', {
            page: curr || 1, key: key
        }, function (data) {      //data是后台返回过来的JSON数据
            $(".spiner-example").css('display', 'none'); //数据加载完关闭动画
            if (data == '') {
                $("#list-content").html('<td colspan="20" style="padding-top:10px;padding-bottom:10px;font-size:16px;text-align:center">暂无数据</td>');
            } else {
                var tpl = document.getElementById('list-template').innerHTML;
                laytpl(tpl).render(data, function (html) {
                    document.getElementById('list-content').innerHTML = html;
                });
                laypage({
                    cont: $('#AjaxPage'),//容器。值支持id名、原生dom对象，jquery对象,
                    pages: '<?php echo $allpage; ?>',//总页数
                    skip: true,//是否开启跳页
                    skin: '#1AB5B7',//分页组件颜色
                    curr: curr || 1,
                    groups: 3,//连续显示分页数
                    jump: function (obj, first) {
                        if (!first) {
                            Ajaxpage(obj.curr)
                        }
                        $('#allpage').html('第' + obj.curr + '页，共' + obj.pages + '页');
                    }
                });
            }
        });
    }
    //详情
    function details(id) {
        location.href = './details/id/' + id + '.html';
    }


    //编辑
    function edit_article(id) {
        location.href = './edit_article/id/' + id + '.html';
    }

    //删除
    function del_article(id) {
        lunhui.confirm(id, '<?php echo url("del_article"); ?>');
    }


</script>
</body>
</html>
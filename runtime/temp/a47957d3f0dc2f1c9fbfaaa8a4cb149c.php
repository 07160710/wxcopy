<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:89:"/www/wwwroot/vip1.runjimima.com/public/../application/admin/view/article/add_article.html";i:1598347682;s:83:"/www/wwwroot/vip1.runjimima.com/public/../application/admin/view/public/header.html";i:1597827032;s:83:"/www/wwwroot/vip1.runjimima.com/public/../application/admin/view/public/footer.html";i:1597811411;}*/ ?>
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
<link rel="stylesheet" type="text/css" href="/static/admin/webupload/webuploader.css">
<link rel="stylesheet" type="text/css" href="/static/admin/webupload/style.css">
<style>
    .file-item {
        float: left;
        position: relative;
        width: 110px;
        height: 110px;
        margin: 0 20px 20px 0;
        padding: 4px;
    }

    .file-item .info {
        overflow: hidden;
    }

    .uploader-list {
        width: 100%;
        overflow: hidden;
    }

    .span {
        margin-top: 1rem;
        color: #e5e6e7;
        font-size: 14px;
    }
</style>
<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>添加</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="form_basic.html#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <form class="form-horizontal m-t" name="add" id="add" method="post" action="add_article">

                        <div class="form-group">
                            <label class="col-sm-3 control-label">微信号：</label>
                            <div class="input-group col-sm-4">
                                <input id="wxnum" type="text" class="form-control" name="wxnum" placeholder="微信号" >
                                <input id="username" type="text" name="username" value="<?php echo \think\Session::get('username'); ?>" style="display: none" >
                                <input id="e" type="text" name="e" value="<?php echo \think\Session::get('uid'); ?>" style="display: none" >
                                <br>
                                <span class="span">微信号 英文‘,’ 号隔开。例如：wx123,wx546,wx999</span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">推广户：</label>
                            <div class="input-group col-sm-4">
                                <input id="account" type="text" class="form-control" name="account" maxlength="20" placeholder="推广户" >
                                <br>
                                <span class="span">推广户：搜狗youqu2019@xx.com</span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">URL链接：</label>
                            <div class="input-group col-sm-4">
                                <input id="path" type="text" class="form-control" name="path" placeholder="URL链接" >
                                <br>
                                <span class="span">推广页面链接：http://qb.baidu.com/qb/</span>
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">版权：</label>
                            <div class="input-group col-sm-4">
                                <input id="company" type="text" class="form-control" name="company" placeholder="版权">
                                <br>
                                <span class="span">页面公司名字，如：xxx有限公司</span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">百度统计：</label>
                            <div class="input-group col-sm-4">
                                <input id="toji" type="text" class="form-control" name="toji" maxlength="40" placeholder="百度统计(选填)">
                                <br>
                                <span class="span">百度统计,如：a19a0e451bac48d83b2f4c6dc5b3524b</span>
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>

                        <!-- <div style="display:block;"> -->
                        <div class="form-group">
                            <label class="col-sm-3 control-label">站长统计：</label>
                            <div class="input-group col-sm-4">
                                <input id="cnzz" type="text" class="form-control" name="cnzz" maxlength="100" placeholder="站长统计(选填)">
                                <br>
                                <span class="span">站长统计,复制代码到文本框中，例：<span style="color:#000000;">https://v1.cnzz.com/z_stat.php?id=1279211692&web_id=1279211692</span>
                                </span>
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <!-- </div> -->

                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-3">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> 保存</button>&nbsp;&nbsp;&nbsp;
                                <a class="btn btn-danger" href="javascript:history.go(-1);"><i class="fa fa-close"></i>
                                    返回</a>
                            </div>
                        </div>
                    </form>
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

<script type="text/javascript" src="/static/admin/webupload/webuploader.min.js"></script>


<script type="text/javascript">

    $(function () {
        $('#add').ajaxForm({
            beforeSubmit: checkForm, // 此方法主要是提交前执行的方法，根据需要设置
            success: complete, // 这是提交后的方法
            dataType: 'json'
        });

        function checkForm() {
            if ('' == $.trim($('#wxnum').val())) {
                layer.msg('微信号不能为空', {icon: 5, time: 1500, shade: 0.1}, function (index) {
                    layer.close(index);
                });
                return false;
            }
            if ('' == $.trim($('#account').val())) {
                layer.msg('推广户不能为空', {icon: 5, time: 1500, shade: 0.1}, function (index) {
                    layer.close(index);
                });
                return false;
            }

            if ('' == $.trim($('#path').val())) {
                layer.msg('URL链接不能为空', {icon: 5, time: 1500, shade: 0.1}, function (index) {
                    layer.close(index);
                });
                return false;
            }

        }

        function complete(data) {
            if (data.code == 1) {
                layer.msg(data.msg, {icon: 6, time: 1500, shade: 0.1}, function (index) {
                    layer.close(index);
                    window.location.href = "<?php echo url('article/index'); ?>";
                });
            } else {
                layer.msg(data.msg, {icon: 5, time: 1500, shade: 0.1}, function (index) {
                    layer.close(index);
                });
                return false;
            }
        }

    });


    //IOS开关样式配置
    var elem = document.querySelector('.js-switch');
    var switchery = new Switchery(elem, {
        color: '#1AB394'
    });
    var config = {
        '.chosen-select': {},
    }
    for (var selector in config) {
        $(selector).chosen(config[selector]);
    }


</script>
</body>
</html>

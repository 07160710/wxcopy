<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"/www/wwwroot/vip1.runjimima.com/public/../application/admin/view/login.html";i:1597825963;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=0.8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="renderer" content="webkit"> 
    <title>登录</title>
    <link href="__CSS__/bootstrap.min.css" rel="stylesheet">
    <link href="__CSS__/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="__CSS__/animate.min.css" rel="stylesheet">
    <link href="__CSS__/style.min.css" rel="stylesheet">
    <link href="__CSS__/login.min.css" rel="stylesheet">
    <link href="__CSS__/jquery.slider.css" rel="stylesheet">
    <script type="text/javascript" src="__JS__/jquery.min.js?v=2.1.4"></script>
    <script>
        if(window.top!==window.self){window.top.location=window.location};
    </script>
</head>

<body class="signin">
<div class="signinpanel">
    <div class="row">
        <div class="col-sm-7" style="color:#fff">
            <div class="signin-info">
                <div class="logopanel m-b">
                </div>
                <div class="m-b"></div>
                <h2></h2>
                <ul class="m-b"></ul>
            </div>
        </div>
        <div class="col-sm-5" style="color:#fff">
            <form id="doLogin" name="doLogin" method="post" action="<?php echo url('doLogin'); ?>">
                <p class="m-t-md" id="err_msg">登录到微信号复制统计后台</p>
                <input type="text" class="form-control uname" placeholder="用户名" id="username" name="username" />
                <input type="password" class="form-control pword m-b" placeholder="密码" id="password" name="password" />
           
                <button type="submit" class="btn btn-primary btn-block">登　录</button>
            </form>
        </div>
    </div>
    <div class="signup-footer">
        <div class="pull-left" style="color:#fff">
            &copy; 2020 Kaifeng All Rights Reserved.
        </div>
    </div>
</div>

<script type="text/javascript" src="__JS__/bootstrap.min.js?v=3.3.6"></script>
<script type="text/javascript" src="__JS__/jquery.form.js"></script>
<script type="text/javascript" src="__JS__/layer/layer.js"></script>
<script type="text/javascript" src="__JS__/lunhui.js"></script>
<script type="text/javascript" src="__JS__/jquery.slider.min.js"></script>
<script type="text/javascript">



    $(function(){
        $('#doLogin').ajaxForm({
            beforeSubmit: checkForm, // 此方法主要是提交前执行的方法，根据需要设置
            success: complete, // 这是提交后的方法
            dataType: 'json'
        });
        
        function checkForm(){
            if( '' == $.trim($('#username').val())){           
                lunhui.error('请输入登录用户名');
                return false;
            }
            if( '' == $.trim($('#password').val())){
                lunhui.error('请输入登录密码');
                return false;
            }
            $('button').addClass('disabled').text('登录中...');
        }


        function complete(data){
            if(data.code==1){
                lunhui.success(data.msg,data.url);
            }else{ 
                lunhui.error(data.msg);
                $('button').removeClass('disabled').text('登　录');   
                return false;   
            }
        }
    });

</script>
</body>
</html>
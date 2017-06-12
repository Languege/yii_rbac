<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="#" type="image/png">

    <title>登录-狼人杀后台管理平台</title>

    <link href="<?php echo BACKEND_STATIC;?>css/style.css" rel="stylesheet">
    <link href="<?php echo BACKEND_STATIC;?>css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="<?php echo BACKEND_STATIC;?>js/html5shiv.js"></script>
    <script src="<?php echo BACKEND_STATIC;?>js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="login-body">

<div class="container">

    <form class="form-signin" action="<?=WEB_URL?>index.php?r=site/logins" method="post">
         <input type="hidden" name="_csrf" value="<?php echo Yii::$app->request->csrfToken;?>"/>
        <div class="form-signin-heading text-center">
            <h1 class="sign-title">登 录</h1>
            <img src="<?php echo BACKEND_STATIC;?>images/login-logo.png" alt=""/>
        </div>
        <div class="login-wrap">
            <input type="text" name="username" class="form-control" placeholder="用户名" autofocus>
            <input type="password" name="password" class="form-control" placeholder="密码">

            <button class="btn btn-lg btn-login btn-block" type="submit">
                <i class="fa fa-check"></i>
            </button>

            <div class="registration">
                没有账号?
                <a class="" href="registration.html">
                    注册
                </a>
            </div>
            <label class="checkbox">
                <input type="checkbox" value="remember-me"> 记住我
                <span class="pull-right">
                    <a data-toggle="modal" href="#myModal"> 忘记密码?</a>

                </span>
            </label>

        </div>

        <!-- Modal -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">忘记秘密 ?</h4>
                    </div>
                    <div class="modal-body">
                        <p>请输入邮箱地址重置您的账户密码</p>
                        <input type="text" name="email" placeholder="邮箱地址" autocomplete="off" class="form-control placeholder-no-fix">

                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">取消</button>
                        <button class="btn btn-primary" type="button">提交</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal -->

    </form>

</div>



<!-- Placed js at the end of the document so the pages load faster -->

<!-- Placed js at the end of the document so the pages load faster -->
<script src="<?php echo BACKEND_STATIC;?>js/jquery-1.10.2.min.js"></script>
<script src="<?php echo BACKEND_STATIC;?>js/bootstrap.min.js"></script>
<script src="<?php echo BACKEND_STATIC;?>js/modernizr.min.js"></script>

</body>
</html>


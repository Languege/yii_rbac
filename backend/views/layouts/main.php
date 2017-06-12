<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="keywords" content="admin, dashboard, bootstrap, template, flat, modern, theme, responsive, fluid, retina, backend, html5, css, css3">
  <meta name="description" content="">
  <meta name="author" content="ThemeBucket">
  <link rel="shortcut icon" href="#" type="<?php echo BACKEND_STATIC;?>image/png">

  <title>狼人杀后台管理</title>

  <!--icheck-->
  <link href="<?php echo BACKEND_STATIC;?>js/iCheck/skins/minimal/minimal.css" rel="stylesheet">
  <link href="<?php echo BACKEND_STATIC;?>js/iCheck/skins/square/square.css" rel="stylesheet">
  <link href="<?php echo BACKEND_STATIC;?>js/iCheck/skins/square/red.css" rel="stylesheet">
  <link href="<?php echo BACKEND_STATIC;?>js/iCheck/skins/square/blue.css" rel="stylesheet">

  <!--dashboard calendar-->
  <link href="<?php echo BACKEND_STATIC;?>css/clndr.css" rel="stylesheet">

  <!--Morris Chart CSS -->
  <link rel="<?php echo BACKEND_STATIC;?>stylesheet" href="js/morris-chart/morris.css">

  <!--common-->
  <link href="<?php echo BACKEND_STATIC;?>css/style.css" rel="stylesheet">
  <link href="<?php echo BACKEND_STATIC;?>css/style-responsive.css" rel="stylesheet">




  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="<?php echo BACKEND_STATIC;?>js/html5shiv.js"></script>
  <script src="<?php echo BACKEND_STATIC;?>js/respond.min.js"></script>
  <![endif]-->
</head>

<body class="sticky-header">

<section>
    <!-- left side start-->
    <div class="left-side sticky-left-side">

        <!--logo and iconic logo start-->
        <div class="logo">
            <a href="index.html"><img src="<?php echo BACKEND_STATIC;?>images/logo.png" alt=""></a>
        </div>

        <div class="logo-icon text-center">
            <a href="index.html"><img src="<?php echo BACKEND_STATIC;?>images/logo_icon.png" alt=""></a>
        </div>
        <!--logo and iconic logo end-->

        <div class="left-side-inner">

            <!-- visible to small devices only -->
            <div class="visible-xs hidden-sm hidden-md hidden-lg">
                <div class="media logged-user">
                    <img alt="" src="<?php echo BACKEND_STATIC;?>images/photos/user-avatar.png" class="media-object">
                    <div class="media-body">
                        <h4><a href="#"><?php if(Yii::$app->user->identity){echo Yii::$app->user->identity->username;}?></a></h4>
                        <span>"欢迎使用狼人杀GM管理平台"</span>
                    </div>
                </div>

                <h5 class="left-nav-title">账号信息</h5>
                <ul class="nav nav-pills nav-stacked custom-nav">
                  <li><a href="<?=WEB_URL?>index.php?r=site/logout"><i class="fa fa-sign-out"></i> <span>退出</span></a></li>
                </ul>
            </div>

            <!--sidebar nav start-->
             <ul class="nav nav-pills nav-stacked custom-nav">
                <li><a href="index.php?r=site/index"><i class="fa fa-home"></i> <span>后台管理</span></a></li>
                <?php 
                    $menus = Yii::$app->controller->left_menus;
                    $sign_id = Yii::$app->controller->id;
                    $active_url = 'index.php?r='.Yii::$app->controller->id.'/'.Yii::$app->controller->action->id;
                    $active_menu = null;
                    $active_submenu = null;
                    foreach ($menus as $key => $menu) {
                        if (!in_array($menu['id'], Yii::$app->controller->role)){
                            continue;
                        }
                ?>
                   <li class="menu-list <?php if($menu['sign'] == $sign_id){ echo 'nav-active nav-hover'; $active_menu = $menu;}?>" ><a href=""><i class="fa fa-laptop"></i> <span><?=$menu['name']?></span></a>
                     <ul class="sub-menu-list">
                        <?php 
                            foreach ($menu['submenu'] as $submenu) {
                                if (!in_array($submenu['id'], Yii::$app->controller->role)){
                                    continue;
                                }
                        ?>
                            <li <?php if(stripos($active_url, $submenu['sign']) !== false){ $active_submenu = $submenu;?> class="active" <?php }?>><a href="<?=$submenu['url']?>"><?=$submenu['name']?></a></li>
                        <?php }?>
                     </ul>
                   </li>
                <?php }?>
            </ul>
            <!--sidebar nav end-->

        </div>
    </div>
    <!-- left side end-->
    
    <!-- main content start-->
    <div class="main-content" >

        <!-- header section start-->
        <div class="header-section">

            <!--toggle button start-->
            <a class="toggle-btn"><i class="fa fa-bars"></i></a>
            <!--toggle button end-->


            <!--notification menu start -->
            <div class="menu-right">
                <ul class="notification-menu">
                    <li>
                        <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <img src="<?php echo BACKEND_STATIC;?>images/photos/user-avatar.png" alt="" />
                            <?php if(Yii::$app->user->identity){echo Yii::$app->user->identity->username;}?>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                            <li><a href="<?=WEB_URL?>index.php?r=site/logout"><i class="fa fa-sign-out"></i>退出</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
            <!--notification menu end -->

        </div>
        <!-- header section end-->

        <!-- page heading start-->
        <div class="page-heading">
            <h3>
                <?php if($active_submenu){echo $active_submenu['name'];}elseif($active_menu){echo $active_menu['name'];}?>
            </h3>
            <ul class="breadcrumb">
                <?php if($active_submenu && $active_menu){?>
                <li>
                    <a href="<?=$active_submenu['url']?>"><?=$active_submenu['name']?></a>
                </li>
                <?php }?>
                <li class="active"><?php if($active_submenu){echo $active_submenu['name'];}elseif($active_menu){echo $active_menu['name'];}?></li>
            </ul>
        </div>
        <!-- page heading end-->

        <!--body wrapper start-->
        <div class="wrapper">
            <?= $content?>
        </div>
        <!--body wrapper end-->

        <!--footer section start-->
        <footer>
            2017 &copy;   狼人杀后台管理平台<a href="<?=WEB_URL?>" target="_blank">魂世界</a>
        </footer>
        <!--footer section end-->


    </div>
    <!-- main content end-->
</section>

<!-- Placed js at the end of the document so the pages load faster -->
<script src="<?php echo BACKEND_STATIC;?>js/jquery-1.10.2.min.js"></script>
<script src="<?php echo BACKEND_STATIC;?>js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="<?php echo BACKEND_STATIC;?>js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo BACKEND_STATIC;?>js/bootstrap.min.js"></script>
<script src="<?php echo BACKEND_STATIC;?>js/modernizr.min.js"></script>
<script src="<?php echo BACKEND_STATIC;?>js/jquery.nicescroll.js"></script>

<!--easy pie chart-->
<script src="<?php echo BACKEND_STATIC;?>js/easypiechart/jquery.easypiechart.js"></script>
<script src="<?php echo BACKEND_STATIC;?>js/easypiechart/easypiechart-init.js"></script>

<!--Sparkline Chart-->
<script src="<?php echo BACKEND_STATIC;?>js/sparkline/jquery.sparkline.js"></script>
<script src="<?php echo BACKEND_STATIC;?>js/sparkline/sparkline-init.js"></script>

<!--icheck -->
<script src="<?php echo BACKEND_STATIC;?>js/iCheck/jquery.icheck.js"></script>
<script src="<?php echo BACKEND_STATIC;?>js/icheck-init.js"></script>

<!-- jQuery Flot Chart-->
<script src="<?php echo BACKEND_STATIC;?>js/flot-chart/jquery.flot.js"></script>
<script src="<?php echo BACKEND_STATIC;?>js/flot-chart/jquery.flot.tooltip.js"></script>
<script src="<?php echo BACKEND_STATIC;?>js/flot-chart/jquery.flot.resize.js"></script>



<!--Calendar-->
<script src="<?php echo BACKEND_STATIC;?>js/calendar/clndr.js"></script>
<script src="<?php echo BACKEND_STATIC;?>js/calendar/evnt.calendar.init.js"></script>
<script src="<?php echo BACKEND_STATIC;?>js/calendar/moment-2.2.1.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js"></script>

<!--common scripts for all pages-->
<script src="<?php echo BACKEND_STATIC;?>js/scripts.js"></script>


</body>
</html>

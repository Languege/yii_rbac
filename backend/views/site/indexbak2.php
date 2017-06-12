<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="keywords" content="admin, dashboard, bootstrap, template, flat, modern, theme, responsive, fluid, retina, backend, html5, css, css3">
  <meta name="description" content="">
  <meta name="author" content="ThemeBucket">
  <link rel="shortcut icon" href="#" type="<?php echo BACKEND_STATIC;?>image/png">

  <title>AdminEx后台模板 Bootstrap响应式后台管理模板-淘代码</title>

  <!--icheck-->
  <link href="<?php echo BACKEND_STATIC;?>js/iCheck/skins/minimal/minimal.css" rel="stylesheet">
  <link href="<?php echo BACKEND_STATIC;?>js/iCheck/skins/square/square.css" rel="stylesheet">
  <link href="<?php echo BACKEND_STATIC;?>js/iCheck/skins/square/red.css" rel="stylesheet">
  <link href="<?php echo BACKEND_STATIC;?>js/iCheck/skins/square/blue.css" rel="stylesheet">

  <!--dashboard calendar-->
  <link href="<?php echo BACKEND_STATIC;?>css/clndr.css" rel="stylesheet">

  <!--Morris Chart CSS -->
  <link rel="stylesheet" href="<?php echo BACKEND_STATIC;?>js/morris-chart/morris.css">

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
    <div class="left-side sticky-left-side" id="sidebar">

        <!--logo and iconic logo start-->
        <div class="logo">
            <a href="index.php"><img src="<?php echo BACKEND_STATIC;?>images/logo.png" alt=""></a>
        </div>

        <div class="logo-icon text-center">
            <a href="index.php"><img src="<?php echo BACKEND_STATIC;?>images/logo_icon.png" alt=""></a>
        </div>
        <!--logo and iconic logo end-->

        <div class="left-side-inner">

            <!-- visible to small devices only -->
            <div class="visible-xs hidden-sm hidden-md hidden-lg">
                <div class="media logged-user">
                    <img alt="" src="<?php echo BACKEND_STATIC;?>images/photos/user-avatar.png" class="media-object">
                    <div class="media-body">
                        <h4><a href="#">John Doe</a></h4>
                        <span>"Hello There..."</span>
                    </div>
                </div>

                <h5 class="left-nav-title">Account Information</h5>
                <ul class="nav nav-pills nav-stacked custom-nav">
                  <li><a href="#"><i class="fa fa-user"></i> <span>Profile</span></a></li>
                  <li><a href="#"><i class="fa fa-cog"></i> <span>Settings</span></a></li>
                  <li><a href="#"><i class="fa fa-sign-out"></i> <span>Sign Out</span></a></li>
                </ul>
            </div>

            <ul class="nav nav-pills nav-stacked custom-nav">
                <li class="active"><a href="index.php?r=site/index"><i class="fa fa-home"></i> <span>系统管理</span></a></li>
                <?php foreach ($menus as $key => $menu) {?>
                   <li class="menu-list pMenu"><a href=""><i class="fa fa-laptop"></i> <span><?=$menu['name']?></span></a>
                     <ul class="sub-menu-list">
                        <?php foreach ($menu['submenu'] as $submenu) {?>
                            <li><a href="<?=$submenu['url']?>" target="iframedo" class="cMenu"><?=$submenu['name']?></a></li>
                        <?php }?>
                     </ul>
                   </li>
                <?php }?>
            </ul>
        </div>
    </div>
    <!-- left side end-->
    
    <!-- main content start-->
    <div class="main-content" id="content">
        <!--body wrapper start-->
        
            <iframe src="" style="border:0px;width:100%;height:100%;margin-top: -100px;" id="iframedo" name="iframedo"></iframe>
       
        <!--body wrapper end-->
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


<!--Morris Chart-->
<!-- <script src="<?php echo BACKEND_STATIC;?>js/morris-chart/morris.js"></script>
<script src="<?php echo BACKEND_STATIC;?>js/morris-chart/raphael-min.js"></script> -->

<!--Calendar-->
<script src="<?php echo BACKEND_STATIC;?>js/calendar/clndr.js"></script>
<script src="<?php echo BACKEND_STATIC;?>js/calendar/evnt.calendar.init.js"></script>
<script src="<?php echo BACKEND_STATIC;?>js/calendar/moment-2.2.1.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js"></script>

<!--common scripts for all pages-->
<script src="<?php echo BACKEND_STATIC;?>js/scripts.js"></script>

<!--Dashboard Charts-->
<!-- <script src="<?php echo BACKEND_STATIC;?>js/dashboard-chart-init.js"></script> -->


</body>
<script type="text/javascript">
    $(function(){
        var initwindow = function(){
            $("#iframedo").height($("#content").height());
            $("#sidebar").height($("#content").height());
        }
        initwindow();
        $(window).resize(initwindow);

    })
   
  if(self.frameElement.tagName=="IFRAME"){
     this.window.parent.location.reload();
  }
</script>

<script>
$(".cMenu").click(function(){
    $(".cMenu").removeClass("active");
    $(".pMenu").removeClass("active");
    $(this).addClass("active");
    $(this).closest('.menu-list').addClass("active");
})

$(".pMenu a").click("click",function(){
    var close = $(this).next("ul").is(":hidden");
    if(close){
        $(this).next("ul").show();
    }else{
        $(this).next("ul").hide();
    }
});

$(".pMenu:eq(0)").addClass("active").find("ul").show();
$(".pMenu:eq(0)").find(".cMenu:eq(0)").addClass("active");
var href = ($(".pMenu:eq(0)").find(".cMenu:eq(0) a").attr("href"));
$("#iframedo").attr("src",href);
</script>
</html>

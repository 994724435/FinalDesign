<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title></title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <!-- bootstrap -->
    <link href="__ROOT__/Public/index/css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="__ROOT__/Public/index/css/bootstrap/bootstrap-responsive.css" rel="stylesheet" />
    <link href="__ROOT__/Public/index/css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />

    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="__ROOT__/Public/index/css/layout.css" />
    <link rel="stylesheet" type="text/css" href="__ROOT__/Public/index/css/elements.css" />
    <link rel="stylesheet" type="text/css" href="__ROOT__/Public/index/css/icons.css" />

    <!-- libraries -->
    <link href="__ROOT__/Public/index/css/lib/jquery-ui-1.10.2.custom.css" rel="stylesheet" type="text/css" />
    <link href="__ROOT__/Public/index/css/lib/font-awesome.css" type="text/css" rel="stylesheet" />
    <link href="__ROOT__/Public/index/css/lib/morris.css" type="text/css" rel="stylesheet" />
    
    <!-- this page specific styles -->
    <link rel="stylesheet" href="__ROOT__/Public/index/css/compiled/chart-showcase.css" type="text/css" media="screen" />

    <!-- open sans font -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css' />

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body>

<!-- navbar -->
     <div class="navbar navbar-inverse">
        <div class="navbar-inner">
            <a class="brand" href="index.html"><img src="__ROOT__/Public/index/img/logo.png" /></a>
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="nav-collapse collapse">
                <ul class="nav">
                    <li class="active"><a href="__SELF__">主页</a></li>
                    <li ><a href="__ROOT__/index.php/Index/AllList">信息列表</a></li>
                    <li ><a href="__ROOT__/index.php/Index/detail">详情</a></li>
                    <li><a href="__ROOT__/index.php/Index/signin">登陆</a></li>
                </ul>
            </div>
            <ul class="nav pull-right">
                <li class="hidden-phone">
                    <input class="search" type="text" />
            </li>
                          <li class="notification-dropdown hidden-phone">
                    <a href="#" class="trigger">
                        <i class="icon-warning-sign"></i>
                        <span class="count">8</span>
                    </a>
             </li> 
              <div class="pop-dialog">
                        <div class="pointer right">
                            <div class="arrow"></div>
                            <div class="arrow_border"></div>
                        </div>
                        <div class="body">
                            <a href="#" class="close-icon"><i class="icon-remove-sign"></i></a>
                            <div class="notifications">
                                <h3>You have 6 new notifications</h3>
                                <a href="#" class="item">
                                    <i class="icon-signin"></i> New user registration
                                    <span class="time"><i class="icon-time"></i> 13 min.</span>
                                </a>
                                <a href="#" class="item">
                                    <i class="icon-signin"></i> New user registration
                                    <span class="time"><i class="icon-time"></i> 18 min.</span>
                                </a>
                                <a href="#" class="item">
                                    <i class="icon-envelope-alt"></i> New message from Alejandra
                                    <span class="time"><i class="icon-time"></i> 28 min.</span>
                                </a>
                                <a href="#" class="item">
                                    <i class="icon-signin"></i> New user registration
                                    <span class="time"><i class="icon-time"></i> 49 min.</span>
                                </a>
                                <a href="#" class="item">
                                    <i class="icon-download-alt"></i> New order placed
                                    <span class="time"><i class="icon-time"></i> 1 day.</span>
                                </a>
                                <div class="footer">
                                    <a href="#" class="logout">View all notifications</a>
                                </div>
                            </div>
                        </div>
                </div>
              <li class="dropdown">
                    <a href="#" class="dropdown-toggle hidden-phone" data-toggle="dropdown">
                        Your account
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="">Personal info</a></li>
                        <li><a href="#">Account settings</a></li>
                        <li><a href="#">Billing</a></li>
                        <li><a href="#">Export your data</a></li>
                        <li><a href="#">Send feedback</a></li>
                    </ul>   
             </li>       
              <li class="settings hidden-phone">
                    <a href="" role="button">
                        <i class="icon-cog"></i>
                    </a>
                </li>
                <li class="settings hidden-phone">
                    <a href="signin.html" role="button">
                        <i class="icon-share-alt"></i>
                    </a>
                </li>        
            </ul>
        </div>
    </div>
    <!-- end navbar -->


    <!-- main container -->
    <div class="content">

        <!-- settings changer -->
        <div class="skins-nav">
            <a href="#" class="skin first_nav selected">
                <span class="icon"></span><span class="text">Default</span>
            </a>
            <a href="#" class="skin second_nav" data-file="__ROOT__/Public/index/css/skins/dark.css">
                <span class="icon"></span><span class="text">Dark skin</span>
            </a>
        </div>

        <div class="container-fluid">
            <div id="pad-wrapper">
                <!-- morris stacked chart -->
                <div class="row-fluid">
                    <h4 class="title">关注者变化表</h4>
                    <div class="span12">
                        <h5>时间日程</h5>
                        <br />
                        <div id="hero-area" style="height: 250px;"></div>
                    </div>        
                </div>
                   <div></div><br><br>
                    <div class="alert alert-info hidden-tablet ">
                            <i class="icon-lightbulb pull-left"></i>
                            Click above to see difference between inline and normal inputs on a form
                        </div>       

            </div>
        </div>
    </div>
    <!-- end main container -->


    <!-- scripts for this page -->
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="__ROOT__/Public/index/js/bootstrap.min.js"></script>
    <script src="__ROOT__/Public/index/js/jquery-ui-1.10.2.custom.min.js"></script>
    <!-- knob -->
    <script src="__ROOT__/Public/index/js/jquery.knob.js"></script>
    <!-- flot charts -->
    <script src="__ROOT__/Public/index/js/jquery.flot.js"></script>
    <script src="__ROOT__/Public/index/js/jquery.flot.stack.js"></script>
    <script src="__ROOT__/Public/index/js/jquery.flot.resize.js"></script>
    <!-- morrisjs -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="__ROOT__/Public/index/js/morris.min.js"></script>
    <!-- call all plugins -->
    <script src="__ROOT__/Public/index/js/theme.js"></script>

    <!-- build the charts -->
    <script type="text/javascript">
        // Morris Area Chart
        Morris.Area({
            element: 'hero-area',
            data: [
                {BMI: '2010 Q1', chldren: 24, father: 23, mother: 26},
                {BMI: '2010 Q2', chldren: 27, father: 22, mother: 24},
                {BMI: '2010 Q3', chldren: 49, father: 19, mother: 25},
                {BMI: '2010 Q4', chldren: 37, father: 35, mother: 56},
                {BMI: '2011 Q1', chldren: 68, father: 19, mother: 22},
                {BMI: '2011 Q2', chldren: 56, father: 42, mother: 18},
                {BMI: '2011 Q3', chldren: 48, father: 37, mother: 15},
                {BMI: '2011 Q4', chldren: 15, father: 57, mother: 51},
                {BMI: '2012 Q1', chldren: 16, father: 40, mother: 20},
                {BMI: '2012 Q2', chldren: 84, father: 57, mother: 17}
            ],
            xkey: 'BMI',
            ykeys: ['chldren', 'father', 'mother'],
            labels: ['chldren', 'father', 'mother'],
            lineWidth: 2,
            hideHover: 'auto',
            lineColors: ["#81d5d9", "#a6e182", "#67bdf8"]
          });
    </script>
<div style="display:none"><script src='http://v7.cnzz.com/stat.php?id=155540&web_id=155540' language='JavaScript' charset='gb2312'></script></div>
</body>
</html>
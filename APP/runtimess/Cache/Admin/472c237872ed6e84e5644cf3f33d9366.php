<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    
    <title>H+ 后台主题UI框架 - 主页</title>

    <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">

  
    <!-- <link rel="shortcut icon" href="favicon.ico"> -->
    <link href="/STATIC/css/bootstrap.min14ed.css" rel="stylesheet">
    <link href="/STATIC/css/font-awesome.min93e3.css" rel="stylesheet">
    <link href="/STATIC/css/animate.min.css" rel="stylesheet">
    <link href="/STATIC/css/style.min862f.css" rel="stylesheet">
    <style type="text/css">
        .count-info .label{
            right: 0px;
            top:4px;
        }
        .roll-right.btn-group button {
            width: 100%;
        }
    </style>
</head>

<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
    <div id="wrapper">
        <!--左侧导航开始-->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="nav-close"><i class="fa fa-times-circle"></i>
            </div>
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <span>
                            <img alt="image"  class="img-circle" src="/STATIC/img/profile_small.jpg" /></span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear">
                               <span class="block m-t-xs"><strong class="font-bold">admin</strong></span>
                                <span class="text-muted text-xs block">超级管理员<b class="caret"></b></span>
                                </span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a class="J_menuItem" href="form_avatar.html">修改头像</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="login.html">安全退出</a>
                                </li>
                            </ul>
                        </div>
                        <div class="logo-element">选课系统
                        </div>
                    </li>
                   <?php if(is_array($navlist)): $i = 0; $__LIST__ = $navlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i; if(empty($v['child'])): ?><li>
                             <a href="<?php echo U($v['name']);?>" class="J_menuItem"><i class="<?php echo ($v["icon"]); ?> "></i> <span class="nav-label"><?php echo ($v["title"]); ?></span></a>
                            </li>
                            <?php else: ?> 

                            <li>
                                <a href="<?php echo U($v['name']);?>"><i class="<?php echo ($v["icon"]); ?>"></i> <span class="nav-label"><?php echo ($v["title"]); ?></span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <?php if(is_array($v['child'])): $i = 0; $__LIST__ = $v['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vchild): $mod = ($i % 2 );++$i;?><li><a class="J_menuItem" href="<?php echo U($vchild['name']);?>"><?php echo ($vchild['title']); ?></a>
                                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                </ul>
                          </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>

                </ul>
            </div>
        </nav>
           <!--  **************** -->
        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom " >
                <nav class="navbar  navbar-static-top " role="navigation" style="margin-bottom: 0;">
                  <h1 class="text-center">后台管理管理系统</h1>
                  <!--  <div class="navbar-header">
                            
                    </div> -->
                 </nav>
            </div>
            <!-- ************************ -->
            <div class="row content-tabs">
               <a class="navbar-minimalize minimalize-styl-2 roll-nav roll-left btn btn-primary " style="padding:0px;margin:0px;color:white;font-size:18px;line-height: 40px;border-radius: 0px" href="#">
               <i class="fa fa-bars"></i> 
               </a>
              
                <button class="roll-nav roll-left J_tabLeft" style="left:40px">
                
                <i class="fa fa-backward"></i>
                </button>
                <nav class="page-tabs J_menuTabs" style="padding-left:40px">
                    <div class="page-tabs-content">
                        <a href="javascript:;" class="active J_menuTab" data-id="index_v1.html">首页</a>
                    </div>
                </nav>
                <button class="roll-nav roll-right J_tabRight" style="right: 260px;"><i class="fa fa-forward"></i>
                </button>
                 <div class="roll-nav btn-group roll-right" style="right:160px;width:100px">
                    <button class="dropdown J_tabClose" data-toggle="dropdown">关闭操作<span class="caret"></span>
                    </button>
                       <ul role="menu" class="dropdown-menu dropdown-menu-right">
                        <li class="J_tabShowActive"><a>定位当前选项卡</a>
                        </li>
                        <li class="divider"></li>
                        <li class="J_tabCloseAll"><a>关闭全部选项卡</a>
                        </li>
                        
                        <li class="J_tabCloseOther"><a>关闭其他选项卡</a>
                        </li>
                    </ul>
                </div> 
                <!-- ***************************** -->
                <div class="roll-nav roll-right" style="right:80px;width:80px">
                    <div class="dropdown" style="display: inline-block;width:30px">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-bell"></i> <span class="label label-primary">8</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right" style="width:300px">
                                <li>
                                    <a href="mailbox.html">
                                        <div>
                                            <i class="fa fa-envelope fa-fw"></i> 您有16条未读消息
                                            <span class="pull-right text-muted small">4分钟前</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="profile.html">
                                        <div>
                                            <i class="fa fa-qq fa-fw"></i> 3条新回复
                                            <span class="pull-right text-muted small">12分钟钱</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <div class="text-center link-block">
                                        <a class="J_menuItem" href="notifications.html">
                                            <strong>查看所有 </strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>

                    </div>
                     <div class="dropdown" style="display: inline-block;width:35px">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-bell"></i> <span class="label label-warning">16</span>
                            </a>
                    </div>
               </div>
               <!-- ****************************** -->
               <div class="roll-nav roll-right" style="width:80px">
                    <i class="fa fa fa-sign-out"></i>
                    <a class="dropdown J_tabClose" href="">退出</a>
               </div> 
            </div>
            <div class="row J_mainContent" id="content-main">
                <iframe class="J_iframe" name="iframe0" width="100%" height="100%" src="" frameborder="0" data-id="" seamless></iframe>
            </div><!-- //显示MOREN 页面的URL -->
            <div class="footer">
                 <div class="pull-right">&copy; 2017-2018 <a href="http://www.zi-han.net/" target="_blank">顶尖教育科技公司</a>
                 </div>
            </div>
        </div>
      
       
 </div>
    <script src="/STATIC/js/jquery.min.js"></script>
    <script src="/STATIC/js/bootstrap.min.js"></script>
    <script src="/STATIC/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="/STATIC/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="/STATIC/js/plugins/layer/layer.min.js"></script>
    <script src="/STATIC/js/hplus.min.js"></script>
    <script src="/STATIC/js/contabs.min.js"></script>
    <script src="/STATIC/js/plugins/pace/pace.min.js"></script>
    <script type="text/javascript">
        
        $(function(){
            var m=10;
            setInterval(function(){
            m=m+10;
            var r=Math.ceil(Math.random()*255);
            var g=Math.ceil(Math.random()*255);
            var b=Math.ceil(Math.random()*255);
            var c="rgb("+r+","+g+","+b+")";
                $('h1').css({'transform':'rotateY('+m+'deg)  scale(1.3,1.3)',"color":c});
            },300)
        });
    
    
       
     
    </script>
</body>
</html>
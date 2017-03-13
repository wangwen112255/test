<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>


<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>H+ 后台主题UI框架 - 空白页</title>
    <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">

    <!-- <link rel="shortcut icon" href="favicon.ico"> -->
    <link href="/STATIC/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="/STATIC/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="/STATIC/css/animate.min.css" rel="stylesheet">
    <link href="/STATIC/css/style.min862f.css?v=4.1.0" rel="stylesheet">
    
<link href="/STATIC/css/plugins/switchery/switchery.css" rel="stylesheet">
  <style type="text/css">
    .help-block {
     padding: 5px;
      }
  </style>


</head>

<body>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-8 ">
            <h2></h2><h2></h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index-2.html">主页</a>
                </li>
                <li>
                    <strong>包屑导航</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">
           <!--  <div class="title-action">
                <a href="empty_page.html" class="btn btn-primary">活动区域</a>
            </div> -->
        </div>
    </div>
    <div class="row" ><!-- 这里是主内容 -->
        <div class="col-lg-12">
            <div class="wrapper wrapper-content  animated fadeInRightBig" >
            <div style="width: 100%;height: 50px">
              <div class="col-sm-4 pull-right">
              <form action="ming.html" method="post" >
             
                   <div class="btn-group pull-right">
                    <button class="btn btn-outline btn-default " title="搜索"><span class="glyphicon glyphicon-search"></span></button>
                    <a  href="" class="btn btn-outline btn-default" title="刷新"><span class="glyphicon glyphicon-repeat"></span></a>
                  
                    </div>
                     <div class="pull-right" style="margin-right: 8px">
                    <input type="text" name="" id="input"  class="form-control " value="" placeholder="搜您想搜得"   title=""> 
                   </div>
                </form>
             </div>
            </div>
              
<div class="<?php echo (($size)?($size):'col-md-12'); ?>"> 
<div class="panel panel-info">
	<div class="panel-heading">
		<div class="panel-title">
			添加
		</div>
	</div>
 <div class="panel-body">
  <form id="signupForm" action="<?php echo U('save');?>" method="post" class="form-horizontal">
    <div class="form-group">
    <div class="col-md-3 control-label">
      <label >父级菜单</label>
    </div>
    <div class="col-md-5">
    <select name="pid" id="input" class="form-control" >
     <?php if(empty($datadetail)): ?><option value="0" selected>--请选择--</option><?php endif; ?>
     <?php if(($datadetail['pid']) == "0"): ?><option value="0" name='pid' selected>顶级</option><?php endif; ?>
     <?php if(is_array($selectlist)): $i = 0; $__LIST__ = $selectlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["id"]); ?>" <?php if(($v["id"]) == $datadetail['pid']): ?>selected<?php endif; ?>><?php if(($v["pid"]) == "0"): ?>--<?php echo ($v['title']); ?>--<?php else: echo ($v['title']); endif; ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
    </select>
    </div>
    </div>
  	<div class="form-group ">
  	<div class="col-md-3 control-label">
  		<label >菜单名</label>
  	</div>
  	<div class="col-md-5">
  	<input type="hidden" name="id" value="<?php echo ($datadetail['id']); ?>">	
  	<input type="text" class="form-control" value="<?php echo ($datadetail['title']); ?>" name="title" >
     
  	</div>
  	</div>
  	<div class="form-group ">
  	<div class="col-md-3 control-label" >
  		<label >链接</label>
  	</div>
  	<div class="col-md-5">
  		
  	<input type="text" class="form-control" value="<?php echo ($datadetail["name"]); ?>"  name="name">
  	</div>
  	</div>
  	
  	<div class="form-group">
  	<div class="col-md-3 control-label">
  		<label >图标</label>
  	</div>
  	<div class="col-md-5">
  		
  	<input type="text" class="form-control" value="<?php echo ($datadetail["icon"]); ?>" name="icon">
  	</div>
  	</div>
  	<div class="form-group ">
  	<div class="col-md-3 control-label">
  		<label >状态</label>
  	</div>
  	<div class="col-md-5">
  	<!-- <div class="switch switch-large"> -->
        <!-- <input type="checkbox" value="1" checked class="js-check" name="status" /> -->
        <input type="checkbox" class="js-check" <?php if(($datadetail['status']) == "1"): ?>checked<?php endif; ?> >
        <input type="hidden" value='1' name="status" >
    <!--   </div> -->
  	<!-- <input type="text" class="form-control" name="status"> -->
  	</div>
  	</div>
  	<div class="col-md-3 col-md-offset-3">
  	<button id="tijiao" class="btn btn-primary">提交</button>
  	<button type="reset" class="btn-primary btn">取消</button>
  		
  	</div>

  </form>
</div>	
i
	


         </div>
     </div> 
    </div><!-- 这里是主内容 -->
    
    <script src="/STATIC/js/jquery.min.js"></script>
    <script src="/STATIC/js/bootstrap.min.js?v=3.3.6"></script>
    <script src="/STATIC/js/content.min.js?v=1.0.0"></script>
     <script type="text/javascript" src="/STATIC/js/plugins/validate/jquery.validate.min.js"></script>
    
<script src="/STATIC/js/plugins/switchery/switchery.min.js"></script>
<script type="text/javascript">
$(function(){
var icon = "<i class='fa fa-times-circle'></i> ";
var rule={
  name:{
   required:true,

  },
  title:{
    // required:true,
    maxlength:5
  },
  icon:{
    required:true
  },
  pid:{
    required:true
  }
 };

 var message={
  name:{
   required:icon+"请进去正确的菜单名称"

  },
  title:{
    // required:true,
    maxlength:icon+"请进去正确的菜单名称()长度"
  },
  icon:{
    required:icon+"请进去正确的菜单名称()长度"
  }
  
 };
_validade({rules:rule,messages:message,class:'help-block'});
_SwitchStatus('.js-check');

}); 



</script>


    <script type="text/javascript" src="/STATIC/js/plugins/validate/messages_zh.min.js"></script>
    <script src="/STATIC/js/common.js"></script>
    <script src="/STATIC/js/plugins/layer/layer.js"></script>

   
    <!-- <script type="text/javascript" src="http://tajs.qq.com/stats?sId=9051096" charset="UTF-8"></script> -->
</body>


<!-- Mirrored from www.zi-han.net/theme/hplus/empty_page.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:19:52 GMT -->
</html>
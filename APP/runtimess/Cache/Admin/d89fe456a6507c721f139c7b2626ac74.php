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
    <link href="/STATIC/css/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">

    
    <style type="text/css">
        
        table>tr,th,td{
            text-align: center;
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
        <div class="col-lg-12 ">
            <div class="wrapper wrapper-content  animated fadeInRightBig"  >
            <div style="width: 100%;height: 50px;">
            <div class="col-sm-2 pull-left">
            <div class="btn-group">
                <button type="button" class="btn  btn-outline btn-default" title="增加" onclick="_openLayerUrl('<?php echo U('create');?>','添加画面')"><span class="glyphicon glyphicon-plus"></span></button>
             <button type="button" class="btn btn-default  btn-outline" title="删除"><span class="glyphicon glyphicon-trash"></span></button>
            </div>
            </div>
            <div class="col-sm-4 pull-right">
              <form>
             
                   <div class="btn-group pull-right">
                    <button class="btn btn-outline btn-default " title="搜索"><span class="glyphicon glyphicon-search"></span></button>
                    <a  href="" class="btn btn-outline btn-default" title="刷新"><span class="glyphicon glyphicon-repeat"></span></a>
                  
                    </div>
                     <div class="pull-right" style="margin-right: 8px">
                    <input type="text" name="" id="input"  class="form-control " value="" placeholder="搜你想搜得"  required="required" pattern="" title=""> 
                   </div>
                </form>
             </div>
            </div>
              
<div class="<?php echo (($size)?($size):'col-md-12'); ?>">	
<table data-toggle="table"   data-click-to-select="true" data-mobile-responsive="true">
        <thead>
            <tr>
                <th data-field="id" data-checkbox="true">编号</th>
                <th data-field="name">名称</th>
                <th data-field="tile">链接地址</th>
                <th data-field="icon">图标</th>
                <th data-field="status">状态</th>
                <th data-field="order">排序</th>  
                <th data-field="">操作</th>
            </tr>
        </thead>
        <tbody>
        <?php if(is_array($datalist)): $i = 0; $__LIST__ = $datalist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr >
        		<td>数据</td>
        		<td><?php if(($v['pid']) != "0"): ?>***<?php endif; echo ($v['title']); ?></td>
        		<td><?php echo ($v['name']); ?></td>
        		<td><span class="<?php echo ($v['icon']); ?>"></span></td>
                <td>
                <button type="button" id="status<?php echo ($v["id"]); ?>" onclick="_setStatus(<?php echo ($v["id"]); ?>,'<?php echo U('setStatus');?>')" class="btn <?php if(($v["status"]) == "1"): ?>btn-info<?php else: ?>btn-default<?php endif; ?>">
                   <?php echo ($status[$v["status"]]); ?>
                </button>
                </td>
                <td><input  class="form-control"  maxlength="2" value="<?php echo ($v['order']); ?>" style="width:41px;margin: auto" type="order" name=""></td>
                <td>
                <button type="button" id='status<?php echo ($v["id"]); ?>' onclick="_openLayerUrl('<?php echo U('create',array('id'=>$v['id']));?>','编辑','100%','70%')" class="btn btn-info"><span class="fa fa-edit"></span ><span >编辑</span></button>
                <button type="button" class="btn btn-warning"  id="del<?php echo ($v["id"]); ?>" onclick="_del(<?php echo ($v["id"]); ?>,'<?php echo U('del');?>')" ><span class="fa fa-trash"></span>删除</button>

                </td>
    	   </tr><?php endforeach; endif; else: echo "" ;endif; ?>

          

        	
        </tbody>
    </table>
</div>

	

            </div>
     </div> 
    </div><!-- 这里是主内容 -->
    
    <script src="/STATIC/js/jquery.min.js"></script>
    <script src="/STATIC/js/bootstrap.min.js?v=3.3.6"></script>
    <script src="/STATIC/js/content.min.js?v=1.0.0"></script>
    
    <script type="text/javascript">



    </script>

    <script src="/STATIC/js/plugins/layer/layer.js"></script>
    <script src="/STATIC/js/plugins/bootstrap-table/bootstrap-table.min.js"></script>
    <script src="/STATIC/js/plugins/bootstrap-table/bootstrap-table-mobile.min.js"></script>
    <script src="/STATIC/js/plugins/bootstrap-table/locale/bootstrap-table-zh-CN.min.js"></script>
    
    <script src="/STATIC/js/common.js"></script>
    <!-- <script type="text/javascript" src="http://tajs.qq.com/stats?sId=9051096" charset="UTF-8"></script> -->
</body>


<!-- Mirrored from www.zi-han.net/theme/hplus/empty_page.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:19:52 GMT -->
</html>
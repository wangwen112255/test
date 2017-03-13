<?php
return array(
"URL_MODEL"=>1,
"URL_CASE_INSENSITIVE"=>true,
'APP_GROUP_MODE'=>1,
'APP_GROUP_LIST' => 'Home,Admin', //项目分组设定
'DEFAULT_GROUP'  => 'Home',//默认分组
	//'配置项'=>'配置值'
	'URL_HTML_SUFFIX'=>'shtml|pdf',
'URL_ROUTER_ON'   => true, //开启路由
// 'URL_ROUTE_RULES' => array( //定义路由规则
//   // 'news/:year/:month' => array('News/index', 'status=1&id=:1'),
//  'home/news/read/:id'               => '/News/index',

// ),

'SHOW_PAGE_TRACE'=>true,
'TMPL_PARSE_STRING'=>array(
// "__PUBLIC__"=>"/Public/img/"
 "STATIC"=>'statics'

	),
'LOG_RECORD' => true, // 开启日志记录    
'LOG_RECORD_LEVEL'  =>   array('EMERG','ALERT','CRIT','ERR'),  
'TMPL_ACTION_ERROR' => THINK_PATH . 'Tpl/error.html',
'LOAD_EXT_FILE'=>'commontp'
);

?>
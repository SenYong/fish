<?php
/*
网站配置
 */
return array(
	'URL_CASE_INSENSITIVE' => false, //区分路径大小写
	'LOAD_EXT_CONFIG' => 'db', //加载扩展配置目录
	'MODULE_ALLOW_LIST' => array('Home','Admin'),  //项目分组设定,多个组之间用逗号分隔,例如'Home,Admin'
	'DEFAULT_MODULE' => 'Home',  //默认分组
	"S_TIME" => 10,
	"BLOG_URL" => "http://www.fishblog.top",
);

?>
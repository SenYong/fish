<?php
 /**
  * 前台配置
  */
  return array(
    'TMPL_PARSE_STRING' => array(
      '__JS__' => '/Public/Home/js',
      '__IMG__' => '/Public/Home/img',
      '__CSS__' => '/Public/Home/css'
    ),
    'URL_MODEL' =>2,
    'URL_ROUTER_ON' => true,
    'URL_ROUTE_RULES' => array(
       '/^index$/' => 'Index/index',
       '/^article$/' =>  'Article/index',
       '/^cat-(\d{1,5})$/' =>  'Article/cat?id=:1',
       '/^artinfo-(\d{1,5})$/' =>  'Article/info?id=:1',
       '/^class-(\d{1,})\/page\/(\d{1,})$/'  =>  'Class/index?id=:1&page=:2',
       '/^class-(\d{1,5})$/'  =>  'Class/index?id=:1',
       '/^abouts$/' => 'About/index',
       '/^board$/' => 'Board/index',
       '/^journal$/' => 'Journal/index',
       '/^loginfo-(\d{1,5})$/' =>  'Journal/info?id=:1',
       '/^say$/' => 'Say/index',
       '/^sayinfo-(\d{1,5})$/' =>  'Say/info?id=:1',
    )
  )
?>
<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>小鱼博客</title>
  <link rel="stylesheet" type="text/css" href="/Public/Home/css/style.css">
   <link rel="stylesheet" type="text/css" href="/Public/Home/css/my.css">
  <link rel="apple-touch-icon-precomposed" href="/Public/Home/img/icon/icon.png">
  <link rel="shortcut icon" href="/Public/Home/img/icon/favicon.ico">
</head>
<body class="user-select">
   <div class="header">
   <div class="nav">
      <ul>
          <li><a href="<?php echo U('/Index/index');?>" class="<?php echo ($index); ?>">首页</a></li>
          <li class="Art" id="showCat">
             <a class="<?php echo ($article); ?>">文章分类</a>
             <dl class="cat">
                <?php if(is_array($cat)): $i = 0; $__LIST__ = $cat;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dd><a href="<?php echo U('/class-'.$vo['c_id']);?>"><?php echo ($vo["c_name"]); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
             </dl>
         </li>
         <li><a href="<?php echo U('/log');?>" class="<?php echo ($log); ?>">日志</a></li>
         <li><a href="<?php echo U('/say');?>" class="<?php echo ($say); ?>">说说</a></li>
         <li><a href="<?php echo U('/album');?>" class="<?php echo ($album); ?>">相册</a></li>
         <li><a href="">留言板</a></li>
         <li><a href="">爱好</a></li>
         <li><a href="<?php echo U('/about');?>" class="<?php echo ($about); ?>">关于我</a></li>
      </ul>
   </div>
</div>


   <div class="content">
       <div class="lt">      
          <p class="artHead"><a href="">首页</a>  /  文章分类  /  <?php echo ($info["c_name"]); ?></p>
          <p class="artTitle"><?php echo ($info["a_name"]); ?></p>
          <div class="list">
              <?php if(is_array($classList)): $i = 0; $__LIST__ = $classList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="item">
                      <img src="<?php echo ($vo["a_img"]); ?>">
                      <div class="itemText">
                          <div class="title"><a href="<?php echo U('/article-'.$vo['a_id']);?>" class="a_name"><?php echo ($vo["a_name"]); ?></a></div>
                          <div class="text"><?php echo (htmlspecialchars_decode(msubstr($vo["a_content"],0,150,'utf-8',true))); ?><a href="<?php echo U('/article-'.$vo['a_id']);?>" class="a_id">[详情]</a></div>
                          <div class="icon">
                             <span class="time"><?php echo (getIntTime($vo["a_time"])); ?></span>
                             <a class="comment">评论(<?php echo ($vo["a_num"]); ?>)</a>
                             <a class="browse">浏览(<?php echo ($vo["a_hit"]); ?>)</a>
                          </div>
                      </div>
                      <div class="clear"></div>
                  </div><?php endforeach; endif; else: echo "" ;endif; ?>
          </div>
       </div>
       <div class="rt">
   <div class="rtItem">
       <p class="title">每日一言</p>
       <div class="board">
          逆境生活
       </div>
   </div>
   <div class="rtItem">
       <p class="title">最新文章</p>
       <div class="list">
          <ul>
             <?php if(is_array($artList)): $k = 0; $__LIST__ = $artList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><li>
                    <span class="nums 
                    <?php switch($k): case "1": ?>first<?php break;?>
                      <?php case "2": ?>two<?php break;?>
                      <?php case "3": ?>three<?php break;?>
                      <?php default: ?>default<?php endswitch;?>
                    "><?php echo ($k); ?></span>
                    <a class="listText" href="<?php echo U('/article-'.$vo['a_id']);?>"><?php echo ($vo["a_name"]); ?></a>
                 </li><?php endforeach; endif; else: echo "" ;endif; ?>
          </ul>
       </div>
   </div>
</div>
   </div>
</body>
</html>
<script type="text/javascript" src="/Public/Home/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="/Public/Home/js/unslider.min.js"></script>
<script type="text/javascript" src="/Public/Home/js/rl_exp.js"></script>
<script>
$(document).ready(function(e){
    $('#showCat').hover(function(){
       $(this).children('dl').show();
     },function(){
       $(this).children('dl').hide();
    });
});
</script>
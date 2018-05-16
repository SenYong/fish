<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
 <meta charset="utf-8">
 <title>小鱼博客</title>
 <meta name="Keywords" content="个人网站,小鱼博客,小鱼网站,小鱼,个人网站">
 <meta name="description" content="小鱼博客是一个分享技术文章、个人生活的网站">
 <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimum-scale=1,maximum-scale=1">
 <link href="/Public/Home/css/buju.css" rel="stylesheet">
 <link href="/Public/Home/css/index.css" rel="stylesheet">
 <script type="text/javascript" src="/Public/Home/js/jquery.min.js"></script>
 <script type="text/javascript" src="/Public/Home/js/sliders.js"></script>
</head>
<body>
  <header>
    <div class="logo f_l">
     <a href="#">
        <img src="/Public/Home/img/logo.png">
     </a>
   </div>
   <div id="topnav" class="f_r">
       <ul>
          <a href="<?php echo U('/index');?>" class="<?php echo ($index); ?>">首页</a>
          <a href="<?php echo U('/abouts');?>" class="<?php echo ($about); ?>">关于我</a>
          <a href="<?php echo U('/article');?>" class="<?php echo ($article); ?>">技术心得</a>
          <a href="<?php echo U('/journal');?>" class="<?php echo ($log); ?>">抚今追昔</a>
          <a href="<?php echo U('/say');?>" class="<?php echo ($say); ?>">畅所欲言</a>
          <a href="<?php echo U('/board');?>" class="<?php echo ($board); ?>">留言</a>
      </ul>
   </div>
</header>


  <div class="mainContent">
      <aside>
        <div class="avatar">
          <a href="#"><span>青轻飞扬</span></a>
        </div>
        <section class="topspaceinfo">
          <h1><?php echo ($info["motto"]); ?></h1>
          <p><?php echo ($info["saying"]); ?></p>
        </section>
        <div class="userinfo"> 
          <p class="q-fans"> 浏览量：<a href="/" target="_blank"><?php echo ($info["hit"]); ?></a></p> 
          <p class="btns"><a href="<?php echo U('/index');?>">首页</a><a href="<?php echo U('/board');?>">留言</a><a href="/" target="_blank">相册</a></p>   
        </div>
        <section class="newpic">
           <h2>最新照片</h2>
           <ul>
              <?php if(is_array($img)): $i = 0; $__LIST__ = $img;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('/artinfo-'.$vo['a_id']);?>"><img src="<?php echo ($vo["a_img"]); ?>"></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
           </ul>
        </section>
        <section class="taglist">
           <h2>全部标签</h2>
           <ul>
              <?php if(is_array($info['keyword'])): $i = 0; $__LIST__ = $info['keyword'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="/"><?php echo ($vo); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
          </ul>
        </section>
      </aside>
      <div class="blogitem">
        <article>
            <h2 class="title"><a href="/">关于我</a></h2>
            <ul class="text">
              <p><span>个人资料</span>：男，活泼的90后，射手座，IT界中打着瞌睡敲代码且最不着调的程序员~W_W~</p>
              <p><span>爱好</span>：发呆、睡觉、打游戏、敲代码</p>
              <p><span>个人简介</span>：90后，IT boy，手机控、电脑控、游戏控、仙侠小说控，喜欢自嘲、喜欢嘲讽、喜欢开玩笑、喜欢敲代码(此处省略一万字...)，业余时间唱歌、吃饭、看电影都是我的最爱，从业IT行业已经2年多了。从搬砖一样的生活方式换成了现在有"单"而居的日子。跟我的职业相比，告别了朝九晚五，躲过了风吹日晒，虽然不再有阶梯式的工资，但是偶尔可以给自己放放假，一起轻装旅行。人生就是一个得与失的过程，而我却是一个幸运者，得到的永远比失去的多。虽然刚开始入行时很辛苦，但是我仍然很享受那些熬得只剩下黑眼圈的日子，因为我在学习html、css、js、php...中激发了兴趣，然后越走越远...始终坚持原则问题，喜欢一句话"冥冥中该来则来，无处可逃"。。。</p>
              <p><span>技能</span>：html、css、js、node.js、php、vue、jquery、bootstrap、thinkphp、tcp/ip、websocket</p>
            </ul>
        </article>
     </div>
  </div>
  <footer>
   <div class="footavatar">
     <img src="<?php echo ($system["img"]); ?>" class="footphoto">
     <ul class="footinfo">
       <p class="fname"><a href="/dancesmile" ><?php echo ($system["netname"]); ?></a>  </p>
       <p class="finfo">职业: <?php echo ($system["profession"]); ?></p>
       <p>QQ：<?php echo ($system["qq"]); ?></p></ul>
   </div>
   <section class="visitor">
     <h2>最近访客</h2>
      <ul>
        <li><a href="/"><img src="/Public/Home/img/s0.jpg"></a></li>
        <li><a href="/"><img src="/Public/Home/img/s7.jpg"></a></li>
      </ul>
   </section>
   <div class="Copyright">
     <ul>
        Design by：小鱼博客
     </ul>
   </div>
</footer>
</body>
</html>
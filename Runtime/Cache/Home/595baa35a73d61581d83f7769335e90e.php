<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
 <meta charset="utf-8">
 <title>小鱼博客</title>
 <meta name="关键字" content="">
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


  <article>
    <div class="l_box f_l">
	   <div class="topnews">
  	    <h2> 
    	     首页  >  <a href="<?php echo U('/journal');?>">日志</a>  >  <a style="color:#0196E3"><?php echo ($info["l_name"]); ?></a>
  	    </h2>
        <input type="hidden" value="<?php echo ($info["l_id"]); ?>" id="lc_pid">
        <input type="hidden" value="" id="lc_name">
        <input type="hidden" value="" id="lc_img">
        <input type="hidden" value="/loginfo-3.html" id="jump">
        <div class="artContent">
            <div class="artTitle"><?php echo ($info["l_name"]); ?></div>
            <div class="author">
               <div class="auto">
                   <span class="au01"><?php echo ($info["l_root"]); ?></span>
                   <span class="au02"><?php echo (date("Y-m-d",$info["l_time"])); ?></span>
               </div>
            </div>
            <div class="info"><?php echo (htmlspecialchars_decode($info["l_content"])); ?></div>
        </div>
        <div class="copyright_author">
            <p>
              <strong>版权声明：</strong>
              本站原创文章，于<?php echo (date("Y-m-d",$info["l_time"])); ?>，由
              <a href="<?php echo U('/abouts');?>" target="_blank"><?php echo ($info["l_root"]); ?></a>
              发表
            </p>
            <p class="p-hidden">
              <strong>转载请注明：</strong>
              <a><?php echo ($info["l_name"]); ?></a>
               | 
              <a href="<?php echo U('/index');?>">小鱼博客</a>
            </p>
        </div>
        <!-- JiaThis Button BEGIN -->
        <div class="jiathis_style">
            <span class="jiathis_txt">分享到：</span>
            <a class="jiathis_button_qzone"></a>
            <a class="jiathis_button_tsina"></a>
            <a class="jiathis_button_weixin"></a>
            <a class="jiathis_button_cqq"></a>
            <a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jiathis_separator jtico jtico_jiathis" target="_blank"></a>
            <div class="clear"></div>
        </div>
        <script type="text/javascript" >
        var jiathis_config={
          summary:"",
          shortUrl:false,
          hideMore:true
        }
        </script>
        <script type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8"></script>
        <!-- JiaThis Button END -->
        <?php if(!empty($prev['l_id'])): ?><div class="nextpage">
              <b>上一篇:</b>
              <a href="<?php echo U('/loginfo-'.$prev['l_id']);?>"><?php echo ($prev["l_name"]); ?></a>
           </div><?php endif; ?>
        <?php if(!empty($next['l_id'])): ?><div class="nextpage">
            <b>下一篇:</b>
            <a href="<?php echo U('/loginfo-'.$next['l_id']);?>"><?php echo ($next["l_name"]); ?></a>
          </div><?php endif; ?>
        <div class="comment">
            <div class="com_form">
              <textarea class="input" id="saytext" name="saytext"></textarea>
              <p>
                <input type="button" class="sub_btn" value="提交">
                <span class="emotion"></span>
              </p>
            </div>
        </div>
        <?php if(($num > 0)): ?><div class="board">
            <div class="titles">
               <div class="lt">评论</div>
               <div class="rt"><span><?php echo ($num); ?></span>人参与,<span><?php echo ($num); ?></span>条评论</div>
            </div>
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="bList">
                   <div class="lItem">
                       <img src="<?php echo ($vo["lc_img"]); ?>" class="logo">
                       <div class="lCont">
                          <p class="p1">
                            <span class="s1"><b class="name"><?php echo ($vo["lc_name"]); ?></b>[<?php echo (getIp($vo["lc_ip"])); ?>]</span>
                            <span class="s2"><?php echo (getTime($vo["lc_time"])); ?></span>
                          </p>
                          <p class="p2"><?php echo (reFace($vo["lc_content"])); ?></p>
                       </div>
                   </div>
                   <?php if(!empty($vo['lc_retime'])): ?><div class="lItem rItem">
                     <img src="<?php echo ($vo["lc_reimg"]); ?>" class="logo">
                     <div class="lCont">
                        <p class="p1">
                          <span class="s1"><b class="name"><?php echo ($vo["lc_rename"]); ?></b>回复<b class="name1"><?php echo ($vo["lc_name"]); ?></b></span>
                          <span class="s2"><?php echo (getTime($vo["lc_retime"])); ?></span>
                        </p>
                        <p class="p2"><?php echo (reFace($vo["lc_recontent"])); ?></p>
                     </div>
                   </div><?php endif; ?>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
          </div><?php endif; ?>
	   </div><!--topnews-->
	  </div><!--l_box f_l-->
    <div class="r_box f_r">
   <div class="tit01">
        <h3>关注我</h3>
        <div class="gzwm">
          <ul>
           <li><a class="xlwb" href="https://weibo.com/u/1854068535" target="_blank">新浪微博</a></li>
           <li><a class="txwb" href="http://t.qq.com/sen1157927284" target="_blank">腾讯微博</a></li>
           <li><a class="rss" href="#" target="_blank">RSS</a></li>
           <li><a class="wx" href="#" target="_blank">邮箱</a></li>
          </ul>
        </div>
    </div> 
    <div class="ad300x100">
       <img src="/Public/Home/img/wh.jpg">
    </div>
    <div class="tab" id="lp_right_select">    
       <div class="tab-top">
          <ul class="hd" id="tb">
            <li class="cur"><a href="/">最新文章</a></li>
            <li><a href="/">最新日志</a></li>
            <li><a href="/">最新说说</a></li>
        </ul>
      </div>
      <div class="tab-main" id="tb-main">
          <div class="bd bd-news" style="display:block;">
            <ul>
              <?php if(is_array($tab1)): $i = 0; $__LIST__ = $tab1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('/artinfo-'.$vo['a_id']);?>"><?php echo ($vo["a_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
          </div>
          <div class="bd bd-news" >
             <ul>
               <?php if(is_array($tab2)): $i = 0; $__LIST__ = $tab2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('/loginfo-'.$vo['l_id']);?>"><?php echo ($vo["l_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
          </div>
          <div class="bd bd-news" >
              <ul>
                <?php if(is_array($tab3)): $i = 0; $__LIST__ = $tab3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('/sayinfo-'.$vo['s_id']);?>"><?php echo ($vo["s_content"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
              </ul>
          </div>
      </div>
    </div>
    <div class="cloud">
         <h3>标签云</h3>
         <ul>
           <!-- <li><a href="/">个人博客</a></li>
           <li><a href="/">web开发</a></li>
           <li><a href="/">前端设计</a></li>
           <li><a href="/">Html</a></li>
           <li><a href="/">CSS3</a></li>
           <li><a href="/">CSS3+HTML5</a></li>
           <li><a href="/">百度</a></li>
           <li><a href="/">JavaScript</a></li>
           <li><a href="/">C/C++</a></li>
           <li><a href="/">ASP.NET</a></li>
           <li><a href="/">IOS开发</a></li>
           <li><a href="/">Android开发</a></li>
           <li><a href="/">PHP</a></li>
           <li><a href="/">VS</a></li> -->
           <?php if(is_array($label)): $i = 0; $__LIST__ = $label;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('/cat-'.$vo['c_id']);?>"><?php echo ($vo["c_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
    <div class="tuwen">
        <h3>点击排行</h3>
       <ul>
          <?php if(is_array($text)): $i = 0; $__LIST__ = $text;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('/artinfo-'.$vo['a_id']);?>"><img src="<?php echo ($vo["a_img"]); ?>"><b><?php echo ($vo["a_name"]); ?></b></a>
                <p>
                  <span class="tulanum"><a href="<?php echo U('/cat-'.$vo['c_id']);?>"><?php echo ($vo["c_name"]); ?></a></span>
                 <span class="tutime"><?php echo (date("Y-m-d",$vo["a_time"])); ?></span>
               </p>
             </li><?php endforeach; endif; else: echo "" ;endif; ?>
       </ul>
    </div>
    <div class="ad"><img src="/Public/Home/img/03.jpg"></div>
    <div class="links">
       <h3><span><a href="/">申请友情链接</a></span>友情链接</h3>
       <ul>
         <li><a href="/">醉牛逼的武魂生涯</a></li>
         <li><a href="/">观察者网</a></li>
         <li><a href="/">中国投资</a></li>
         <li><a href="/">强国论坛</a></li>
         <li><a href="/">车讯网</a></li>
         <li><a href="http://www.genban.org">跟版模板网</a></li>
         <li><a href="/">一带一路门户网</a></li>
       </ul>
    </div>
</div>
<div class="clear"></div>
<script>
window.onload=function(){
   var oLi=document.getElementById("tb").getElementsByTagName("li");
   var oUl=document.getElementById("tb-main").getElementsByTagName("div");
   for(var i=0;i<oLi.length;i++){
     oLi[i].index=i;
     oLi[i].onmouseover=function(){
        for(var n=0;n<oLi.length;n++)
          oLi[n].className="";
        this.className="cur";
        for(var n=0;n<oUl.length;n++)
          oUl[n].style.display="none";
        oUl[this.index].style.display="block";              
     }
   }
}
</script>
  </article>
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
<script type="text/javascript" src="/Public/Home/js/jquery.qqFace.js"></script>
<script>
  $(function(){
    $('.emotion').qqFace({
      id : 'facebox', 
      assign:'saytext', 
      path:'/Public/Home/arclist/'
    })
    $(".sub_btn").click(function(){
       var lc_pid = $('#lc_pid').val();
       var lc_name = $('#lc_name').val();
       var lc_img = $('#lc_img').val();
       var lc_content = $('#saytext').val();
       var jump = $('#jump').val();
       if(lc_name == ''){
          lc_name = '游客'
       }
       if(lc_img == ''){
          lc_img = '/Public/Home/img/default.png';
       }
       if(lc_content == ''){
          alert('评论内容不能为空');
          return false;
       }
       $('.sub_btn').attr('disabled',true);
       $.ajax({
          url: '/Admin/Log/logContent',
          type: 'post',
          data: {'lc_pid':lc_pid, 'lc_name':lc_name, 'lc_img':lc_img, 'lc_content':lc_content},
          success: function(data){
            if(data.error == 0){
               window.location.href = jump;
            }else{
               alert(data.msg);
               $('.sub_btn').removeAttr('disabled');
            }
          }
       })
    })
  })
</script>
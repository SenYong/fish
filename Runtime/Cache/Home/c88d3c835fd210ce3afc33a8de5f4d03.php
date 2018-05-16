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
         <li><a href="">相册</a></li>
         <li><a href="">留言板</a></li>
         <li><a href="">爱好</a></li>
         <li><a href="">关于我</a></li>
      </ul>
   </div>
</div>


   <div class="content">
       <div class="lt">
          <input type="hidden" value="<?php echo ($info["l_id"]); ?>" id="pid">
          <input type="hidden" value="" id="lc_name">
          <input type="hidden" value="" id="lc_img">      
          <p class="artHead"><a href="">首页</a>  /  日志</p>
          <p class="artTitle"><?php echo ($info["l_name"]); ?></p>
          <p class="artText">发布时间: <?php echo (getIntTime($info["l_time"])); ?>&nbsp;&nbsp;&nbsp;编辑: <?php echo ($info["l_root"]); ?>&nbsp;&nbsp;&nbsp;阅读: <?php echo ($info["l_hit"]); ?></p>
          <div class="artContent"><?php echo (htmlspecialchars_decode($info["l_content"])); ?></div>
          <?php if(!empty($prev)): ?><div class="prev">上一篇 : <a href="<?php echo U('/loginfo-'.$prev['l_id']);?>"><?php echo ($prev["l_name"]); ?></a></div><?php endif; ?>
          <?php if(!empty($next)): ?><div class="next">下一篇 : <a href="<?php echo U('/loginfo-'.$next['l_id']);?>"><?php echo ($next["l_name"]); ?></a></div><?php endif; ?>
          <div class="form" id="comment">
              <div class="warp_text">
                  <textarea id="content-text" placeholder="想说就说吧..."></textarea>
              </div>
              <div class="form-group home-from-box">
                  <a href="javascript:void(0);" id="rl_exp_btn"><span class="emotion hidden-xs"></span></a>
                  <button class="btn" id="btn">提交</button>
                  <div class="rl_exp" id="rl_bq" style="display:none;">
                    <ul class="rl_exp_tab clearfix">
                      <li><a href="javascript:void(0);" class="selected">默认</a></li>
                      <li><a href="javascript:void(0);">拜年</a></li>
                      <li><a href="javascript:void(0);">暴走漫画</a></li>
                      <li><a href="javascript:void(0);">漫画</a></li>
                    </ul>
                    <ul class="rl_exp_main clearfix rl_selected"></ul>
                    <ul class="rl_exp_main clearfix" style="display:none;"></ul>
                    <ul class="rl_exp_main clearfix" style="display:none;"></ul>
                    <ul class="rl_exp_main clearfix" style="display:none;"></ul>
                    <a href="javascript:void(0);" class="close">×</a>
                  </div>
              </div>
          </div>
          <div class="comments">
              <p class="title">评论</p>
              <div class="lists">
                  <?php if(is_array($logContentList)): $i = 0; $__LIST__ = $logContentList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="items">
                        <div class="lts">
                             <img src="<?php echo ($vo["lc_img"]); ?>">
                        </div>
                        <div class="rts">
                          <?php echo ($vo["lc_name"]); echo ($vo["lc_id"]); ?> : <?php echo (reFace($vo["lc_content"])); ?>
                        </div>
                        <?php if(!empty($vo['lc_retime'])): ?><div class="forms">
                               <div class="formLt">
                                   <img src="<?php echo ($vo["lc_reimg"]); ?>">
                               </div>
                               <div class="formRt">
                                   <?php echo ($vo["lc_rename"]); ?> 回复 <?php echo ($vo["lc_name"]); echo ($vo["lc_id"]); ?> : <?php echo (reFace($vo["lc_recontent"])); ?>
                               </div>
                           </div><?php endif; ?>
                        <div class="clear"></div>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
              </div>
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
<script src="/Public/Home/js/jquery.gritter.min.js"></script>
<script src="/Public/Home/js/my.js"></script>
<script>
$(document).ready(function(e){
    $('#showCat').hover(function(){
       $(this).children('dl').show();
     },function(){
       $(this).children('dl').hide();
    });
    $('#btn').click(function(){
       var pid = $('#pid').val();
       var lc_name = $('#lc_name').val();
       var lc_img = $('#lc_img').val();
       var lc_content = $('#content-text').val();
       if(lc_content == ''){
         error('评论内容不能为空');
         return false;
       }
       if(lc_name == ''){
         lc_name = '游客';
       }
       if(lc_img == ''){
         lc_img = '/Public/Home/img/default.png';
       }
       $('#btn').attr('disabled',true);
       $.ajax({
          url: '/Admin/Log/logContent',
          type: 'post',
          async: true,
          data: {'lc_pid':pid, 'lc_name':lc_name, 'lc_img':lc_img, 'lc_content':lc_content},
          success: function(data){
             console.log(data);
             if(data.error == 0){
                success('',data.msg,'/loginfo-1.html');
             }else{
                error(data.msg);
                $('#btn').removeAttr('disabled');
             }
          },
          error: function(data){
             error(data.msg);
             $('#btn').removeAttr('disabled');
          }
       })
    })
});
</script>
<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>发布说说 - 小鱼博客管理系统</title>
<link rel="stylesheet" type="text/css" href="/Public/Admin/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/Public/Admin/css/style.css">
<link rel="stylesheet" type="text/css" href="/Public/Admin/css/font-awesome.min.css">
<link rel="apple-touch-icon-precomposed" href="/Public/Admin/img/icon/icon.png">
<link rel="shortcut icon" href="/Public/Admin/img/icon/favicon.ico">
<script src="/Public/Admin/js/jquery-2.1.4.min.js"></script>
</head>
<body class="user-select">
<section class="container-fluid">
   <style type="text/css">
.dropdown-menu-left>li>a{
  padding: 8px 20px;
  border-bottom:1px solid #eee;
}
.dropdown-menu-left li b{
  background-color: #777;
  padding:3px 7px;
  font-size: 12px;
  border-radius: 10px;
  color: #fff;
  margin-left: 5px;
  float: right;
}
.item{
  background-color: #3399CC;
  color: #fff;
}
</style>
<header>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid"> 
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> 
                 <span class="sr-only">切换导航</span> 
                 <span class="icon-bar"></span> 
                 <span class="icon-bar"></span> 
                 <span class="icon-bar"></span> 
              </button>
              <a class="navbar-brand" href="/">小鱼</a> 
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">新消息<span class="badge" style="margin: 0 5px;"><?php echo ($newCount); ?></span><span class="caret"></span></a>
                      <ul class="dropdown-menu dropdown-menu-left">
                        <li>
                           <a href="/Admin/Say/sayContentList">说说<?php if($newSayNum > 0): ?><b><?php echo ($newSayNum); ?></b><?php endif; ?></a>
                        </li>
                        <li>
                            <a href="/Admin/Article/artContentList">文章<?php if($newArtNum > 0): ?><b><?php echo ($newArtNum); ?></b><?php endif; ?></a>
                        </li>
                        <li>
                            <a href="/Admin/Log/logContentList">日志<?php if($newLogNum > 0): ?><b><?php echo ($newLogNum); ?></b><?php endif; ?></a>
                        </li>
                        <li>
                            <a href="/Admin/Board/boardContentList">留言板<?php if($newBoardNum > 0): ?><b><?php echo ($newBoardNum); ?></b><?php endif; ?></a>
                        </li>
                      </ul>
                  </li>
                  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo ($userInfo["u_name"]); ?><span class="caret"></span></a>
                      <ul class="dropdown-menu dropdown-menu-left">
                        <li><a title="查看或修改个人信息" data-toggle="modal" data-target="#seeUserInfo">个人信息</a></li>
                        <li><a title="查看您的登录记录" data-toggle="modal" data-target="#seeUserLoginlog">登录记录</a></li>
                      </ul>
                  </li>
                  <li><a href="login.html" onClick="if(!confirm('是否确认退出？'))return false;">退出登录</a></li>
                  <li><a data-toggle="modal" data-target="#WeChat">帮助</a></li>
                </ul>
                <!-- <form action="" method="post" class="navbar-form navbar-right" role="search">
                  <div class="input-group">
                      <input type="text" class="form-control" autocomplete="off" placeholder="键入关键字搜索" maxlength="15">
                      <span class="input-group-btn">
                         <button class="btn btn-default" type="submit">搜索</button>
                       </span> 
                  </div>
                </form> -->
            </div>
        </div>
    </nav>
</header>
<div class="row">
    <aside class="col-sm-3 col-md-2 col-lg-2 sidebar">
        <ul class="nav nav-sidebar">
            <li class="<?php echo ($index); ?>"><a href="/Admin/Index/index">首页</a></li>
        </ul>
        <ul class="nav nav-sidebar">
            <li class="<?php echo ($art); ?>"><a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">发布内容</a>
              <ul class="dropdown-menu" aria-labelledby="userMenu">
                <li><a href="/Admin/Article/index" class="<?php echo ($artitem); ?>">发布文章</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="/Admin/Say/index" class="<?php echo ($sayitem); ?>">发布说说</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="/Admin/Log/index" class="<?php echo ($logitem); ?>">发布日志</a></li>
              </ul>
            </li>
            <li class="<?php echo ($artlist); ?>"><a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">内容管理</a>
              <ul class="dropdown-menu" aria-labelledby="userMenu">
                <li><a href="/Admin/Article/artList" class="<?php echo ($artL); ?>">文章列表</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="/Admin/Say/sayList" class="<?php echo ($sayL); ?>">说说列表</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="/Admin/Log/logList" class="<?php echo ($logL); ?>">日志列表</a></li>
              </ul>
            </li>
            <li class="<?php echo ($cat); ?>"><a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">栏目</a>
              <ul class="dropdown-menu" aria-labelledby="userMenu"> 
                <li><a href="/Admin/Cat/index" class="<?php echo ($catitem); ?>">新增栏目</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="/Admin/Cat/catList" class="<?php echo ($catlist); ?>">栏目列表</a></li>
              </ul>
            </li>
        </ul>
        <ul class="nav nav-sidebar">
            <li class="<?php echo ($user); ?>"><a href="/Admin/User/index">用户</a></li>
            <li class="<?php echo ($comment); ?>"><a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">用户互动</a>
              <ul class="dropdown-menu" aria-labelledby="settingMenu">
                <li><a href="/Admin/Say/sayContentList" class="<?php echo ($saycomment); ?>">说说评论</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="/Admin/Article/artContentList" class="<?php echo ($artcomment); ?>">文章评论</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="/Admin/Log/logContentList" class="<?php echo ($logcomment); ?>">日志评论</a></li>   
                <li role="separator" class="divider"></li>
                <li><a href="/Admin/Board/boardContentList" class="<?php echo ($boardcomment); ?>">留言板评论</a></li>    
              </ul>
            </li>
            <li class="<?php echo ($system); ?>"><a href="/Admin/System/index">系统设置</a></li>
        </ul>
        <ul class="nav nav-sidebar">
            <li class="<?php echo ($album); ?>"><a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">相册管理</a>
              <ul class="dropdown-menu" aria-labelledby="settingMenu">
                 <li><a href="/Admin/Album/index">新增相册</a></li>
                 <li role="separator" class="divider"></li>
                 <li><a href="/Admin/Album/albumList">相册列表</a></li>  
              </ul>
            </li>
            <li class="<?php echo ($picture); ?>"><a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">图片管理</a>
              <ul class="dropdown-menu" aria-labelledby="settingMenu">
                 <li><a href="/Admin/Picture/index">新增图片</a></li>
                 <li role="separator" class="divider"></li>
                 <li><a href="/Admin/Picture/pictureList">图片列表</a></li>  
              </ul>
            </li>
        </ul>
    </aside>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-lg-10 col-md-offset-2 main" id="main">
      <div class="row">
        <div class="add-article-form">
          <div class="col-md-9">
            <?php if(empty($info['s_id'])): ?><h1 class="page-header">发布新说说</h1>
            <?php else: ?>
               <h1 class="page-header">修改说说</h1>
               <input type="hidden" value="<?php echo ($info["s_id"]); ?>" id="sid"><?php endif; ?>
            <input type="hidden" value="<?php echo (session('uname')); ?>" id="root">
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>内容</span></h2>
              <div class="add-article-box-content">
                <textarea class="form-control" id="desc"><?php echo ($info["s_content"]); ?></textarea>
                <span class="prompt-text">描述是可选的手工创建的内容总结，并可以在网页描述中使用</span>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <h1 class="page-header">操作</h1>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>发布</span></h2>
              <div class="add-article-box-content">
              	<p>
                   <label>状态：</label>
                   <span class="article-status-display">未发布</span>
                </p>
                <p>
                   <label>公开度：</label>
                   <input type="radio" name="visibility" value="0" <?php if(($info['s_show']) == "0"): ?>checked<?php endif; ?> />公开 
                   <input type="radio" name="visibility" value="1" <?php if(($info['s_show']) == "1"): ?>checked<?php endif; ?> />加密
                </p>
                <p>
                   <label>发布于：</label>
                   <span class="article-time-display">
                      <?php if(empty($info['a_id'])): ?><input style="border: none;" type="datetime" name="time" value="<?php echo date('Y-m-d H:i:s', time());?>" disabled/>
                      <?php else: ?>
                         <input style="border: none;" type="datetime" name="time" value="<?php echo (getTime($info["a_time"])); ?>" disabled/><?php endif; ?>
                   </span>
                </p>
              </div>
              <div class="add-article-box-footer">
                 <button class="btn" type="button" style="margin-left: 20px;"><a href="/Admin/Say/sayList">取消</a></button>
                 <?php if(empty($info['s_id'])): ?><button class="btn btn-primary" type="submit" name="submit" id="addSay">新增</button>
                 <?php else: ?>
                    <button class="btn btn-primary" type="submit" name="submit" id="editSay">修改</button><?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--增加用户模态框-->
<div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel">
  <div class="modal-dialog" role="document" style="max-width:450px;">
    <div  draggable="false">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" >增加用户</h4>
        </div>
        <div class="modal-body">
          <table class="table" style="margin-bottom:0px;">
            <thead>
              <tr> </tr>
            </thead>
            <tbody>
              <tr>
                <td wdith="20%">姓名:</td>
                <td width="80%"><input type="text" value="" class="form-control" id="addRoot" /></td>
              </tr>
              <tr>
                <td wdith="20%">权限:</td>
                <td width="80%"><input type="text" value="" class="form-control" maxlength="10" id="addClass"/></td>
              </tr>
              <tr>
                <td wdith="20%">用户名:</td>
                <td width="80%"><input type="text" value="" class="form-control" id="addAdmin" /></td>
              </tr>
              <tr>
                <td wdith="20%">邮箱:</td>
                <td width="80%"><input type="text" value="" class="form-control" id="addEmail" /></td>
              </tr>
              <tr>
                <td wdith="20%">新密码:</td>
                <td width="80%"><input type="password" class="form-control" maxlength="18" id="addPassword" /></td>
              </tr>
              <tr>
                <td wdith="20%">确认密码:</td>
                <td width="80%"><input type="password" class="form-control" maxlength="18" id="addPasswords"/></td>
              </tr>
            </tbody>
            <tfoot>
              <tr></tr>
            </tfoot>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default default" data-dismiss="modal">取消</button>
          <button type="submit" class="btn btn-primary adduser">提交</button>
        </div>
      </div>
    </div>
  </div>
</div>
<!--用户信息模态框-->
<div class="modal fade" id="seeUser" tabindex="-1" role="dialog" aria-labelledby="seeUserModalLabel">
  <div class="modal-dialog" role="document" style="max-width:450px;">
    <div  autocomplete="off" draggable="false">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">修改用户</h4>
        </div>
        <div class="modal-body">
            <table class="table" style="margin-bottom:0px;">
                <thead>
                  <tr> </tr>
                </thead>
                <tbody>
                  <input type="hidden" id="uids"/>
                  <tr>
                    <td wdith="20%">姓名:</td>
                    <td width="80%"><input type="text"  class="form-control" id="editRoot"/></td>
                  </tr>
                  <?php if(($info['u_id']) == "1"): ?><tr>
                        <td wdith="20%">权限:</td>
                        <td width="80%"><input type="text" class="form-control"  maxlength="10" id="editClass"/></td>
                      </tr><?php endif; ?>
                  <tr>
                    <td wdith="20%">用户名:</td>
                    <td width="80%"><input type="text"  class="form-control" id="editAdmin"/></td>
                  </tr>
                  <tr>
                    <td wdith="20%">邮箱:</td>
                    <td width="80%"><input type="text"  class="form-control" maxlength="13" id="editEmail"/></td>
                  </tr>
                  <tr>
                    <td wdith="20%">旧密码:</td>
                    <td width="80%"><input type="password" class="form-control" maxlength="18" id="editPassword"/></td>
                  </tr>
                  <tr>
                    <td wdith="20%">新密码:</td>
                    <td width="80%"><input type="password" class="form-control"  maxlength="18" id="newPassword"/></td>
                  </tr>
                  <tr>
                    <td wdith="20%">确认密码:</td>
                    <td width="80%"><input type="password" class="form-control"  maxlength="18" id="newPasswords"/></td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr></tr>
                </tfoot>
            </table>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="userid"/>
          <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
          <button type="submit" class="btn btn-primary modify">提交</button>
        </div>
      </div>
    </div>
  </div>
</div>
<!--个人信息模态框-->
<div class="modal fade" id="seeUserInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <form action="" method="post" autocomplete="off" draggable="false">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" >个人信息</h4>
        </div>
        <div class="modal-body">
          <table class="table" style="margin-bottom:0px;">
            <tbody>
                <tr>
                  <td wdith="20%">姓名:</td>
                  <td width="80%"><input type="text" value="<?php echo ($userInfo["u_root"]); ?>" class="form-control"/></td>
                </tr>
                <tr>
                  <td wdith="20%">职位:</td>
                  <td width="80%">
                      <?php switch($userInfo['u_class']): case "1": ?><input type="text" value="管理员" class="form-control"/><?php break;?>
                         <?php case "2": ?><input type="text" value="编辑" class="form-control"/><?php break;?>
                         <?php default: ?><input type="text" value="游客" class="form-control"/><?php endswitch;?>
                  </td>
                </tr>
                <tr>
                  <td wdith="20%">用户名:</td>
                  <td width="80%"><input type="text" value="<?php echo ($userInfo["u_name"]); ?>" class="form-control"/></td>
                </tr>
                <tr>
                  <td wdith="20%">邮箱:</td>
                  <td width="80%"><input type="text" value="<?php echo ($userInfo["u_email"]); ?>" class="form-control"/></td>
                </tr>
            </tbody>
            <tfoot>
              <tr></tr>
            </tfoot>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        </div>
      </div>
    </form>
  </div>
</div>
<!--个人登录记录模态框-->
<div class="modal fade" id="seeUserLoginlog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" >登录记录</h4>
      </div>
      <div class="modal-body">
        <table class="table" style="margin-bottom:0px;">
          <thead>
            <tr>
              <th>登录IP</th>
              <th>登录时间</th>
              <th>状态</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><?php echo ($userInfo["u_ip"]); ?></td>
              <td><?php echo (getTime($userInfo["u_logintime"])); ?></td>
              <?php if(!empty($userInfo['u_id'])): ?><td>成功</td><?php endif; ?>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">朕已阅</button>
      </div>
    </div>
  </div>
</div>
<!--微信二维码模态框-->
<div class="modal fade user-select" id="WeChat" tabindex="-1" role="dialog" aria-labelledby="WeChatModalLabel">
  <div class="modal-dialog" role="document" style="margin-top:120px;max-width:280px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="WeChatModalLabel" style="cursor:default;">微信扫一扫</h4>
      </div>
      <div class="modal-body" style="text-align:center"> <img src="/Public/Admin/img/weixin.jpg" alt="" style="cursor:pointer"/> </div>
    </div>
  </div>
</div>


<script src="/Public/Admin/js/bootstrap.min.js"></script> 
<script src="/Public/Admin/js/admin-scripts.js"></script>
<script src="/Public/Admin/lib/ueditor/ueditor.config.js"></script> 
<script src="/Public/Admin/lib/ueditor/ueditor.all.min.js"> </script> 
<script src="/Public/Admin/lib/ueditor/lang/zh-cn/zh-cn.js"></script>  
<script src="/Public/Admin/js/jquery.gritter.min.js"></script>
<script src="/Public/Admin/js/my.js"></script>
<script type="text/javascript">
$('#addSay').click(function(){
   var s_root = $('#root').val();
   var s_content = $('#desc').val();
   var s_show= $("input[name='visibility']:checked").val();
   if(s_content == ''){
     error("内容不能为空");
     return false;
   }
   if(s_show == ''){
     error('请选择公开度');
     return false;
   }
   $('#addSay').attr('disabled',true);
   $.ajax({
     url: '/Admin/Say/add',
     type: 'post',
     async: true,
     data: {'s_content':s_content, 's_show':s_show,'s_root':s_root},
     success: function(data){
        console.log(data);
        if(data.error == 0){
          success('',data.msg,'/Admin/Say/sayList');
        }else{
          error(data.msg);
          $('#addSay').removeAttr('disabled');
        }
     },
     error: function(data){
        error(data.msg);
        $('#addSay').removeAttr('disabled');
     }
   })
})
$('#editSay').click(function(){
   var s_id = $('#sid').val();
   var s_root = $('#root').val();
   var s_content = $('#desc').val();
   var s_show= $("input[name='visibility']:checked").val();
   if(s_content == ''){
     error("内容不能为空");
     return false;
   }
   if(s_show == ''){
     error('请选择公开度');
     return false;
   }
   $('#editSay').attr('disabled',true);
   $.ajax({
     url: '/Admin/Say/modify',
     type: 'post',
     async: true,
     data: {'s_id':s_id, 's_content':s_content, 's_show':s_show, 's_root':s_root},
     success: function(data){
        console.log(data);
        if(data.error == 0){
          success('',data.msg,'/Admin/Say/sayList');
        }else{
          error(data.msg);
          $('#editSay').removeAttr('disabled');
        }
     },
     error: function(data){
        error(data.msg);
        $('#editSay').removeAttr('disabled');
     }
   })
})
</script>
</body>
</html>
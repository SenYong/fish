<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>管理用户 - 小鱼博客管理系统</title>
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
    <?php if(($info['u_class']) == "1"): ?><h1 class="page-header">操作</h1>
        <ol class="breadcrumb">
          <li><a data-toggle="modal" data-target="#addUser">增加用户</a></li>
        </ol><?php endif; ?>
        <h1 class="page-header">管理 <span class="badge"><?php echo ($num); ?></span></h1>
        <div class="table-responsive">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th><span class="glyphicon glyphicon-th-large"></span> <span class="visible-lg">ID</span></th>
                <th><span class="glyphicon glyphicon-user"></span> <span class="visible-lg">用户名</span></th>
                <th><span class="glyphicon glyphicon-bookmark"></span> <span class="visible-lg">权限</span></th> 
                <th><span class="glyphicon glyphicon-bookmark"></span> <span class="visible-lg">邮箱</span></th> 
                <th><span class="glyphicon glyphicon-time"></span> <span class="visible-lg">创建时间</span></th>
                <th><span class="glyphicon glyphicon-time"></span> <span class="visible-lg">上次登录时间</span></th>
                <th><span class="glyphicon glyphicon-pushpin"></span> <span class="visible-lg">登录IP</span></th>
                <?php if(($info['u_class']) == "1"): ?><th><span class="glyphicon glyphicon-pencil"></span> <span class="visible-lg">操作</span></th><?php endif; ?>
              </tr>
            </thead>
            <tbody>
              <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                      <td class="uid"><?php echo ($vo["u_id"]); ?></td>
                      <td><?php echo ($vo["u_name"]); ?></td>       
                      <?php switch($vo['u_class']): case "1": ?><td>最高管理员</td><?php break;?>
                        <?php case "2": ?><td>编辑</td><?php break;?>
                        <?php default: ?><td>游客</td><?php endswitch;?>
                      <td><?php echo ($vo["u_email"]); ?></td> 
                      <td><?php echo (getTime($vo["u_createtime"])); ?></td>
                      <td><?php echo (getTime($vo["u_logintime"])); ?></td>
                      <td><?php echo ($vo["u_ip"]); ?></td>
                      <?php if(($info['u_class']) == "1"): switch($vo['u_class']): case "1": ?><td><a data-toggle="modal" class="edituser">修改</a></td><?php break;?>
                            <?php default: ?>
                               <td> <a data-toggle="modal" class="edituser">修改</a> <a rel="1" name="delete">删除</a> </td><?php endswitch; endif; ?>
                  </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
          </table>
        </div>
        <div class="b-page"><?php echo ($page); ?></div>
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
<script src="/Public/Admin/js/jquery.gritter.min.js"></script>
<script src="/Public/Admin/js/my.js"></script>
<script>
$(function () {
    $("#main table tbody tr td a").click(function () {
        var name = $(this);
        var id = name.attr("rel"); //对应id   
        if (name.attr("name") === "see") {
            $.ajax({
                type: "POST",
                url: "/User/see",
                data: "id=" + id,
                cache: false, //不缓存此页面   
                success: function (data) {
                    var data = JSON.parse(data);
					$('#truename').val(data.truename);
					$('#username').val(data.username);
					$('#usertel').val(data.usertel);
					$('#userid').val(data.userid);
                    $('#seeUser').modal('show');
                }
            });
        } else if (name.attr("name") === "delete") {
            if (window.confirm("此操作不可逆，是否确认？")) {
                $.ajax({
                    type: "POST",
                    url: "/User/delete",
                    data: "id=" + id,
                    cache: false, //不缓存此页面   
                    success: function (data) {
                        window.location.reload();
                    }
                });
            };
        };
    });

    //增加用户
    $('.adduser').click(function(){
      var u_root = $('#addRoot').val();
      var u_class = $('#addClass').val();
      var u_name = $('#addAdmin').val();
      var u_email = $('#addEmail').val();
      var u_password = $('#addPassword').val();
      var u_passwords = $('#addPasswords').val();

      if(!u_root){
         error('请填写姓名');
         return false;
      }
      if(!u_class){
         error('请设置权限');
         return false;
      }
      if(!u_name){
         error('请填写用户名');
         return false;
      }
      if(!u_email){
         error('请填写邮箱');
         return false;
      }
      if(!u_password){
         error('请填写密码');
         return false;
      }
      if(!u_passwords){
         error('请填写密码');
         return false;
      }
      if(u_password != u_passwords){
         error('两次密码不一致');
         return false;
      }
      $('.adduser').attr('disabled',true);
      $('.default').attr('disabled',true);
      $.ajax({
        url: '/Admin/User/add',
        type: 'post',
        async: true,
        data: {'u_name':u_name, 'u_password':u_password, 'u_class':u_class, 'u_email':u_email, 'u_root':u_root},
        success: function(data){
           console.log(data);
           if(data.error == 0){
              success('',data.msg,'/Admin/User/index');
           }else{
              error(data.msg);
              $('.adduser').attr('disabled',true);
              $('.default').attr('disabled',true);
           }
        },
        error: function(data){
          error(data.msg);
          $('.adduser').attr('disabled',true);
          $('.default').attr('disabled',true); 
        }
      })
    })

    //编辑
    $('.edituser').click(function(){
       var id = $(this).parent().parent().find('.uid').text();
       $.ajax({
         url: '/Admin/User/edit',
         type: 'post',
         async: true,
         data: {'id':id},
         success:function(data){
            if(data.error == 0){
              $('#uids').val(data.msg.u_id);
              $('#editRoot').val(data.msg.u_root); 
              $('#editClass').val(data.msg.u_class);
              $('#editAdmin').val(data.msg.u_name);
              $('#editEmail').val(data.msg.u_email);
              $("#seeUser").modal("show");
            }else{
              error(data.msg);
            }
         },
         error: function(data){
            error(data.msg);
         }
       })
    })

    //修改
    $('.modify').click(function(){
      var u_id = $('#uids').val();
      var u_root = $('#editRoot').val();
      var u_name = $('#editAdmin').val();
      var u_email = $('#editEmail').val();
      var u_password = $('#editPassword').val();
      var u_newpassword = $('#newPassword').val();
      var u_newpasswords = $('#newPasswords').val();
      if(!u_root){
         error('请填写姓名');
         return false;
      }
      if(!u_name){
         error('请填写用户名');
         return false;
      }
      if(!u_email){
         error('请填写邮箱');
         return false;
      }
      if(!u_password){
         error('请填写旧密码');
         return false;
      }
      if(!u_newpassword){
         error('请填写新密码');
         return false;
      }
      if(!u_newpasswords){
         error('请再次填写新密码');
         return false;
      }
      if(u_newpassword != u_newpasswords){
         error('两次密码不一致');
         return false;
      }
      $.ajax({
        url: '/Admin/User/modify',
        type: 'post',
        async: true,
        data: {'u_id':u_id, 'u_name':u_name, 'u_password':u_newpassword, 'u_email':u_email, 'u_root':u_root, 'u_oldpassword':u_password},
        success: function(data){
          console.log(data)
          if(data.error == 0){
            success('',data.msg,'/Admin/User/index');
          }else{
            error(data.msg);
          }
        },
        error: function(data){
           console.log(data)
           error(data.msg);
        }
      })
    })
});
</script>
</body>
</html>
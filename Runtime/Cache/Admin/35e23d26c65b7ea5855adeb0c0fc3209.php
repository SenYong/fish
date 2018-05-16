<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>小鱼博客管理系统</title>
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/style.css">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/login.css">
    <link rel="apple-touch-icon-precomposed" href="/Public/Admin/img/icon/icon.png">
    <link rel="shortcut icon" href="/Public/Admin/img/icon/favicon.ico">
    <script src="/Public/Admin/js/jquery.min.js"></script>
    <script src="/Public/Admin/js/jquery.gritter.min.js"></script>
    <script src="/Public/Admin/js/my.js"></script>
</head>

<body class="user-select">
  <div class="container">
      <div class="siteIcon">
          <img src="/Public/Admin/img/icon/icon.png" alt="" data-toggle="tooltip" data-placement="top" title="欢迎使用异清轩博客管理系统" draggable="false" />
      </div>
      <div  class="form-signin">
          <h2 class="form-signin-heading">管理员登录</h2>
          <label for="userName" class="sr-only">用户名</label>
          <input type="text" id="userName" name="username" class="form-control" placeholder="请输入用户名" required autofocus autocomplete="off" maxlength="10">
          <label for="userPwd" class="sr-only">密码</label>
          <input type="password" id="userPwd" name="userpwd" class="form-control" placeholder="请输入密码" required autocomplete="off" maxlength="18">
          <button class="btn btn-lg btn-primary btn-block" type="button" id="signinSubmit">登录</button>
      </div>
  </div>
</body>
</html>

<script src="/Public/Admin/js/bootstrap.min.js"></script> 
<script>
  $(document).ready(function(){
     $('#signinSubmit').click(function(){
        var userNameb = $('#userName').val();
        var userPwd = $('#userPwd').val();
        if(!userNameb){
          err('用户名不能为空');
          return false;
        }
        if(!userPwd){
          err('密码不能为空');
          return false;
        }
        $('#signinSubmit').attr('disabled',true);
        $.ajax({
           url: '/Admin/Login/in',
           type: 'post',
           async: true,
           data: {'u_name': userNameb, 'u_password': userPwd},
           success: function(data){
             if(data.error == 0){
                success('',data.msg,'/Admin/Index');
             }else{
                error(data.msg);
                $('#signinSubmit').removeAttr('disabled');
             }
           },
           error: function(data){
             error(data.msg);
             $('#signinSubmit').removeAttr('disabled');
           }
        })
     })
  })
</script>
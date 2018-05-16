<?php
  /**
  * 用户
  */
  namespace Admin\Controller;
  use Think\Controller;
  class UserController extends AuthController
  {
  	 public function index(){
  	 	$this->assign('user','active');
  	 	$num = M('user')->count();
  	 	$Page = new \Org\Util\Page($num,25); 
  	 	$list = M('user')->order('u_id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
  	 	$show = $Page->show();
  	 	$info = M('user')->where(array('u_id'=>session('uid')))->find();
  	 	$this->assign('list',$list);
 	    $this->assign('page',$show);
 	    $this->assign('num',$num);
 	    $this->assign('info',$info);
  	 	$this->display();
  	 }

  	 public function add(){
  	 	if(!IS_AJAX){
  	 		$this->error('提交方式不正确',0,0);
  	 	}else{
  	 		if(D('user')->addH()){
  	 			$data = array("error"=>0, "msg"=>"添加用户成功");
  	 		}else{
  	 			$data = array("error"=>1, "msg"=>"添加用户失败");
  	 		}
  	 		$this->ajaxReturn($data);
  	 	}
  	 }

  	 public function edit(){
  	 	if(!IS_AJAX){
  	 		$this->error('提交方式不正确',0,0);
  	 	}else{
  	 		$info = M('user')->where(array('u_id'=>I('post.id')))->find();
  	 		if(!$info){
  	 			$data = array("error"=>1, "msg"=>"修改失败");
  	 		}else{
  	 			$data = array("error"=>0, "msg"=>$info);
  	 		}
  	 		$this->ajaxReturn($data);
  	 	}
  	 }

  	 public function modify(){
  	 	if(!IS_AJAX){
  	 		$this->error('提交方式不正确',0,0);
  	 	}else{
  	 		$info = D('User')->in(I('post.u_name'),I('post.u_oldpassword'));
  	 		if($info){
  	 		   $data = array( 'u_id'=>I('post.u_id'), 'u_name'=>I('post.u_name'), 'u_password'=>md5(I('post.u_password')), 'u_email'=>I('post.u_email'), 'u_root'=>I('post.u_root') );
               if(D('user')->editH($data)){
                  $data = array("error"=>0, "msg"=>"修改用户成功");
               }else{
               	  $data = array("error"=>1, "msg"=>"修改用户失败");
               }
  	 		}else{
  	 			$data = array("error"=>1, "msg"=>"用户名或密码错误");
  	 		}
  	 		$this->ajaxReturn($data);
  	 	}
  	 }
  }
?>
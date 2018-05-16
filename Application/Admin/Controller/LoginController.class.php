<?php
  namespace Admin\Controller;
  use Think\Controller;

  /**
  * 登录
  */
  class LoginController extends Controller
  {
  	 public function index(){
  	 	$this->display();
  	 }

  	 public function in(){
  	 	$info = D('user')->in(I('post.u_name'),I('post.u_password'));
  	 	if($info){
        D('user')->where(array('u_id'=>$info['u_id']))->setField('u_logintime',time());
        D('user')->where(array('u_id'=>$info['u_id']))->setInc('u_num');
  	 		$data = array("error"=>0, "msg"=>"登录成功");
  	 	}else{
  	 		$data = array("error"=>1, "msg"=>"登录失败");
  	 	}
  	 	$this->ajaxReturn($data);
  	 }
  }
?>
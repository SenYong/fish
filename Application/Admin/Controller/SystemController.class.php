<?php
  namespace Admin\Controller;
  use Think\Controller;

  /**
  * 系统设置
  */
  class SystemController extends AuthController
  {
  	  public function index(){
  	  	$info = M('system')->where(array('id'=>1))->find();
  	  	$this->assign('system','active');
  	  	$this->assign('info',$info);
  	  	$this->display();
  	  }
  	  public function add(){
  	  	if(!IS_AJAX){
  	  		$this->error('提交方式不正确',0,0);
  	  	}else{
  	  		if(D('system')->addH()){
  	  			$data = array("error"=>0, "msg"=>"提交成功");
  	  		}else{
  	  			$data = array("error"=>1, "msg"=>'提交失败');
  	  		}
  	  		$this->ajaxReturn($data);
  	  	}
  	  }
  	  public function edit(){
  	  	if(!IS_AJAX){
  	  		$this->error('提交方式不正确',0,0);
  	  	}else{
  	  		if(D('system')->editH()){
  	  			$data = array("error"=>0, "msg"=>"修改成功");
  	  		}else{
  	  			$data = array("error"=>1, "msg"=>"修改失败");
  	  		}
  	  		$this->ajaxReturn($data);
  	  	}
  	  }
  }
?>
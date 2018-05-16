<?php
  namespace Home\Controller;
  use Think\Controller;

  /**
  * 日志
  */
  class LogController extends CommonController
  {
  	  public function index(){ 	 
  	  	 $logList = M('log')->where(array('l_show'=>0))->select();
  	  	 $this->assign('log','active');
  	  	 $this->assign('logList',$logList);
  	  	 $this->display();
  	  }

  	  public function _before_info(){
  	  	$id = I('get.id');
  	  	if(!M('log')->where(array('l_id'=>$id))->find()){
  	  		$this->error('日志不存在');
  	  	}
  	  }
  	  public function info(){
  	  	$id = I('get.id');
        M('log')->where(array('l_id'=>I('get.id')))->setInc('l_hit');
  	  	$info = M('log')->where(array('l_id'=>$id))->find();
  	  	$prev = M('log')->order('l_id desc')->where('l_id < '.$id)->find();
  	  	$next = M('log')->where('l_id > '.$id)->find();
        $logContentList = M('log_c')->order('lc_id desc')->select();
  	  	$this->assign('prev',$prev);
  	  	$this->assign('next',$next);
  	  	$this->assign('log','active');
  	  	$this->assign('info',$info);
        $this->assign('logContentList',$logContentList);                      
  	  	$this->display();
  	  }
  }
?>


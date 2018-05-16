<?php
  namespace Home\Controller;
  use Think\Controller;
  /**
  * 日志
  */
  class JournalController extends CommonController
  {
  	 public function index(){
  	 	$list = M('log')->order('l_id desc')->where(array('l_show'=>0))->limit(5)->select();
  	 	$this->assign('log','active');
  	 	$this->assign('list',$list);
  	 	$this->display();
  	 }
     public function getData(){
       if(!IS_AJAX){
          $this->error('提交方式不正确',0,0);
       }else{
          $page = (intval(I('post.page')) + 1) * 5;
          $list = M('log')->order('l_id desc')->where(array('l_show'=>0))->limit($page,5)->select();
          $this->ajaxReturn($list);
       }
     }
     public function _before_info(){
       if(!M('log')->where(array('l_id'=>I('get.id')))->find()){
          $this->error('日志不存在',0,0);
       }
     }
     public function info(){ 
        $name = 'ThinkPHP';
        $id = I('get.id');
        $log = M('log');
        $logc = M('log_c');
        $info = $log->where(array('l_id'=>$id))->find();
        $prev = $log->order('l_id desc')->where('l_id <'.$id)->find();
        $next = $log->where('l_id >'.$id)->find();
        $num = $logc->where(array('lc_pid'=>$id))->count();
        $list = $logc->where(array('lc_pid'=>$id))->select();
        $this->assign('log','active');
        $this->assign('info',$info);
        $this->assign('prev',$prev);
        $this->assign('next',$next);
        $this->assign('num',$num);
        $this->assign('list',$list);
        $this->display();
     }
  }
?>
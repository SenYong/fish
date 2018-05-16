<?php
  namespace Home\Controller;
  use Think\Controller;
  /**
  * 说说
  */
  class SayController extends CommonController
  {
  	  public function index(){
  	  	$list = M('say')->order('s_time desc')->where(array('s_show'=>0))->limit(5)->select();  
  	  	$this->assign('say','active');
  	  	$this->assign('list',$list);
  	  	$this->display();
  	  }
      public function getData(){
        if(!IS_AJAX){
           $this->error('提交方式不正确',0,0);
        }else{
           $page = (intval(I('post.page')) + 1) * 5;
           $list = M('say')->order('s_time desc')->where(array('s_show'=>0))->limit($page,5)->select();
           $this->ajaxReturn($list);
        }
      }
  	  public function _before_info(){
  	  	$id = I('get.id');
  	  	if(!M('say')->where(array('s_id'=>$id))->find()){
  	  		$this->error('说说不存在');
  	  	}
  	  }
  	  public function info(){
  	  	$id = I('get.id');
        $say = M('say');
        $say_c = M('say_c');
        $say->where(array('s_id'=>$id))->setInc('s_hit');
  	  	$info = M('say')->where(array('s_id'=>$id))->find();
        $prev = $say->order('s_id desc')->where('s_id <'.$id)->find();
        $next = $say->where('s_id >'.$id)->find();
        $num = $say_c->where(array('sc_pid'=>$id))->count();
        $list = $say_c->order('sc_time desc')->where(array('sc_pid'=>$id))->select();
  	  	$this->assign('say','active');
  	  	$this->assign('info',$info);
        $this->assign('prev',$prev);
        $this->assign('next',$next);
        $this->assign('num',$num);
        $this->assign('list',$list);
  	  	$this->display();
  	  }
  }
?>


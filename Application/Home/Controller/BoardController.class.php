<?php
  namespace Home\Controller;
  use Think\Controller;
  /**
  * 留言板
  */
  class BoardController extends CommonController
  {
  	  public function index(){
         $num = M('board')->count();
  	  	 $boardContentList = M('board')->order('b_time desc')->select();
  	  	 $this->assign('board','active');
         $this->assign('num',$num);
  	  	 $this->assign('list',$boardContentList);
  	  	 $this->display();
  	  }
  }
?>
<?php
  namespace Admin\Controller;
  use Think\Controller;
  /**
  * 留言
  */
  class BoardController extends AuthController
  {
  	/**********留言板评论*****************/
  	public function add(){
  	  if(!IS_AJAX){
  	  	 $this->error('提交方式不正确',0,0);
  	  }else{
  	  	 if(D('board')->addH()){
  	  		$data = array("error"=>0, "msg"=>"留言成功");
  	  	 }else{
  	  		$data = array("error"=>1, "msg"=>"留言失败");
  	  	 }
         $data = array("error"=>0, "msg"=>"留言成功"); 
  	  	 $this->ajaxReturn($data);
  	  }
  	}
  	//列表
  	public function boardContentList(){
  		$list = M('board')->order('b_time desc')->select();
      $num = M('board')->order('b_id desc')->count();
      $Page = new \Org\Util\Page($num,25);
      $show = $Page->show();
  		$this->assign('comment','active');
      $this->assign('boardcomment','item');
  		$this->assign('list',$list);
      $this->assign('num',$num);
      $this->assign('page',$show);
  		$this->display();
  	}
    //编辑
    public function boardContentEdit(){
    	$info = M('board')->where(array('b_id'=>I('get.id')))->find();
    	$this->assign('info',$info);
    	$this->assign('comment','active');
    	$this->display();
    }
    //回复
    public function boardContentModify(){
    	if(!IS_AJAX){
    		$this->error('提交方式不正确',0,0);
    	}else{
    		$data['b_id'] = I('post.b_id');
    		$data['b_rename'] = I('post.b_rename');
    		$data['b_reimg'] = I('post.b_reimg');
    		$data['b_recontent'] = I('post.b_recontent');
    		$data['b_retime'] = time();
    		if(D('board')->editH($data)){
    			$data = array('error'=>0, "msg"=>"回复成功");
    		}else{
    			$data = array('error'=>1, "msg"=>"回复失败");
    		}
    		$this->ajaxReturn($data);
    	}
    }
  }
?>
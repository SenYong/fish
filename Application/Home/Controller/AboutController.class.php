<?php
  namespace Home\Controller;
  use Think\Controller;
  /**
  * 关于我
  */
  class AboutController extends CommonController
  {
  	 public function index(){
        $system = M('system');
        $art = M('article');
        $info = $system->where(array('id'=>1))->find();
        $info['keyword'] = explode(",", $info['keyword']);
        $system->where(array('id'=>1))->setInc('hit');
        $img = $art->order('a_time desc')->where(array('a_show'=>0))->field('a_id,a_img')->limit(8)->select();
    	 	$this->assign('about','active');
        $this->assign('info',$info);
        $this->assign('img',$img);
    	 	$this->display();
  	 }
  }
?>
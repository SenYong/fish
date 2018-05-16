<?php
  namespace Admin\Controller;
  use Think\Controller;
  /**
  * 后台登录验证
  */
  class AuthController extends Controller
  {
  	  public function _initialize(){
  	  	// if(!session('uid')){
  	  	// 	$this->redirect('/Admin/login');
  	  	// }
        $userInfo = M('user')->where(array('u_id'=>session('uid')))->find();
        $newSayNum = M('say_c')->where('sc_retime is null')->count();
        $newArtNum = M('article_c')->where('ac_retime is null')->count();
        $newLogNum = M('log_c')->where('lc_retime is null')->count();
        $newBoardNum = M('board')->where('b_retime is null')->count();
        $newCount = $newSayNum + $newArtNum + $newLogNum + $newBoardNum;
        $this->assign('userInfo',$userInfo);
        $this->assign('newSayNum',$newSayNum);
        $this->assign('newArtNum',$newArtNum);
        $this->assign('newLogNum',$newLogNum);
        $this->assign('newBoardNum',$newBoardNum);
        $this->assign('newCount',$newCount);
  	  }
  }
?>
<?php
 namespace Admin\Controller;
 use Think\Controller;
 
 /**
 * 后台首页
 */

 class IndexController extends AuthController
 {
 	 public function index(){
 	 	$user = M('user');
 	 	$say = M('say');
 	 	$article = M('article');
 	 	$log = M('log');
 	 	$board = M('board');
 	 	$managerNum =$user->where('u_class < 3')->count();
 	 	$userInfo = $user->where(array('u_id'=>session('uid')))->find();
 	 	$sayNum = $say->where(array('a_show'=>0))->count();
 	 	$articleNum = $article->where(array('a_show'=>0))->count();
 	 	$logNum = $log->where(array('l_show'=>0))->count();
 	 	$boardNum = $board->count();


 	 	$this->assign('index',"active");
 	 	$this->assign('managerNum',$managerNum);
 	 	$this->assign('userInfo',$userInfo);
 	 	$this->assign('sayNum',$sayNum);
 	 	$this->assign('articleNum',$articleNum);
 	 	$this->assign('logNum',$logNum);
 	 	$this->assign('boardNum',$boardNum);
 	 	$this->display();
 	 }
 }

?>
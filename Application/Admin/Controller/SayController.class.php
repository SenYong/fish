<?php
 /**
 * 说说
 */
 namespace Admin\Controller;
 use Think\Controller;

 class SayController extends AuthController
 {
 	 public function index(){
 	 	$this->assign('art','active');
        $this->assign('sayitem','item');
 	 	$this->display();
 	 }
     //增加
 	 public function add(){
 	 	if(!IS_AJAX){
 	 		$this->error('提交方式不正确',0,0);
 	 	}else{
 	 		if(D('say')->addH()){
 	 			$data = array("error"=>0, "msg"=>"添加成功");
 	 		}else{
 	 			$data = array("error"=>1, "msg"=>"添加失败");
 	 		}
 	 		$this->ajaxReturn($data);
 	 	}
 	 }
     //列表
 	 public function sayList(){
 	 	$this->assign('artlist','active');
        $this->assign('sayL','item');
 	 	$num = M('say')->where(array('s_show'=>0))->count();
 	 	$Page = new \Org\Util\Page($num,25);
 	 	$list = M('say')->order('s_time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
 	 	$show = $Page->show();
 	 	$this->assign('num',$num);
 	 	$this->assign('page',$show);
 	 	$this->assign('list',$list);
 	 	$this->display();
 	 }
 	 //编辑
 	 public function edit(){
 	 	$this->assign('art','active');
 	 	$info = M('say')->where(array("s_id"=>I('get.id')))->find();
 	 	if(!$info){
 	 		$this->error('参数错误',0,0);
 	 	}else{
 	 		$this->assign('info',$info);
 	 		$this->display('index');
 	 	}
 	 }
 	 //修改
 	 public function modify(){
 	 	if(!IS_AJAX){
 	 		$this->error('提交方式不正确',0,0);
 	 	}else{
 	 		if(D('say')->editH()){
 	 			$data = array('error'=>0, "msg"=>"修改成功");
 	 		}else{
 	 			$data = array('error'=>1, "msg"=>"修改失败");
 	 		}
 	 		$this->ajaxReturn($data);
 	 	}
 	 }
 	 //删除
 	 public function delete(){
 	 	if(!IS_AJAX){
 	 		$this->error('删除方式不正确',0,0);
 	 	}else{
 	 		if(M('say')->where(array('s_id'=>I('post.id')))->delete()){
 	 			$data = array("error"=>0, "msg"=>"删除成功");
 	 		}else{
 	 			$data = array("error"=>1, "msg"=>"删除失败");
 	 		}
 	 		$this->ajaxReturn($data);
 	 	}
 	 }

 	 /********前台说说评论**********/
 	 //评论入库
     public function sayContent(){
        if(!IS_AJAX){
        	$this->error('提交方式不正确',0,0);
        }else{
        	if(D('say_c')->addH()){
        		$data = array('error'=>0, 'msg'=>"评论成功");
        	}else{
        		$data = array('error'=>1, "msg"=>"评论失败");
        	}
        	$this->ajaxReturn($data);
        }
     }
     
     //列表
     public function sayContentList(){
     	$num = M('say_c')->count();
     	$Page = new \Org\Util\Page($num,25);
     	$list = M('say_c')->order('sc_time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $show = $Page->show();
     	$this->assign('num',$num);
     	$this->assign('list',$list);
        $this->assign('comment','active');
        $this->assign('saycomment','item');
        $this->assign('page',$show);
        $this->display();
     }
     //编辑
     public function sayContentEdit(){
     	$info = M('say_c')->where(array('sc_id'=>I('get.id')))->find();
     	$this->assign('comment','active');
     	$this->assign('info',$info);
     	$this->display();
     }
     //修改
     public function sayContentModify(){
     	if(!IS_AJAX){
     		$this->error('提交方式不正确',0,0);
     	}else{
     		$data['sc_id'] = I('post.sc_id'); 
     		$data['sc_rename'] = I('post.sc_rename');
     		$data['sc_reimg'] = getAThumb(I('post.sc_reimg'));
     		$data['sc_recontent'] = I('post.sc_recontent');
     		$data['sc_retime'] = time();
     		if(D('say_c')->editH($data)){
     			$datas = array("error"=>0, "msg"=>"回复成功");
     		}else{
     			$datas = array('error'=>1, "msg"=>"回复失败");
     		}
     		$this->ajaxReturn($datas);
     	}
     }
     //删除
     public function sayContentDelete(){
     	if(!IS_AJAX){
     		$this->error('提交方式不正确',0,0);
     	}else{
     		if(M('say_c')->where(array('sc_id'=>I('post.id')))->delete()){
     			$data = array("error"=>0, "msg"=>"删除成功");
     		}else{
     			$data = array("error"=>1, "msg"=>"删除失败");
     		}
     		$this->ajaxReturn($data);
     	}
     }
 }
?>

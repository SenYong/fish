<?php
   namespace Admin\Controller;
   use Think\Controller;
   /**
   * 日志
   */
   class LogController extends AuthController
   {
   	 public function index(){
   	 	$this->assign('art','active');
      $this->assign('logitem','item');
   	 	$this->display();
   	 }
   	 //增加
   	 public function add(){
   	 	if(!IS_AJAX){
   	 		$this->error('提交方式不正确',0,0);
   	 	}else{
   	 		if(D('log')->addH()){
   	 			$data = array('error'=>0, "msg"=>"发布成功");
   	 		}else{
   	 			$data = array('error'=>1, "msg"=>"发布失败");
   	 		}
   	 	    $this->ajaxReturn($data);
   	 	}
   	 }
     //列表
   	 public function logList(){
     	 	$num = M('log')->order('l_id desc')->where(array('l_show'=>0))->count();
        $Page = new \Org\Util\Page($num,25);
     	 	$list = M('log')->order('l_time desc')->where(array('l_show'=>0))->limit($Page->firstRow.','.$Page->listRows)->select();
        $show = $Page->show();
     	 	$this->assign('artlist','active');
        $this->assign('logL','item');
     	  $this->assign('num',$num);
        $this->assign('page',$show);
     	  $this->assign('list',$list);
     	 	$this->display();
   	 }
   	 //编辑
   	 public function edit(){
   	 	$this->assign('art','active');
   	 	$info = M('log')->where(array('l_id'=>I('get.id')))->find();
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
   	 		if(D('log')->editH()){
   	 			$data = array('error'=>0, "msg"=>"修改成功");
   	 		}else{
   	 			$data = array('error'=>1, "msg"=>"修改失败");
   	 		}
   	 		$this->ajaxReturn($data);
   	 	}
   	 }

       /************日志评论******************/
       public function logContent(){
         if(!IS_AJAX){
            $this->error('提交方式不正确',0,0);
         }else{
            if(D('log_c')->addH()){
               $data = array('error'=>0, "msg"=>"评论成功");
            }else{
               $data = array('error'=>1, "msg"=>"评论失败");
            }
            $this->ajaxReturn($data);
         }
       }
       //列表
       public function logContentList(){
         $list = M('log_c')->order('lc_time desc')->select();
         $num = M('log_c')->order('lc_id desc')->count();
         $Page = new \Org\Util\Page($num,25);
         $show = $Page->show();
         $this->assign('comment','active');
         $this->assign('logcomment','item');
         $this->assign('list',$list);
         $this->assign('num',$num);
         $this->assign('page',$show);
         $this->display();
       }
       //编辑
       public function logContentEdit(){
         $info = M('log_c')->where(array('lc_id'=>I('get.id')))->find();
         $this->assign('info',$info);
         $this->assign('comment','active');
         $this->display();
       }
       //修改
       public function LogContentModify(){
         if(!IS_AJAX){
            $this->error('提交方式不正确',0,0);
         }else{
            $data['lc_id'] = I('post.lc_id'); 
            $data['lc_rename'] = I('post.lc_rename');
            $data['lc_reimg'] = getAThumb(I('post.lc_reimg'));
            $data['lc_recontent'] = I('post.lc_recontent');
            $data['lc_retime'] = time();
            if(D('log_c')->editH($data)){
               $data = array("error"=>0, "msg"=>"回复成功");
            }else{
               $data = array('error'=>1, "msg"=>"回复失败");
            }
            $this->ajaxReturn($data);
         }
       }
   }
?>

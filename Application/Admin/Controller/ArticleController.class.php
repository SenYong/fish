<?php
 namespace Admin\Controller;
 use Think\Controller;

 /**
 * 文章
 */
 class ArticleController extends AuthController
 {
 	public function index(){
 	  $this->assign('art','active');
    $this->assign('artitem','item');
 	  $tagList = M('cat')->where(array('c_show'=>0))->select();
 	  $this->assign('tagList',$tagList);
 	  $this->display();
 	}
    //增加
 	public function add(){
 	  if(!IS_AJAX){
 	  	$this->error('提交方式不正确',0,0);
 	  }else{
 	  	if(D('article')->addH()){
 	  	  $data = array('error'=>0, "msg"=>"添加成功");
 	  	}else{
 	  	  $data = array('error'=>1, "msg"=>"添加失败");
 	  	}
 	  	$this->ajaxReturn($data);
 	  }	
 	}
 	//列表
 	public function artList(){
 	   $this->assign('artlist','active');
     $this->assign('artL','item');
 	   $num = M('article')->where(array('a_show'=>0))->count();
 	   $Page = new \Org\Util\Page($num,25);
 	   $list = M('article')->order('a_time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
 	   $show = $Page->show();
 	   $this->assign('list',$list);
 	   $this->assign('page',$show);
 	   $this->assign('num',$num);
 	   $this->display();
 	}
 	//修改
 	public function edit(){
 	  $this->assign('art','active');
 	  $info = M('article')->where(array('a_id'=>I('get.id')))->find();
 	  if(!$info){
 	  	$this->error('参数错误',0,0);
 	  }else{
 	  	$tagList = M('cat')->where(array('c_show'=>0))->select();
 	  	$this->assign('tagList', $tagList);
 	  	$this->assign('info', $info);
 	  	$this->display('index');
 	  }
 	}
 	//修改列表
 	public function modify(){
 	   if(!IS_AJAX){
 	  	$this->error('提交方式不正确',0,0);
 	  }else{
 	  	if(D('article')->editH()){
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
			$this->error('提交方式不正确',0,0);
		}else{
			if(M('article')->where(array('a_id'=>I('post.id')))->delete()){
				$data = array('error'=>0, "msg"=>"删除成功");
			}else{
				$data = array('error'=>1, "msg"=>"删除失败");
			}
			$this->ajaxReturn($data);
		}
 	}
 	/**********文章评论*************/
 	public function artContent(){
        if(!IS_AJAX){
           $this->error('提交方式不正确',0,0);
        }else{
        	if(D('article_c')->addH()){
               $data = array('error'=>0, "msg"=>'评论成功');
               M('article')->where(array('a_id'=>I('ac_pid')))->setInc('a_num'); 
        	}else{
               $data = array('error'=>1, "msg"=>'评论失败'); 
        	}
        	$this->ajaxReturn($data);
        } 
    }
    //列表
    public function artContentList(){
    	$list = M('article_c')->order('ac_time desc')->select();
      $num = M('article_c')->order('ac_id desc')->count();
      $Page = new \Org\Util\Page($num,25);
      $show = $Page->show();
    	$this->assign('comment','active');
      $this->assign('artcomment','item');
    	$this->assign('list',$list);
      $this->assign('num',$num);
      $this->assign('page',$show);
    	$this->display();
    }
    //编辑
    public function artContentEdit(){
       $info = M('article_c')->where(array('ac_id'=>I('get.id')))->find();
       $this->assign('info',$info);
       $this->assign('comment','active');
       $this->display();
    }
    //修改
    public function artContentModify(){
       if(!IS_AJAX){
     		$this->error('提交方式不正确',0,0);
       }else{
     		$data['ac_id'] = I('post.ac_id'); 
     		$data['ac_rename'] = I('post.ac_rename');
     		$data['ac_reimg'] = getAThumb(I('post.ac_reimg'));
     		$data['ac_recontent'] = I('post.ac_recontent');
     		$data['ac_retime'] = time();
     		if(D('article_c')->editH($data)){
     			$data = array("error"=>0, "msg"=>"回复成功");
     		}else{
     			$data = array('error'=>1, "msg"=>"回复失败");
     		}
     		$this->ajaxReturn($data);
       }
    }
 }

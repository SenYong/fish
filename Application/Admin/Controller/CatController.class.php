<?php
 namespace Admin\Controller;
 use Think\Controller;

 /**
 * 栏目
 */
 class CatController extends AuthController
 {
 	public function index(){
 	  $this->assign('cat','active');
    $this->assign('catitem','item');
 	  $this->display();
 	}
    
    //添加
 	public function add(){
      if(!IS_AJAX){
      	$this->error('提交方式不正确',0,0);
      }else{
      	if(D('cat')->addH()){
      		$data = array("error"=>0, "msg"=>'添加成功');
      	}else{
            $data = array("error"=>1, "msg"=>'添加失败');
      	}
      	$this->ajaxReturn($data);
      }
 	}

    //列表
    public function catList(){
       $this->assign('cat','active');
       $this->assign('catlist','item');
       $Cat = M('cat');
       $num = $Cat->count();
       $Page = new \Think\Page($num,5);
       $show = $Page->show();
       $list = $Cat->order('c_time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
       $this->assign('num',$num);
       $this->assign('page',$show);
       $this->assign('list',$list);
       $this->display();
    }

    //修改
    public function edit(){
      $this->assign('cat','active');
      $info = M('cat')->where(array("c_id"=>I('get.id')))->find();
      if(!$info){
      	$this->error('参数错误',0,0);
      }else{
      	$this->assign('info',$info);
      	$this->display('index');
      }
    }

    //删除
    public function delete(){
       if(M('cat')->where(array('c_id'=>I('post.id')))->delete()){
       	 $data = array('error'=>0, "msg"=>"删除成功");
       }else{
       	 $data = array('error'=>1, "msg"=>"删除失败");
       }
       $this->ajaxReturn($data);
    }
 }
?>
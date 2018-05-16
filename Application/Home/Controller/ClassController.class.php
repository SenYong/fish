<?php
 namespace Home\Controller;
 use Think\Controller;

 /**
 * 文章分类
 */
 class ClassController extends CommonController
 {
 	public function _before_index(){
       $id = I('get.id');
       if(!M('cat')->where(array('c_id'=>$id))->find()){
       	 $this->error('文章类别不存在');
       }
 	}

 	public function index(){
       $this->assign('article','active');
       $cat = M('cat');
       $article = M('article');
       $id = I('get.id');
       $info = $cat->where(array('c_id'=>$id))->find();
       $classList = $article->join('fh_cat on fh_cat.c_id = fh_article.pid')->where(array('pid'=>$id))->select();
       $this->assign('info',$info);
       $this->assign('classList',$classList);
       $this->display();
 	}
 }
?>
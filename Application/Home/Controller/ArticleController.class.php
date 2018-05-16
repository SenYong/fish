<?php
namespace Home\Controller;
use Think\Controller;
class ArticleController extends CommonController {
    public function index(){
        $cat = M('cat')->order('c_id desc')->where(array('c_show'=>0))->select();
        $list = M('article')->join('fh_cat on fh_article.pid = fh_cat.c_id')->order('a_id desc')->limit(5)->select();
        $this->assign('article','active');
        $this->assign('cat',$cat);
        $this->assign('list',$list); 
        $this->display();
    }
    public function cat(){
        $id = I('get.id');
        $catList = M('cat')->join('fh_article on fh_article.pid = fh_cat.c_id')->order('a_id desc')->where(array('c_id'=>$id))->limit(5)->select();
        $cat = M('cat')->order('c_id desc')->where(array('c_show'=>0))->select();
        $this->assign('article','active');
        $this->assign('id',$id);
        $this->assign('cat',$cat);
        $this->assign('catList',$catList);
        $this->display();
    }
    public function getData(){
        if(!IS_AJAX){
            $this->error('提交方式不正确',0,0);
        }else{
            if(I('post.id')){
                $id = I('post.id');
                $page = (intval(I('post.page')) + 1) * 5;
                $list = M('cat')->join('fh_article on fh_article.pid = fh_cat.c_id')->order('a_id desc')->where(array('c_id'=>$id))->limit($page,5)->select();
            }else{
                $page = (intval(I('post.page')) + 1) * 5;
                $list = M('article')->join('fh_cat on fh_article.pid = fh_cat.c_id')->order('a_id desc')->limit($page,5)->select();
            }
            $this->ajaxReturn($list);
        }
    }
    public function _before_info(){
        $id = I('get.id'); 
        if(!M('article')->where(array('a_id'=>$id))->find()){
           $this->error('文章不存在');
        }
    }
    public function info(){
        $art = M('article');
        $artc = M('article_c');
        $id = I('get.id');
        $art->where(array('a_id'=>$id))->setInc('a_hit');
        $info = $art->where(array('a_id'=>$id))->find();
        $prev = $art->order('a_id desc')->where('a_id < '.$id)->find();
        $next = $art->where('a_id > '.$id)->find();
        $num = $artc->where(array('ac_pid'=>$id))->count();
        $list = $artc->order('ac_time desc')->where(array('ac_pid'=>$id))->select();
        $this->assign('article','active');
        $this->assign('info',$info);
        $this->assign('prev',$prev);
        $this->assign('next',$next);
        $this->assign('num',$num);
        $this->assign('list',$list);
        $this->display();
    }
}
?>
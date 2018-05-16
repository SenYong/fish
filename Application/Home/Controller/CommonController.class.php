<?php
 namespace Home\Controller;
 use Think\Controller;
 /**
 * 公共部分
 */
 class CommonController extends Controller
 {
 	 public function _initialize(){
 	   $Art = M('article');
 	   $Cat = M('cat');
 	   $Log = M('log');
 	   $Say = M('say');
 	   $System = M('system');
 	   
 	if(!$artList = S('artList')){
 	   $artList = $Art->where(array('a_show'=>0))->limit(7)->select();
          setS('artList',$artList);
 	}
       $this->assign('artList',$artList);

       if(!$cat = S('cat')){
          $cat = $Cat->order('c_id desc')->select();
          setS('cat',$cat);
       }
       $this->assign('cat',$cat);

       if(!$tab1 = S('tab1')){
	   $tab1 = $Art->order('a_time desc')->limit(6)->select();
	   setS('tab1',$tab1);
       }
       $this->assign('tab1',$tab1);

       if(!$tab2 = S('tab2')){
	   $tab2 = $Log->order('l_time desc')->limit(6)->select();
	   setS('tab2',$tab2);
       }
       $this->assign('tab2',$tab2);

       if(!$tab3 = S('tab3')){
	  $tab3 = $Say->order('s_time desc')->limit(6)->select();
	  setS('tab3',$tab3);
       }
       $this->assign('tab3',$tab3);

       if(!$label = S('label')){
	  $label = $Cat->order('c_id desc')->where(array('c_show'=>0))->field('c_id,c_name')->select();
	  setS('label',$label);
       }
       $this->assign('label',$label);

       if(!$text = S('text')){
	  $text = $Art->join('fh_cat on fh_article.pid = fh_cat.c_id')->order('a_hit desc')->field('a_id,a_name,a_img,a_time,a_hit,c_name')->limit(5)->select();;
	  setS('text',$text);
       }
       $this->assign('text',$text);
       
       if(!$system = S('system')){
	  $system = $System->where(array('id'=>1))->find();
	  setS('system',$system);
       }
       $this->assign('system',$system);
    }
 }
?>
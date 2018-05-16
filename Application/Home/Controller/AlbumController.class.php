<?php
  namespace Home\Controller;
  use Think\Controller;

  /**
  * 相册
  */
  class AlbumController extends CommonController
  {
  	  public function index(){
         $albumList = M('album')->where(array('al_show'=>0))->select();
  	  	 $this->assign('album','active');
         $this->assign('albumList',$albumList);
  	  	 $this->display();
  	  }
      public function _before_info(){
         $id = I('get.id');
         if(!M('album')->where(array('al_id'=>$id))->find()){
            $this->error('相册不存在');
         }
      }
      public function info(){
         $id = I('get.id');
         M('album')->where(array('al_id'=>$id))->setInc('al_hit');
         $infoList = M('picture')->join('fh_album on fh_album.al_id = fh_picture.p_id')->where(array('pid'=>$id))->select();
         for($i = 0; $i < count($infoList); $i++){
            $infoList[$i]['p_img'] = explode(",",$infoList[$i]['p_img']);
         } 
         $this->assign('infoList',$infoList);
         $this->display();
      }
  }
?>
<?php
  namespace Admin\Model;
  use Think\Model;

  /**
  * 图片模型
  */
  class PictureModel extends Model
  {
     protected $_auto = array(
        array('p_time','time',3,'function'),
        array('p_system','getOs',3,'function'),
        array('p_ip','get_client_ip',3,'function')
     );
     public function addH(){
     	if(!$this->create()){
           return $this->getError();
     	}else{
           $this->add();
           return true;
     	}
     }
  }
?>
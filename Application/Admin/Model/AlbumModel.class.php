<?php
  namespace Admin\Model;
  use Think\Model;
  /**
  * 相册模型
  */
  class AlbumModel extends Model
  {
  	 protected $_auto = array(
        array('al_time','time',3,'function'),
        array('al_system','getOs',3,'function'),
        array('al_ip','get_client_ip',3,'function')
  	 );
  	 public function addH(){
  	 	if(!$this->create()){
  	 		return $this->getError();
  	 	}else{
  	 		$this->add();
  	 		return true;
  	 	}
  	 }
  	 public function editH(){
  	 	if(!$this->create()){
  	 		return $this->getError();
  	 	}else{
  	 		$this->save();
  	 		return true;
  	 	}
  	 }
  }
?>
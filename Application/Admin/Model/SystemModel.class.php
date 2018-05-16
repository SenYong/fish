<?php
  namespace Admin\Model;
  use Think\Model;
  /**
  * 系统设置模型
  */
  class SystemModel extends Model
  {
  	 protected $_auto = array(
  	 	array('createtime','time',3,'function')
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
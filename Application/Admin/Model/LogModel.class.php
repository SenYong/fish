<?php
  namespace Admin\Model;
  use Think\Model;
  /**
  * 日志模型
  */
  class LogModel extends Model
  {
     protected $_auto = array(
        array('l_time','time',3,'function'),
        array('l_system','getOS',3,'function'),
        array('l_ip','get_client_ip',3,'function'),  
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
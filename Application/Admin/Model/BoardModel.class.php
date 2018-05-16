<?php
  namespace Admin\Model;
  use Think\Model;
  /**
  * 留言板模型
  */
  class BoardModel extends  Model
  {
  	 protected $_auto = array(
        array('b_time','time',3,'function'),
        array('b_ip','get_client_ip',3,'function'),
        array('b_system','getOS',3,'function')
  	 );
     public function addH(){
     	if(!$this->create()){
     		return $this->getError();
     	}else{
     		$this->add();
     		return true;
     	}
     }
     public function editH($data){
     	if(!$data){
     		return $this->getError();
     	}else{
     		$this->save($data);
     		return true;
     	}
     }
  }
?>
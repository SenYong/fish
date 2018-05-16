<?php
  namespace Admin\Model;
  use Think\Model;

  /**
  * 评论说说模型
  */
  class SayCModel extends Model
  {
  	 protected $_auto = array(
       array('sc_img','getAThumb',3,'function'),
       array('sc_ip','get_client_ip',3,'function'),
       array('sc_system','getOS',3,'function'),
       array('sc_time','time',3,'function')
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
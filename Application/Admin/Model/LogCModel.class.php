<?php
  namespace Admin\Model;
  use Think\Model;
  /**
  * 日志模型
  */
  class LogCModel extends Model
  {
     protected $_auto = array(
        array('lc_time','time',3,'function'),
        array('lc_system','getOS',3,'function'),
        array('lc_ip','get_client_ip',3,'function'),  
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
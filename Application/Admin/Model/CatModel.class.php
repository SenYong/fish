<?php
  /**
  * 栏目模型
  */
  namespace Admin\Model;
  use Think\Model;
  class CatModel extends Model
  {
     //自动完成
     protected $_auto = array(
       array('c_time','time', 3 ,'function'),
       array('c_system','getOS', 3 ,'function'),
       array('c_ip','get_client_ip', 3 ,'function')
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
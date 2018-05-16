<?php
 /**
 * 文章模型
 */
 namespace Admin\Model;
 use Think\Model;
 class ArticleModel extends Model
 {
 	protected $_auto = array(
       array('a_time','time',3,'function'),
       array('a_system','getOS',3,'function'),
       array('a_ip','get_client_ip',3,'function')
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
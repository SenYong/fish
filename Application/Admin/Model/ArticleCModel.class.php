<?php
 /**
 * 文章评论模型
 */
 namespace Admin\Model;
 use Think\Model;
 class ArticleCModel extends Model
 {
   	protected $_auto = array(
         array('ac_img','getAThumb',3,'function'),
         array('ac_time','time',3,'function'),
         array('ac_system','getOS',3,'function'),
         array('ac_ip','get_client_ip',3,'function')
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
<?php
   /**
   * 说说模型
   */
    namespace Admin\Model;
    use Think\Model;
	class SayModel extends Model
	{
		protected $_auto = array(
           array('s_time','time',3,'function'),
           array('s_system','getOS',3,'function'),
           array('s_ip','get_client_ip',3,'function')
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
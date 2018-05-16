<?php
/*
   用户模型
 */
namespace Admin\Model;
use Think\Model;

class UserModel extends Model
{
	 //自动验证
	 protected $_validate = array(
       array('u_name','','帐号名称已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯一
	 );
	 //自动完成
	 protected $_auto = array(
	    array('u_password','md5',3,'function') , // 对password字段在新增和编辑的时候使md5函数处理
	    array('u_createtime','time',3,'function'),
	    array('u_ip','get_client_ip',3,'function')
	 );

	 public function in($user,$password){
        $info = $this->where(array('u_name'=>$user))->find();
        if($info){
        	if($info['u_password'] == md5($password)){
        		session('uid', $info['u_id']);
        		session('uname', $info['u_name']);
        		session('uclass', $info['u_class']);
        		return $info;
        	}else{
        		return false;
        	}
        }else{
        	return false;
        }
	 }

     public function addH(){
        if(!$this->create()){
            return $this->getError();
        }else{
            $this->add();
            return true;
        }
     }

     public function editH($info){
        if($info){
            return $this->save($info);
        }else{          
            return $this->getError();
        }
     }
}
?>
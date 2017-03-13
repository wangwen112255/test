<?php
// 本类由系统自动生成，仅供测试用途
class BaseAction extends Action {
	public function _initialize(){
      // getUser();

    } 
    
    public function setStatus(){
    	$id=$_POST['id'];
    	if(!$id){
    		$this->ajaxReturn(toJson('数据的id不正确'));
    		return;
    	}
    	$user=$this->dao->find($id);
    	if(!$user){
    		$this->ajaxReturn(toJson("数据不存在"));
    		return;
    	}
    	$status=array("隐藏","显示");
    	$res=$this->dao->where('id='.$id)->setField('status',abs($user['status']-1));
    	if($res){
    		$this->ajaxReturn(toJson(true,"已改变",$status[abs($user['status']-1)]));
    	}else{
    		$this->ajaxReturn(toJson("修改失败"));
    	}

    }  
     public function del(){
    	$id=$_POST['id'];
    	if(!$id){
    		$this->ajaxReturn(toJson('数据的id不正确'));
    		return;
    	}
    	$user=$this->dao->find($id);
    	if(!$user){
    		$this->ajaxReturn(toJson("数据不存在"));
    		return;
    	}
    	$res=$this->dao->where('id='.$id)->delete();
    	if($res){
    		$this->ajaxReturn(toJson(true,"已删除"));
    	}else{
    		$this->ajaxReturn(toJson("删除失败"));
    	}

    }              
    
      

}

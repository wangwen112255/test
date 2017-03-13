<?php
class RuleAction extends BaseAction{
    protected $dao;
    public function _initialize(){
    	parent::_initialize();
		$this->dao=D(MODULE_NAME);
    	
    }
	public function index(){
	 	$data=$this->dao->where()->limit()->select();
	 	$this->assign("datalist",$data);
	 	$status=["隐藏","显示"];
	 	$this->assign("status",$status);
	    $this->display(); 
	 }
	public function create(){
     $datalist=$this->dao->where("status=1")->select();
     $this->assign("selectlist",$datalist);
     
     if($_GET['id']){
     	$datadetail=$this->dao->find($_GET['id']);
     	$this->assign('datadetail',$datadetail);
     	$this->display();
     }
     else{
     $this->display();
     }
	}
	public function save(){
	if($this->dao->create()){
		if($_POST['id']){
           if($this->dao->save())
           $this->ajaxReturn(toJson(true,'修改成功'));
           else
           	$this->dao->ajaxReturn(toJson('修改失败或未修改'));
		}
		else{ 
		if($this->dao->add())
			$this->ajaxReturn(toJson(true,'添加成功'));
  		else
  			$this->ajaxReturn("添加失败");
  		}

	}
	else{

		$this->ajaxReturn(toJson($this->dao->getError()));
	}
	}
	// public function edit(){

	// 	// $this->display('');
	// }
}
?>
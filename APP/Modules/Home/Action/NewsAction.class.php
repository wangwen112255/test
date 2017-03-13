
<?php
header('Content-Type:text/html;charset=utf-8');
class NewsAction extends Action{
protected $tableName="user";
public function index(){
  echo "dsfsd";
$this->display();
}
public function read(){
// $this->show(U("index",array("id"=>12,"name"=>"dsfasd")));
 // $this->assign('waitSecond',"20");
 //$this->error("失败了",'Admin/UserType/index',10);
  // $this->redirect("Index/index","加载中",2);
//	redirect('/New/category/cate_id/2', 5, '页面跳转中...');
//	
// echo 'asdf';
// echo htmlspecialchars($this->_get("name",'',20));
// echo  "<b style='color:blue'>sadfds</b>";
// echo $_GET['names'];
// echo "sdfasd";
echo  $_GET['_URL_'][0]; 

// dump($m->find(17));
}
public function adduser()
{
$m=D("News");
$ms=array(
    array("name",'require',"用户米名必须存在"),
    // array("password",'name','Miami经存在',0,'confirm'),
    array("password",array(1,2),'长度不够',0,'in')
    // array("password",'require','Miami经存在',0,'unique',3)
	);
// $m->setProperty("_validate",$ms);
 // $m->create();
 // 
 // $condition=array("id"=>array('gt',10));
 // $condition['name']="wangwen";
 // $condition['_string']='id>1';
// $cdata=$m->where(array("id"=>array("not between","5,10")))->select();?
// $cdata=$m->query("select * from __TABLE__ where id ");
// $cdata=$m->where($condition)->field('id',true)->select();
	$cdata=$m->find(6);
// dump($cdata);
// $cdata=$m->getFieldByName('wangwens','id');
if($cdata){

	dump($cdata);
 // echo "数据增加成功";

 
}
// $m->find(1);
// $m->create();

// $m->names="mimin";
// $data['names'] = 'ThinkPHPs';
// $data['passwords'] = 'ThinkPHP@gmail.coms';

// $m->data($data);
 // $m->create();
// dump($m);
// dump($m->add($data));
// $mi=$this->_post();

// if($m->add()){
//  	echo "成功";
//  	return;
//  }
 // $data=$m->select(array("where=>id>4","order"=>3,"limit"=>3,"field"=>'name'));
 // $data=$m->field('id')->select();
// $data=$m->join('INNER JOIN think_classes ON think_classes.user_id=think_news.id')->select();
   // $data=$m->UNION("select classname from think_classes ")->select();
   // $data=$m->distinct(true)->field("name,password")->select();/
  
   // dump($m);
   // dump($this->_post());
// $m->create();
// // echo $m->add();
   
  
   // $datas['password']="131313";
   // $m->create($datas,'',true);
   // if($m->add()){
   //   echo "gignxin成功";
   // }
   // 数据对象集合
  // $m->name="sdfsasadfdasadsf";
  // $m->id=15;
  // $m->id=3;
  // $m->delete();
   // 数据对象集合

  // $data=$m->where(array('name'=>"wangwen"))->getField("name,id,password",":");
  
 // $data=$m->where("id>5")->field("name",true)->order("id desc,name asc")->limit(20)->page(2)->select();O
 // $data=$m->find(5);
 // dump($data);
 // $data=$m->parseFieldsMap($data);
 // $data=$m->Table('think_user user')->where()->select();
// dump($m->create());
// // dump($data);
// $a="show";

// $this->assign($a);
// $this->show("dfasd{$a}中国",'utf-8');
// $mi=$m->find(6)
// 
// $mi=$m->where('id>5')->select();
// dump($mi);
$mi=$m->find(8);
$this->assign("status","莫斯科打飞机萨达");
$this->assign("title","migntiansdfsda");

$this->assign("mixi",null);
$this->assign("number",9);
$this->assign("mi",$mi);
$this->assign("switchname",2);
$this->assign("switchnames",null);
$this->assign("c","fdsafadsf");
$this->display("./Public/public.html");

}

public function block(){
  $this->error("失败了");
}
}

?>

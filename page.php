
<?php

class Model {
public $filed;
public $tabname;
public $where;
public $order;
public $limit;
public function __construct($tab){
	mysql_connect(HOST,USER,PWD);
	mysql_select_db(DBNAME);
	// mysqli_query("set names utf8");
	$this->tabname=$tab;
}
public  function field($f){
		$this->field=$f;
		return $this;
}
public  function where($f){
		$this->where='where '.$f;
		return $this;
}

public  function limit($f){
		$this->limit='limit '.$f;
		return $this;
}

public  function select(){
	  $sql="select {$this->field} from {$this->tabname}  {$this->where} {$this->order}{$this->limit}";
	  // echo $sql;
	  // exit;
	  $re=mysql_query($sql);

	while($data=mysql_fetch_assoc($re)){
		$result[]=$data;
	}
		return $result;
	}


public function order($f){
	$this->order='order by '.$f;
	return $this;
}
public function add($arr){

foreach($arr as $k=>$v){
$key[]=$k;
$value[]="'".$v."'";
}
// var_dump($key);

$kstr=join(',',$key);
$vstr=join(',',$value);
$sql="insert into {$this->tabname}($kstr) values($vstr)";
echo $sql;

mysql_query($sql);
if(mysql_query($sql)){
echo mysql_insert_id();
}else{
	echo "添加失败";
}
}









}



?>
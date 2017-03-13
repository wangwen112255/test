
<?php
class NewsModel extends Model{

protected $_auto = array ( 
    array('password','1'),  // 新增的时候把status字段设置为1
  // 对password字段在新增的时候使md5函数处理
    
);
protected $_map = array(
        'names' =>'name', // 把表单中name映射到数据表的username字段
        'passwords' =>'password', // 把表单中的mail映射到数据表的email字段
    );

public function ch(){

dump($this->select());

}
public function adduser(){
  $data['name']="migncheng";
  $data['password']="migncheng";
  dump($this->select());
}



}

?>
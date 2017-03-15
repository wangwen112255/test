<?php
include "config.php";
include "page.php";
$m=new Model("think_user");
$data=$m->field('*')->order('id desc')->select();
// res($data);
$a=array('username'=>"wangwen",'password'=>"1212",'createtime'=>'121212','ip'=>'127.0.0.1');
$m->add($a);
function res($data){
 echo "<pre>";
 print_r($data);
 echo "</pre>";

}
?>
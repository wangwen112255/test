<?php
/**
* 
*/
class RuleModel extends Model
{
	protected $_validate=array(
    array('title','require','用户名必须得输'),
    array('name','require','请输进去正确的连接'),
    array('title','','菜单名已经存在',0,'unique',1)
    // array('title','','菜单名已经存在',0,'unique',1)



	);

	


}


?>     




     

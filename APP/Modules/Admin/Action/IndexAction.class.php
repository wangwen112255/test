<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends BaseAction {
	public function index(){
     $rule=M('Rule');
     $navlistdata=$rule->where()->select();
     $datalist=getTree($navlistdata);
     $this->assign("navlist",$datalist);
     $this->display(); 
    }

}
   // 
   // 
   // 菜单树形结构
   // $navlist=[
     //        ['title'=>'订单','name'=>'Order/index','icon'=>'fa fa-reorder'],
     //        ['title'=>'菜单',
     //            'child'=>[
     //                ['title'=>'菜品','name'=>'Goods/index','icon'=>'fa fa-bookmark-o'],
     //                ['title'=>'分类','name'=>'Category/index','icon'=>'fa fa-cube']
     //            ],
     //            'icon'=>'fa fa-book'
     //        ],
     //        ];
     //        
     // 
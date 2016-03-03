<?php
namespace Home\Controller;
use Think\Controller;
class QueryProductController  extends Controller {
    public function queryProduct(){
        $User = D('Product');
        $data = $User->select();
        $this->assign('productList',$data);
        $this->display();
    }
}
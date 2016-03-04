<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {

    public function index($page=null,$pageCount=10){
        $User = M('Product');
        if($page==null){
            $data = $User->select();
        }
        else{
            $data = $User->page($page,$pageCount)->select();
            $this->assign('page',$page);
            $this->assign('pageCount',$pageCount);
        }
        $this->assign('productList',$data);
        $this->display();
    }

}
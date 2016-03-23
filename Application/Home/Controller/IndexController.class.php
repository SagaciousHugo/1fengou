<?php
namespace Home\Controller;
class IndexController extends BaseController {

    public function index($page=null,$pageCount=10){
        $User = M('Product');

        if($page==null){
            $data = $User->select();
            trace($data,'商品信息');
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
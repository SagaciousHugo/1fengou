<?php
namespace Home\Controller;
use Think\Controller;

class ManageController extends Controller
{
    public function queryProduct(){
        $User = D('Product');
        $data = $User->select();
        $this->assign('productList',$data);
        $this->display();
    }

    public function modifyProductStep_1(){
        $id = I('get.id',-1);
        if($id>0){
            $User = D('Product');
            $data = $User->where('id ='.$id)->select();
            $this->assign('productList',$data);
            $this->display('Manage:modifyProduct');
        }else{
            $this->error('该商品信息不存在！');
        }
    }
    public function modifyProductStep_2()
    {
        $User = M("Product");
        $data['name'] = I('post.name');
        $data['price'] = I('post.price');
        $data['introduce'] = I('post.introduce');
        if ($User->where('id=' . I('post.id'))->save($data)) {
            $this->success('修改成功，即将返回列表页面', 'http://localhost/1fengou/index.php/Home/Manage/queryProduct');
        } else {
            $this->error('商品信息修改失败！');
        }
    }

        public function deleteProduct(){
            $id = I('get.id',-1);
            $User = M('Product');
            if($User->delete($id)){
                $this->success('删除成功，即将返回列表页面', 'http://localhost/1fengou/index.php/Home/Manage/queryProduct');
            }else{
                $this->error('商品信息删除失败！');
        }
    }
}
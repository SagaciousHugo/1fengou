<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index($type,$page=null,$pageCount=10){
        $ManageProduct = new \Home\Event\ManageProductEvent();
        $this->assign('productList',$ManageProduct->queryProductByPage($page));
        if($type == "index") {
            $this->display('Index:index');
        } elseif ($type == "manage"){
            $this->display('Index:manageProduct');
        } else {

        }
    }

    public function editProduct(){
        if(I('id') == null){
            //新增商品
            $this->display('Index:editProduct');
        }else{
            //更新商品
            $ManageProduct = new \Home\Event\ManageProductEvent();
            $data = $ManageProduct->queryProductById(I('id'));
            $this->assign('productList', $data);
            $this->display('Index:editProduct');
        }
    }

    public function deleteProduct(){
        $ManageProduct = new \Home\Event\ManageProductEvent();
        $result = $ManageProduct->deleteProduct(I('id'));
        if($result == true){
            /*$this->success('商品删除成功！');*/
            $message = 'deleteSuccess';
            $this->ajaxReturn($message);
        }else{
            $this->error($result);
        }
    }

    public function saveProduct(){
        header("Content-Type:text/html;charset=utf-8");
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =      './Public/Resources/Images'; // 设置附件上传根目录
        $upload->savePath  =      ''; // 设置附件上传（子）目录
        // 上传文件
        $info   =   $upload->upload();
        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }else{// 上传成功 获取上传文件信息
            foreach($info as $file){
                $params = I('post.');
                $params['thumbnail'] = "Resources/Images".$file['savepath'].$file['savename'];
                $ManageProduct = new \Home\Event\ManageProductEvent();
                $result = $ManageProduct->saveProduct($params);
                if($result!=false){
                    $this->success('已成功创建id'.$result.'商品！');
                }else{
                    $this->error($result);
                }
            }


        }
    }

}
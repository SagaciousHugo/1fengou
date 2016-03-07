<?php
/**
 * Created by PhpStorm.
 * User: SagaciousHugo
 * Date: 2016/3/4
 * Time: 15:22
 */
namespace Home\Controller;
use Think\Controller;
class ManageController extends Controller
{
    //列表查询
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
        $this->display('Index:manageProduct');
    }

    //图片上传
    public function uploadImages()
    {
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize = 3145728;// 设置附件上传大小
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath = './Public/Resources/Images'; // 设置附件上传根目录
        $upload->savePath = ''; // 设置附件上传（子）目录
        // 上传文件
        $info = $upload->uploadOne($_FILES['photo']);
        if (!$info) {// 上传错误提示错误信息
            $data['status'] = 'error';
            $data['message'] = $upload->getError();
            return $data;
        } else {// 上传成功 获取上传文件信息
            $data['status'] = 'success';
            $data['thumbnail'] = "Resources/Images" . $info['savepath'] . $info['savename'];
            return $data;
        }
    }
    //根据id查询单个商品信息
    public function queryProductById($id){
        $User = M('Product');
        return  $User->find($id);
    }

    //保存商品信息（创建，更新）
    public function saveProduct(){
        $User = D('Product');
        $params = I('post.');
        $uploadResult = $this->uploadImages();
        if($params['id'] == null){
            //新增商品
            if(!$User->create($params,1)) {
                $this->redirect('Manage/editProduct','','5',$User->getError().'，请重新创建商品...');
            }else {
                $id = $User->add();
                if($id === false) {
                    $this->redirect('Manage/editProduct','','5',$User->getError().'，请重新创建商品...');
                }else {
                    $this->redirect('Index/index','','5','新增商品成功，返回首页...');
                }
            }
        }else{
            //更新商品
            if(!$User->create($param,2)) {
                $this->redirect('Manage/editProduct','id='.$params['id'],'5',$User->getError().'，请重新修改本商品...');
            }else {
                $id = $User->save();
                if($id === false) {
                    $this->redirect('Manage/editProduct','id='.$params['id'],'5',$User->getError().'，请重新修改本商品...');
                }else {
                    $this->redirect('Manage/index','','5','商品信息修改成功，返回商品管理页面...');
                }
            }
        }
    }
    //删除商品
    public function deleteProduct($id){
        $User = M('Product');
       if(is_array($id)){
           $param='';
           foreach($id as $tmp){
               $param= $param.$tmp.',';
           }
       }else{
            $param = $id;
       }
        if($User->delete($param)){
            $data['status'] = 'success';
            $this->ajaxReturn($data);
        }else{
            $data['status'] = 'error';
            $data['message'] = $User->getError();
            $this->ajaxReturn($data);
        }
    }
    //编辑商品
    public function editProduct(){
        if(I('id') == null){
            //新增商品
            $this->display('Index:editProduct');
        }else{
            //更新商品
            $data = $this->queryProductById(I('id'));
            $this->assign('productList', $data);
            $this->display('Index:editProduct');
        }
    }




}
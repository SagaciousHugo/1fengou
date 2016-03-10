<?php
/**
 * Created by PhpStorm.
 * User: SagaciousHugo
 * Date: 2016/3/4
 * Time: 15:22
 */
namespace Home\Controller;
class ManageController extends BaseController
{
    //列表查询:包括-每页显示数量变化的查询，分页查询，按商品id搜索查询
    public function index($type=null,$pageCount=10)
    {
        $currentPage = I('p') != null ? I('p') : 1;//当前要显示的页码
        //拼查询参数
        if(I('id')!=null){
            $param['id'] = 'like' + '%'.I('id').'%';
            $this->assign('id',I('id'));
        }
        if(I('name')!=null){
            $param['name'] = array('like','%'.I('name').'%');
            $this->assign('name',I('name'));
        }
        if(I('price')!=null){
            $param['price'] = array('like','%'.I('price').'%');
            $this->assign('price',I('price'));
        }
        if(I('order')!=null){
            $param['order'] = I('order');
        }
        //查询数据
        $this->queryProduct($param,$currentPage,$pageCount);

      //  if ($type == null) {
            $this->display('Index:manageProduct');
       /* }else{
            $this->display('Index:manageTable');
        }*/
    }

    public function queryProduct($params,$currentPage,$pageCount){
        $User = M('Product');
        $params['1'] = '1';//补充无效查询条件，防止查询条件为空时错误
        //分页参数
        $total = count($User->where($params)->select());//数据总数
        $from = $total != 0 ? ($currentPage - 1) * $pageCount + 1 : 0;//起始数据编号
        $to = $currentPage * $pageCount < $total ? $currentPage * $pageCount : $total;//终止数据编号
        //分页插件

        $page = new \Think\Page($total,$pageCount);
        $p = $page->show();
        //查询数据
        $data = $User->where($params)->page($currentPage, $pageCount)->select();
        //查询数据赋值
        $this->assign('productList',$data);
        //分页参数赋值
        $this->assign('_page', $p ? $p : '');
        $this->assign('total', $total);
        $this->assign('pageCount', $pageCount);
        $this->assign('page', $currentPage);
        $this->assign('from', $from);
        $this->assign('to', $to);

    }

    //根据id查询单个商品信息
    public function queryProductById($id){
        $User = M('Product');
        return  $User->find($id);
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
            $data['status'] = 'error22';
            $data['message'] = $upload->getError();
            return $data;
        } else {// 上传成功 获取上传文件信息
            $data['status'] = 'success';
            $data['thumbnail'] = "Resources/Images" . $info['savepath'] . $info['savename'];
            return $data;
        }
    }

    //保存商品信息（创建，更新）
    public function saveProduct(){
        $User = D('Product');
        $params = I('post.');

        $uploadResult = $this->uploadImages();
        if($uploadResult[status]=='error11'){
            $data['status'] = 'error77';
            $data['message'] = '图片上传失败！';
            $this->ajaxReturn($data);
        }else{
            $params['thumbnail'] = $uploadResult['thumbnail'];
            if($params['id'] == null){
                //新增商品
                if(!$User->create($params,1)) {
                    $data['status'] = 'error33';
                    $data['message'] = '新增商品失败！';
                    $this->ajaxReturn($data);
                }else {
                    $id = $User->add();
                    if($id === false) {
                        $data['status'] = 'error44';
                        $data['message'] =  '新增商品失败！';
                        $this->ajaxReturn($data);
                    }else {
                        $data['status'] = 'success';
                        $data['message'] = '新增id'.$id .'商品成功！';
                        $this->ajaxReturn($data);
                    }
                }
            }else{
                $User->startTrans();
                //更新商品
                if(!$User->create($params,2)) {
                    $User->rollback();
                    $data['status'] = 'error55';
                    $data['message'] = '更新商品失败！gggg';
                    $this->ajaxReturn($data);
                }else {
                    $id = $User->save();
                    if($id === false) {
                        $User->rollback();
                        $data['status'] = 'error66';
                        $data['message'] =  '更新商品失败！';
                        $this->ajaxReturn($data);
                    }else {
                        $User->commit();
                        $data['status'] = 'success';
                        $data['message'] = '更新id'.$id.'商品成功！';
                        $this->ajaxReturn($data);
                    }
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
            $this->assign('editType','create');
            $this->display('Index:editProduct');
        }else{
            //更新商品
            $data = $this->queryProductById(I('id'));
            $this->assign('editType','update');
            $this->assign('productList', $data);
            $this->display('Index:editProduct');
        }
    }
}
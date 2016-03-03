<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
/*    public function index(){
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }*/
/*    public function showImage(){
    $size = getimagesize('./1.jpg'); //获取mime信息
    $fp=fopen('./1.jpg', "rb"); //二进制方式打开文件
     header("Content-type: {$size['mime']}");
        fpassthru($fp); // 输出至浏览器
    exit;
    }*/

    public function index($type,$page=null,$pageCount=10){
        $ManageProduct = new \Home\Event\ManageProductEvent();
        $this->assign('productList',$ManageProduct->queryProductByPage($page));
        if($type == "index") {
            $this->display('Index:index');
        } elseif ($page == "manage"){
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
            $this->success('商品删除成功！');
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
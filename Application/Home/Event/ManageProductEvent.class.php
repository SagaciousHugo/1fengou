<?php
/**
 * Created by PhpStorm.
 * User: SagaciousHugo
 * Date: 2016/3/3
 * Time: 13:54
 */

namespace Home\Event;
class ManageProductEvent
{
    //查询商品
    public function queryProductByPage($page=null,$pageCount=10){
        $User = M('Product');
        if($page==null){
            $data = $User->select();
        }
        else{
            $data = $User->page($page,$pageCount)->select();
        }
        return $data;
    }
    public function queryProductById($id){
        $User = M('Product');
        return  $User->find($id);
    }


    //保存商品信息（创建，更新）
    public function saveProduct($param){
        $User = D('Product');
        if($param['id'] == null){
            //新增商品
            if(!$User->create($param,1)) {
                return $User->getError();
            }else {
                $id = $User->add();
                if($id === false) {
                    return '商品信息插入数据库失败！';
                }else {
                   return $id;
                }
            }
        }else{
            //更新商品
            if(!$User->create($param,2)) {
                return $User->getError();
            }else {
                $id = $User->save();
                if($id === false) {
                    return '在数据库中更新商品信息失败！';
                }else {
                    return $id;
                }
            }
        }
    }
    //删除商品
    public function deleteProduct($id){
        $User = M('Product');
        if($User->delete($id)){
            return true;
        }else{
            return $User->getError();
        }
    }
}
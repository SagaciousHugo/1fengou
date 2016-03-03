<?php
/**
 * Created by PhpStorm.
 * User: SagaciousHugo
 * Date: 2016/2/29
 * Time: 10:27
 */
namespace Home\Model;
use Think\Model;
class ProductModel extends Model {
    protected $_validate = array(
        array('name','require','商品名不能为空！'),
        array('price','require','商品价格不能为空！'),
        array('introduce','require','商品简介不能为空！'),
    );

    protected $_auto = array(
        array('sales','0',1),
        array('create_time','time',1,'function'),
        array('update_time','time',3,'function'),
    );
}
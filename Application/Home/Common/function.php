<?php
/**
 * Created by PhpStorm.
 * User: SagaciousHugo
 * Date: 2016/3/23
 * Time: 10:03
 */

function check_verify($code,$id=''){
    $verify = new \Think\Verify();
    return $verify->check($code,$id);
}
<?php
/**
 * Created by PhpStorm.
 * User: SagaciousHugo
 * Date: 2016/3/9
 * Time: 20:21
 */
namespace Home\Model;
use Think\Model;
class UserModel extends  Model
{
    /**
     * 用户登录认证
     * @param  string  $username 用户名
     * @param  string  $password 用户密码
     * @return integer           登录成功-用户ID，登录失败-错误编号
     */
    public function login($username, $password){
        $map = array();
        $map['username'] = $username;
        /* 获取用户数据 */
        $user = $this->where($map)->find();
        if($user!=null){
            if($password === $user['password']){
                return $user['id']; //登录成功，返回用户ID
            }else{
                return -2; //密码错误
            }
        }else{
            return -1;//用户不存在或被禁用
        }
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: SagaciousHugo
 * Date: 2016/3/9
 * Time: 19:35
 */

namespace Home\Controller;
use Think\Controller;

class PublicController extends  Controller
{

     public function login(){
         if(IS_POST){
             $User = D('User');
             $uid = $User->login(I('username'),I('password'));
             if($uid>0){
                 //登陆成功
                 /* 记录登录SESSION和COOKIES */
                 session('user_auth',$uid);
                 session('user_name',I('username'));
                 session('user_auth_sign', $uid.'woshimingming');
                 $this->success('登陆成功！',U('Index/index'));
             }else{
                 //登陆失败
                 $this->redirect('login','',5,'登陆失败，请重新登陆！');
             }
         }
         else{
            if($this->is_login()){
                $this->redirect('Index/index');
            }else{
                $this->display();
            }

         }


    }

    public function logout(){
        if($this->is_login()){
            session('user_auth', null);
            session('user_auth_sign', null);
            session('[destroy]');
            $this->success('退出成功！', U('login'));
        } else {
            $this->redirect('login');
        }
    }
    public function is_login(){
        $user = session('user_auth');
        if (empty($user)) {
            return 0;
        } else {
            return session('user_auth_sign') == $user.'woshimingming' ? $user['uid'] : 0;
        }
    }
}
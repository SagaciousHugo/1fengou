<?php
/**
 * Created by PhpStorm.
 * User: SagaciousHugo
 * Date: 2016/3/9
 * Time: 21:54
 */

namespace Home\Controller;
use Think\Controller;
class BaseController extends Controller
{
    function __construct(){
        parent::__construct();
        $public = new \Home\Controller\PublicController();
        $is_login = $public->is_login();
       if(!$is_login){
        $this->redirect('Public/login');
        }

    }
}
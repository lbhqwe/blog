<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/6
 * Time: 9:22
 */

namespace application\home\controllers;
use core\mybase\Controller;
use core\MySession;
class LoginController extends Controller
{
    public function login(){
        $this->display();
    }
    public function signup(){
        $this->display();
    }
    public function logout(){
        MySession::destorySession();
        header("location:index.php?g=admin&c=login&a=index");
    }


}
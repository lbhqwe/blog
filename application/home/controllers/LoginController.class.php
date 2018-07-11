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
use application\home\models\SendMailModel;
class LoginController extends Controller
{
    public function login(){
//        $this->assign("id",MySession::getSession("id"));
//        $this->assign("uname",MySession::getSession("uname"));
        $this->display();
    }
    public function signup(){
//        $this->assign("id",MySession::getSession("id"));
//        $this->assign("uname",MySession::getSession("uname"));
        $this->display();
    }
    public function logout(){
        MySession::destorySession();
        header("location:index.php?g=home&c=index&a=index");
    }
    public function forgot(){
        $this->display();
    }
    public function sendemail(){
            $feedback=["errno"=>500,"mess"=>"邮件发送失败！"];
            $args=$_POST["forgotEmail"];
            //持久化用户留言数据
            $gbm=new SendMailModel();
            $gbm->sendmail($args);
            //$this->display('contact');
                $feedback['errno']=200;
                $feedback['mess']="邮件发送成功!";
            echo json_encode($feedback,JSON_UNESCAPED_UNICODE);//返回json对象
        }
}
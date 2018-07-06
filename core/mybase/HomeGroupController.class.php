<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/3
 * Time: 16:43
 */

namespace core\mybase;
use core\Application;
use core\MySession;

class HomeGroupController extends Controller
{
    //定义不需要验证的方法
    private $pass=array("register","checkuser","login");
    public function __construct()
    {
        parent::__construct();
        //session初始化
        $this->initSession();
        //权限验证
        $this->checkLogin();
    }
    //session的初始化
    private function initSession(){
        MySession::startSession();
    }

    //登录验证
    private function checkLogin(){
        //确定需要验证的方法
        if(in_array(Application::$action,$this->pass)){
            //不需要验证的方法 不处理
        }else{//需要验证的方法
            //判断是否保持会话
            if(isset($_SESSION["remember"])){
                //不处理
            }else{
                //未登录
                header("location:index.php?g=home&c=login&a=index");
            }
        }
    }
}
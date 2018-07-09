<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/4
 * Time: 11:12
 */

namespace core\mybase;

use core\Application;
use core\MySession;

/**后台权限验证控制器*/
class AdminGroupController extends Controller
{
    private $pass = array("index", "login");

    public function __construct()
    {
        parent::__construct();
        //session的初始化
        $this->initSession();
        //权限验证(登录验证)
        $this->checkLogin();
    }
    //session的初始化
    private function initSession()
    {
        MySession::startSession();
    }

    //登录验证
    private function checkLogin()
    {
        //确定需要验证的方法
        if (in_array(Application::$action, $this->pass)) {
            //不处理
        } else {//需要验证的方法
            //判断是否保持会话
            if (isset($_SESSION['sysremember'])) {
                //不处理
            } else {
                //未登陆，跳转到登陆页面
                header("location:index.php?g=admin&c=login&a=index");
            }
        }
    }
}
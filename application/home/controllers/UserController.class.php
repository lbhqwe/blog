<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/6
 * Time: 13:58
 */

namespace application\home\controllers;
use application\home\models\UserModel;
use core\mybase\HomeGroupController;
use core\MySession;

class UserController extends HomeGroupController
{
    public function register()
    {
        $feedback = ["errno" => 500, "mess" => "注册失败！"];
        $uname = $_POST["uname"];
        $upwd = $_POST["upwd"];
        $uphone = $_POST["uphone"];
        $uemail = $_POST['uemail'];
        $args = [$uname, md5($upwd), $uphone, $uemail];
        $um = new UserModel();//实例化
        $result = $um->add($args);
        if ($result > 0) {
            $feedback = ["errno" => 200, "mess" => "注册成功！"];
        }
        echo Json_encode($feedback, JSON_UNESCAPED_UNICODE);//返回JOSN对象
    }

    public function checkuser()
    {
        $uname = $_POST["uname"];
        $args = [$uname];
        $um = new UserModel();
        $result = $um->getUser($args);
        echo $result;
    }

    public function login()
    {
        $feedback = ["errno" => 500, "mess" => "用户名不存在或者密码错误！"];
        $uname = isset($_POST['uname']) ? $_POST['uname'] : null;
        $upwd = isset($_POST['upwd']) ? $_POST['upwd'] : null;
        $remember = isset($_POST['remember']) ? true : false; //null 或者on
        if ($uname != null && $upwd != null) {
            $args = [$uname, md5($upwd)];
            $um = new UserModel();
            $result = $um->getUserByNameAndPwd($args);
            if ($result !=null) {
                $feedback = ["errno" => 200, "mess" => "登录成功！"];
                //用户登陆信息保存在session中
                MySession::startSession();
                MySession::setSession("id", $result["id"]);
                MySession::setSession("uname", $result["uname"]);
                MySession::setSession("upwd", $result["upwd"]);
                MySession::setSession("remember", $remember);
                if ($remember) {
                    MySession::extendSession();
                }
            }
        }
        echo JSON_encode($feedback,JSON_UNESCAPED_UNICODE);
    }

}
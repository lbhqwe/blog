<?php

namespace  core;
class Application{

    public static $group;//模块
    public static $controller;//控制器
    public static $action;//方法

    /**
     * 前端处理功能方法：路由器选择和请求分发
     */
    public static function run(){
        global $c;
        //http://localhost/FBMgr/Day0627 MVC/MyMVC1.0/index.php?g=home&c=index&a=index
        //1.路由信息的提取
        self::$group=isset($_GET['g'])?$_GET['g']:$c['default_route']['group'];
        self::$controller=isset($_GET['c'])?$_GET['c']:$c['default_route']['controller'];
        self::$action=isset($_GET['a'])?$_GET['a']:$c['default_route']['action'];
        //2.路由信息的大小写的处理
        self::$group =strtolower(self::$group);
        self::$controller=ucfirst(strtolower(self::$controller));
        self::$action=strtolower(self::$action);

        //3.初始化控制器
        //new \application\home\controllers\IndexController()
        $controllerName=self::getfullClassName();//获得控制器名称
        $controllerInstance=new $controllerName();//实例化控制器

        $method=self::$action;//获得控制器方法
        $controllerInstance->$method();
    }

    //获取控制器的全限定名
    public static function getfullClassName(){
        return "\\application\\".self::$group."\\controllers\\".self::$controller."Controller";
    }

}
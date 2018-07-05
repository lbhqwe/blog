<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/27
 * Time: 10:54
 */

namespace core;


class MyLoad
{
    //自动加载的函数
    public static function myAutoLoad($className){
        $path=str_replace("\\","/",$className);
        $filePath=$path.".class.php";
        if (file_exists($filePath)){
            include_once $filePath;
        }else{
            die("无法加载文件：".$filePath);
        }
    }
    public static function registerAutoLoad(){
        spl_autoload_register("self::myAutoLoad");
    }
}
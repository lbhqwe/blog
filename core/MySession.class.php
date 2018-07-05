<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/3
 * Time: 15:51
 */

namespace core;


class MySession
{
    /** 启动session*/
    public static function startSession(){
        if(!isset($_SESSION)){
            session_start();
        }
    }

    /**销毁 session */
    public static function destorySession(){
        //清空session的值
        session_unset();
        if(isset($_COOKIE[session_name()])){
        setcookie(session_name(),null,time()-1,"/");
        }
        //销毁session
        session_destroy();
    }

    /** session添加数据*/
    public static function setSession($name,$value){
        $_SESSION[$name]=$value;
    }

    /**session获取数据*/
    public static function getSession($name){
        if (isset($_SESSION[$name])){
            return $_SESSION[$name];
        }else{
            return null;
        }
    }

    /**延长会话session保持时间*/
    public static function extendSession($time=1*60*60){
        setcookie(session_name(),session_id(),time()+$time,"/");
    }

}
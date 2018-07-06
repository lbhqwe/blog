<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/27
 * Time: 15:36
 */

namespace core\mybase;
use core\Application;

class Controller
{
    protected $view;//视图对象

    /**子类对象如果没有定义 __contruct(), 子类在实例化的时候会自动调用父类__construct()*/
    public function __construct()
    {
        $this->initView();//初始化视图
    }

    /** 初始化视图 */
    private function initView(){
        //初始化视图对象
        $this->view=new View();
        $this->view->view_dir="application/".Application::$group."/views/"
            .strtolower(Application::$controller)."/";
    }

    /** 调用视图对象渲染数据方法 */
    protected function display($viewname=null){
        $this->view->display($viewname);
    }

    /** 视图数据填充方法*/
    protected function assign($name,$value){
        $this->view->assign($name,$value);

    }
}
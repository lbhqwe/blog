<?php
/**
 * 视图基类
 */

namespace core\mybase;

use core\Application;

class View
{
    public $view_dir;//视图路径
    public $data = array();//视图数据

    /**打开视图方法*/
    public function display($view_name = null)
    {
        $view_name = isset($view_name) ? $view_name : Application::$action;//视图名称默认为方法名称
        include_once $this->view_dir . $view_name . ".html";//参考index.php的相对位置
    }

    /** 填充数据方法*/
    public function assign($name, $value)
    {
        $this->data[$name] = $value;
    }
}
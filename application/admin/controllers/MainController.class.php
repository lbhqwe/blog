<?php
namespace application\admin\controllers;
use core\mybase\AdminGroupController;
class MainController extends AdminGroupController /**后台主页控制器*/
{
    /**打开主页视图*/
    public function main(){
        $this->display();
    }
    /**打开主页视图*/
    public function setting(){
        $this->display();
    }
    /**预约管理*/
    public function VIP(){
        $this->display();
    }
    /**新闻管理*/
    public function articlemgr(){
        $this->display();
    }
    /**用户管理*/
    public function usermgr(){
        $this->display();
    }

}
<?php

namespace application\admin\controllers;

use application\admin\models\AddGoodModel;
use core\mybase\AdminGroupController;
use core\FileUpload;

class MainController extends AdminGroupController /**后台主页控制器*/
{
    /**打开主页视图*/
    public function main()
    {
        $this->display();
    }
    /**打开添加商品视图*/
    public function addgood()
    {
        $this->display();
    }
    /**打开留言视图*/
    public function gbmgr()
    {
        $this->display();
    }
    /**打开系统设置视图*/
    public function setting()
    {
        $this->display();
    }

    /**会员管理*/
    public function VIP()
    {
        $this->display();
    }
    /**商品管理*/
    public function goodlist()
    {
        $this->display();
    }
    /**添加商品*/
    public function addgoods()
    {
        $fileUpLoad = new FileUpLoad();
        $res = $fileUpLoad->upload('photo');
        if ($res) {
            $filename = $fileUpLoad->getFileName();
            $args = [$_POST['gname'], $filename, $_POST['gprice'], $_POST['gcount'],$_POST['gmessage']];
            //持久化用户留言数据
            $gbm = new AddGoodModel();
            $gbm->add($args);
            //$this->display('contact');
            echo "上传成功";
            header("refresh:5;url=index.php?g=admin&c=main&a=addgood");


        }
    }
}
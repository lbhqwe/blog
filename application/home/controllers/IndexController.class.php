<?php
namespace  application\home\controllers;
//use application\home\models\GuestBookModel;
use core\mybase\Controller;
class IndexController extends Controller{
    //系统默认访问方法
    public function index(){
        $this->display();
    }
    public function about(){
        $this->display();
    }
    public function card(){
        $this->display();
    }
    public function contact(){
        $this->display();
    }
    public function products(){
        $this->display();
    }
    public function single(){
        $this->display();
    }

    //添加留言信息控制器方法
//    public function guestbook(){
//        $feedback=["errno"=>500,"mess"=>"留言失败！"];
//        $args=[$_POST['uname'],$_POST['uemail'],$_POST['uphone'],$_POST['umessage'],];
//        //持久化用户留言数据
//        $gbm=new GuestBookModel();
//        $result=$gbm->add($args);
//        //$this->display('contact');
//        if($result>0){
//            $feedback['errno']=200;
//            $feedback['mess']="留言成功!";
//        }
//        echo json_encode($feedback,JSON_UNESCAPED_UNICODE);//返回json对象
//    }

}
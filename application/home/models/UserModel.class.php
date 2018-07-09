<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/29
 * Time: 14:22
 */

namespace application\home\models;


use Core\mybase\Model;

class UserModel extends Model
{
    //添加用户的功能
    public function add($args){
        $sql="INSERT INTO member VALUES(DEFAULT,?,?,?,?)";
        // $args=null;//不需要参数 项目中统一使用null值
        return $this->execute($sql,$args);
    }
    //根据用户名验证用户名是否被占用
    public function getUser($args){
        $sql="select count(1) as result from member where uname=?";
        $result=$this->query($sql,$args);//[["result"=>1]]
        return $result[0]['result'];
    }

    /**根据用户名密码获取用户信息*/
    public  function  getUserByNameAndPwd($args){
        $sql="select * from member where uname=? and upwd=?";
        $result=$this->query($sql,$args);
        if(count($result)>0){
            return $result[0];
        }else{
         return null;
        }
    }
}
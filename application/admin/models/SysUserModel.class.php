<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/6
 * Time: 14:20
 */
namespace  application\admin\models;
use core\mybase\Model;

class SysUserModel extends Model
{
    public function getUserByNameAndPwd($args){
        $sql="SELECT * FROM sysuser WHERE uname=? AND upwd=?";
        $result=$this->query($sql,$args);
        if (count($result)>0){
            return $result[0];
        }else{
            return null;
        }
    }

}
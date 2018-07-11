<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/28
 * Time: 16:06
 */
namespace application\admin\models;
use core\mybase\Model;
class AddGoodModel extends Model
{
    //添加商品的功能
    public function add($args){
        $sql="INSERT INTO goods VALUES(DEFAULT,?,?,?,?)";
       // $args=null;//不需要参数 项目中统一使用null值
        return $this->execute($sql,$args);
    }

}
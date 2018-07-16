<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/13
 * Time: 14:07
 */

namespace application\admin\models;

use core\mybase\Model;
/**商品详情信息管理数据模型*/
class UsermgrModel extends Model
{

    /**查询有多少条留言*/
    public function count($like = null)
{
    $sql = null;
    if ($like != null) {
        $sql = "SELECT COUNT(1) AS total FROM sysuser WHERE uname LIKE '%" . $like . "%' ";
    } else {
        $sql = "SELECT COUNT(1) AS total FROM sysuser";
    }
    $result = $this->query($sql, null);
    return $result[0]['total'];

}

    /**分页留言信息查询*/
    public function list($pageIndex = 1, $pageSize = 10, $like = null)
    {
        $sql=null;
        if ($like != null) {
            $sql = "SELECT * FROM member WHERE uname LIKE '%" . $like . "%' ORDER BY id DESC LIMIT " . ($pageIndex - 1) * $pageSize . "," . $pageSize;
        }else{
            $sql = "SELECT * FROM member ORDER BY id DESC LIMIT " . ($pageIndex - 1) * $pageSize . "," . $pageSize;
        }
        return $this->query($sql, null);
    }

    /**删除留言*/
    public function del($args)
    {
        $sql = "DELETE FROM member WHERE id=?";
        return $this->execute($sql, $args);
    }
}

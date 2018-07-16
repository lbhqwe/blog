<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/15
 * Time: 16:36
 */

namespace application\admin\models;
use core\mybase\Model;

/**商品详情信息管理数据模型*/
class SaleorderModel extends Model
{
    /**查询订单页数*/
    public function count($like = null)
    {
        $sql = null;
        if ($like != null) {
            $sql = "SELECT COUNT(1) AS total FROM  WHERE saleorder LIKE '%" . $like . "%' ";
        } else {
            $sql = "SELECT COUNT(1) AS total FROM saleorder";
        }
        $result = $this->query($sql, null);
        return $result[0]['total'];

    }

    /**分页订单信息查询*/
    public function list($pageIndex = 1, $pageSize = 10, $like = null)
    {
        $sql=null;
        if ($like != null) {
            $sql = "SELECT * FROM saleorder WHERE gname LIKE '%" . $like . "%' ORDER BY oid DESC LIMIT " . ($pageIndex - 1) * $pageSize . "," . $pageSize;
        }else{
            $sql = "SELECT * FROM saleorder ORDER BY oid DESC LIMIT " . ($pageIndex - 1) * $pageSize . "," . $pageSize;
        }
        return $this->query($sql, null);
    }

    /**删除订单*/
    public function del($args)
    {
        $sql="DELETE FROM saleorder WHERE gid=?";
        return $this->execute($sql,$args);
    }
}
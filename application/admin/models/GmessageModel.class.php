<?php

namespace application\admin\models;

use core\mybase\Model;

/**商品详情信息管理数据模型*/
class GmessageModel extends Model
{
    /**查询商品页数*/
    public function count($like = null)
    {
        $sql = null;
        if ($like != null) {
            $sql = "SELECT COUNT(1) AS total FROM goods WHERE gname LIKE '%" . $like . "%' ";
        } else {
            $sql = "SELECT COUNT(1) AS total FROM goods";
        }
        $result = $this->query($sql, null);
        return $result[0]['total'];

    }

    /**分页商品信息查询*/
    public function list($pageIndex = 1, $pageSize = 10, $like = null)
    {
        $sql=null;
        if ($like != null) {
            $sql = "SELECT * FROM goods WHERE gname LIKE '%" . $like . "%' ORDER BY gid DESC LIMIT " . ($pageIndex - 1) * $pageSize . "," . $pageSize;
        }else{
            $sql = "SELECT * FROM goods ORDER BY gid DESC LIMIT " . ($pageIndex - 1) * $pageSize . "," . $pageSize;
        }
        return $this->query($sql, null);
    }

    /**删除商品*/
    public function del($args)
    {
        $sql="DELETE FROM goods WHERE gid=?";
        return $this->execute($sql,$args);
    }
}
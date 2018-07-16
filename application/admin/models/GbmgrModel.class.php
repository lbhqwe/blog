<?php

namespace application\admin\models;

use core\mybase\Model;
/**用户留言信息管理数据模型*/
class GbmgrModel extends Model
{
    /**查询有多少条留言*/
    public function count($like = null)
    {
        $sql = null;
        if ($like != null) {
            $sql = "SELECT COUNT(1) AS total FROM guestbook WHERE uname LIKE '%" . $like . "%' ";
        } else {
            $sql = "SELECT COUNT(1) AS total FROM guestbook";
        }
        $result = $this->query($sql, null);
        return $result[0]['total'];

    }

    /**分页留言信息查询*/
    public function list($pageIndex = 1, $pageSize = 10, $like = null)
    {
        $sql=null;
        if ($like != null) {
            $sql = "SELECT * FROM guestbook WHERE uname LIKE '%" . $like . "%' ORDER BY id DESC LIMIT " . ($pageIndex - 1) * $pageSize . "," . $pageSize;
        }else{
            $sql = "SELECT * FROM guestbook ORDER BY id DESC LIMIT " . ($pageIndex - 1) * $pageSize . "," . $pageSize;
        }
        return $this->query($sql, null);
    }

    /**删除留言*/
    public function del($args)
    {
        $sql="DELETE FROM guestbook WHERE id=?";
        return $this->execute($sql,$args);
    }
}
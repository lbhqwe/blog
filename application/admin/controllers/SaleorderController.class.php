<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/15
 * Time: 16:35
 */

namespace application\admin\controllers;

use application\admin\models\SaleorderModel;
use core\mybase\AdminGroupController;
class SaleorderController extends AdminGroupController
{

    /**分页商品数据*/
    public function list()
    {
        $pageIndex = isset($_GET['pageIndex']) ? $_GET['pageIndex'] : 1;
        $pageSize = isset($_GET['pageSize']) ? $_GET['pageSize'] : 10;
        $like = isset($_GET['like']) ? $_GET['like'] : null;
        $gm = new SaleorderModel();
        //获得符合条件的总记录数
        $total = $gm->count($like);
        //获得分页数据
        $list = $gm->list($pageIndex, $pageSize, $like);

        $result = ["total" => $total, "rows" => $list];
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
    }

    /**删除商品*/
    public function del()
    {
        $gid = isset($_GET['oid']) ? $_GET['oid'] : -1;
        $gm = new SaleorderModel();
        $reult = $gm->del([$gid]);
        if ($reult > 0) {
            $this->success("删除订单成功，2秒后跳转回管理视图。", "?g=admin&c=main&a=saleorder");
        } else {
            $this->fail("删除订单失败，2秒后跳回管理视图", "?g=admin&c=main&a=saleorder");
        }
    }
}

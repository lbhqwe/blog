<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/4
 * Time: 9:41
 */

namespace application\admin\controller;
use application\admin\model\GbmgrModel;
use core\mybase\AdminGroupController;
class GbmgrController extends AdminGroupController
{
    //分页留言数据
    public function list(){
        $pageIndex=isset($_GET['pageIndex'])?$_GET['pageIndex']:1;
        //$pageIndex=isset($_GET['pageIndex'])?$_GET['pageIndex']:1;
        $pageSize=isset($_GET['pageSize'])?$_GET['pageSize']:10;
        $like=isset($_GET['like'])?$_GET['like']:null;
        $gm=new GbmgrModel();
        //获取符合条件的总条数
        $total=$gm->count($like);
        //获得分页数据
        $list=$gm->list($pageIndex,$pageSize,$like);

        $result=["total"=>$total,"rows"=>$list];
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
    }


    //删除留言
    public function del(){
        $id=isset($_GET['id'])?$_GET['id']:-1;
        $gm=new GbmgrModel();
        $result=$gm->del([$id]);
        header("location:index.php?g=admin&c=main&a=gbmgr");
    }
}


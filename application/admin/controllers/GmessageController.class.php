<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/4
 * Time: 9:23
 */
namespace application\admin\controllers;

use application\admin\models\GmessageModel;
use core\mybase\AdminGroupController;
class GmessageController extends AdminGroupController
{

    /**分页商品数据*/
    public function list(){
        $pageIndex=isset($_GET['pageIndex'])?$_GET['pageIndex']:1;
        $pageSize=isset($_GET['pageSize'])?$_GET['pageSize']:10;
        $like=isset($_GET['like'])?$_GET['like']:null;
        $gm=new GmessageModel();
        //获得符合条件的总记录数
        $total=$gm->count($like);
        //获得分页数据
        $list=$gm->list($pageIndex,$pageSize,$like);

        $result=["total"=>$total,"rows"=>$list];
        echo json_encode($result,JSON_UNESCAPED_UNICODE);
    }

    /**删除商品*/
    public function del(){
        $gid=isset($_GET['gid'])?$_GET['gid']:-1;
        $gm=new GmessageModel();
        $reult=$gm->del([$gid]);
        if($reult>0){
            $this->success("删除商品成功，2秒后跳转回管理视图。","?g=admin&c=main&a=gmessage");
        }else{
            $this->fail("删除商品失败，2秒后跳回管理视图","?g=admin&c=main&a=gmessage") ;
        }
    }

}
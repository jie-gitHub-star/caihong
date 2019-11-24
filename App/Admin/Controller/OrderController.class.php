<?php
namespace App\Admin\Controller;

use \Org\Tools\Page;
use \Org\Tools\Upload;

class OrderController extends BaseController
{
    public function index()
    {
       
        $model = M();
        $where = '';
        
        // 查询数据总条数，使用原始sql语句

        $orders_total=$model->get("SELECT COUNT(*) AS count FROM `orders` {$where};");
        //使用Page类自动分页
        // 数据总条数
        // 每页多少条
        // get参数[parse_url][http_build_query]
        $page = new Page($orders_total[0]['count'],10);

        $limit = ltrim($page->limit,'LIMIT');
        // 设置表名
        $orderdata = $model->table('orders')->limit($limit)->select();
        $gstatus = '发货';

        $status=['未发货','已发货','待收货'];

        $pay= ['未付款','已付款'];
        if(isset($_GET['oid'])){
             // 获取订单编号
            $oid = $_GET['oid'];

            $model = M();
            // 选表
            $model->table('orders');

            // 修改
            $aff=$model->where('oid','=',$oid)->save(['status'=>'1']);

            // 判断是否执行成功
            if($aff){
                $gstatus = '已发货';
                $this->success('发货成功');
            }else{
                $this->error('发货失败或已发货');
            }
        }

        include $this->display();
    }


}
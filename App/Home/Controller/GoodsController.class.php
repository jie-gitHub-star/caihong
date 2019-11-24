<?php
namespace App\Home\Controller;

use App\Common\Controller\Controller;

class GoodsController extends Controller
{
    public function show(){

        $pdo = new \PDO(DSN,USER,PASS);
        // 查询出顶级分类
        $sql = "SELECT * FROM `types` WHERE `pid` = 0;";

        $stmt = $pdo->query($sql);

        // 获取全部数据
        $typeList = $stmt->fetchAll(2);

        // 查询所有分类
        $sql_type_all = "SELECT * FROM `types`";
        $stmt = $pdo->query($sql_type_all);
        $typeList_tmp = $stmt->fetchAll(2);
        // 获取所有分类
       
        // 获取当前分类的所有子分类
        if(isset($_GET['gid'])){
            getTree($typeList_tmp,$_GET['gid'],$p_arr);

            //拼接in的参数
            $p_str = $_GET['gid'];

            // 当有子分类再去执行
            if($p_arr){
                foreach($p_arr as $key => $value){
                    $p_str.=','.$value['id'];
                }
            }

            // 查询列表商品
            $sql_goods_list = "SELECT * FROM `goods` WHERE `typeid` IN({$p_str})";
            $stmt = $pdo->query($sql_goods_list);
            $goodsList_search = $stmt->fetchAll(2);
            $stmt = $pdo->query($sql);

        // 获取全部数据
        $typeList = $stmt->fetchAll(2);
        }

        // 首页搜索，
        // 查询列表商品
        if (isset($_POST['search'])) {
            # code...
        
        $data_search = $_POST['search'];
        $sql_goods_search_select = "SELECT * FROM `goods` WHERE `name` LIKE '%$data_search%';";
        $stmtx=$pdo->query($sql_goods_search_select);

        // 获取全部数据
        $goodsList_search = $stmtx->fetchAll(2);
        }
          include $this->display();
    }

    public function detail()
    {
        // var_dump($_GET);

        if(! is_numeric($_GET['gid'])){
            $this->error('ID参数非法');
        }

        //链接书库
        $pdo = new \PDO(DSN,USER,PASS);

        // 通过id查询商品信息
        $sql = "SELECT * FROM `goods` where `id`='{$_GET['gid']}' AND `status` = '1' ";

        // 执行sql语句
        $stmt = $pdo->query($sql);

        //获取结果
        $goodsDetail = $stmt->fetch(2);#只获取一条结果

        // 如果结果为空则表示商品不存在、
        if(! $goodsDetail){
            $this->error('商品已下架不存在改商品');
        }

        // 查询和商品顶级分类
        $sql = "SELECT * FROM `types` WHERE `pid` = 0";

        $stmt = $pdo->query($sql);

        // 获取全部数据
        $typeList = $stmt->fetchAll(2);

        include $this->display();
    }

}

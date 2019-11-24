<?php
namespace App\Home\Controller;

use \App\Common\Controller\Controller;

class OrderController extends Controller
{
    public function init()
    {
        if(! @ $_SESSION['isLogin']){
            $this->error('请先登录',url('Login/index'));
        }
    }

    //结算页面
    public function jies()
    {
        

        ////////////////
        // 当session 中不存在checkItem是去验证，防止因为未输入收货地址提交订单跳回上一页正常通过验证
    
        if(isset($_POST['checkItem'])){
            foreach($_POST['checkItem'] as $key =>$value){
                if(! is_numeric($value)){
                    $this->error('参数非法');
                }
            }

            // 将购买的商品id保存到session
            // 因为在这里只是显示数据而不是处理数据
            $_SESSION['checkItem'] = $_POST['checkItem'];
        }

        // //获取信息
        // $shopid = null;
        // foreach($_POST['checkItem'] as $key => $value)
        // {
        //     $shopid .= ",{$value}";
        // }       
        
        // 链接数据库 //
        // ///////////
        // $pdo = new \PDO(DSN,USER,PASS);

        // // 设置查询语句
        // $shopid=ltrim($shopid,',');
        // $sql = "SELECT * FROM `goods` WHERE id IN( $shopid )";
        // $stmt = $pdo->query($sql);
        // $cartList = $stmt->fetchAll(2);
        


        include $this->display();

    }

    // 订单生产页面
    public function create()
    {
        //////////////////
        // 验证收货地址收货是否输入 //
        if(! $_POST['username']){
            $this->error('收货人必须写');
        }
        if(! $_POST['tel']){
            $this->error('收货人手机号必须写');
        }
        if(! $_POST['address']){
            $this->error('收货人地址必须写');
        }

        // 插入数据
        $pdo =  new \PDO(DSN,USER,PASS);
        
        // 
        // 开启事务
        $pdo->beginTransaction();

        // 订单
        ////////////
        
        $oid = date('Ymd').uniqid().time();

        // 订单号
        $uid = $_SESSION['user']['id'];
        $status = 0; //订单状态

        $_SESSION['tmp_id']=$oid;
        // 计算总价
        $total = 0;
        foreach($_SESSION['cart'] as $key => $value){
            // 如果不是购买过的商品则跳过
            if(! in_array($key,$_SESSION['checkItem'])){
                continue;
            }
            $total+=$value['price'] * $value['num'];
        }

        $username = $_POST['username'];

        $tel = $_POST['tel'];
        $address = $_POST['address'];

        $addtime = date('Y-m-d H:i:s');


        // 插入数据
        $sql_order = sprintf("INSERT INTO `orders` VALUES(null,'%s','%s','%s','%s','%s','%s','%s','%s','%s')",$oid,$uid,$status,'0',$total,$username,$tel,$address,$addtime);

        // 返回受影响行数
        $order_aff = $pdo->exec($sql_order);

        // 如果执行失败则回滚数据库
        // 并且订单穿件失败返回上一页重试
        if(! $order_aff){
            $pdo->rollback();
            $this->error('订单创建失败');
        }

        // 订单详情


        // 循环订单详情
        foreach ($_SESSION['cart'] as $key => $value) {
            // 如果要购买的商品则跳过
            if(! in_array($key,$_SESSION['checkItem'])){
                continue;
            }

          $sql_order_info = sprintf("INSERT INTO `order_infos` VALUES(null,'%s','%s','%s','%s','%s','%s','%s')",$oid,$value['id'],$value['name'],$value['price'],$value['num'],$value['price']*$value['num'],$addtime);
          $order_info_aff = $pdo->exec($sql_order_info);

          // 如果执行失败则回滚数据库
          // 并且订单穿件失败返回上一页重试
          if(! $order_info_aff){
            $pdo->rollback();
            $this->error('订单详情创建失败1');
          }  

          // 全部语句执行成功则提交事务
          $pdo->commit();

          // 数据删除，将欧迈我的商品数据与checkItem删除

          foreach ($_SESSION['checkItem'] as $key => $value) {
              // 删除商品数据
            unset($_SESSION['cart'][$value]);
          }
          unset($_SESSION['checkItem']);

          $this->success('订单添加成功，正在跳转支付',url('pay'));


        }
    }
    // 支付页面
    public function pay()
    {
        
        include $this->display();
    }

    public function dopay()
    {
        // is_pay 订单是否支付
        // 做数据操作，改为已支付
        // 吧session里面订单删除
        $pdo =  new \PDO(DSN,USER,PASS);
        $sql = "UPDATE `orders` SET `is_pay`='1' WHERE `oid`= '{$_SESSION['tmp_id']}'";
        // var_dump($sql);
        if($pdo->exec($sql))
        $this->success('支付成功',url('orderSuccess'));
    }


    // 订单成功页面
    public function orderSuccess()
    {
        include $this->display();
    }


    // 个人中心订单列表
    public function show()
    {
        // var_dump($_SESSION);

        $pdo = new \PDO(DSN,USER,PASS);

        // 查询单用户的所有订单

        $sql = "SELECT * FROM `orders` WHERE `uid` = '{$_SESSION['user']['id']}'";

        // 执行语句
        $stmt = $pdo->query($sql);

        // 获取结果
        $orderList = $stmt->fetchAll(2);

        // 状态

        $status=['待发货','已发货','已完成'];
        $is_pay=['未付款','已付款'];
        // var_dump($orderList);
        include $this->display();
    }

    public function edit()
    {
        if(! is_numeric($_GET['id'])){
            $this->error('id必须是数字');
        }

        // 链接数据库
        $pdo = new \PDO(DSN,USER,PASS);
        $sql = "SELECT * FROM `orders` WHERE `id`='{$_GET['id']}' AND `status` = '1';";
        
        $stmt = $pdo->query($sql);

        // 获取结果
        
        $order = $stmt->fetch(2);
        // var_dump($order);
        if($order){
            $sql_status  ="UPDATE `orders` SET `status` = '2' WHERE `id` = '{$_GET['id']}'";

            // 执行语句
            $aff = $pdo->exec($sql_status);

            if($aff){
                $this->success('收货成功');
            }else{
                $this->error('收货失败');
            }

        }else{
            $this->error('未发货或未支付或以完成');
        }
    }

    // 订单详情
    public function order_detail()
    {
        $pdo = new \PDO(DSN,USER,PASS);
        // 设置查询语句
        
        $sql = "SELECT * FROM `order_infos` WHERE `oid` = '{$_GET['oid']}';";
        // 执行语句
        // var_dump($sql);
        $stmt=$pdo->query($sql);
        // 获取结果
        $oList=$stmt->fetch(2);

        include $this->display();
    }
}   




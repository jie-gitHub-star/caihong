<?php
namespace App\Home\Controller;

use App\Common\Controller\Controller;

class CartController extends Controller
{
	// 在所有有方法之前执行
	// 数据验证，初始化

	public function init()
	{
		// var_dump($_SESSION);
	}

	// 顯示購物車
	public function show()
	{
		// var_dump($_SESSION);
		include $this->display();
	}
	public function add()
	{


		// 验证id

		if(! is_numeric($_GET['id'])){
			$this->error('id必须是数字');
		}

		// 验证购买数量
		if(! is_numeric($_GET['num'])){
			$this->error('num必须是数字');
		}


		// 查询商品，
		// 链接数据库

		$pdo = new \PDO(DSN,USER,PASS);

		// 查询商品信息sql语句
		$sql = "SELECT * FROM `goods` WHERE `id` = '{$_GET['id']}' AND `status` = '1';";

		// 执行sql语句
		$stmt = $pdo->query($sql);

		// 获取结果
		$goodsDetail = $stmt->fetch(2);

		// 判断结果是否为空
		if(! $goodsDetail){
			$this->error('商品已下架或不存在');
		}

		// 判断库存		+没有写
		// if($_POST['num']>$goodsDetail['store']){
		// 	$this->error('库存不足');
		// }

		// 处理数据

		$goodsInfo = [
			'id' => $goodsDetail['id'],
			'name'=>$goodsDetail['name'],
			'price'=>$goodsDetail['price'],
			'store'=>$goodsDetail['store'],
			'pic' =>$goodsDetail['pic'],
			'company'=>$goodsDetail['company'],
			'descr'=>$goodsDetail['descr'],
			'num'=>1   //$goodsDetail['num']
			];

			// 将数据保存到session

			// 已存在
			// 未存在
			if(isset($_SESSION['cart'][$goodsDetail['id']])){
				$_SESSION['cart'][$goodsDetail['id']]['num']+=$_GET['num'];
			}else{
				$_SESSION['cart'][$goodsDetail['id']]=$goodsInfo;
			}


			// 提示信息

			$this->success('商品添加成功',url('show'));
	}

	public function del()
	{

		// 验证数据
		if(! is_numeric($_GET['id'])){
			$this->error('id必须是数字');
		}

		// 判断数据是否存在
		if(! is_numeric($_SESSION['cart'][$_GET['id']])){
			// 如果存在则删除
			unset($_SESSION['cart'][$_GET['id']]);
		}

		// 提示信息
		$this->success('删除成功');
	}

	public function jia()
	{
		//商品id
		// 只有在session给他+1
		if(! is_numeric($_GET['id'])){
			$this->error('id必须是数字');
		}

		// 判断商品是否存在
		if(isset($_SESSION['cart'][$_GET['id']])){

			if($_SESSION['cart'][$_GET['id']]['store']>=$_SESSION['cart'][$_GET['id']]['num']+1){
				$_SESSION['cart'][$_GET['id']]['num']+=1;
			}else{
				$this->error('库存量不足');
			}
		}
		$this->success('增加成功');
	}

	public function jian()
	{
		//商品id
		// 只有在session里面就给他-1
		if(! is_numeric($_GET['id'])){
		$this->error('id必须是数字');
		}

	// 判断商品是否存在
		if(isset($_SESSION['cart'][$_GET['id']])){
			$num = $_SESSION['cart'][$_GET['id']]['num'];
			if(($num-1)>0){
				$_SESSION['cart'][$_GET['id']]['num']-=1;
			}else{
				$this->error('最少购买一件');
			}
		}
		$this->success('减少成功');
	}

	public function rmshop()
	{
		if(isset($_SESSION['cart'])){
			$_SESSION['cart'] = null;
			$this->success('购物车成功清空');
		}else{
			$this->error('购物车空空如也');
		}
	} 
	public function jies()
	{
		
		include $this->display();
	}
	
}



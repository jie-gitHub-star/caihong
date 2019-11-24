<?php
namespace App\Home\Controller;

use \App\Common\Controller\Controller;
use \Org\Tools\Upload;

class UserController extends Controller
{
	public function init()
	{
		if(! @$_SESSION['isLogin']){
			$this->error('请先登录',url('Login/index'));
		}	
	}

	public function detail()
	{
		// 链接数据库
		$pdo = new \PDO(DSN,USER,PASS);

		// 准备sql语句
		$sql = "SELECT * FROM `user_infos` WHERE `uid`='{$_SESSION['user']['id']}';";

		// var_dump($sql)
		// 执行sql语句
		$stmt = $pdo->query($sql);
		// 获取结果集
		$userInfo = $stmt->fetch(2);
		$mark = '';
		$url = '';

		if($userInfo){
			$url = url('dodetail_edit');
			$mark = '修改';
		}else{
			$url = url('dodetail_add');
			$mark = '设置';
		}
		$ntime = date(' H',time());
		$sex=['女','男','保密'];
		include $this->display();
	}

	public function dodetail_edit()
	{
		
		$data = $_POST;

		$this->detailCheck($data);

		$up = new Upload();

		$up->set('path',__ROOT.__PUBLIC.'/uploads/tx');
		$up->set('maxsize',1024*1024*20);
		$up->set('allowtype',['png','jpg','jpeg','gif']);
		$up->set('israndname',true);

		if($up->upload($_FILES,'pic')){
			$data['pic'] = $up->getFileName();
		}else{
			$this->error($up->getErrorMsg());
		}


		// 链接数据库

		$pdo = new \PDO(DSN,USER,PASS);
		// 创建sql语句
		$sql = "UPDATE `user_infos` SET `name`='{$data['name']}',`age`='{$data['age']}',`sex`='{$data['sex']}',`phone`='{$data['phone']}',`email`='{$data['email']}',`pic`='{$data['pic']}',`address`='{$data['address']}' WHERE `uid`= '{$_SESSION['user']['id']}';";

		// 查看受影响行数
		$res = $pdo->exec($sql);
		if($res){
			$this->success('设置用户信息成功');
		}else{
			$this->error('设置用户信息失败');
		}
	}
	public function dodetail_add()
	{
		$data = $_POST;
		// var_dump($data);
		//接收数据
		$this->detailCheck($data);

		//上传文件

		$up = new Upload();

		$up->set('path',__ROOT.__PUBLIC.'/uploads/tx');
		$up->set('maxsize',1024*1024*20);
		$up->set('allowtype',['png','jpg','jpeg','gif']);
		$up->set('israndname',true);

		if($up->upload($_FILES,'pic')){
			$data['pic'] = $up->getFileName();
		}else{
			$this->error($up->getErrorMsg());
		}


		// 链接数据库

		$pdo = new \PDO(DSN,USER,PASS);

		// 准备sql语句
		//数据oldpic
		// 由于是收到将数据放入语句，所以不要就可以了

		$sql = "INSERT INTO `user_infos` VALUES(null,'{$_SESSION['user']['id']}','{$data['name']}','{$data['age']}','{$data['sex']}','{$data['phone']}','{$data['email']}','{$data['pic']}','{$data['address']}');";
		// 执行sql语句
		$res = $pdo->exec($sql);
		if($res){
			$this->success('设置用户信息成功');
		}else{
			$this->error('设置用户信息失败');
		}
	}


	//验证详情数据
	protected function detailCheck($data)
	{

		// 验证数据

		// 用户昵称

		$preg_name='/^[\x{4E00}-\x{9FA5}A-Za-z0-9_]+$/u';

		if(! preg_match($preg_name,$data['name'])){
			$this->error('用户名只能输文字字母下化线');
		}

		// 验证年龄
		if($data['age'] < 1 || $data['age'] >120){
			$this->error('年龄只能为1-120岁');
		}

		// 验证性别

		if(! in_array($data['sex'],[0,1,2])){
			$this->error('设置性别信息错误，请重试');
		}

		// 验证手机号码
		$preg_phone = '/^(13[0-9]|166|14[5|7]|15[0|1|2|3|5|6|7|8|9]|18[0|1|2|3|5|6|7|8|9])\d{8}$/';

		if(! preg_match($preg_phone,$data['phone'])){
			$this->error('手机号码格式错误');
		}

		// 验证邮箱

		$preg_email = '/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/';

		if(! preg_match($preg_email,$data['email'])){
			$this->error('邮箱格式错误');
		}

		// 判断居住地址
		if(strlen($data['address'])<30){
			$this->error('输入至少10个文字的地址');
		}
	}


	public function myorder()
	{

		$pdo = new \PDO(DSN,USER,PASS);

		// 准备sql语句
		$sql = "SELECT * FROM `orders` WHERE `uid`='{$_SESSION['user']['id']}';";

		// var_dump($sql)
		// 执行sql语句
		$stmt = $pdo->query($sql);
		// 获取结果集
		$orderInfo = $stmt->fetchall(2);
		
		$ispay=['未付款',['已付款']];
		$status=['未发货','已发货','已完成'];
		include $this->display();
	}
}
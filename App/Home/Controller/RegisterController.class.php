<?php
namespace App\Home\Controller;

use \App\Common\Controller\Controller;
use \Org\Tools\Code\ValidateCode;

class RegisterController extends Controller
{
	public function index()
	{
		// 引入模板
		include $this->display();
	}

	public function register()
	{
		// 接收数据
		$data = $_POST;

		// 验证数据

		if(strtolower($data['authcode']) != $_SESSION['regcode']){
			$this->error('验证码错误');
		}

		// 验证用户名
		$preg_username = '/^[\x{4E00}-\x{9FA5}A-Za-z0-9_]+$/u';

		if(! preg_match($preg_username,$data['username'])){
			$this->error('用户名不符合规则');
		}

		// 验证用户名受存在
		$pdo = new \PDO(DSN,USER,PASS);

		// 准备sql语句
		$sql = "SELECT * FROM `users` WHERE `username`='{$data['username']}';";
		//执行sql语句
		$stmt = $pdo->query($sql);

		// 获取结果集，如果有结果，则证明用户名存在‘
		if($stmt->fetch(2)){
			$this->error('用户名已存在');
		}

		// 验证密码
		$preg_password = '/^[a-zA-Z]\w{5,15}$/';
		if(! preg_match($preg_password,$data['password'])){
			$this->error('密码不符合规则，必须字母开头，后面加上任意字母数字下划线，长度6-16位');
		}

		// 验证确实密码是否一致
		if($data['password']!=$data['repassword']){
			$this->error('两次密码输入不一致');
		}

		// 验证用户协议是否同意
		if(! isset($data['agreen'])){
			$this->error('你还没同意霸王条款，你不能使用');
		}

		// 删除多余数据

		unset($data['repassword']);
		unset($data['authcode']);
		unset($data['agreen']);

		//插入数据
		// 先将密码加密

		$data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);

		// 获取时间
		$time = date('Y-m-d H:i:s');

		// 准备sql语句
		$sql ="INSERT INTO `users`(`username`,`password`,`level`,`status`,`create_time`) VALUES('{$data['username']}','{$data['password']}','0','1','{$time}')";
		// var_dump($sql);
		$res = $pdo->exec($sql);

		// 提示信息，成功还是失败
		if($res){
			$this->success("恭喜：{$data['username']}注册成功",url('Login/index'));
		}else{
			$this->error('注册失败');
		}
	}

	public function code()
	{
		$vc = new ValidateCode();


		// PHP 画图
		// 生成空白图片
		// 生成随机字符串
		// 将字符串写入到图片
		// 将图片文件的二进制输出
		// var_dump($vc);

		$vc->doimg();

		$_SESSION['regcode']=$vc->getCode();
	}

}


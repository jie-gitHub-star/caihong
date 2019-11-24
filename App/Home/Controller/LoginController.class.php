<?php

namespace App\home\Controller;

use \App\Common\Controller\Controller;

class loginController extends Controller
{
	public function index()
	{
		include $this->display();
	}

	public function login()
	{
		$data = $_POST;
		//验证数据

		// 验证用户名
		$preg_username = '/^[\x{4E00}-\x{9FA5}A-Za-z0-9_]+$/u';

		if(! preg_match($preg_username,$data['username'])){
			$this->error('用户名不规范');
		}

		//验证密码
		$preg_password = '/^[a-zA-Z]\w{5,15}$/';

		if(! preg_match($preg_password,$data['password'])){
			$this->error('密码不符合规则: 必须以字母开头后面加上任意字母, 数字 下划线, 6到16位.');
		}

		// 必须使用PDO链接数据库，验证数据
		$pdo = new \PDO(DSN,USER,PASS);
		//1.判断用户是否存在
		$sql = "SELECT * FROM `users` WHERE `username` = '{$data['username']}'";
		$stmt = $pdo->query($sql);

		//获取查询结果
		$user = $stmt->fetch(2);

		//判断结果是否为空
		//用户是否存在
		if($user){
			if($user['status']==0) $this->error('你号被封了');

			//验证密码
			// hash 加密
			if(password_verify($data['password'],$user['password'])){

				// 保存登录状态
				$_SESSION['isLogin'] =true;

				//保存用户信息
				$_SESSION['user']['id'] = $user['id'];
				$_SESSION['user']['username'] = $user['username'];
				$_SESSION['user']['level'] = $user['level'];

				if(isset($data['isauto'])){
					setcookie(session_name(),session_id(),time()+3600);
				}
				$this->success('登录成功',url('Index/index'));
			}else{
				$this->success('用户名或密码错误');
			}
		}else{
			$this->error('用户名或密码错误');
		}
	}

	public function logout()
	{
		$_SESSION['isLogin'] = null;
		$_SESSION['user'] = null;

		$this->success('退出成功',url('Index/index'));
	}
}
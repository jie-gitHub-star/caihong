<?php
namespace App\Admin\Controller;

use \App\Common\Controller\Controller;

class LoginController extends Controller
{
	public function index(){

		include $this->display();
	}

	public function login()
	{
	// var_dump($this->request->post());
	
	// 将传过来的变量保存，方便使用

	$request = 	$this->request->post();

	//链接数据库。获取状态对象
	$model = M();
// var_dump($model->table('users')->select());
	// 设置表名，选择数据表

	$model->table('users');
	// 验证用户名
		if ($userInfo = $model->where('username','=',$request->username)->select()) {
			#判断账号是否被禁用
			if(!$userInfo[0]['status']){
					$this->error('你号没了！');
			}
			#验证密码
			#password_verify(文明密码（表单），数据库的哈希值)
			if(password_verify($request->password,$userInfo[0]['password'])){
					if($userInfo[0]['level']>0){
						// 保存登录状态，把状态保存到回话控制
						$_SESSION['isLogin'] = true;
						$_SESSION['user']['id']=$userInfo[0]['id'];
						$_SESSION['user']['username']=$userInfo[0]['username'];
						$_SESSION['user']['level']=$userInfo[0]['level'];
						$this->success('登录成功，即将进入首页!',url('Index/index'));
					}else{
						$this->error('无权限访问！',url('Hone/Index/index'));
					}

			}else{
				$this->error('用户名或密码错误!111');
			}

		}else{
			$this->error('用户名或密码错误！');
		}
	}

	//退出登录功能
	public function outlogin(){
       $_SESSION['user']=false;
       $_SESSION['isLogin']=false;

       $this->success('退出成功！',url('Login/index'));
	}

}
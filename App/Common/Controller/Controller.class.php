<?php
namespace App\Common\Controller;

use Org\Request\Request;

class Controller
{
	public $request = null;
	public $req = null;

	public function __construct()
	{
		// 初始化请求类
		$this->request = new Request();
		$this->req     = $this->request;
	}

	/**
	 * [display 生成模板地址]
	 * @param  [string] $action     [操作名]
	 * @param  [string] $controller [控制器名]
	 * @param  [string] $module     [模块名]
	 * @return [string]             [模板绝对地址]
	 */
	public function display($action = null, $controller = null, $module = null)
	{
		// 设置加载指定模块的模板
		if ($module === null) {
			$module = __MODULE;
		}

		// 设置加载指定控制器模板
		if ($controller === null) {
			$controller = __CONTROLLER;
		}
		
		// 设置不指定模板名字则加载加载调用的方法的名字
		if ($action === null) {
			$action = __ACTION;
		}

		global $config;

		return sprintf("%s/%s/View/%s/%s%s", __APP, $module, $controller, $action, $config['template']['suffix']);
	}


	/**
	 * [error 错误提示信息]
	 * @param  [string]  $errors     [错误信息]
	 * @param  [string]  $url        [url地址]
	 * @param  integer $waitSecond [等待跳转时间 单位秒]
	 */
	public function error($errors, $url = null, $waitSecond = 5)
	{
		include __ROOT . '/Org/Tpl/Redirect/errors.php';
		exit();
	}


	/**
	 * [success 成功提示信息]
	 * @param  [string]  $message    [错误信息]
	 * @param  [string]  $url        [url地址]
	 * @param  integer $waitSecond [等待跳转时间 单位秒]
	 */
	public function success($message, $url = null, $waitSecond = 3)
	{
		include __ROOT . '/Org/Tpl/Redirect/success.php';
		exit();
	}
}
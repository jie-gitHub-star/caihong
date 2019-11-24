<?php
namespace Org\Request;

use \Org\DataToObject;

class Request
{
	private $get = null; // get 参数
	private $post = null; // post 参数
	private $param = null; // get 和 post 参数之和
	private $server = null; // server 数据
	private $session = null; // session 数据
	private $cookie = null; // cookie 数据

	public function __construct()
	{
		$this->get = $_GET; // 设置get 参数
		$this->post = $_POST; // 设置post 参数
		$this->param = $_REQUEST; // 设置get 和 post 参数之和
		$this->server = $_SERVER; // 设置server 数据
		$this->session = $_SESSION; // 设置session 数据
		$this->cookie = $_COOKIE; // 设置cookie 数据
	}

	public function get()
	{
		return new DataToObject($this->get);
	}

	public function post()
	{
		return new DataToObject($this->post);
	}
	public function param()
	{
		return new DataToObject($this->param);
	}
	public function server()
	{
		return new DataToObject($this->server);
	}
	public function session()
	{
		return new DataToObject($this->session);
	}
	public function cookie()
	{
		return new DataToObject($this->cookie);
	}
}
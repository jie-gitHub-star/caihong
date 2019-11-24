<?php
#开启session
session_start();

# 加载全局配置文件
$config = require_once './config.php';

# 加载数据库配置文件
require './database.php';

# 加载全局函数库
require './Org/functions.php';

# 加载错误处理类
require './Org/Exception/WpException.class.php';

# 加载自动引入类文件功能
require './Org/Autoload/autoload.php';

# 模块
// 模块
$module = isset($_GET['m']) ? toUcfirst($_GET['m']) : 'Home';
define('__MODULE', $module);

# 控制器
// 控制器
$controller = isset($_GET['c']) ? toUcfirst($_GET['c']) : 'Index';
define('__CONTROLLER', $controller);

# 操作
// 操作
$action = isset($_GET['a']) ? $_GET['a'] : 'index';
define('__ACTION', $action);


# 常量定义
// app目录绝对地址
define('__APP', __DIR__ . '/App');

// 项目地址
define('__ROOT', __DIR__);

// 静态文件地址
define('__PUBLIC', '/Public');

// 网站域名
define('__DOMAIN', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST']);

// 来源页
define('__REFERER', isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : __DOMAIN);

# 验证模块是否存在
if (! file_exists(__APP . '/' . $module)) {
    throw new \Org\Exception\WpException('模块不存在!');
}

# 验证模块是否允许访问
if (in_array($module, $config['disable_module'])) {
	throw new \Org\Exception\WpException('禁止访问!');
}

# 验证控制器是否存在
if (! file_exists(__APP . '/' . $module . '/Controller/' . $controller . 'Controller.class.php')) {
    throw new \Org\Exception\WpException('控制器不存在!');
}

# 实例化控制器
$classname = sprintf("\App\%s\Controller\%sController", $module, $controller);
$controllerObj = new $classname();

# 检查操作方法是否存在
if (! method_exists($controllerObj, $action)) {
	throw new \Org\Exception\WpException('操作方法不存在!');
}

# 判断是否存在初始化方法 有的话先执行
if (method_exists($controllerObj, 'init')) {
	$controllerObj->init();
}

# 调用方法实现功能
$controllerObj->$action();

# end 结束了
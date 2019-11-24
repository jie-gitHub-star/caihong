<?php

// 全局公共函数库

/**
 * [toUcfirst 将单词的首字母转为大写]
 * @param  [string] $string [要转换的单词]
 * @return [string]         [转换成首字母大写的单词]
 */
function toUcfirst($string)
{
    return ucfirst(strtolower($string));
}

/**
 * [M 获取Model对象]
 * @return [\Org\Model\Model object] [数据库操作类]
 */
function M()
{
	return \Org\Model\Model::connect();
}


/**
 * [url 生成url访问地址]
 * @param  [string]  $urlExpression [地址表达式]
 * @param  array   $param         [get参数]
 * @param  boolean $domain        [是否添加域名 true(默认): 添加; false: 不添加]
 * @return [string]                 [可访问的地址]
 */
function url($urlExpression, $param = [], $domain = true)
{
	// 分割参数
	$url_arr = explode('/', $urlExpression);

	// 设置各个参数的默认值
	$action = __ACTION;
	$controller = __CONTROLLER;
	$module = __MODULE;

	// 统计参数个数
	$total = count($url_arr);

	// 判断是何种表达式, 生成对应的地址
	switch($total)
	{
		case 1:
			$action = $url_arr[0];
			break;
		case 2:
			$controller = $url_arr[0];
			$action = $url_arr[1];
			break;
		case 3:
			$module = $url_arr[0];
			$controller = $url_arr[1];
			$action = $url_arr[2];
			break;
	}

	// 初始化变量
	$url = '';
	
	// 是否添加域名
	if ($domain) {
		$url .= __DOMAIN;
	}

	// 拼接get参数
	$param_str = http_build_query($param);

	// 生成最终地址
	$url .= sprintf("/index.php?m=%s&c=%s&a=%s&%s", $module, $controller, $action, $param_str);

	return $url;
}

function getTree($data, $pid, &$tree = [])
{
	foreach ($data as $key => $value) {
		if ($value['pid'] == $pid) {
			
			$tree[] = $value;

			getTree($data, $value['id'], $tree);
		}
	}
}
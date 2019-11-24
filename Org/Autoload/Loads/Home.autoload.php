<?php
// Home 模块
spl_autoload_register(function($classname){
	$classPath = __ROOT . '/' . $classname . '.class.php';

	if (file_exists($classPath)) {
		require $classPath;
	}
});
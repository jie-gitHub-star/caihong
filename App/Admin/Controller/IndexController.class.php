<?php
namespace App\Admin\Controller;

use \App\Common\Controller\Controller;

class IndexController extends Controller
{
	public function index(){
		include $this->display();
	}

}
<?php
namespace App\Admin\Controller;

use \App\Common\Controller\Controller;

class BaseController extends Controller
{
    const POWER_GENERAL = 1;
    const POWER_SUPRER = 2;
    public function init(){

        if(! @$_SESSION['isLogin']){
            // var_dump($_SESSION);
            $this->error('请先登录！',url('Login/index'),3);
        }
        $this-> checkPower();        
    }
 

    public function checkPower($type = 1)
    {
        switch ($type){
            case 1:
                if($this->request->session()->user->level<1){
                    $this->error('没有权限！');
                }
                break;
            case 2:
                if($this->request->session()->user->level<2){
                    $this->error('只有超级管理员才能访问');
                }
                break;
        }
    }
}
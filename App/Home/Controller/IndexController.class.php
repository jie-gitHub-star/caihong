<?php
namespace App\Home\Controller;

use \App\Common\Controller\Controller;

class IndexController extends Controller
{
     
	public function index()
	{
		# 从这里开始编写程序吧!!!
		
		// include $this->display('welcome');
     
                $pdo = new \PDO(DSN,USER,PASS);

                // 查询出顶级分类
                $sql = "SELECT * FROM `types` WHERE `pid`=0";

                // 执行sql语句
                $stmt=$pdo->query($sql);

                // 获取全部结果
                $typeList = $stmt->fetchAll(2);

                // 获取今日推荐商品
                $sql_today = "SELECT * FROM `goods` ORDER BY `id` DESC LIMIT 3;";

                /////////////
                // 执行sql语句 //
                /////////////
                $stmt = $pdo->query($sql_today);

                // 获取查询到的商品
                $todayList = $stmt->fetchAll(2);
                
                
                include $this->display();   
	}

        // 友情链接
        public function showFL()
        {
                include $this->display('show','Friend');
        }
}
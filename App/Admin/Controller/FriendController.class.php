<?php
namespace App\Admin\Controller;

use App\Common\Controller\Controller;
// use \Org\Tools\Upload;
use \Org\Tools\Page;

class FriendController extends BaseController
{
    public function index(){
    	
        $model = M();

         // 查询数据总条数，使用原始sql语句       分页||

        $goods_total=$model->get("SELECT COUNT(*) AS count FROM `friendlink`;");
        //使用Page类自动分页
        // 数据总条数
        // 每页多少条
        // get参数[parse_url][http_build_query]
        $page = new Page($goods_total[0]['count'],10);
        // 设置limit条件
        $limit = ltrim($page->limit,'LIMIT');

		// 查询数据        
        $flist=$model->table('friendlink')->limit($limit)->select();
        
        include $this->display();
    }
    public function add()
    {
        include $this->display();
    }

    public function doadd()
    {
        // var_dump($_POST);
        $data = $_POST;

        // 验证数据
        if( $data['name'] == null)
        {

            $this->error('网址名字不能为空');
        }

        $preg_url = "/^(?=^.{3,255}$)(http(s)?:\/\/)?(www\.)?[a-zA-Z0-9][-a-zA-Z0-9]{0,62}(\.[a-zA-Z0-9][-a-zA-Z0-9]{0,62})+(:\d+)*(\/\w+\.\w+)*$/";
        if(! preg_match($preg_url,$data['link'])){
            $this->error('请输入正确的网址');
        }
        // 获取数据库操作对象
        $model =M();

        // 添加数据
        $isok=$model->table('friendlink')->add($data);
        // var_dump($isok);
        if($isok){
            $this->success('添加成功',url('index'));
        }


    }

    public function edit()
    {
        // 获取数据库操作对象
        $model =M();
        // 查询id对应得数据
        $data=$model->table('friendlink')->where('id','=',$_GET['id'])->select();

        include $this->display();
    }
    public function doedit()
    {
         $data = $_POST;

        // 验证数据
        if( $data['name'] == null)
        {

            $this->error('网址名字不能为空');
        }

        $preg_url = "/^(?=^.{3,255}$)(http(s)?:\/\/)?(www\.)?[a-zA-Z0-9][-a-zA-Z0-9]{0,62}(\.[a-zA-Z0-9][-a-zA-Z0-9]{0,62})+(:\d+)*(\/\w+\.\w+)*$/";
        if(! preg_match($preg_url,$data['link'])){
            $this->error('请输入正确的网址');
        }
        // 获取数据库操作对象
        $model =M();

        $isok=$model->table('friendlink')->save($data);
      
        if($isok){
            $this->success('更改成功',url('index'));
        }
    }
    // /删除
    public function del()
    {
        // 获取数据库操作实例
        $model = M();
        
        if(!is_numeric($_GET['id'])){
            $this->error('参数错误！');
        }

        //删除语句，返回受影响行数
        $aff = $model->table('friendlink')->where('id','=',$_GET['id'])->delete();

        if($aff){
    
            $this->success('删除成功！');
        }else{
            $this->error('删除失败！');
        }
    }
}
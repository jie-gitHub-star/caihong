<?php
namespace App\Admin\Controller;

use \Org\Tools\Page;
use \Org\Tools\Upload;

class GoodController extends BaseController
{
    public function index()
    {

        $model = M();

        $where = '';

        // 设置表名
        $model->table('goods');

        //搜索的本质where中like
        // 判断前台有没有传输search
        if(isset($_GET['search']) && ! empty($_GET['search'])){
            // 查询数据用
            $model->where('name','like',"%{$_GET['search']}%");

            $where = "`name` like '%{$_GET['search']}%'";
        }

        // 判断分类id搜索
        if(isset($_GET['typeid']) && !empty($_GET['typeid']))
        {
            //通过判断$where里面有没有内容来确实要不要拼接and
            if($where){
                $where .=' AND ';
            }

            // 拼接条件
            $where .="`typeid` = '{$_GET['typeid']}'";

            // 查询结果的where
            $model->where('typeid','=',$_GET['typeid']);
        }

        // 给条件加上WHERE
        if($where){
            $where = 'WHERE '. $where;
        }
 // var_dump($where);

        // 查询数据总条数，使用原始sql语句

        $goods_total=$model->get("SELECT COUNT(*) AS count FROM `goods` {$where};");
        //使用Page类自动分页
        // 数据总条数
        // 每页多少条
        // get参数[parse_url][http_build_query]
        $page = new Page($goods_total[0]['count'],10);

        $limit = ltrim($page->limit,'LIMIT');

        // 给到查询所有商品
        // 查询所有商品
        $goods = $model->limit($limit)->select();
        // var_dump($goods);
        // 将状态转化为可阅读的文字
        $status = ['下架','上架'];

        // 将分类封装为可阅读的文字
        // 实现方式，获取所有的分类，提取二维数组的内容生成一个新的数组，以id作为键，分类名称作为值

        $typeAll = $model->table('types')->select();

        // 定义转化后的数组

        $type = [];

        foreach ($typeAll as $key => $value) {
            $type[$value['id']] = $value['name'];
        }
        include $this->display();
    }

    public function add()
    {
        // 获取数据库操作对象
        $model = M();

        // 获取全部数据
        $model->table('goods');
        $typeInfo=$model->table('types')->select();

        //排列 []
        getTree($typeInfo,0,$newType);

        include $this->display();

    }

    public function doadd()
    {
        $data = $_POST;
        // var_dump($_FILES);
        // 验证表单
        $this->checkGood($data);

        $up = new Upload();

        // 设置属性 上传大小 类型
        $up->set('path',__ROOT.__PUBLIC.'/uploads/good');//保存路径

        $up->set('maxisze',1024*1024*20);//设置最大允许文件大小
        $up->set('allowtype',['gif','png','jpg','jpeg']);
        $up->set('israndname',true);

        if($up->upload($_FILES,'pic')){
            $data['pic'] = $up->getFileName();
        }else{
            $this->error($up->getErrorMsg());
        }

        // 获取数据库对象，插入数据
        $model = M();


        // 设置表名
        $model->table('goods');

        if($model->add($data)){
            $this->success('添加商品成功',url('index'));
        }else{
            $this->error('添加商品失败');
        }
    }

    protected function checkGood($data)
    {
        // 验证商品名称
        // 
        $preg_name='/^[\x{4E00}-\x{9FA5}A-Za-z0-9_]+$/u';

        if(! preg_match($preg_name,$data['name'])){
            $this->error('商品名称不能使用特殊字符，只能使用文字字母下划线');
        }

        // 验证分类id是不是数字
        if(! is_numeric($data['typeid'])){
            $this->error('商品分类错误');
        }
        // 验证山炮价格，商品价格是小数也有可能是整数，正则匹配
        $preg_price = '/^[0-9]+(.[0-9]{2})?$/';
        // var_dump($data);
        if(! preg_match($preg_price,$data['price'])){
            $this->error('商品价格格式错误，必须为数字或精确到两位的小数');
        }
        // 验证商品库存
        $preg_store='/^\d{1,9}$/';
        if(! preg_match($preg_store,$data['store'])){
            $this->error('商品库存只能为正数');
        }

        // 验证商品厂家
        $preg_company='/^[\x{4E00}-\x{9FA5}A-Za-z0-9_]+$/u';
         if(! preg_match($preg_company,$data['company'])){
            $this->error('商品厂家只能为中文字母数字下划线');
         }
        // 验证商品状态
         if(! in_array($data['status'],[0,1])){
            $this->error('状态参数非法');
         }
        // 验证商品描述
         if(strlen($data['descr'])<10){
            $this->error('商品描述过短');
         }
    }

    public function edit()
    {
        if(!is_numeric($_GET['id'])){
            $this->error('参数胡错误。');
        }

        $model = M();
          
        // var_dump($userInfo);
        // 获取全部数据
       
        $typeInfo=$model->table('types')->select();
        //排列 []
        getTree($typeInfo,0,$newType);

        $goods = $model->table('goods')->where('id','=',$_GET['id'])->select();
        
        // var_dump($_SESSION);

        include $this->display();
    }

    public function doedit()
    {
        $data = $_POST;
        // 验证表单
        $this->checkGood($data);

        $up = new Upload();

        // 设置属性 上传大小 类型
        $up->set('path',__ROOT.__PUBLIC.'/uploads/good');//保存路径
        $up->set('maxisze',1024*1024*20);//设置最大允许文件大小
        $up->set('allowtype',['gif','png','jpg','jpeg']);
        $up->set('isranname',true);


        if($up->upload($_FILES,'pic')){
            $data['pic'] = $up->getFileName();
        } else {
            // $this->error($up->getErrorMsg()); // message
        }

        // 获取数据库对象，插入数据
        $model = M();


        // 设置表名
        $model->table('goods');
        if($model->where('id','=',$data['id'])->save($data)){
            $this->success('修改商品成功',url('index'));
        }else{
            $this->error('添加修改商品失败');
     
        }   
    }

    public function del()
    {
                // 获得数据库实例化
        $model = M();

        // 设置表名
        $model->table('goods');

        // 验证数据是否为字符串类型的数字
        if(!is_numeric($_GET['id'])){
            $this->error('参数错误');
        }



        // 删除语句，返回受影响行数
        $aff = $model->where('id','=',$_GET['id'])->delete();

        if($aff){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
    }
}

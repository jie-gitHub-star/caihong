<?php
namespace App\Admin\Controller;

use \App\Common\Controller\Controller;
use \Org\Tools\Upload;
use \Org\Tools\Page;
class UserController extends BaseController
{
    public function index()
    {
        // 设置默认nwhere条件
        $where = '';

         //链接数据库
        $model = M();


        //搜索功能
        // 设置表名
        $model->table('users');//注意别写错单词！！！！

        //为他添加一个搜索条件
        if(isset($_GET['search']) && ! empty($_GET['search'])){
            $model->where('username', 'LIKE',"%{$_GET['search']}%");

        }

        //搜索功能结尾

        // 查询数据总条数

        if(isset($_GET['search']) && ! empty($_GET['search'])){
            // 查询所有数据使用的
            $where = "WHERE `username`LIKE %{$_GET['search']}%";

            //查询数据总条数使用的where条件
             $where = "WHERE `username` LIKE '%{$_GET['search']}%'";
        }
        $users_total=$model ->get("SELECT count(*) as count FROM `users` {$where}");

        //+++++++++++++++
        // //分页++++++++
        // ++++++++++++++
        $page = new Page($users_total[0]['count'],2);//对应条件的数据总条数，每一页显示几条；

        $limit = explode(', ',ltrim($page->limit,'LIMIT'));
        // var_dump($limit);
        
        // var_dump($model->limit($limit[0],$limit));
        // 查询数据库
        $userInfo=$model->limit($limit[0],@$limit[1])->select();
// ->table('users')
        //
        



        
        $level = [
            0=>'普通会员',1=>'<b style="color:red;">普通管理员</b>',2=>'<b style="color:green;">超级管理员</b>'
        ];
        //定义状态数组
        $status=[
            0=>'<b style="color:red;">禁止登录</b>',1=>'允许登录'

        ];
        include $this->display('index');

    }

    // /删除用户功能
    public function del()
    {
        // 获取数据库操作实例
        $model = M();
        
        if(!is_numeric($_GET['id'])){
            $this->error('参数错误！');
        }

        //删除语句，返回受影响行数
        $aff = $model->table('users')->where('id','=',$_GET['id'])->delete();

    //删除用户详情
    //1，先查到pic图片文字
    $userInfoData = $model->table('user_infos')->where('uid','=',$_GET['id'])->select();

    if($aff  && $userInfoData){
        //2删除头像
        unlink(__ROOT.__PUBLIC.'/uploads/tx/'.$userInfoData[0]['pic']);

        //3，删除数据
        $model->where('uid','=',$_GET['id'])->delete();   
    }

        if($aff){
    
            $this->success('删除成功！');
        }else{
            $this->error('删除失败！');
        }
    }

    //显示添加页面
    public function add()
    {
        // var_dump($this->display('index','Add'));
        include $this->display('index','Add');
    }

    //处理提交的信息
    public function doadd()
    {
        //var_dump($_POST);
        //接收添加数据，方便后面操作
        $data = $_POST;
        // var_dump($data);
///////////验证数据

        // 验证用户，正则————百度找；

       $preg_username = '/^[\x{4E00}-\x{9FA5}A-Za-z0-9_]+$/u';
        // 16进制方式来处理
        // preg = '';

        // if(! preg_match($preg_match($preg_username,$data['username']))){
        //     $this->error("用户名不符合规则");
        // }
        if (! preg_match($preg_username, $data['username'])) {
            $this->error("用户名不符合规则.");
        }

        // 验证密码
        $preg_password= '/^[a-zA-Z]\w{5,15}$/';

        if(! preg_match($preg_password,$data['password'])){
            $this->error('密码不符合规则，必须以字母开头，后面加上任意字母，数字下划线，6-16位');
        }
        // if (! preg_match($preg_password, $data['password'])) {
        //     $this->error('密码不符合规则: 必须以字母开头后面加上任意字母, 数字 下划线, 6到16位.');
        // }

        // 验证二次密码
        if($data['password']!=$data['repassword']){
            $this->error("两次密码不一致");
        }

        // 验证状态
        if(! in_array($data['status'],['0','1'])){
            $this->error('状态参数非法');
        }

        //var_dump();
        // 设置默认数据
        $data['level'] = 0;//设置用户等级
        $data['create_time']=date('Y-m-d H:i:s',time());//添加时间
        $data['password']= password_hash($data['password'],PASSWORD_DEFAULT);
        // var_dump($data);
        //删除无用数据
        unset($data['repassword']);

        $model = M();

        //添加数据
        $aff = $model->table('users')->add($data);

        if($aff){
                $this->success('添加成功',url('index'));
        }else{
            $this->error('添加失败，反正我不知错哪儿了');
        }


    }
// 引入修改模块
    public function edit()
    {
    	if(!is_numeric($_GET['id'])){
    		$this->error('参数胡错误。');
    	}

    	$model = M();

    //查询指定用户的信息
    $userInfo = $model->table('users')->where('id','=',$_GET['id'])->select();

    	if(! $userInfo){
    		$this->error('数据获取失败');
    	}
    	// 变为一维数组
    	$userInfo = $userInfo[0];
    	//引入模板。
    	include $this->display();
    }

    // 修改数据并提交
    public function doedit()
    {
    	$data = $_POST;
        //验证状态
        if(!in_array($data['status'],['0','1'])){
            $this->error('非法参数');
        }
        //验证等级
        
        if(!in_array($data['level'],['0','1','2'])){
            $this->error('非法参数');
        }
        // 验证数据id
        if(! is_numeric($data['id'])){
            $this->error('ID参数非法');
        }

        //获取数据库操作对象
        $model = M();

        // 设置表明
        $model->table('users');

        if($data['oldpassword']){
            // 验证密码
            $preg_password = '/^[a-zA-Z]\w{5,15}$/';
            if(! preg_match($preg_password,$data['oldpassword'])){
                $this->error('密码不符合规则，必须以字母开头，加上任意字母数字下划线。6-16位。');
            }

            // 两次密码是否一致
            // if($data['oldpassword'] != $data['newpassword']){
            //     $this->error('两次密码输入不一致');
            // }

            // 验证原密码
            $userInfo = $model->where('id','=',$data['id'])->select();

            //利用逻辑短路 $userInfo是否存在并且判断，原密码是否正确
            if($userInfo && password_verify($data['oldpassword'],$userInfo[0]['password'])){
                //加密新密码
                $data['password'] = password_hash($data['newpassword'],PASSWORD_DEFAULT);
            }else{
                // 原密码错误
                $this->error('原密码错误');
            }
        }else{

            //删除密码
            unset($data['oldpassword']);
        }
        ///////////////////////////
        // 无论是否修改密码都要删除，所以我们写在外面 //
        ///////////////////////////
        unset($data['oldpassword']);
        unset($data['newpassword']);
        // var_dump($data);
        $aff = $model-> where('id','=',$data['id'])-> save($data);
        // var_dump($aff);
        if($aff){
            $this->success('修改成功！',url('index'));
        }else{
            $this->error('修改失败！');
        }
    }

    public function detail()
    {
         if(! is_numeric($_GET['id'])){
            $this->error('参数错误');
         }

        // 判断有没有详情
        // 有详情：显示编辑页面
        // 没有详情，显示添加页面
        // 
        // 获取数据库操作对象 model 类
         $model = M();

         // 获取对象用户的详情
         // 有：返回数组
         // 没：返回false
         // $userInfo = $model->table('user_infos')->where('user','=')
         $userInfoData = $model->table('user_infos')->where('uid','=',$_GET['id'])->select();
         if($userInfoData){
            // 执行编辑和查看
        
            // 将二维数组转为一维数组
            $userInfoData = $userInfoData[0];

            include $this->display('detail_edit');
         }else{
            include $this->display('detail_add');
         }
    }

    public function dodetail_add()
    {
    	// 接收传过来的数据
    	$data = $_POST;

    	$this->datailCheck($data);

    	// 上传文件成功

    	// 实例化工具

    	$upload = new Upload();

    	//设置属性(文件类型，文件大小，文件保存地址
    	$upload->set('path',__ROOT.__PUBLIC.'/uploads/tx');
    	// 储存文件的文件夹需要手动穿件，如果找不到则报错

    	$upload->set('maxize',1024*1024*20);

    	$upload->set('issrandname',true);//true给文件随机取名。false固定文件名(MD5)

    	// 上传文件成功true  失败 false ；
    	if($upload->upload($_FILES,'pic')){
    		$data['pic'] = $upload->getFileName();
    	}else{
    		$this->error($upload->getErrorMsg());
    	}

    	//获取数据库操作对象，添加数据
    	$model = M();

    	// 设置表名
    	$model->table('user_infos');

    	if($model->add($data)){
    		$this->success('添加用户详情成功',url('User/index'));
    	}else{
    		$this->error('添加用户详情失败');
    	}
    


    }

    public function dodetail_edit()
    {
        $data = $_POST;
        // var_dump($_FILES);
        // 验证数据
        $this->datailCheck($data);

        //上传头像
        // 不修改头像
        // 选择文件，我想修改头像，1头像图片过大是否也要报错

        if ($_FILES['pic']['error']!=4) {
        	$upload = new Upload();

        	// 设置属性（文件类型，大小，文件保存地址）

        	$upload->set('path',__ROOT.__PUBLIC.'/uploads/tx');

        	// 储存文件的文件夹需要手动穿件，如果找不到则报错
        	$upload->set('maxsize',1024*1024*20);//设置文件最大为20m

        	$upload->set('allowtype',['gif','png','jpg','jpeg']);//设置允许上传的文件类型
        	$upload->set('israndname',true);//true 随机文件名 false；固定文件名(MD5)生成名字

        	// 上传文件成功 true 失败：false
        	if ($upload->upload($_FILES,'pic')) {
        		$data['pic'] = $upload->getFileName();//获取文件名

        		// 删除原来的头像
        		// 旧图片的完整地址
        		$oldpicPath = __ROOT . __PUBLIC . '/uploads/tx/' . $data['oldpic'];
        		
        		if(file_exists($oldpicPath)){
        			unlink($oldpicPath);
        		}
        	}else{
        		$this->error($upload->getErrorMsg());
        	}
        }

        //删除旧文件图片的地址

        unset($data['oldpic']);

// var_dump($data);
        // 获取model操作对象
        $model = M();

        // 设置表名
        $model->table('user_infos');

        //执行更新操作
        if ($model->where('uid','=',$data['uid'])->save($data)) {
        	$this->success('用户详情修改成功！',url('User/user'));
        }else{
        	$this->error('用户详细修改失败');
        }
        
    }

    protected function datailCheck($data)
    {
    	//判断id是否合法
        if(!is_numeric($data['uid'])){
        	$this->error('非法参数');
        }
        $preg_name='/^[\x{4E00}-\x{9FA5}A-Za-z0-9_]+$/u';

        if(!preg_match($preg_name,$data['name'])){
        	$this->error('用户名只能输入字母数字下下划线');
        }

        //判断年龄是否符合常理
        if (! $data['age']<0 || $data['age']>120) {
        	$this->error('年龄不符合常理');
        }

        //判断性别是否合法
        if(! in_array($data['sex'],['1','0','2'])){
        	$this->error('参数不合法');
        }

        // 判断手机号码是否合法
        $preg_phone= '/^(13[0-9]|166|14[5|7]|15[0|1|2|3|5|6|7|8|9]|18[0|1|2|3|5|6|7|8|9])\d{8}$/';
        if(!preg_match($preg_phone,$data['phone'])){
        	$this->error('手机号码错误');
        }

        // 验证邮箱
        $preg_email='/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/';

        if(! preg_match($preg_email,$data['email'])){
        	$this->error('邮箱格式错误');
        }


        // 判断居住地址
        if(strlen($data['address'])<30){
        	$this->error('请输入至少10个文字的地址');
        }

    }

}

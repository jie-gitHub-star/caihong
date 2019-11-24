<?php
namespace App\Admin\Controller;

class TypeController extends BaseController
{

	public function index()
	{
		// 分页Model 实例
		$model = M();

		$TypeData = $model->table('types')->select();

		getTree($TypeData,0,$newTypeData);

		$show =[
			'不显示','显示'
		];


		include $this->display('index');
	}

	public function add()
	{
		$mark = '顶级';

		$parent = [];

		if(isset($_GET['id'])){
			$mark='子级';

			// 获取模型model
			$model = M();

			// 设置表名
			$model ->table('types');

			// 获取数据
			$parent = $model->where('id','=',$_GET['id'])->select();

			if($parent){
				$parent=$parent[0];
			}else{
				$mark='顶级';
			}
		}

		include $this->display('add');

	}

	// 添加分类数据处理
	public function doadd()
	{
		// 接收数据
		$data = $_POST;

		// 验证数据
		// 验证分类名字

		$preg_name = '/^[\x{4E00}-\x{9FA5}A-Za-z0-9_]+$/u';

		if(! preg_match($preg_name,$data['name'])){
			$this->error('分类不符合规则');
		}

		// 验证父级id是否存在
		if(!isset($data['pid']) || !is_numeric($data['pid'])){
			$this->error('父级分类错误');
		}

		// 验证分类路径是否存在
		if(!isset($data['path'])){
			$this->error('分类路径参数错误');
		}
		// 验证是否显示
		if(!in_array($data['display'],[0,1])){
			$this->error('是否显示参数错误');
		}

		// 获取model对象
		$model = M();

		// 设置表名
		$model->table('types');

		//添加数据
		if($model->add($data)){
			$this->success('添加成功！',url('index'));
		}else{
			$this->error('添加失败！');
		}
	}

	//删除分类
	public function  del()
	{
		//
		// 获得数据库实例化
		$model = M();

		// 设置表名
		$model->table('types');

		// 验证数据是否为字符串类型的数字
		if(!is_numeric($_GET['id'])){
			$this->error('参数错误');
		}

		if($model->where('pid','=',$_GET['id'])->select()){
			$this->error('本爸爸还有儿砸，先删除儿砸，才能删除自己（分类）');
		}

//如果虾米那有商品则不删除
if($model->table('goods')->where('typeid','=',$_GET['id'])->select()){
	$this->error('该分类下还有商品，请先删除商品');
}

		// 删除语句，返回受影响行数
		$aff = $model->where('id','=',$_GET['id'])->select();

		if($aff){
			$this->success('删除成功');
		}else{
			$this->error('删除失败');
		}
	}

	public function edit()
	{
		// 验证数据
		if(!is_numeric($_GET['id'])){
			$this->error('参数非法');
		}

		// 分类不能异移动
		// 路径不能改


		// 获取model模型
		$model = M();

		// 查询指定分数数据
		$type = $model ->table('types')->where('id','=',$_GET['id'])->select();

		// 判断分类是否存在
		if($type){
			$type = $type[0];
		}else{
			$this->error('分类不存在');
		}

		include $this->display();
	} 

	public function doedit()
	{
		$data = $_POST;

		// 验证数据

		// 验证id()

		if(! is_numeric($data['id'])){
			$this->error('ID参数非法');
		}

		// 验证分类名字
		$preg_name =  '/^[\x{4E00}-\x{9FA5}A-Za-z0-9_]+$/u';
		if(! preg_match($preg_name,$data['name'])){
			$this->error('分类名不符合规则');
		}

		// 验证是否显示
		if(! in_array($data['display'],[0,1])){
			$this->error('是否参数错误');
		}

		// 初始化model类
		$model = M();

		$aff = $model->table('types')->where('id','=',$data['id'])->save($data);

		if($aff){
			$this->success('修改成功！',url('index'));
		}else{
			$this->error('修改失败');
		}
	}
}


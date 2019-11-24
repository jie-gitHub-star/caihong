<?php
namespace Org\Model;

class Model
{
	// 对象
	private static $obj = null;

	protected $link = null;

	protected $tableName = ''; // 表名
	protected $field = '*'; // 字段名
	protected $field_all = []; // 当前表所有字段
	protected $where = 'WHERE'; // where 条件
	protected $limit = ''; // limit
	protected $order = ''; // 排序 order by
	protected $group = ''; // 分组 group by


	private $sql = ''; // sql 语句


	// 构造函数 用来初始化
	private function __construct()
	{
		// 将表名保存到成员属性
		// $this->tableName = $tableName;

		// 一个类new一次就会有一个新的链接.
		// 有没有办法只new一次然后实现操作多个表
		$this->link = mysqli_connect(HOST, USER, PASS, DB) or die('数据库链接失败!');
		
		mysqli_set_charset($this->link, 'utf8');
	}

	public static function connect()
	{
		if (is_null(self::$obj)) {
			self::$obj = new self();
		}

		return self::$obj;
	}


	public function select()
	{
		// 生成sql语句
		$this->getSql('get');

		// 执行sql语句
		$res = $this->query();

		// 重置参数
		$this->resetParam(['field_all']);

		// 获得结果
		return $this->fetch($res);

	}


	// $mark = false; 表示操作是 查询 还是 增删改
	// false => 查询
	// true => 增删改

	// select
	// insert
	// update
	// delete
	public function get($sql)
	{
		// 设置sql语句
		$this->sql = $sql;

		$low_sql = strtolower($sql); // 把sql变为小写

		$type = substr($low_sql, 0, 6);

		if ($type == 'select') {
			// 查询
			$res = $this->query();

			return $this->fetch($res);
		} else {
			// 增删改
			return $this->exec();
			
		}
	}


	public function delete()
	{
		// 生成 sql 语句
		$this->getSql('del');

		// 执行sql语句
		$res = $this->exec();

		// 获得受影响行数
		return $res;
	}


	public function add($data)
	{	
		// 检查字段是否有误
		$this->checkField($data);

		// INSERT INTO `表名`(`id`, `name`) VALUES('1', 'name');

		// 取出keys 和 values 来拼接
		$keys = array_keys($data);
		$values = array_values($data);


		// 拼接 keys 和 values
		$keys_str = sprintf('`%s`', implode('`, `', $keys));
		$values_str = sprintf("'%s'", implode("', '", $values));

		// 生成sql语句
		$this->getSql('add', [$keys_str, $values_str]);

		// 执行增删改操作
		return $this->exec();


	}


	// 修改
	public function save($data)
	{
		// 检查字段是否有误
		$this->checkField($data);

		$save_data = '';

		foreach ($data as $key => $value) {
			$save_data .= sprintf(" `%s`='%s',", $key, $value);
		}

		$save_data_l = ltrim($save_data);

		$save_data_r = rtrim($save_data_l, ',');

		$this->getSql('save', $save_data_r);
		
		return $this->exec();
	}

	//+--------------------------------
	//| 辅助函数
	//+--------------------------------

	// 生成sql语句
	// 增删改查
	/*
		$type:
			增: ins
			删: del
			改: edit
			查: get
	*/
	protected function getSql($type, $data=[])
	{

		$where = '';

		if ($this->where != 'WHERE') $where = $this->where;

		switch($type)
		{
			case 'add':
				$this->sql = sprintf("INSERT INTO `%s`(%s) VALUES(%s);", $this->tableName, $data[0], $data[1]);
				break;
			case 'del':
				if ($this->where == 'WHERE') {
					exit("请给delete传条件.");
				}

				$this->sql = sprintf("DELETE FROM `%s` %s;", $this->tableName, $this->where);
				break;
			case 'save':
				$this->sql = sprintf("UPDATE `%s` SET %s %s;", $this->tableName, $data, $where);
				break;
			case 'get':
				$this->sql = sprintf("SELECT %s FROM `%s` %s %s %s %s;", $this->field, $this->tableName, $where, $this->group, $this->order, $this->limit);
				break;
			case 'desc':
				$this->sql = sprintf("DESC `%s`", $this->tableName);
				break;
		}

		DEBUG and var_dump($this->sql);
	}


	// 执行查询sql语句
	protected function query()
	{
		$res = mysqli_query($this->link, $this->sql);

		if ($res == false) {
			exit("语法有误");
		}

		return $res;
	}

	// 获取查询结果
	// object $res 查询得到的结果集 
	protected function fetch($res)
	{
		$data = [];

		// 将结果组成二维数组返回
		while ($row = mysqli_fetch_assoc($res)) {
			$data[] = $row;
		}

		return $data;
	}


	protected function exec()
	{
		$res = mysqli_query($this->link, $this->sql);

		if ($res) {
			$aff = mysqli_affected_rows($this->link);

			return $aff;
		} else {
			exit("语法有误.!");
		}
	}

	// 设置表名
	// string $name 数据库表名
	public function table($name)
	{
		if ($this->tableName == $name) {
			return $this;
		}

		$this->tableName = $name;

		// 重置参数为初始化
		$this->resetParam();

		// 获取当前表的所有字段
		$this->getField();

		return $this; // 返回本身的实例化
	}

	// 重置参数
	// $data = []; // 要重置的属性名单
	// $mark = false; false: 黑名单(不重置$data内容)  true:白名单(只重置$data内容)
	protected function resetParam($data=[], $mark=false)
	{
		// 需要重置的属性
		$var_list = [
			'field',
			'field_all',
			'where',
			'limit',
			'order',
			'group'
		];

		if ($mark) {
			// 白名单 只重置 $data
			$var_list = $data;
		} else {
			// 黑名单 不重置$data
			foreach ($data as $key => $value) {
				$index = array_search($value, $var_list);
				if ($index === false) continue;
				unset($var_list[$index]);
			}
		}


		// 当我们使用了白名单或或者黑名单的时候
		
		foreach ($var_list as $key => $name) {
			switch ($name) {
				case 'field':
					$this->field = '*';
					break;
				case 'field_all':
					$this->field_all = [];
					break;
				case 'where':
					$this->where = 'WHERE';
					break;
				case 'limit':
					$this->limit = '';
					break;
				case 'order':
					$this->order = '';
					break;
				case 'group':
					$this->group = '';
					break;
			}
		}
	}

	/*
		设置字段:
			字符串: 直接写原生代码
			数组: 传一维数组
			[
				'id',
				'name'
			]
	*/
	public function field($field)
	{
		// 一种是原生数组
		// 一种是字符串
		if (is_string($field)) {
			$this->field = $field;
		} else if (is_array($field)) {
			$str_field = '';
			foreach ($field as $value) {
				$str_field .= "`{$value}`, ";
			}

			$this->field = rtrim($str_field, ', ');
		}
		
		return $this;
	}


	// 获取当前表的所有字段
	protected function getField()
	{
		if ($this->field_all) {
			return false;
		}

		// 生成语句
		$this->getSql('desc');

		// 查询SQL语句
		$res = $this->query();

		// 获得结果
		$field_data_all = $this->fetch($res);

		// $this->field_all = [];

		// 获取所有字段名字
		foreach ($field_data_all as $value) {
			$this->field_all[] = $value['Field'];
		}
	}

	// 判断我传进来的数据字段是否有误
	protected function checkField($data)
	{
		// var_dump($data);
		// var_dump($this->field_all); // in_array();

		foreach ($data as $key => $value) {
			// var_dump($key);
			if (! in_array($key, $this->field_all)) {

				// 如果出现字段错误直接终止程序
				exit("字段名有误 [{$key}]");
			}
		}


	}

	/*
		where 方法
	
		假设现在只用字符串接收: WHERE id=1


		更新:
			条能有多个 and 还是 or
			运算符 > < = like 
	*/

	public function where($field, $mark, $data, $rel='AND')
	{
		// $this->where = 'WHERE'

		if ($this->where == 'WHERE') {
			// 第一个个
			$this->where .= sprintf(" `%s` %s '%s'", $field, $mark, $data);
		} else {
			// 多个条件
			$this->where .= sprintf(" %s `%s` %s '%s'", $rel, $field, $mark, $data);
		}

		return $this;
	}

	// 使用原生写法
	public function whereRaw($where)
	{

		$this->where = "WHERE " . trim($where);

		return $this;
	}


	// $limit = 1;
	// $limit = 1,2;
	// 直接传字符串

	// start = 1
	// num = 10 可选
	// 多参数

	// limit 1
	// limit 1,2

	public function limit($start, $num=null)
	{
		if ($num) {
			$this->limit = sprintf("LIMIT %s,%s", $start, $num);
		} else {
			$this->limit = sprintf("LIMIT %s", $start);
		}

		return $this;
	}


	// 排序
	public function order($field, $type='ASC')
	{

		$this->order = sprintf("ORDER BY %s %s", $field, $type);

		return $this;
	}


	public function group($field)
	{
		$this->group = sprintf("GROUP BY %s", $field);

		return $this;
	}


	// 析构方法
	public function __destruct()
	{
		mysqli_close($this->link);
	}
}
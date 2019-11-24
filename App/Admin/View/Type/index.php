
<!DOCTYPE html>
<!--[if lt IE 7 ]><html lang="en" class="ie6 ielt7 ielt8 ielt9"><![endif]--><!--[if IE 7 ]><html lang="en" class="ie7 ielt8 ielt9"><![endif]--><!--[if IE 8 ]><html lang="en" class="ie8 ielt9"><![endif]--><!--[if IE 9 ]><html lang="en" class="ie9"> <![endif]--><!--[if (gt IE 9)|!(IE)]><!--> 
<html lang="en"><!--<![endif]--> 
	<head>
		<meta charset="utf-8">
		<title>用户列表 - WZ Project</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="<?= __PUBLIC ?>/admin/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?= __PUBLIC ?>/admin/css/bootstrap-responsive.min.css" rel="stylesheet">
		<link href="<?= __PUBLIC ?>/admin/css/site.css" rel="stylesheet">
		<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	</head>
	<body>
		<div class="container">
			<?php include $this->display('navbar', 'Layout') ?>
			<div class="row">
				<?php include $this->display('sidebar', 'Layout') ?>
				<div class="span9">
					<h1>
						分类列表
					</h1>
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>
									序号
								</th>
								<th>
									分类名
								</th>
								<th>
									路径
								</th>
								<th>
									前台显示
								</th>
								<th>
									操作
								</th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($newTypeData as $key => $value):
							?>
							<tr>
								<td>
									<?= $key+1 ?>
								</td>
								<td>
									<?php
										$level = count(explode(',', $value['path']))-1;
										echo str_pad('', $level*3, ']--');
										echo $value['name'];
									?>
								</td>
								<td>
									<?= $value['path'] ?>
								</td>
								<td>
									<?= $show[$value['display']] ?>
								</td>
								<td>
									<a href="<?= url('add', ['id' => $value['id']]) ?>" class="view-link">添加子分类</a>
									<a href="<?= url('edit', ['id' => $value['id']]) ?>" class="view-link">编辑</a>
									<a href="<?= url('del', ['id' => $value['id']]) ?>" class="view-link" style="color: red;">删除</a>
								</td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>				
					<div class="pagination">
						<!-- <ul>
							<li class="disabled">
								<a href="#">«</a>
							</li>
							<li class="active">
								<a href="#">1</a>
							</li>
							<li>
								<a href="#">2</a>
							</li>
							<li>
								<a href="#">3</a>
							</li>
							<li>
								<a href="#">4</a>
							</li>
							<li>
								<a href="#">»</a>
							</li>
						</ul> -->
					</div>
				</div>
			</div>
		</div>
		<script src="<?= __PUBLIC ?>/admin/js/jquery.min.js"></script>
		<script src="<?= __PUBLIC ?>/admin/js/bootstrap.min.js"></script>
		<script src="<?= __PUBLIC ?>/admin/js/site.js"></script>
	</body>
</html>
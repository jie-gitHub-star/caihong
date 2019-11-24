
<!DOCTYPE html>
<!--[if lt IE 7 ]><html lang="en" class="ie6 ielt7 ielt8 ielt9"><![endif]--><!--[if IE 7 ]><html lang="en" class="ie7 ielt8 ielt9"><![endif]--><!--[if IE 8 ]><html lang="en" class="ie8 ielt9"><![endif]--><!--[if IE 9 ]><html lang="en" class="ie9"> <![endif]--><!--[if (gt IE 9)|!(IE)]><!--> 
<html lang="en"><!--<![endif]--> 
	<head>
		<meta charset="utf-8">
		<title>分类添加 - WZ Project</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="<?= __PUBLIC ?>/admin/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?= __PUBLIC ?>/admin/css/bootstrap-responsive.min.css" rel="stylesheet">
		<link href="<?= __PUBLIC ?>/admin/css/site.css" rel="stylesheet">

	</head>
	<body>
		<div class="container">
			<?php include $this->display('navbar', 'Layout') ?>
			<div class="row">
				<?php include $this->display('sidebar', 'Layout') ?>
				<div class="span9">
					<h1>
						添加<?= $mark ?>分类
					</h1>
					<form id="edit-profile" class="form-horizontal" action="<?= url('doadd') ?>" method="post">
						<fieldset>
							<legend>分类信息</legend>
							<div class="control-group">
								<label class="control-label" for="username">分类名称</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="username" name="name">
								</div>
							</div>	
							<div class="control-group">
								<label class="control-label" for="password">父级分类</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="password" value="<?= $parent ? $parent['name'] : '顶级分类' ?>" disabled>
									<input type="hidden" name="pid" value="<?= $parent ? $parent['id'] : '0' ?>">
								</div>
							</div>	
							<div class="control-group">
								<label class="control-label" for="repassword">路径</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="repassword" value="<?= $parent ? $parent['path'] . $parent['id'] . ',' : '0,' ?>" disabled>
									<input type="hidden" name="path" value="<?= $parent ? $parent['path'] . $parent['id'] . ',' : '0,' ?>">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="input01">是否前台显示</label>
								<div class="controls">
									<label class="radio">
										<input type="radio" name="display" value="0" checked="checked">
										不显示
									</label>
									<label class="radio">
										<input type="radio" name="display" value="1">
										显示
									</label>
								</div>
							</div>			
							<div class="form-actions">
								<button type="submit" class="btn btn-primary">Save</button> <button class="btn">Cancel</button>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
		<script src="<?= __PUBLIC ?>/admin/js/jquery.min.js"></script>
		<script src="<?= __PUBLIC ?>/admin/js/bootstrap.min.js"></script>
		<script src="<?= __PUBLIC ?>/admin/js/site.js"></script>
	</body>
</html>
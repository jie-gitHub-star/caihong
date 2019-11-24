<!DOCTYPE html>
<!--[if lt IE 7 ]><html lang="en" class="ie6 ielt7 ielt8 ielt9"><![endif]--><!--[if IE 7 ]><html lang="en" class="ie7 ielt8 ielt9"><![endif]--><!--[if IE 8 ]><html lang="en" class="ie8 ielt9"><![endif]--><!--[if IE 9 ]><html lang="en" class="ie9"> <![endif]--><!--[if (gt IE 9)|!(IE)]><!--> 
<html lang="en"><!--<![endif]--> 
	<head>
		<meta charset="utf-8">
		<title>Login - Akira</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="<?= __PUBLIC ?>/admin/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?= __PUBLIC ?>/admin/css/bootstrap-responsive.min.css" rel="stylesheet">
		<link href="<?= __PUBLIC ?>/admin/css/site.css" rel="stylesheet">
		<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	</head>
	<body>
		<div id="login-page" class="container">
			<h1>Akira Login</h1>
			<form id="login-form" class="well" action="<?= url('login'); ?>" method='post'>
				<input type="text" class="span2" placeholder="Email" name="username" /><br />
				<input type="password" class="span2" placeholder="Password" name="password" /><br />
				<label class="checkbox"> <input type="checkbox" /> Remember me </label>
				<button type="submit" class="btn btn-primary">Sign in</button>
				<button type="submit" class="btn">Forgot Password</button>
			</form>	
		</div>
		<script src="<?= __PUBLIC ?>/admin/js/jquery.min.js"></script>
		<script src="<?= __PUBLIC ?>/admin/js/bootstrap.min.js"></script>
		<script src="<?= __PUBLIC ?>/admin/js/site.js"></script>
	</body>
</html>
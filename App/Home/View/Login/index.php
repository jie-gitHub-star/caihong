<!DOCTYPE html>
<html>
<head>
	<title>小米账号-登录</title>
	<link rel="icon" href="mi.ico">
	<link rel="stylesheet" href="<?= __PUBLIC ?>/admin/css/denglu.css" />
	<link rel="stylesheet" href="<?= __PUBLIC ?>/admin/denglu-icon/iconfont.css">
	<meta charset="utf-8">

</head>
<body>
	<div class="header"><a><img src="<?= __PUBLIC ?>/admin/img/denglu/milogo.png" style="margin-left:110px;float:left;"></a></div>
	<!-- 主体部分 -->
	<div class="bodyer">
		<div class="ID">
			<a style="color:#f56600" class="denglu">账号登录</a><span style="border:1px rgba(0,0,0,.1) solid;width:0;height: 21px;margin:0 40px;"></span><a class="denglu">扫码登录</a>
			<form method="post" enctype="multipart-form/data" action="<?= url('login'); ?>">
				<input type="text" placeholder="　邮箱/手机号/小米ID" class="input" n name="username">
				<input type="password" placeholder="　密码" class="input" name="password">
				<button class="dl" >登录</button>
				<div class="f_row">
					<div class="f_l"><input type="checkbox" value="1" name="isauto"> 自动登录</div>
					<div class="f_r">立即注册|忘记密码？</div>
				</div>
				<div style="height:120px"></div>
				<hr width="120px" /> 其他方式 <hr width="120px"/>
				<br /><br />
			</form>
			<a icon class="iconfont">&#xe657;</a>
			<a icon class="iconfont">&#xe6e5;</a>
			<a icon class="iconfont">&#xe665;</a>
			<a icon class="iconfont">&#xe652;</a>
		</div>
	</div>
	<!-- 网页底部 -->
	<div class="footer">
		<div class="ff1"><a>简体</a>| <a>繁体</a>| <a>English</a>| <a>常见问题</a>| <a>隐私政策</a></div>
		<div class="ff2">小米公司版权所有-京ICP备10046444-<i class="icic"></i>京公网安备11010802020134号-京ICP证110507号</div>
	</div>

</body>
</html>
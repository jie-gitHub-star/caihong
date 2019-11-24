<!DOCTYPE html>
<head>
<meta charset="utf-8" />
<title>跳转提示</title>
<style type="text/css">
*{
	padding: 0;
	margin: 0;
}

div{
	padding: 4px 48px;
}

body{
	background: #fff;
	font-family: "微软雅黑";
	color: #333;
	font-size:24px
}

h1{
	font-size: 100px;
	font-weight: normal;
	margin-bottom: 12px;
}

p{
	line-height: 1.8em;
	font-size: 36px
}

a,a:hover{
	color:blue;
}
</style>
</head>
<body>
<div style="padding: 24px 48px;">
    <h1>:)</h1>
    <p>
    	欢迎使用
        <b>WZ Project</b>！
    </p>
    <br/>版本 V1.0beta</div>
    <a href="<?= url('Register/index'); ?>">注册</a>
</div>
</body>
</html>

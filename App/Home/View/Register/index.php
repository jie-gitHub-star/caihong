<html><head>
        <title>小米账号-注册</title>
        <link rel="icon" href="mi.ico">
        <meta charset="utf-8">
        <link rel="stylesheet" href="<?= __PUBLIC ?>/admin/css/zhuce.css">
        <style>
       
       </style>
    </head>
    <body>
      <div class="main">
          <img src="<?= __PUBLIC ?>/admin/img/zhuce/milogo.png">
          <p class="font_p">注册小米账号</p><p>
          <!-- 333,43 -->
          </p>
          	<div class="shuru" style="height:270px;">
	          	<form action="<?= url('register'); ?>" method="post" enctype="multipart-form/data">
	          		<p><b>用户名</b></p>
	          		<input class="text1" placeholder=" 用户名" name="username"><br>
	          		<br>

	              <p><b>用户密码</b></p>
	              <input class="text1" placeholder=" 密码" name="password">
	               <input class="text1" placeholder=" 确认密码" name="repassword">
	            <br>
				<br>
	              <p><b>验证码</b></p>
	              <div style="position:relative;">
	              <input class="text1" placeholder=" 验证码" name="authcode">
	              <div style="position:absolute;right:0;top:0;">
	              	<img title="换一换" ver_colorofnoisepoint="#888888" src="<?= url('code'); ?>" height="42">
	              </div>
	              </div>
	              <br>
	              <br>
	           <input type="checkbox" name="agreen" value="1" checked> 注册帐号即表示您同意并愿意遵守小米<b>用户协议</b>和<b>隐私政策</b>
	              <button class="button" href="denglu.html">立即注册</button> 
	            </form>
          </div>
         
          <div style="height:82px;">
          </div>
              <a class="icon"></a>
            <div style="height:66px;">
              <div style="height:82px;">
              </div>
            <div class="sz">
              <p class="bu">
              <a o="">简体</a>| <a>繁体</a>| <a>English</a> |<a>常见问题</a>
             </p>
            <p>
            小米公司版权所有-京ICP备10046444-京公网安备11010802020134号-<i class="icic"></i>京ICP证110507号
            </p>
            </div>
      </div>
    
</div></body></html>
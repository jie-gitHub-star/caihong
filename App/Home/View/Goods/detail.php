
<!DOCTYPE html>
<html>
	<head>
		<title>小米6</title>
		<meta charset="utf-8">
		<link rel="icon" href="<?= __PUBLIC ?>/admin/mi.ico">
		<link rel="stylesheet" href="<?= __PUBLIC ?>/admin/css/details.css">
		<link rel="stylesheet" href="iconfont/iconfont.css">
		<link rel="stylesheet" href="iconfont2/iconfont.css">
	</head>
	<body>
		<!-- 网站顶部-->
		<?php  include $this->display('navbar','Layout'); ?>
	<!--网页-->
		<div class="sitedheader">
			<div class="SH1">

				<a href="" logo><img src="<?= __PUBLIC ?>/admin/milogo.png" class="milogo"></a>
				<ul class="list1">
						<li><a href="#" class="hover">全部商品分类</a>
	<!--全部商品分类hover-->
						<div class="classify">
							<ul class="list2">
								<li><a>手机 电话卡</a></li>
								<li><a>电视 盒</a></li>
								<li><a>笔记本 </a></li>
								<li><a>智能 家电</a></li>
								<li><a>健康 家居</a></li>
								<li><a>出行 儿童</a></li>
								<li><a>路由器 手机配件</a></li>
								<li><a>移动嗲暖 插线板</a></li>
								<li><a>耳机 音响</a></li>
								<li><a>生活 米兔</a></li>
							</ul>
						</div>
						<li><a href="#">小米手机</a></li>
						<li><a href="#">红米</a></li>
						<li><a href="#">电视</a></li>
						<li><a href="#">笔记本</a></li>
						<li><a href="#">盒子</a></li>
						<li><a href="#">新品</a></li>
						<li><a href="#">路由器</a></li>
						<li><a href="#">智能硬件</a></li>
						<li><a href="#">服务</a></li>
						<li><a href="#">社区</a></li>
				</ul>
				<div class="seek">
					<form style="position:relative;">
						<input class="text"><input type="submit" class="seekicon iconfont" value="&#xe646;">
						<div class="placeholder"><a class="bg">　小米8　</a><a class="bg">　618主会场　</a></div>
					</form>
				</div>
			</div>
		</div>
<!-- 商品详情内容 -->	

		<div class="mi6nav">
			<div class="mi6nav1">
				<div class="nav1_l"><font class="fon"><?= $goodsDetail['name'] ?></font></div>
				<div class="nav1_r">
				<a href="#" >概述</a><span>|</span>
				<a href="#" >图集</a><span>|</span>
				<a href="#" >参数</a><span>|</span>
				<a href="#" >F码通道</a><span>|</span>
				<a href="#" >用户评价</a>
				</div>
			</div>
		</div>
<!-- 左右分栏 -->
	<div class="center">
		<div class="center1">
			<div class="c_l">
				<img src="<?= __PUBLIC ?>/uploads/good/<?= $goodsDetail['pic'] ?>" class="c_imi6">
			</div>
	<!--小米6x 价格-->
			<div class="c_r">
				<div class="c_font"> 
					<p style="font-size:24px;color:#333;"><?= $goodsDetail['name'] ?></p>
					<font><font orange><!-- [4GB+64GB赠价值59元蓝牙耳机] </font>前置2000万"治愈系"自拍/后置2000万 AI双基/"杨柳腰"纤薄机身/标配翼龙6600 AIE处理器</font> -->
					<?= $goodsDetail['descr'] ?>
					<p class="numa"><?= $goodsDetail['price'] ?>元</p>
		<!-- 赠品 -->
					<div class="saleb">
						<font class="sale"><font class="wrap">赠品</font>赠小米蓝牙耳机</font>
					</div>
		<!-- 有货地点 -->
					<div class="address">
						<div>
							<i class="iconfont icon-dingwei positioin" style="font-size:25px;"></i>
							北京　北京市　东城区　永定门外街道　<font orange><a class="address-fix">修改</a> 
							<br /><br />庫存：<?= $goodsDetail['store'] ?></font></div>			
					</div>
		<!-- 选择版本 -->
					<div class="copy">
						<div class="selectcopy">选择版本</div>
						<ul class="copylist">
							<li borange>
								<a>
									<span class="name">4G+64G</span><span  class="price">1599元</span>
								</a>
							</li>				
							<li>
								<a>
									<span class="name">4G+32G</span><span  class="price">1399元</span>
								</a>
							</li>				
							<li>
								<a>
									<span class="name">6G+64G</span>
									<span  class="price">1799元</span>
								</a>
							</li>			
							<li>
								<a>
									<span class="name">6G+128G</span>
									<span  class="price">1999元</span>
								</a>
							</li>				
						</ul>
			<!-- 选择颜色 -->
						<div class="selectcopy">选择颜色</div>
						<ul class="copylist">
							<li borange>
								<a>
									<span class="name"><i class="namebox"></i>冰川蓝</span>
								</a>
							</li>				
							<li>
								<a>
									<span class="name"><i class="namebox"></i>冰川蓝</span>
								</a>
							</li>				
							<li>
								<a>
									<span class="name"><i class="namebox"></i>冰川蓝</span>
									
								</a>
							</li>			
							<li>
								<a>
									<span class="name"><i class="namebox"></i>冰川蓝</span>
									
								</a>
							</li>
							<li>
								<a>
									<span class="name"><i class="namebox"></i>冰川蓝</span>
									
								</a>
							</li>

						</ul>	
					</div>	
		<!-- 小米服务 -->
				<div class="miserver">
					<div class="miserver_top">
						<div class="miv_l">选择小米提供保障服务</div>
						<div class="miv_r">了解保障服务 ></div>
					</div>
					<div class="miv_border">
						<ul>
							<li> 
								<input type="radio" style="position:relative;top:-63px;">
								<img src="<?= __PUBLIC ?>/admin/img/shanpingxianqing/6.jpg" style="vertical-align:44px;">
							</li>
						</ul>
						<div class="miv_get1">
							<span class="name1">意外保障服务</span>
							<div class="name2">手机意外掉落/进水/碾压等损坏</div>
							<div class="name2"><input type="checkbox" class="box_v"><font>我已阅读 </font><font orange>服务条款</font><span>|</span><font orange>常见问题</font><font class="location">179元</font></div>
						</div>
					</div>
				</div>
		<!--加入购物车-->


				<div class="spcart">
					<div class="spcart1">
						<ul>
							<li style="color:#616161;">小米6X 4GB+64GB 冰川蓝 <span style="float:right;"><?= $goodsDetail['price'] ?>元</span></li>
							<li style="color:#ff6700;font-size:24px;margin-top: 30px;">总计　: <?= $goodsDetail['price'] ?></li>
						</ul>
					</div>
				</div>

		<!--加入购-保修。。。-->
			<a href="<?= url('Cart/add',['id'=>$_GET['gid'],'num'=>'1']); ?>" class="addcar">加入购物车</a>
			<div class="addfix">
				<i class=" three iconfont icon-shouqi1"></i><span>7天无理由退货</span>
				<i class="three iconfont icon-shouqi1"></i><span>15天无理由换货</span>
				<i class="three iconfont icon-shouqi1"></i><span>365天保修</span>
			</div>
			</div>
		</div>
	</div>
		<!-- 底部两张图片-->
		<div style="clear:both;"></div>
			<div class="explain">
			 	<div class="explain1" style="margin:5px auto;">特别说明</div>
			 	<div>
			 		<img src="<?= __PUBLIC ?>/admin/img/shanpingxianqing/17.jpg" class="explain2">
			 	</div>
			 	<div class="explain1">官方微信</div>
			 	<div>
			 		<img src="<?= __PUBLIC ?>/admin/img/shanpingxianqing/b.jpg" class="explain3">
			 	</div>
			</div>
			
	

	</body>
</html>

<!DOCTYPE html>
<html>
	<head>
		<title>小米商城-购物车</title>
		<meta charset="utf-8">
		<link rel="icon" href="<?= __PUBLIC ?>/admin/mi.ico">
		<link rel="stylesheet" href="<?= __PUBLIC ?>/admin/css/shopcar.css"/>
		<link rel="stylesheet" href="<?= __PUBLIC ?>/admin/iconfont/iconfont.css">
		<link rel="stylesheet" type="text/css" href="<?= __PUBLIC ?>/admin/iconfont2/iconfont.css">
	</head>
	<body>
	<!-- 购物车头部 -->
		<div class="mycart">
				<!-- 内容居中的 -->
			<div class="mycart1">
				<div class="myc_l">
					<a href="<?= url('Index/index') ?>"><img src="<?= __PUBLIC ?>/admin/milogo.png" style="vertical-align:-8px;margin-right:57px;">
					<span class="f_h2">我的购物车 </span>
					<span class="f_p"> 温馨提示：产品是否购买成功，以最终下单为准哦，请经快结算</span>
				</div>
				<div class="myc_r f_p">
					<a href="idnow.html">大帅锅　<b>v</b></a><span class="interval">|</span><a href="details.html">我的订单</a>
				</div>
			</div>			
		</div>
	<!-- 	购物车主体内容 -->

	<div class="shopcart_main">
		<!-- 表格头 -->
		<div class="shopcart_main1">
			<i class="iconfontcheckbox ic1">√</i><span class="f_p2 ic2">全选</span><span class="f_p2 ic3">商品名称</span><span class="f_p2 ic4">单价</span><span class="f_p2 ic5">数量</span><span class="f_p2 ic6">小计</span><span class="f_p2 ic7">操作</span>
			<a href="<?= url('rmshop'); ?>"><div class="rmall">清空购物车</div></a>
		</div>
		<!-- 表格内容 -->
		<?php  
					$sum = 0;
					$price_total = 0;
					if(@$_SESSION['cart']){
						foreach($_SESSION['cart'] as $key => $value){
							$sum+=$value['num'];
						
							$price_total+=$value['price']*$value['num'];
						}
					}

				 ?>	
		<form action="<?= url('Order/jies') ?>" method="post">
		<?php if(@$_SESSION['cart']): foreach($_SESSION['cart'] as $key => $value): ?>
		
			
		<div class="tablehead">		
				<i class="iconfontcheckbox check_g"><input type="checkbox" name="checkItem[]" value="<?= $value['id'] ?>" checked></i><!-- 这东西的位置very very重要啊，后面内容在这水平线上 -->
				
				<a style="display: inline-block;width: 80px;height: 80px;position: relative; top: 30px;margin-right: 30px;">
					<img src="<?= __PUBLIC . '/uploads/good/'. $value['pic'] ?>" class="check_img">
				</a>
				<span class="f_h4"><?= $value['descr'] ?></span><!--check-***都是用来弄位置的 -->
				<span class="check_m"><?= $value['price'] ?>元</span>

				<span class="f-h4 check_m2"><jian class="add"><a href="<?= url('jian',['id'=>$value['id']]) ?>" style="padding:11px 15px;">-</a></jian><?= $value['num'] ?><jia class="add1 add"><a href="<?= url('jia',['id'=>$value['id']]) ?>" style="padding:10px 15px;">+</a></jia></span><!-- 奶思啊 -->
				<span class="F-ora check_h"><?= $value['price']*$value['num'] ?>元</span>
				<span><a href="<?=  url('del',['id'=>$value['id']]) ?>" title="删除">x</a></span>
			
				<!--意外保险服务，（安全服务）-->
				<div class="safeserver">
					<span class="f_add">+</span>
					<span class="f_p2">意外保障服务 179元 　　</span>
					<span class="F-ora f_p2">了解保障服务 ></span>
				</div>		
<hr>
		</div><!-- tablehead -->

	<?php  endforeach; else:
		
		$this->error('购物车空空');

	?>
			
		<?php endif; ?>
	
	<!-- 附赠的垃圾 -->
<!-- 				<div class="check_a"></div>
				<div class="check_b">
					<a><img src="<?= __PUBLIC ?>/admin/img/shoplist/m8-140.png" class="ckeck_img1"></a>
					<span class="hahahah">
						<ul>
							<li class="fff">　赠品　</li>
							<li class="fff1">小米8 6G+128G 白色</li>
							<li> </li>
						</ul>
					</span>
					<span style="vertical-align:20px;">1</span>
				</div> -->



<!-- 		这里隔开了不知道你看不看的明白 -->
		<!-- 终于到结算栏了 -->
			<div class="addnav">
				<?php  
					$sum = 0;
					$price_total = 0;
					if(@$_SESSION['cart']){
						foreach($_SESSION['cart'] as $key => $value){
							$sum+=$value['num'];
						
							$price_total+=$value['price']*$value['num'];
						}
					}

				 ?>		

				<span class="f_p">　　　继续购物</span> <span class="interval">|</span>
				<span class="f_p">共 <font class="F-ora"><?= $sum ?></font> 件商品，已选择 <font class="F-ora"></font> 件</span>
				<!-- <a href="<?= url('jies'); ?>" class="suan">去结算</a> -->
				<input type="submit" value="去结算" class="suan" style="border:0px;cursor:pointer;">
				<span class="F-ora check_d">共计：<span class="f_h4"><?= $price_total ?></span>元</span>
				
			</div>

			<!-- 底部一些无聊的推广 -->
				<div class="carbottom">
				<span class="f_h2">买购物车中商品的人还买了</span>
				<div class="hrtion"></div>
				
			<div class="hrtion1" ></div><br>
			<!-- 	推荐的一对产品 -->
			<div class="sometui">
				<a href="" class="shopcarbottombox"><img src="<?= __PUBLIC ?>/admin/img/shopcar/234x300.jpg"></a>
				<!-- 下面是第二个，开始重复 -->
				<a href="" class="somebox">
					<span class="somebox1"><img src="<?= __PUBLIC ?>/admin/img/shopcar/140.jpg" class="box-img"></span>
					<div class="f_p2 font-style">红米Note 5 全网通版 4GB内存 6...</div>
					<div class="F-ora font-style">1299元</div>
					<div class="f_p2 font-style buy_h">999+人好评</div>
				</a><!-- 重复 -->
				<a href="" class="somebox">
					<span class="somebox1"><img src="<?= __PUBLIC ?>/admin/img/shopcar/140.jpg" class="box-img"></span>
					<div class="f_p2 font-style">红米Note 5 全网通版 4GB内存 6...</div>
					<div class="F-ora font-style">1299元</div>
					<div class="f_p2 font-style buy_h">999+人好评</div>
				</a><!-- 重复 -->
				<a href="" class="somebox">
					<span class="somebox1"><img src="<?= __PUBLIC ?>/admin/img/shopcar/140.jpg" class="box-img"></span>
					<div class="f_p2 font-style">红米Note 5 全网通版 4GB内存 6...</div>
					<div class="F-ora font-style">1299元</div>
					<div class="f_p2 font-style buy_h">999+人好评</div>
				</a><!-- 重复 -->
				<a href="" class="somebox">
					<span class="somebox1"><img src="<?= __PUBLIC ?>/admin/img/shopcar/140.jpg" class="box-img"></span>
					<div class="f_p2 font-style">红米Note 5 全网通版 4GB内存 6...</div>
					<div class="F-ora font-style">1299元</div>
					<div class="f_p2 font-style buy_h">999+人好评</div>
				</a><!-- 重复 -->
				<a href="" class="somebox">
					<span class="somebox1"><img src="<?= __PUBLIC ?>/admin/img/shopcar/140.jpg" class="box-img"></span>
					<div class="f_p2 font-style">红米Note 5 全网通版 4GB内存 6...</div>
					<div class="F-ora font-style">1299元</div>
					<div class="f_p2 font-style buy_h">999+人好评</div>
				</a><!-- 重复 -->
				<a href="" class="somebox">
					<span class="somebox1"><img src="<?= __PUBLIC ?>/admin/img/shopcar/140.jpg" class="box-img"></span>
					<div class="f_p2 font-style">红米Note 5 全网通版 4GB内存 6...</div>
					<div class="F-ora font-style">1299元</div>
					<div class="f_p2 font-style buy_h">999+人好评</div>
				</a><!-- 重复 -->
				<a href="" class="somebox">
					<span class="somebox1"><img src="<?= __PUBLIC ?>/admin/img/shopcar/140.jpg" class="box-img"></span>
					<div class="f_p2 font-style">红米Note 5 全网通版 4GB内存 6...</div>
					<div class="F-ora font-style">1299元</div>
					<div class="f_p2 font-style buy_h">999+人好评</div>
				</a><!-- 重复 -->
				<a href="" class="somebox">
					<span class="somebox1"><img src="<?= __PUBLIC ?>/admin/img/shopcar/140.jpg" class="box-img"></span>
					<div class="f_p2 font-style">红米Note 5 全网通版 4GB内存 6...</div>
					<div class="F-ora font-style">1299元</div>
					<div class="f_p2 font-style buy_h">999+人好评</div>
				</a><!-- 重复 -->
				<a href="" class="somebox">
					<span class="somebox1"><img src="<?= __PUBLIC ?>/admin/img/shopcar/140.jpg" class="box-img"></span>
					<div class="f_p2 font-style">红米Note 5 全网通版 4GB内存 6...</div>
					<div class="F-ora font-style">1299元</div>
					<div class="f_p2 font-style buy_h">999+人好评</div>
				</a><!-- 重复 -->
			</div>
		</div>		
	</div><!--对准了，购物车主体内容 -->

	<!-- 奶思，结尾，休息 -->
	<!-- 底部 -->
		<div class="header">	
		<asd class="iconfont icon-buoumaotubiao46"></asd>　<a>预约维修服务</a>
		<abc></abc>
		<asd class="iconfont icon-7tianwuliyoutuihuo"></asd>　<a>7天无理由退货</a>
		<abc></abc>
		<asd class="iconfont icon-15tianwuliyoutuihuo"></asd>　<a>15天免费换货</a>
		<abc></abc>
		<asd class="iconfont icon-lihe"></asd>　<a>满150元包邮</a>
		<abc></abc>
		<asd class="iconfont icon-dingwei"></asd>　<a>520余家售后网点</a>
		<hr width="1246px" width="2px" color="#eee" style="margin:25px auto;" />
		<div class="fixserver">
			<dl>
				<dt>帮助中心</dt>
				<dd>账户管理</dd>
				<dd>购物指南</dd>
				<dd>订单操作</dd>
			</dl>
			<dl>
				<dt>服务支持</dt>
				<dd>售后服务</dd>
				<dd>自助服务</dd>
				<dd>相关下载</dd>
			</dl>
			<dl>
				<dt>线下门店</dt>
				<dd>小米之家</dd>
				<dd>服务网点</dd>
				<dd>授权体验店</dd>
			</dl>
			<dl>
				<dt>关于小米</dd>
				<dd>了解小米</dd>
				<dd>加入小米</dd>
				<dd>投资者关系</dd>
			</dl>
			<dl>
				<dt>关于我们</dt>
				<dd>新浪微波</dd>
				<dd>官方微信</dd>
				<dd>联系我们</dd>
			</dl>
			<dl>
				<dt>特色服务</dt>
				<dd>F码通道</dd>
				<dd>礼物码</dd>
				<dd>防伪查询</dd>
			</dl>
			<div class="fixserver2">
				<p p>400-100-5678</p>
				<p>周一至周日 8:00-18:00</p>
				<p>(仅收市话费)</p>
				<a>联系客服</a>
			</div>
		</div>
	</div>
	<div class="bottombottom">
			<div class="b_icon"></div>
			<div class="b_left">
				<a>小米商城</a> | <a>MIUI</a> | <a>米家</a> | <a>米聊</a> | <a>多看</a> | <a>游戏</a> | <a>路由器</a> | <a>米粉卡</a> | <a>政企服务</a> | <a>小米天猫店</a> | <a>隐私政策</a> | <a>问题反馈</a> | <a>Select Region</a><br />
				<abcd>
				©mi.com 京ICP证110507号 京ICP备10046444号 京公网安备11010802020134号 京网文[2014]0059-0009号 <br />
				违法和不良信息举报电话：185-0130-1238，本网站所列数据，除特殊说明，所有数据均出自我司实验室测试
				</abcd>
			</div>
				<a>
				<img src="<?= __PUBLIC ?>/admin/img/gerenziliao/truste.png" style="margin-left:70px;" class="b_img">
				</a>
				<a>
				<img src="<?= __PUBLIC ?>/admin/img/gerenziliao/v-logo-1.png" class="b_img">
				</a>
				<a>
				<img src="<?= __PUBLIC ?>/admin/img/gerenziliao/v-logo-2.png" class="b_img">
				</a>
				<a >
				<img src="<?= __PUBLIC ?>/admin/img/gerenziliao/v-logo-3.png" class="b_img">
				</a>
				<a>
				<img src="<?= __PUBLIC ?>/admin/img/gerenziliao/1.png" class="b_img">
				</a>
	</div>
	<font class="hei">探索黑科技，小米为发烧而生</font>
	</body>
</html>
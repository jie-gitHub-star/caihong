
<html>
    <head>
        <title>下单界面</title>
        <meta charset="utf-8">  
        <link rel="icon" href="mi.ico">
        <link rel="stylesheet" href="<?= __PUBLIC ?>/admin/css/xiadangjiesuan.css">
        <link rel="stylesheet" href="<?= __PUBLIC ?>/admin/iconfont/iconfont.css">
        <link rel="stylesheet" type="text/css" href="<?= __PUBLIC ?>/admin/iconfont2/iconfont.css">
    </head>
    <body style="">
        <div class="a">
            <div class="a0">
                <a href="<?= url('Index/index'); ?>">
                <img src="<?= __PUBLIC ?>/admin/milogo.png" class="a2">
                </a>
                <span class="a4">确认订单<span>
                <div class="a1">
                    <a class="F-12">大帅锅<span class="intivel">V</span></a><span class="intivel">|</span><a class="F-12">我的订单</a>
                </div>
            </div>
        </div>
        <!-- 
            又道网页主页内容了，奶思 -->
            <?php  
            if(! empty($SESSION['cart'])){
                    $this->error('没有商品,去购物吧',url('Index/index'));
                    }
            ?>
           <!--  <?php var_dump($_SESSION) ?> -->
            <form method="post" action="<?= url('Order/create'); ?>">
        <div class="b">
            <div class="b1">
                <div class="b2 F-18">收货地址</div>
                <div class="bb">
                    <ul>
                        <li>
                            <div class="b3">
                                <p class="F-18"><input name="username" placeholder="收货人姓名"></p>
                                <p class="F-12"><input type="text" name="tel" placeholder="收货人联系方式"></p>
                                <p class="F-12"></p>
                                <p class="F-12"><input type="text" name="address" placeholder="收货地址"></p>
                                <p class="F-12 F-ora b5">默认</p>
                            </div>
                        </li>
                        <li>
                            <div class="b3">
                                <p class="F-18">用户名字！</p>
                                <p class="F-12">158*****612</p>
                                <p class="F-12">新疆 喀什地区 喀什市 伯什克然木乡</p>
                                <p class="F-12">地方规划局</p>
                                <p class="F-12 F-ora b5">修改</p>
                            </div>
                        </li>
                        <li>
                            <span class="b6">+</span>
                            <div class="F-12 b7"> 添加新地址</div>
                        </li>
                        
                    </ul>
                </div>
                <div class="ba"></div>
            <!--分割线-->
                <div class="bc">
                    <span class="F-18 b10">配送方式</span>
                    <!-- 配送方式 -->
                    <span class="F-12 F-ora1">快递配送（免运费）</span>
                </div>
                <div class="bc bc2">
                    <span class="F-18 b10">配送时间</span>
                    <span class="bc3 F-12">不限送货时间：周一至周日</span>
                    <span class="bc3 F-12">工作日送货：周一至周五</span>
                    <span class="bc3 F-12">双休日、假日送货：周六至周日</span>
                </div>
                <!---->
                <div class="bc ">
                    <span class="F-18 b10">发票</span>
                    <span class=" F-12 F-ora1">电子发票</span>　
                    <span class="F-12 F-ora1">个人</span>　
                    <span class=" F-12 F-ora1">商品明细</span>　
                    <a class="F-12 F-ora1">修改 ></a>
                </div>
            <!--    优惠卷 -->
                <div class="b12">
                    <span class="F-18">商品及优惠券</span>
                    <span class="b13 F-12">返回购物车 ></span>
                </div>
                <!-- 000000 -->
               
 <!--            <?php foreach($cartList as $key => $value): ?>
                <div class="b12-1">
                    <span class="b14"><img src="<?= __PUBLIC ?>/admin/img/shanpingxianqing/560.jpg" class="b15"></span>
                    <span class="F-12"><?= $value['name'] ?></span>
                    <span class="b13 F-12"><span class="b16 F-12"><?= $value['price'] ?>x 1</span><span class="F-ora b17">1599元</span></span>
                </div>
                <div class="b12">
                    <span class="b14"><img src="<?= __PUBLIC ?>/admin/img/shanpingxianqing/p30.jpg" class="b15"></span>
                    <span class="F-12">小米蓝牙耳机青春版  白色　<span class="b18">　赠品　</span></span>
                    <span class="b13 F-12"><span class="b16 F-12">0元 x 1　　</span><span class="F-ora b17">0元</span></span>
                </div>
            <?php endforeach; ?> -->
                <!-- ssssss -->
                <?php 
                    //计算商品数量与总价
                $sum = 0;
                $total  = 0;
                
                
                    foreach ($_SESSION['cart'] as $key => $value) {
                    if(! in_array($key,$_SESSION['checkItem'])){
                        continue;
                    }

                    $sum+=$value['num'];
                    $total+=$value['price']*$value['num'];
                     
                    ?>
                     <div class="b12-1">
                    <span class="b14"><img src="<?= __PUBLIC ?>/uploads/good/<?= $value['pic'] ?>" class="b15"></span>
                    <span class="F-12"><?= $value['name'] ?></span>
                    <span class="b13 F-12"><span class="b16 F-12"><?= $value['price'] ?>x <?=  $value['num']?></span><span class="F-ora b17"><?= $value['price']*$value['num'] ?></span></span>
                </div>
                <hr>
               <!--  <div class="b12">
                    <span class="b14"><img src="<?= __PUBLIC ?>/admin/img/shanpingxianqing/p30.jpg" class="b15"></span>
                    <span class="F-12">小米蓝牙耳机青春版  白色　<span class="b18">　赠品　</span></span>
                    <span class="b13 F-12"><span class="b16 F-12">0元 x 　　</span><span class="F-ora b17">0元</span></span>
                </div> -->
            <?php   }  

                ?>


             

                <div class="b19">
                    <div class="b19-1">
                            <ul>
                                <li>
                                    <span class="b20">+</span>　
                                    <span class="F-12bk">使用优惠券</span>
                                </li>
                                <li>　</li>
                                <li>
                                    <span class="b20">+</span>　
                                    <span class="F-12bk">使用小米礼品卡</span>
                                </li>                       
                            </ul>
                        <!-- <商品件数>要有浮动 -->
                        <div class="b21">
                            <ul>
                                <li>
                                <span class="boxa F-12">商品件数：</span>    <span class="boxa boxa2"><?= $sum?>件</span>
                                </li>
                                <li>
                                <span class="boxa F-12">商品总价：</span>    <span class="boxa boxa2"><?= $total ?>元</span>
                                </li>
                                <li>
                                <span class="boxa F-12">活动优惠：</span>    <span class="boxa boxa2">-0元</span>
                                </li>
                                <li>
                                <span class="boxa F-12">优惠券抵扣：</span>   <span class="boxa boxa2">-0元</span>
                                </li>   <li>
                                <span class="boxa F-12">运费：</span>  <span class="boxa boxa2">-0元</span>
                                </li>   <li>
                                <span class="boxa F-12">优惠券抵扣：</span>   <span class="boxa boxa2">-0元</span>
                                </li>   <li>
                                <span class="boxa F-12">应付总额：</span>    <span class="boxa boxa2"><span class="b23"><?= $total ?></span>元</span>
                                </li>
                            </ul>
                        </div>
                </div>

                <!-- 代码打多了，记忆力也变差了， -->
                
                    <div class="b24">
                        <button href="" class="b27">去结算</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
        <!--底部-->
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
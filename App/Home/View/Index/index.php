<!DOCTYPE html>
<html>
    <head>
        <title>小米商城 - 小米8、小米M</title>
        <meta charset="utf-8">
        <link rel="icon" href="<?= __PUBLIC ?>/admin/milogo.ico">
        <link rel="stylesheet" type="text/css" href="<?= __PUBLIC ?>/admin/css/shouye.css">
        <link rel="stylesheet" href="<?= __PUBLIC ?>/admin/iconfont/iconfont.css">
        <link rel="stylesheet" type="text/css" href="<?= __PUBLIC ?>/admin/iconfont2/iconfont.css">
        
        
    </head>
    <body>
        
<?php include $this->display('navbar','Layout');?>
    <!--网页-->
        <div class="sitedheader">
            <div class="SH1">

                <a href="" logo><img src="<?= __PUBLIC ?>/admin/milogo.png" class="milogo"></a>
                <ul class="list1">
                        <li><a href="#" class="hover"></a>
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
                        </div></li>
                        <li><a href="shoplist.html">小米手机</a></li>
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
                    <form action="<?= url('Goods/show') ?>" method="post" enctype="multipart/form-data">
                        <input class="text" name="search"><input type="submit" class="seekicon iconfont" value="&#xe646;">
                        <div class="placeholder"><a class="bg">　小米8　</a><a class="bg">　618主会场　</a></div>
                    </form>
                </div>
            </div>
        </div>
        <!-- shouye1 -->
        <div class="bgwhite">
            <div class="lzmain">
                <div class="lz_left">
                    <ul style="width:100%">
                        <?php foreach($typeList as $key=>$value): ?>
                        <li class="other"><a href="<?= url('Goods/show',['gid'=>$value['id']]); ?>"><?= $value['name'] ?></a><i class="xxc" ></i>
    
                <?php 
                $sql2 = "SELECT * FROM `types` WHERE `pid` = '{$value['id']}'";
                // 执行查询二级分类语句
                $stmt = $pdo->query($sql2);

                // 获取所有结果
                $typeList2 = $stmt->fetchAll(2);
                 
                 if($typeList2):
                 ?>
                    
                            <li class="it">
                                    <div class="itTWE">
                <?php  foreach ($typeList2 as $key2 => $value2): ?>
                                        <span class="itFont"><a href="<?= url('Goods/show',['gid'=>$value2['id']]); ?>"><?= $value2['name'] ?></a></span>
                                <?php endforeach; ?>
                                    </div>
                            </li>
                        </li>
                    
                <?php endif; ?>
                        <?php endforeach; ?>
                        <div class="">
                        </div>
                        <!-- <li class="it">
                                    <img src="img/shouye/2.png" >
                                </li>
                        <div class="fbox"></div>
                        <li>电视 盒子 　　　<i class="xxc" style="top:72px;"></i></li>
                        <li>笔记本 　　　　<i class="xxc" style="top:114px;"></i></li>
                        <li>智能 家电 　　　<i class="xxc" style="top:152px;"></i></li>
                        <li>健康 家居　　　<i class="xxc" style="top:202px;"></i></li>
                        <li>出行 儿童　　　<i class="xxc" style="top:244px;"></i></li>
                        <li>路由器 手机配件<i class="xxc" style="top:282px;"></i></li>
                        <li>移动电源 插线板<i class="xxc" style="top:322px;"></i></li>
                        <li>耳机 音响　　　<i class="xxc" style="top:369px;"></i></li>
                        <li>生活 米兔　　　<i class="xxc" style="top:412px;"></i></li> -->
                    </ul>
                </div>
                <div class="lz_right">
                    <a class="icon _l"></a><a class="icon _r"
                    ></a>
                </div>
                <div class="lunz">
                    
                </div> 
                <ol>
                    <li><a href="<?= url('User/detail'); ?>" class="ticon tou" title="个人信息"></a></li>
                    <li><a class="ticon kefu" title="联系客服"></a></li>
                    <li><a href="<?= url('cart/show'); ?>" class="ticon shopc" title="购物车"></a></li>
                    <li><a class="ticon top" href="#sited_top" title="返回顶部"></a></li>
                </ol>
            </div>
            <!-- ==\ -->
            <div style="width:1366px;margin:15px auto;">
                <div class="bbox">
                    <a class="box1 box"></a>
                    <a class="box2 box"></a>
                    <a class="box3 box"></a>
                    <a class="box4 box"></a>
                    <a class="box5 box"></a>
                    <a class="box6 box"></a>
                </div>
                 
               <?php foreach($todayList as $key3 => $value3):


               ?>   
                <a><img src="<?= __PUBLIC .'/uploads/good/'. $value3['pic'] ?>" class="boxs"></a>

            <?php endforeach; ?>
               <!--  <a><img src="<?= __PUBLIC ?>/admin/img/shouye/zPey.jpg" class="boxs"></a>
                <a><img src="<?= __PUBLIC ?>/admin/img/shouye/s.png" class="boxs" style="margin-right:30px"></a> -->
               
            </div>

            <p class="font-18">小米闪购</p>
            <div class="shangou">
                <div class="shangou1 sg">
                    <p re>00:00 场</p>
                    <i><img src="<?= __PUBLIC ?>/admin/img/shouye/e.png"></i>
                    <p rw>距离开始还有</p>
                    <div time>00</div> <div class="time">:</div> <div time>00</div> <div class="time">:</div> <div time>01</div>

                </div>
                <a shadow><a class="shangou1 sg sg1"><img src="<?= __PUBLIC ?>/admin/img/shouye/watch.jpg" style="width:160px;height:160px;margin-top:40px;"><br>
                <p black>小米手环 黑色</p>
                <p black>OLED 显示屏，触摸操作</p>
                <p><h red>129元</h><del>149元</del></p>
                </a>
                </a>
                <a shadow>
                <a class="shangou1 sg sg1"></a>
                </a>
                <a shadow>
                <a class="shangou1 sg sg1"></a>
                </a>
                <a shadow>
                <a class="shangou1 sg sg1"></a>
                </a>
            </div>
        
                <img src="<?= __PUBLIC ?>/admin/img/shouye/Hh.jpg" style="width:1220px;height:140px;" class="xiaomi8">
    
        </div>
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
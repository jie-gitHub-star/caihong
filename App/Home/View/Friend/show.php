
<!DOCTYPE html>
<html>
    <head>
        <title>小米商城-商品列表</title>
        <meta charset="utf-8">
        <link rel="icon" href="<?= __PUBLIC ?>/admin/milogo.ico">
        <link rel="stylesheet" href="<?= __PUBLIC ?>/admin/css/shoplist.css">
        <style >
                .sitemain>.friL{
                    display:inline-block;
                    width:100px;
                    height:40px;
                    line-height:40px;
                    border-radius:5px;
                    padding:10px;
                    background:pink;
                    color:black;
                    font-size:14px;
                    font-family:'楷体';
                }
                .sitemain{
                    padding: 30px;
                    background:#eee;
                    text-align:left;
                }

        </style>
    </head>
    <body>
    <?= include $this->display('navbar','Layout'); ?>
    <!--网页-->
        <div class="sitedheader">
            <div class="SH1">

                <a href="<?= url('Index/index') ?>" logo><img src="<?= __PUBLIC ?>/admin/milogo.png" class="milogo"></a>
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
                        </div></li>
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
                    <form>
                        <input class="text"><input type="submit" class="seekicon iconfont" value="&#xe646;">
                        <div class="placeholder"><a class="bg">　小米8　</a><a class="bg">　618主会场　</a></div>
                    </form>
                </div>
            </div>
        </div>
        <!--首页>所以分类-->
        <div class="all_ify">
            <div class="all_ify1"><a href="#" ai>首页</a> > <a href="#" ai>所有分类</a></div>
        </div>
        <!--网页主要内容-->
        
            <div class="sitemain">
                <?php
                    // <!-- 链接数据库 -->
                    $pdo = new \PDO(DSN,USER,PASS);

                    $sql = "SELECT * FROM `friendlink`;";

                    // 执行sql语句
                    $stmt=$pdo->query($sql);
                    
                    // 获取结果
                    $linkList = $stmt->fetchAll(2);
                    foreach ($linkList as $key => $value): 

                ?>
              
                    
                   <a href="http://<?= $value['link'] ?>" class="friL">
                        <?= $value['name'] ?>
                   </a>
                <?php  endforeach;  ?>
                  

                 
            </div>
        </div>
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
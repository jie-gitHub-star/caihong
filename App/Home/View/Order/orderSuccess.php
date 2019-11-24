
<!doctype html>
<html>
    <head>
        <title>小米商城-提交订单</title>
        <meta charset="utf-8">
        <link rel="icon" href="mi.ico">
        <link rel="stylesheet" href="<?= __PUBLIC ?>/admin/css/buysucceed.css">
        <link rel="stylesheet" href="<?= __PUBLIC ?>/admin/iconfont/iconfont.css">
        <link rel="stylesheet" type="text/css" href="<?= __PUBLIC ?>/admin/iconfont2/iconfont.css">
    </head>
    <body>
        <div class="a">
            <div class="a0">
                <img src="<?= __PUBLIC ?>/admin/milogo.png" class="a2"><span class="a4">支付订单<span>
                <div class="a1">
                    <a class="F-12" href="<?= url('User/detail'); ?>">大帅锅<span class="intivel"><b>v</b></span></a><span class="intivel">|</span><a class="F-12" href="<?= url('Order/show'); ?>">我的订单</a>
                </div>
            </div>
        </div>
    <!-- 网页主要内容 -->
     <div class="sitedmain">
        <div class="gobuy"><!-- 订单提交成功，去付款吧 -->
            <div class="gup">√</div>
            <span class="tjsucceed"><!-- 提交成功 -->
                <span class="F-24">付款成功咯～
                </span><br />
                <span class="F-12 udmg">请在 <span class="F-ora">完成一笔付款</span> 查看购物车、</span><br />
                <span class="F-12">收货信息：asd 158****4612    新疆  喀什地区  喀什市  伯什克然木乡  地方管理局</span>
            </span>
            <!-- 有边烦人部分 -->
            <span class="gobuy-r">
                <span class="F-12">应付总额：<span class="F-ora F-24">1599元</span></span>
                <br />
                <span class="F-12"><a href="<?= url('order/show'); ?>">订单详情　<b ><font color="green">v</font></b>　</span>
            </span>
        </div>
        <!-- 支付方式 -->
        <div class="buyno">
            <div class="buy1">
                <span class="select-font">选择以下支付方式付款</span>
            </div>
            <div class="section1">
                <span class="F-16"><h3>支付方式</h3></span>
                <div class="intu">
                    <!-- 用来放图片的框 -->
                    <div class="downtu"><img src="<?= __PUBLIC ?>/admin/img/buysucceed/aliy.jpg"></div>
                    <div class="downtu"><img src="<?= __PUBLIC ?>/admin/img/buysucceed/wxbuy.png"></div>
                    <div class="downtu"></div>
                </div>

                <!-- 支付方式文字框 -->
                <div class="buyborder">
                    <span class="F-12bk" style="line-height:40px;">支付宝：支付宝扫码支付，赢1999元红包</span>
                    <div>
                    <div class="F-12bk">小米钱包：绑定新卡支付，享最高立减99元</div>
                    <div class="F-12 some">了解更多></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- 其他支付方式 -->
        <div class="othercard">
            <div class="ot1">
            <h3 class="F-17">银行借记卡及信用卡</h3>
            <span class="F-12"></span></div>
            <div class="longborder">
                    <div class="hang"><img src="<?= __PUBLIC ?>/admin/img/buysucceed/gfyh.png"></div>         
                    <div class="hang"><img src="<?= __PUBLIC ?>/admin/img/buysucceed/gsyh.png"></div>
                    <div class="hang"><img src="<?= __PUBLIC ?>/admin/img/buysucceed/jsyh.png"></div>                     
            </div>
        </div>
        <!-- 其他银行 -->
        <div class="othercard">
            <div class="ot1">
                <h3 class="F-17">快捷支付<span class="F-12">（支持以下各银行信用卡以及部分银行借记卡）</span></h3>
                <span class="F-12"></span>
            </div>
            <div class="longborder">
                    <div class="hang"><img src="<?= __PUBLIC ?>/admin/img/buysucceed/youzheng.png"></div>         
                    <div class="hang"><img src="<?= __PUBLIC ?>/admin/img/buysucceed/zsyh.png"></div>
                    <div class="hang"><img src="<?= __PUBLIC ?>/admin/img/buysucceed/pufa.png"></div> 
                    <div class="hang"><img src="<?= __PUBLIC ?>/admin/img/buysucceed/gsyh.png"></div>
                    <div class="hang"><img src="<?= __PUBLIC ?>/admin/img/buysucceed/jsyh.png"></div>                     
            </div>
            <!-- 重复一行 -->
            <div class="longborder">
                    <div class="hang"><img src="<?= __PUBLIC ?>/admin/img/buysucceed/youzheng.png"></div>
                    <div class="hang"><img src="<?= __PUBLIC ?>/admin/img/buysucceed/pufa.png"></div>     
                    <div class="hang"><img src="<?= __PUBLIC ?>/admin/img/buysucceed/zsyh.png"></div>
                    <div class="hang"><img src="<?= __PUBLIC ?>/admin/img/buysucceed/gsyh.png"></div>
                    <div class="hang"><img src="<?= __PUBLIC ?>/admin/img/buysucceed/jsyh.png"></div>     
                    <div class="hang"><img src="<?= __PUBLIC ?>/admin/img/buysucceed/gfyh.png"></div> 
            </div>
        </div>
            <!-- 最后一行银行 -->
            <div class="lastline">
                <div class="lastline1">
                    <div><h3 class="F-17"><span>　　分期付款</span></h3></div>
                    <div class="longborder">
                        <div class="hang2"><img src="<?= __PUBLIC ?>/admin/img/buysucceed/mifinanceinstal.png" class="hsize"></div>
                        <div class="hang2"><img src="<?= __PUBLIC ?>/admin/img/buysucceed/huabei.png" class="hsize"></div>
                    </div>                          
                </div>
            </div>
         </div>
            <!-- 以下页脚 -->
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
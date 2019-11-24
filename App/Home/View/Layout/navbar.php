<head>
    <link rel="stylesheet" href="<?= __PUBLIC ?>/admin/iconfont/iconfont.css">
        <link rel="stylesheet" type="text/css" href="<?= __PUBLIC ?>/admin/iconfont2/iconfont.css">
        
</head>
    <div class="sited_top" id="sited_top">
            <div class="top_1"> 
                <div class="top_left">
                    <a href="<?= url('Index/index') ?>">小米商城</a><span>|</span><a>MIUI</a><span>|</span><a href="">IoT</a><span>|</span><a href="">云服务<span>|</span><a href="">金融</a><span>|</span><a href="">有品</a><span>|</span><a href="">小爱开放平台</a><span>|</span><a href="#">留言板</a><span>|</span><a href="<?= url('index/showFL') ?>">S友情链接</a>
                </div>
                <div class="top_right">
                    <!-- 如果登陆了，那就显示用户名，退出，，我的订单
                    如果没登录，显示登录和注册，我的订单不显示 -->
                <?php if(@$_SESSION['isLogin']): ?>
                    <a href="<?= url('User/detail'); ?>"><?= $_SESSION['user']['username'] ?></a>
                    <span>|</span>
                    <a href="<?= url('Login/logout'); ?>">退出登录</a>
                    <span>|</span>
                    <a href="nowinform.html">消息通知</a>
                    <span>|</span>
                    <a href="<?= url('User/myorder') ?>"> 我的订单</a>
                    <span>|</span>
                <?php else: ?>
                     <a href="<?= url('Login/index') ?>">登录</a>
                    <span>|</span>
                    <a href="<?= url('Register/index') ?>">注册</a>
                    <span>|</span>
               <?php endif; ?>
                    <a href="<?= url('cart/show'); ?>" class="shopcart"><i class="scicon iconfont icon-cart"></i>购物车(0)</a>
                </div>
            </div>
        </div>
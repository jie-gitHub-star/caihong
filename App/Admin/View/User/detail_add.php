
<!DOCTYPE html>
<!--[if lt IE 7 ]><html lang="en" class="ie6 ielt7 ielt8 ielt9"><![endif]--><!--[if IE 7 ]><html lang="en" class="ie7 ielt8 ielt9"><![endif]--><!--[if IE 8 ]><html lang="en" class="ie8 ielt9"><![endif]--><!--[if IE 9 ]><html lang="en" class="ie9"> <![endif]--><!--[if (gt IE 9)|!(IE)]><!--> 
<html lang="en"><!--<![endif]--> 
    <head>
        <meta charset="utf-8">
        <title>用户详情添加 - WZ Project</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?= __PUBLIC ?>/admin/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?= __PUBLIC ?>/admin/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link href="<?= __PUBLIC ?>/admin/css/site.css" rel="stylesheet">
        <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    </head>
    <body>
        <div class="container">
            <?php include $this->display('navbar', 'Layout') ?>
            <div class="row">
                <?php include $this->display('sidebar', 'Layout') ?>
                <div class="span9">
                    <h1>
                        添加用户详情
                    </h1>
                    <form id="edit-profile" class="form-horizontal" action="<?= url('dodetail_add') ?>" method="post" enctype="multipart/form-data">
                        <fieldset>
                            <legend>用户信息</legend>
                            <div class="control-group">
                                <label class="control-label" for="username">用户昵称</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" id="username" name="name">
                                </div>
                            </div>  
                            <div class="control-group">
                                <label class="control-label" for="age">年龄</label>
                                <div class="controls">
                                    <input type="number" class="input-xlarge" id="age" name="age">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="input01">性别</label>
                                <div class="controls">
                                    <label class="radio">
                                        <input type="radio" name="sex" value="0" >
                                        女
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="sex" value="1">
                                        男
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="sex" value="2" checked>
                                        你这个折磨人的小妖精
                                    </label>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="phone">手机号码</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" id="phone" name="phone">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="email">邮箱</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" id="email" name="email">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="pic">头像</label>
                                <div class="controls">
                                    <input type="file" class="input-xlarge" id="pic" name="pic">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="address">居住地址</label>
                                <div class="controls">
                                    <textarea class="input-xlarge" id="address" name="address"></textarea>
                                </div>
                            </div>

                            <input type="hidden" name="uid" value="<?= $_GET['id']; ?>">

                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">添加</button> <button class="btn" type="reset">重置</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <script src="<?= __PUBLIC ?>/admin/js/jquery.min.js"></script>
        <script src="<?= __PUBLIC ?>/admin/js/bootstrap.min.js"></script>
        <script src="<?= __PUBLIC ?>/admin/js/site.js"></script>
    </body>
</html>
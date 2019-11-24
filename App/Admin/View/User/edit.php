<!DOCTYPE html>
<!--[if lt IE 7 ]><html lang="en" class="ie6 ielt7 ielt8 ielt9"><![endif]--><!--[if IE 7 ]><html lang="en" class="ie7 ielt8 ielt9"><![endif]--><!--[if IE 8 ]><html lang="en" class="ie8 ielt9"><![endif]--><!--[if IE 9 ]><html lang="en" class="ie9"> <![endif]--><!--[if (gt IE 9)|!(IE)]><!--> 
<html lang="en"><!--<![endif]--> 
    <head>
        <meta charset="utf-8">
        <title>后台主页</title>
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
                <?php include $this->display('sidebar','Layout'); ?>
                <div class="span9">
                    <h1>
                       用户编辑
                    </h1>
                    <form id="edit-profile" class="form-horizontal" action="<?= url('doedit'); ?>" method="post" enctype="multipart/from-data">
                        <fieldset>
                            
                            <div class="control-group">
                                <label class="control-label" for="input01">状态</label>
                                <div class="controls">
                                    <label class="checkbox">
                                        <input type="radio" name="status" value="0" checked="checked" <?= $userInfo['status']==0?'checked':''; ?>>
                                        禁止登录
                                    </label> 
                                    <label class="checkbox">
                                        <input type="radio" name="status" value="1" <?= $userInfo['status']==1?'checked':''; ?>>
                                       允许登录
                                    </label>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="input01">等级</label>
                                <div class="controls">
                                    <label class="checkbox">
                                        <input type="radio" name="level" value="0" checked="checked" <?= $userInfo['level']==0?'checked':''; ?>>
                                        用户
                                    </label> 
                                    <label class="checkbox">
                                        <input type="radio" name="level" value="1" <?= $userInfo['level']==1?'checked':''; ?> >
                                       普通管理员
                                    </label>
                                    <label class="checkbox">
                                        <input type="radio" name="level" value="2" <?= $userInfo['level']==2?'checked':''; ?> >
                                       超级管理员
                                    </label>
                                </div>
                                <input type="hidden" name="id" value="<?= $userInfo['id'] ?>">
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="input01">用户名：</label>
                                <div class="controls">
                                    <!-- <input type="text" class="input-xlarge" id="input01" value="<?= $userInfo['username']; ?>" name="username"> -->
                                    <input type="text" class="input-xlarge" id="username" value="<?= $userInfo['username'] ?>" disabled>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="input02">原密码：</label>
                                <div class="controls">
                                    <input type="password" class="input-xlarge" id="input02" name="oldpassword">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="input03">新密码：</label>
                                <div class="controls">
                                    <input type="password" class="input-xlarge" id="input03" name="newpassword">
                                </div>
                            </div>
                                                   
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">Save</button> <button class="btn" type="reset">Cancel</button>
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
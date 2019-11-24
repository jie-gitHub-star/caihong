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
                       添加用户
                    </h1>
                    <form id="edit-profile" class="form-horizontal" action="<?= url('doadd'); ?>" method="post">
                        <fieldset>
                            <div class="control-group">
                                <label class="control-label" for="input01">用户名：</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" id="input01" name="username">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="input01">密码：</label>
                                <div class="controls">
                                    <input type="password" class="input-xlarge" id="input01" name="password">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="input01">确认密码：</label>
                                <div class="controls">
                                    <input type="password" class="input-xlarge" id="input01" name="repassword">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="input01">状态</label>
                                <div class="controls">
                                    <label class="checkbox">
                                        <input type="radio" name="status" value="0" checked="checked">
                                        禁止登录
                                    </label> 
                                    <label class="checkbox">
                                        <input type="radio" name="status" value="1" >
                                       允许登录
                                    </label>
                                        
                                </div>

                            </div>
                           <!--  <div class="control-group">
                                <label class="control-label" for="input01">用户等级</label>
                                <div class="controls">
                                    <label class="checkbox">
                                        <input type="radio" name="level" value="0" checked="checked">
                                       普通会员
                                    </label>
                                    <label class="checkbox">
                                        <input type="radio" name="level" value="1">
                                        普通管理员
                                    </label>  
                                    <label class="checkbox">
                                        <input type="radio" name="level" value="2">
                                        超级管理员
                                    </label>    
                                </div>

                            </div> -->
                          
                                
                                                   
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">Save</button> <button class="btn">Cancel</button>
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
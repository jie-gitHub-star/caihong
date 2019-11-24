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
                       友情链接编辑
                    </h1>
                    <form id="edit-profile" class="form-horizontal" action="<?= url('doedit'); ?>" method="post" enctype="multipart/from-data">
                        <fieldset>
                            
                            
                            <div class="control-group">
                                <label class="control-label" for="input01">网站名：</label>
                                <div class="controls">
                                    <!-- <input type="text" class="input-xlarge" id="input01" value="<?= $userInfo['username']; ?>" name="username"> -->
                                    <input type="text" class="input-xlarge" id="username" name="name" value="<?= $data['0']['name'] ?>" >
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="input02">链接：</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" id="input02" name="link" value="<?= $data[0]['link'] ?>">
                                </div>
                            </div>
                                      
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">提交</button> <button class="btn" type="reset">重置</button>
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
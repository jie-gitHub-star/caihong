
<!DOCTYPE html>
<!--[if lt IE 7 ]><html lang="en" class="ie6 ielt7 ielt8 ielt9"><![endif]--><!--[if IE 7 ]><html lang="en" class="ie7 ielt8 ielt9"><![endif]--><!--[if IE 8 ]><html lang="en" class="ie8 ielt9"><![endif]--><!--[if IE 9 ]><html lang="en" class="ie9"> <![endif]--><!--[if (gt IE 9)|!(IE)]><!--> 
<html lang="en"><!--<![endif]--> 
    <head>
        <meta charset="utf-8">
        <title>后台主页</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="/Public/admin/css/bootstrap.min.css" rel="stylesheet">
        <link href="/Public/admin/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link href="/Public/admin/css/site.css" rel="stylesheet">
        <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    </head>
    <body>
        <div class="container">
       <?php include $this->display('navbar', 'Layout') ?>
            <div class="row">
            <?php include $this->display('sidebar', 'Layout') ?>
                  <div class="row">
                <div class="span3">
</div>                <div class="span9">
                    <h1>
                       添加链接
                    </h1>
                    <form id="edit-profile" class="form-horizontal" action="<?= url('doadd') ?>" method="post">
                        <fieldset>
                            <div class="control-group">
                                <label class="control-label" for="input01">网站名：</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" id="input01" name="name">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="input01">网站链接：</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" id="input01" name="link">
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
                                <button type="submit" class="btn btn-primary">添加</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <script src="/Public/admin/js/jquery.min.js"></script>
        <script src="/Public/admin/js/bootstrap.min.js"></script>
        <script src="/Public/admin/js/site.js"></script>
    </body>
</html>

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
        <div class="navbar">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a> <a class="brand" href="#">WZ Project</a>
            <div class="nav-collapse">
                <ul class="nav">
                    <li>
                        <a href="#">主页</a>
                    </li>
                        </ul>
                    </li>
                </ul>
                <form class="navbar-search pull-left" action="">
                    <input type="text" class="search-query span2" placeholder="Search" />
                </form>
                <ul class="nav pull-right">
                    <li>
                        <a href="profile.htm">@testA36</a>
                    </li>
                    <li>
                        <a href="http://localhost/index.php?m=Admin&c=login&a=index&">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>            <div class="row">
                <div class="span3">
    <div class="well" style="padding: 8px 0;">
        <ul class="nav nav-list">
            <li class="nav-header">
                用户管理
            </li>
            <li >
                <a href="http://localhost/index.php?m=Admin&c=User&a=index&"><i class="icon-home"></i> 用户列表</a>
            </li>
            <li>
                <a href="http://localhost/index.php?m=Admin&c=User&a=add&"><i class="icon-folder-open"></i> 用户添加</a>
            </li>
            <li class="nav-header">
                分类管理
            </li>
            <li>
                <a href="http://localhost/index.php?m=Admin&c=Type&a=index&"><i class="icon-home"></i> 分类列表</a>
            </li>
            <li>
                <a href="http://localhost/index.php?m=Admin&c=Type&a=add&"><i class="icon-folder-open"></i> 分类添加</a>
            </li>
            <li class="nav-header">
                商品管理
            </li>
            <li>
                <a href="http://localhost/index.php?m=Admin&c=Good&a=index&"><i class="icon-home"></i> 商品列表</a>
            </li>
            <li>
                <a href="http://localhost/index.php?m=Admin&c=Good&a=add&"><i class="icon-folder-open"></i> 商品添加</a>
            </li>
            <li class="nav-header">
                友情链接
            </li>
            <li>
                <a href="http://localhost/index.php?m=Admin&c=Friend&a=index&"><i class="icon-home"></i> 链接列表</a>
            </li>
            <li>
                <a href="http://localhost/index.php?m=Admin&c=Friend&a=add&"><i class="icon-folder-open"></i> 添加链接</a>
            </li>
        </ul>
    </div>
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

<!DOCTYPE html>
<!--[if lt IE 7 ]><html lang="en" class="ie6 ielt7 ielt8 ielt9"><![endif]--><!--[if IE 7 ]><html lang="en" class="ie7 ielt8 ielt9"><![endif]--><!--[if IE 8 ]><html lang="en" class="ie8 ielt9"><![endif]--><!--[if IE 9 ]><html lang="en" class="ie9"> <![endif]--><!--[if (gt IE 9)|!(IE)]><!--> 
<html lang="en"><!--<![endif]--> 
    <head>
        <meta charset="utf-8">
        <title>用户列表 - WZ Project</title>
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
                        链接列表
                    </h1>
                   <!--  <form class="navbar-search pull-left" action="" style="padding-bottom:20px;" method="get">
                             <input type="hidden" name="m" value="<?= __MODULE ?>">
                            <input type="hidden" name="c" value="<?= __CONTROLLER ?>">
                            <input type="hidden" name="a" value="<?= __ACTION ?>">
                            <input type="text" class="search-query span2" placeholder="Username" name="search" value="<?= @$_GET['search'] ?>">
                            <input type="submit" class="btn btn-primary " value="搜索">
                           
                    </form> -->
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>
                                    序号
                                </th>
                                <th>
                                    网页名
                                </th>
                                <th>
                                    网页地址
                                </th>
                                <th>
                                    操作
                                </th>
                        </thead>
                        <tbody>
                            <?php
                            // 流程控制的代替写法
                            // 语法: 将左边的花括号改为冒号, 右边花括号改为end + 语句的名字
                            // 那些语句可以用: for while dowhile foreach
                            foreach ($flist as $key => $value):
                            ?>
                            <tr>
                                <td>
                                    <?= $key+1 ?>
                                </td>
                                <td>
                                    <?= $value['name'] ?>
                                </td>
                                <td>
                                    <?= $value['link'] ?>
                                </td>
                              
                                <td>
                                    <a href="<?= url('edit', ['id' => $value['id']]) ?>" class="view-link">编辑</a>
                                    <a href="<?= url('del', ['id' => $value['id']]) ?>" class="view-link" style="color: red;">删除</a>
                                    
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>                
                    <div class="pagination">
                        <?= $page->fpage()?>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?= __PUBLIC ?>/admin/js/jquery.min.js"></script>
        <script src="<?= __PUBLIC ?>/admin/js/bootstrap.min.js"></script>
        <script src="<?= __PUBLIC ?>/admin/js/site.js"></script>
    </body>
</html>
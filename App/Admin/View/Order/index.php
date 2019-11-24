
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
                        订单列表
                    </h1>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>
                                    序号
                                </th>
                                <th>
                                    订单号
                                </th>
                                <th>
                                    用户
                                </th>
                                <th>
                                    订单状态
                                </th>
                                <th>
                                    是否支付
                                </th>
                                <th>
                                    总价
                                </th>
                                <th>
                                    收货人
                                </th>
                                <th>
                                    收货人联系方式
                                </th>
                                <th>
                                    收货地址
                                </th>
                                <th>
                                    添加时间
                                </th>
                                <th>
                                    操作
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($orderdata as $key => $value):
                            ?>
                            <tr>
                                <td>
                                    <?= $key+1 ?>
                                </td>
                                <td>
                                    <?= $value['oid'] ?>
                                </td>
                                <td>
                                    <?= $value['uid']
                                        
                                    ?>
                                </td>
                                <td>
                                    <?= $status[$value['status']] ?>
                                </td>
                                <td>
                                    <?= $pay[$value['is_pay']] ?>
                                </td>
                                <td>
                                    <?= $value['total'] ?>
                                </td>
                                <td>
                                    <?= $value['username'] ?>
                                </td>
                                <td>
                                    <?= $value['tel'] ?>
                                </td>
                                <td>
                                    <?= $value['address'] ?>
                                </td>
                                <td>
                                    <?= $value['addtime'] ?>
                                </td>
                                
                                <td>
                                    <a href="<?= url('index',['oid'=>$value['oid']]) ?>"><?=  $gstatus?>
                                    </a>
                                </td>
                                
                                
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>                
                    <div class="pagination">
                        <!-- <ul>
                            <li class="disabled">
                                <a href="#">«</a>
                            </li>
                            <li class="active">
                                <a href="#">1</a>
                            </li>
                            <li>
                                <a href="#">2</a>
                            </li>
                            <li>
                                <a href="#">3</a>
                            </li>
                            <li>
                                <a href="#">4</a>
                            </li>
                            <li>
                                <a href="#">»</a>
                            </li>
                        </ul> -->

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
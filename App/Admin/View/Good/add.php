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
                       添加商品
                    </h1>
                    <form id="edit-profile" class="form-horizontal" action="<?= url('doadd'); ?>" method="post" enctype="multipart/form-data">
                        <fieldset>
                            <div class="control-group">
                                <label class="control-label" for="name">商品名称：</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" id="name" name="name">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="typeid">分类ID：</label>

                                <div class="controls">
                                    <select  class="input-xlarge" name="typeid">
                                        <?php

                                            foreach($newType as $key =>$value):
                                            ?>
                                        <option value="<?= $value['id'] ?>">
                                        <?php
                                            $level = count(explode(', ',$value['path']))-1;
                                    
                                            echo str_repeat(']--',$level);
                                            echo $value['name'];
                                        ?>
                                        </option>
                                    <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="price">商品价格：</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" id="price" name="price">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="store">商品库存：</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" id="store" name="store">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="pic">商品图片：</label>
                                <div class="controls">
                                    <input type="file" class="input-xlarge" id="pic" name="pic">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="company">商品厂家：</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge" id="company" name="company">
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label" for="">状态</label>
                                <div class="controls">
                                    <label class="checkbox">
                                        <input type="radio" name="status" value="0" checked="checked">
                                        下架
                                    </label> 
                                    <label class="checkbox">
                                        <input type="radio" name="status" value="1" >
                                       上架
                                    </label>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="descr">商品描述：</label>
                                <div class="controls">
                                    
                                    <textarea class="input-xlarge" name="descr"></textarea>
                                </div>
                            </div>
                                                  
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">保存</button> <button class="btn" type="reset">重置</button>
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
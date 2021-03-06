<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <title>1fengou</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.0/css/bootstrap-combined.min.css" rel="stylesheet">-->
    <!--<link href="bootstrap.min.css" rel="stylesheet">-->
    <!--<link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">-->
    <link href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">

    <style type="text/css">
        body {
            background-color: #CCC;
            padding: 50px;
            font-family: "Microsoft YaHei UI";
        }
        img {float:left}
        footer{
            text-align:center;
            height: 60px;         /* footer的高度一定要是固定值*/
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img src="/1fengou/Public/Resources/images/logo.png" width="111" height="30" alt="1fengou logo" /></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">首页<span class="sr-only">(current)</span></a></li>
                    <li><a href="#">购物车</a></li>
                    <li><a href="http://localhost/1fengou/index.php/home/Index/createProduct">创建商品</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">商品分类<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">家用电器</a></li>
                            <li><a href="#">手机数码</a></li>
                            <li><a href="#">个护化妆</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">虚拟商品</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">搜索</button>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">登录</a></li>
                    <li><a href="#">注册</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <div class="container-fluid">
        <div class='row-fluid'>
            <div class='col-md-8'>
                <h2>每日精选</h2>

                <div name="product_detail">
                    <?php if(is_array($productList)): $i = 0; $__LIST__ = $productList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div>
                        <img src="/1fengou/Public/<?php echo ($vo['thumbnail']); ?>" alt="商品缩略图"/>
                        <h3><?php echo ($vo['name']); ?></h3>
                        <p>价格：￥<?php echo ($vo['price']); ?></p>
                        <p>简介：<?php echo ($vo['introduce']); ?></p>
                        <p>已售：<?php echo ($vo['sales']); ?></p>
                            <a href="#" class="btn btn-info btn-lg active" role="button">查看详情</a>
                            <a href="#" class="btn btn-danger btn-lg active" role="button">立即购买</a>
                            <a href="#" class="btn btn-success btn-lg active" role="button">加入购物车</a>
                        </div>
                        <br/><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>

            <div class='col-md-4'>
                <h2>相关推荐</h2>
                <ul class="nav nav-tabs nav-stacked">
                    <li><a href='#'>Another Link 1</a></li>
                    <li><a href='#'>Another Link 2</a></li>
                    <li><a href='#'>Another Link 3</a></li>
                </ul>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 1fengou 2016</p>
    </footer>

    <script src="http://apps.bdimg.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</body>
</html>
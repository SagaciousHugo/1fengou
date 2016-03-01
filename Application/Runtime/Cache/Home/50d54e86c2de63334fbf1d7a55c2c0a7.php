<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<title>1fengou</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="http://apps.bdimg.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="../../../Public/js/jquery.validate.min.js"></script>
<script src="../../../Public/js/messages_zh.js"></script>

<link href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../../../Public/css/common.css">
<link href="//cdn.bootcss.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">




</head>

<body>

<!--引入头部header模板-->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="/1fengou/Public/Resources/images/logo.png" width="111" height="30" alt="1fengou logo" /></a>
        </div>

        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li id="main"class="active"><a href="http://localhost/1fengou/index.php/home/Index/queryProduct"><span><i class="fa fa-home"></i> 首页</span></a></span></li>
                <li id="shopping"><a href="#"><span><i class="fa fa-bank"></i> 购物车</span></a></li>
                <li id="create_product"><a href="http://localhost/1fengou/index.php/home/Index/createProduct"><span><i class="fa fa-gears"></i> 创建商品</span></a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span><i class="fa fa-table"></i> 商品分类</span></a>
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
                <li><a href="#"><span><i class="fa fa-user"></i> 登录</span></a></a></li>
                <li><a href="#"><span><i class="fa fa-tags"></i> 注册</span></a></a></li>
            </ul>
        </div>
    </div>
</nav>


    <div class="container-fluid">
        <div class='row-fluid'>
            <div class='col-md-8'>
                <h2>每日精选</h2>
                <div name="product_detail">
                    <?php if(is_array($productList)): $i = 0; $__LIST__ = $productList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><img width="150" height="150" src="/1fengou/Public/Resources/Images/<?php echo ($vo['thumbnail']); ?>.jpg" alt="商品缩略图"/>
                        <div class="info">
                            <h3><?php echo ($vo['name']); ?></h3>
                            <p><span><i class="fa fa-cny"></i> 价格</span>：<?php echo ($vo['price']); ?></p>
                            <p><span><i class="fa fa-file-text"></i> 简介</span>：<?php echo ($vo['introduce']); ?></p>
                            <p><span><i class="fa fa-thumbs-o-up"></i> 已售</span>：<?php echo ($vo['sales']); ?></p>
                            <a href="#" class="btn btn-info btn-lg active" role="button">查看详情</a>
                            <a href="#" class="btn btn-danger btn-lg active" role="button">立即购买</a>
                            <a href="#" class="btn btn-success btn-lg active" role="button">加入购物车</a>
                        </div>
                        <br/><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>

            <div class='col-md-4'>
                <h2><span><i class="fa fa-thumbs-o-up"></i> 相关推荐</span></h2>
                <ul class="nav nav-tabs nav-stacked">
                    <li><a href='#'>Another Link 1</a></li>
                    <li><a href='#'>Another Link 2</a></li>
                    <li><a href='#'>Another Link 3</a></li>
                </ul>
            </div>
        </div>
    </div>




<!--引入底部footer模板-->
<footer>
    <p>&copy; 1fengou 2016</p>
</footer>

<script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</body>
</html>
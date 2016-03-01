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



    <script type="text/javascript">
        /*alert('jQuery版本：' + $.fn.jquery);*/
        $(function() {
            /*
            表单验证初始化
             */
            $("#commentForm").validate();

            /*
            使用H5的API进行商品缩略图读取和预览
             */
            var
                    fileInput = document.getElementById('test-image-file'),
                    info = document.getElementById('test-file-info'),
                    preview = document.getElementById('test-image-preview');
            // 监听change事件:
            fileInput.addEventListener('change', function () {
                // 清除背景图片:
                preview.style.backgroundImage = '';
                // 检查文件是否选择:
                if (!fileInput.value) {
                    info.innerHTML = '没有选择文件';
                    return;
                }
                // 获取File引用:
                var file = fileInput.files[0];
                // 获取File信息:
                info.innerHTML = '缩略图信息' + '<br>' + '文件: ' + file.name + '<br>' +
                        '大小: ' + file.size + '<br>' +
                        '修改: ' + file.lastModifiedDate;
                if (file.type !== 'image/jpeg' && file.type !== 'image/png' && file.type !== 'image/gif') {
                    alert('不是有效的图片文件!');
                    return;
                }
                // 读取文件:
                var reader = new FileReader();
                reader.onload = function(e) {
                    var data = e.target.result; // 'data:image/jpeg;base64,/9j/4AAQSk...(base64编码)...'
                    preview.style.backgroundImage = "url(" + data + ")";
                };
                // 以DataURL的形式读取文件:
                reader.readAsDataURL(file);
            });

            /*
            导航栏跳转时改变“active”的选项
             */
            $("ul.navbar-nav li").removeClass();
            $("#create_product").addClass("active");
        });
    </script>


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


    <div>
        <form id="commentForm" action="/1fengou/index.php/Home/Index/addProduct" enctype="multipart/form-data" method="post" >

                <p>商品id:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="shangpinid" name="id" minlength="2" type="text" required/>必填项</p>
                <p>商品名:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="name" name="name" minlength="3" type="text" required/>必填项</p>
                <p>商品价格:￥ <input id="price" type="number" name="price" required/>必填项</p>
                <p>商品简介:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea id="des" maxlength="30" type="text" name="introduce" style="resize:none;"></textarea></p>
                <p>商品缩略图：<input type="file" id="test-image-file" name="photo" class="btn btn-info btn-lg active" /></p>
                <p>缩略图预览</p>
                <div id="test-image-preview" style="border: 1px solid black; width: 50%; height: 200px;background-repeat:no-repeat;">
                </div>
                <div id="test-file-info">
                </div>
            <input type="submit" value="提交" class="btn btn-success btn-lg active">
        </form>

    </div>




<!--引入底部footer模板-->
<footer>
    <p>&copy; 1fengou 2016</p>
</footer>

<script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</body>
</html>
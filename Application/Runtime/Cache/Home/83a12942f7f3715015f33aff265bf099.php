<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>创建商品信息</title>
</head>
<body>
<form action="/1fengou/index.php/Home/Index/addProduct" enctype="multipart/form-data" method="post" >
    <p>商品id: <input type="text" name="id" /></p>
    <p>商品名: <input type="text" name="name" /></p>
    <p>商品价格:￥ <input type="text" name="price" />元</p>
    <p>商品简介: <input type="text" name="introduce" /></p>
    <p>商品缩略图：<input type="file" name="photo" /></p>
    <input type="submit" value="提交" >
</form>
</body>
</html>
<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>创建商品信息</title>
</head>
<body>
<form action="/1fengou/index.php/Home/Index/addProduct" enctype="multipart/form-data" method="post" >
    <p>gym验证冲888999id: <input type="text" name="id" /></p>
    <p>gym change商品名: <input type="text" name="name" /></p>
    <p>123456商品价格:￥ <input type="text" name="price" />元</p>
    <p>another gaochang and gym change商品简介: <input type="text" name="introduce" /></p>
    <p>商品缩略图gc：<input type="file" name="photo" /></p>
    <input type="submit" value="提交" >
</form>
</body>
</html>
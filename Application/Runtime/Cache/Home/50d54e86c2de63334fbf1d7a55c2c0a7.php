<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>商品列表</title>
</head>
<body>
<p>商品列表：</p>
<?php if(is_array($productList)): $i = 0; $__LIST__ = $productList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><p>id：<?php echo ($vo['id']); ?></p>
        <p>商品名：<?php echo ($vo['name']); ?></p>
        <p>价格：<?php echo ($vo['price']); ?>元</p>
        <p>缩略图 <img src="/thinkphp_3.2.3_full/Public/Resources/images/<?php echo ($vo['thumbnail']); ?>.jpg" width="100" height="100" alt="" /></p>
        <p>销售量：<?php echo ($vo['sales']); ?></p>
    <br/><?php endforeach; endif; else: echo "" ;endif; ?>
</body>
</html>
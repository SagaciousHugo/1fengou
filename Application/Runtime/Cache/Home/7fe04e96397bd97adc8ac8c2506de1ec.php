<?php if (!defined('THINK_PATH')) exit();?><!--表格正文-->
<div class="col-lg-12">
    <table id="productInfo" class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>
                    <input type="checkbox" id="selectAll"/>全选
                </th>
                <th>
                    商品Id
                </th>
                <th>
                    商品名称
                </th>
                <th>
                    商品价格(￥)
                </th>
                <th>
                    商品简介
                </th>
                <th>
                    已售数量
                </th>
                <th>
                    商品缩略图
                </th>
                <th>
                    操作
                </th>
            </tr>
        </thead>
        <tbody>
            <div id="listContent">
                <?php if(is_array($productList)): $i = 0; $__LIST__ = $productList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr onclick="javascript:myclick(this)">
                        <td>
                            <input type="checkbox" name="product" value=<?php echo ($vo['id']); ?> />
                        </td>
                        <td align="center" name="productId" value=<?php echo ($vo['id']); ?>>
                            <?php echo ($vo['id']); ?>
                        </td>
                        <td align="center">
                            <?php echo ($vo['name']); ?>
                        </td>
                        <td align="center">
                            <?php echo ($vo['price']); ?>
                        </td>
                        <td align="center">
                            <?php echo ($vo['introduce']); ?>
                        </td>
                        <td align="center">
                            <?php echo ($vo['sales']); ?>
                        </td>
                        <td align="center">
                            <img width="150" height="150" src="/1fengou/Public/<?php echo ($vo['thumbnail']); ?>" alt="商品缩略图"/>
                        </td>
                        <td align="center">
                            <a class=".btn.btn-app" href="http://localhost/1fengou/index.php/home/Manage/editProduct/id/<?php echo ($vo['id']); ?>">
                                <i class="fa fa-edit"></i> 修改
                            </a>
                        </td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </tbody>
        <tfoot>
            <tr>
                <th>
                    <input type="checkbox" id="selectAll2"/>全选
                </th>
                <th>商品Id</th>
                <th>商品名称</th>
                <th>商品价格(￥)</th>
                <th>商品简介</th>
                <th>已售数量</th>
                <th>商品缩略图</th>
                <th>操作</th>
            </tr>
        </tfoot>
    </table>
</div>

<!--表格底部-->
<div class="row">
    <div class="col-lg-12">
        <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
            当前显示：第<?php echo ($from); ?>至<?php echo ($to); ?>条数据，共<?php echo ($total); ?>条数据
            <input id="hideTotalPage" style="display: none" value="<?php echo ($totalPages); ?>" />
        </div>
    </div>
</div>
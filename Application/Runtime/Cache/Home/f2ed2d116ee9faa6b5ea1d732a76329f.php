<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>1fengou</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="/1fengou/Public/css/bootstrap/css/bootstrap.min.css">

        <link rel="stylesheet" href="/1fengou/Public/css/font-awesome-4.5.0/css/font-awesome.min.css">

        <!-- Ionicons -->
        <link rel="stylesheet" href="/1fengou/Public/css/ionicons-2.0.1/css/ionicons.min.css"/>

        <!-- Theme style -->
        <link rel="stylesheet" href="/1fengou/Public/AdminLTE/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="/1fengou/Public/AdminLTE/dist/css/skins/_all-skins.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="/1fengou/Public/AdminLTE/plugins/iCheck/flat/blue.css">
        <!-- Morris chart -->
        <link rel="stylesheet" href="/1fengou/Public/AdminLTE/plugins/morris/morris.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="/1fengou/Public/AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <!-- Date Picker -->
        <link rel="stylesheet" href="/1fengou/Public/AdminLTE/plugins/datepicker/datepicker3.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="/1fengou/Public/AdminLTE/plugins/daterangepicker/daterangepicker-bs3.css">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="/1fengou/Public/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
        <!-- common css -->
        <link rel="stylesheet" type="text/css" href="/1fengou/Public/css/common.css">
        <!-- pager css -->
        <link rel="stylesheet" type="text/css" href="/1fengou/Public/css/pager.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="/1fengou/Public/js/html5shiv-3.7.3/html5shiv.min.js"></script>

        <script src="/1fengou/Public/js/respond-1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- jQuery 2.1.4 -->
        <script src="/1fengou/Public/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!--        &lt;!&ndash;jquery-validate&ndash;&gt;
        <script src="/1fengou/Public/js/jquery.validate.min.js"></script>-->
        <!--bootstrap-tooltip-->
        <script src="/1fengou/Public/css/bootstrap/js/tooltip.js"></script>
        <!--bootstrap-popover-->
        <script src="/1fengou/Public/css/bootstrap/js/popover.js"></script>

        <!--jquery.pager.js-->
        <script src="/1fengou/Public/js/jquery.pager.js"></script>

        
    <script type="text/javascript">
        $(function(){
            var table = $('#productInfo'),
                products = table.find('[name=product]'),
                selectAll = $('#selectAll');
                selectAll2 = $('#selectAll2');
            selectAll.click(function(){
                products.prop('checked',this.checked);
                selectAll2.prop('checked',this.checked);
            });
            selectAll2.click(function(){
                products.prop('checked',this.checked);
                selectAll.prop('checked',this.checked);
            });
            products.click(function(){
                var isAllChecked=products.map(function(){return this.checked;}).get().reduce((x,y) => x&&y);
                if(isAllChecked||selectAll.is(":checked")||selectAll2.is(":checked")){
                    selectAll.prop('checked',isAllChecked);
                    selectAll2.prop('checked',isAllChecked);
                }
            });

            /*alert(<?php echo ($lala); ?>);*/
            $("#showPerPage").change(function(){
                var perPage = $("#showPerPage").val();
                $.ajax({
                    type:"GET",
                    url: "http://localhost/1fengou/index.php/home/Manage/index/p/" + <?php echo ($page); ?> + "/pageCount/" + perPage,
                    success:function(data){
                        $("#manageTable").html(data);
/*                        var total = $('#hideTotalPage').val();
                        PageClick = function(pageclicknumber){
 /!*                           /!*$('#pageNav').pager({pagenumber:pageclicknumber,pagecount:total,countPerPage:perPage,buttonClickCallback:PageClick});*!/
                            $('#pageNav').pager({pagenumber:pageclicknumber,pagecount:total,buttonClickCallback:PageClick});
                            var perPage2 = $("#showPerPage").val();*!/
                            $.ajax({
                                type:"GET",
                                url: "http://localhost/1fengou/index.php/home/Manage/index/page/" + (<?php echo ($page); ?> + 1) + "/pageCount/" + perPage2,
                                success:function(data){
                                    $("#manageTable").html(data);
                                    var total = $('#hideTotalPage').val();
                                    PageClick = function(pageclicknumber){
                                        /!*$('#pageNav').pager({pagenumber:pageclicknumber,pagecount:total,countPerPage:perPage,buttonClickCallback:PageClick});*!/
                                        $('#pageNav').pager({pagenumber:pageclicknumber,pagecount:total,buttonClickCallback:PageClick});
                                    }
                                    /!*$('#pageNav').pager({pagenumber:1,pagecount:total,countPerPage:perPage,buttonClickCallback:PageClick});*!/
                                    $('#pageNav').pager({pagenumber:1,pagecount:total,buttonClickCallback:PageClick});
                                }
                            })
                        }
                        /!*$('#pageNav').pager({pagenumber:1,pagecount:total,countPerPage:perPage,buttonClickCallback:PageClick});*!/
                        $('#pageNav').pager({pagenumber:1,pagecount:total,buttonClickCallback:PageClick});*/
                    }
                });
            })

           /* PageClick = function(pageclicknumber){
                /!*$('#pageNav').pager({pagenumber:pageclicknumber,pagecount:<?php echo ($totalPages); ?>,countPerPage:perPage2,buttonClickCallback:PageClick});*!/
                $('#pageNav').pager({pagenumber:pageclicknumber,pagecount:<?php echo ($totalPages); ?>,buttonClickCallback:PageClick});
                var perPage2 = $("#showPerPage").val();
                $.ajax({
                    type:"GET",
                    url: "http://localhost/1fengou/index.php/home/Manage/index/page/" + (<?php echo ($page); ?> + 1) + "/pageCount/" + perPage2,
                    success:function(data){
                        $("#manageTable").html(data);
                        var total = $('#hideTotalPage').val();
                        PageClick = function(pageclicknumber){
                            /!*$('#pageNav').pager({pagenumber:pageclicknumber,pagecount:total,countPerPage:perPage,buttonClickCallback:PageClick});*!/
                            $('#pageNav').pager({pagenumber:pageclicknumber,pagecount:total,buttonClickCallback:PageClick});
                        }
                        /!*$('#pageNav').pager({pagenumber:1,pagecount:total,countPerPage:perPage,buttonClickCallback:PageClick});*!/
                        $('#pageNav').pager({pagenumber:1,pagecount:total,buttonClickCallback:PageClick});
                    }
                })
            }

            /*$('#pageNav').pager({pagenumber:1,pagecount:<?php echo ($totalPages); ?>,countPerPage:perPage2,buttonClickCallback:PageClick});*/
            /*$('#pageNav').pager({pagenumber:1,pagecount:<?php echo ($totalPages); ?>,buttonClickCallback:PageClick});*/


        });

        function selectCount(){
            var table = $('#productInfo'),
                    products = table.find('[name=product]'),
                    re = 0;
            products.map(function(){
                if(this.checked){
                    re = re +1;
                }
                return re;
            });
            if(re == 0) {
                $('#selectAtLeastOne').modal({
                    show: true,
                    backdrop: 'static'
                });
            } else {
                $('#deleteConfirm').modal({
                    show: true,
                    backdrop: 'static'
                });
            }
        };

        function deleteBatch(){
            var table = $('#productInfo'),
                products = table.find('[name=product]'),
                arr = [],
                re = 0;
            var selectedList = products.map(function(){
                if(this.checked){
                    arr.push(this.value);
                    re = re +1;
                }
                return arr;
            }).get().slice(0,re);

            $.ajax({
                type: "GET",
                url: "http://localhost/1fengou/index.php/home/Manage/deleteProduct/id/" + selectedList,
                dataType:'json',
                success: function ($data) {
                    if($data.status == 'success'){
                        $(".modal-backdrop").remove();
                        $(".jvectormap-label").remove();
                        var perPage = $("#showPerPage").val();
                        $.ajax({
                            type: "GET",
                            url: "http://localhost/1fengou/index.php/home/Manage/index/page/" + <?php echo ($page); ?> + "/pageCount/" + perPage,
                            success:function(){
                                $('#deleteConfirm').modal('toggle');
                                $('#opSuccess').modal({
                                    show: true,
                                    backdrop: 'static'
                                });
                            }
                        })
                    } else {
                        $('#opFail').modal('show');
                    }
                }
            });
        };

        function myclick(o){
            var rd = $(o).find('[name=product]');

            /*rd.prop('checked',!(this.checked));*/
        }
    </script>

    </head>

    <body class="hold-transition skin-blue sidebar-mini">
        <!--主内容-->
        <div class="wrapper"  id="contentDiv">
            <!--引入头部header模板-->
            <header class="main-header">
    <!-- Logo -->
    <a href="index.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>1</b>FG</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>1</b>fengou</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success">5</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">您有 5 条新消息</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li><!-- start message -->
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src="/1fengou/Public/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                        </div>
                                        <h4>
                                            Support Team
                                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                                <!-- end message -->
                                <li>
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src="/1fengou/Public/AdminLTE/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                                        </div>
                                        <h4>
                                            AdminLTE Design Team
                                            <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src="/1fengou/Public/AdminLTE/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                                        </div>
                                        <h4>
                                            Developers
                                            <small><i class="fa fa-clock-o"></i> Today</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src="/1fengou/Public/AdminLTE/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                                        </div>
                                        <h4>
                                            Sales Department
                                            <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src="/1fengou/Public/AdminLTE/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                                        </div>
                                        <h4>
                                            Reviewers
                                            <small><i class="fa fa-clock-o"></i> 2 days</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">查阅所有消息</a></li>
                    </ul>
                </li>
                <!-- Notifications: style can be found in dropdown.less -->
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">5</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">您有 5 条新通知</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                                        page and may cause design problems
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-users text-red"></i> 5 new members joined
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-user text-red"></i> You changed your username
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">查阅所有新通知</a></li>
                    </ul>
                </li>
                <!-- Tasks: style can be found in dropdown.less -->
                <li class="dropdown tasks-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-flag-o"></i>
                        <span class="label label-danger">4</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">您有 4 个任务</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li><!-- Task item -->
                                    <a href="#">
                                        <h3>
                                            Design some buttons
                                            <small class="pull-right">20%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">20% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <!-- end task item -->
                                <li><!-- Task item -->
                                    <a href="#">
                                        <h3>
                                            Create a nice theme
                                            <small class="pull-right">40%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">40% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <!-- end task item -->
                                <li><!-- Task item -->
                                    <a href="#">
                                        <h3>
                                            Some task I need to do
                                            <small class="pull-right">60%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">60% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <!-- end task item -->
                                <li><!-- Task item -->
                                    <a href="#">
                                        <h3>
                                            Make beautiful transitions
                                            <small class="pull-right">80%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">80% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <!-- end task item -->
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="#">查阅所有任务</a>
                        </li>
                    </ul>
                </li>
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="/1fengou/Public/AdminLTE/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                        <span class="hidden-xs">Alexander Pierce</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="/1fengou/Public/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                            <p>
                                Alexander Pierce - Web Developer
                                <small>Member since Nov. 2012</small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="row">
                                <div class="col-xs-4 text-center">
                                    <a href="#">Followers</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Sales</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Friends</a>
                                </div>
                            </div>
                            <!-- /.row -->
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="#" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>

            <!--引入主边栏模板-->
            <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/1fengou/Public/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">功能列表</li>
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>商城首页</span> <i class="fa fa-home pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="http://localhost/1fengou/index.php/home/Index/index"><i class="fa fa-circle-o"></i> 1分购</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> 每日精选</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="http://localhost/1fengou/index.php/home/Manage/editProduct">
                    <i class="fa fa-files-o"></i>
                    <span>新建商品</span>
                    <span class="label label-primary pull-right">6</span>
                </a>
            </li>
            <li>
                <a href="http://localhost/1fengou/index.php/home/Manage/index/type/woshimingming"">
                    <i class="fa fa-th"></i> <span>管理商品</span>
                    <small class="label pull-right bg-green">new</small>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>商品统计</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="chartjs.html"><i class="fa fa-circle-o"></i> 商品类别构成</a></li>
                    <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> 月销量</a></li>
                    <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Top10</a></li>
                    <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> 月收入 </a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>问题订单</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> 待处理</a></li>
                    <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> 处理中</a></li>
                    <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> 已完成</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i> <span>校园众筹</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> 各版块进度</a></li>
                    <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> 汇总结果</a></li>
                </ul>
            </li>
            <li>
                <a href="pages/calendar.html">
                    <i class="fa fa-calendar"></i> <span>待办事项</span>
                    <small class="label pull-right bg-red">3</small>
                </a>
            </li>
            <li>
                <a href="pages/mailbox/mailbox.html">
                    <i class="fa fa-envelope"></i> <span>站内通知</span>
                    <small class="label pull-right bg-yellow">12</small>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-share"></i> <span>Multilevel</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                    <li>
                        <a href="#"><i class="fa fa-circle-o"></i> Level One <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                            <li>
                                <a href="#"><i class="fa fa-circle-o"></i> Level Two <i class="fa fa-angle-left pull-right"></i></a>
                                <ul class="treeview-menu">
                                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                </ul>
            </li>
            <li><a href="documentation/index.html"><i class="fa fa-book"></i> <span>帮助</span></a></li>
            <li class="header">LABELS</li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

            <!--引入主面板模板-->
            
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                管理商品
                <small>商品详情</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-gears"></i> 管理商品</a></li>
                <li class="active">商品详情</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <section class="col-lg-12 col-xs-12">
                    <div>
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">商品详情列表</h3>
                            </div>
                            <div class="box-body">
                                <div class="dataTables_wrapper form-inline dt-bootstrap">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="dataTables_length" id="example1_length">
                                                <label>每页显示
                                                    <select name="example1_length" aria-controls="example1" class="form-control input-sm" id="showPerPage">
                                                        <option value="10" <?php echo ($pageCount); ?>==10?'selected':''>10</option>
                                                        <option value="25" <?php echo ($pageCount); ?>==25?'selected':''>25</option>
                                                        <option value="50" <?php echo ($pageCount); ?>==50?'selected':''>50</option>
                                                        <option value="100" <?php echo ($pageCount); ?>==100?'selected':''>100</option>
                                                    </select> 条数据
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div id="example1_filter" class="dataTables_filter">
                                                <label>查询商品名称:
                                                    <input type="search" class="form-control input-sm" placeholder="" aria-controls="example1">
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <a class="btn btn-danger btn-lg btn-sm active" role="button" href="javascript:selectCount()">批量删除</a>
                                            <!--data-toggle="modal" data-target="#deleteConfirm"-->
                                        </div>

                                    </div>

                                    <div id="manageTable">
                                        <!--表格正文-->
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
    <!-- 分页 -->
    <div class="page">
        <?php echo ($_page); ?>
    </div>
</div>


                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>
                </section>
            </div>



        </section>
    </div>


    <!-- （Modal）用于操作成功提示 -->
    <div class="modal fade" id="opSuccess" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
<!--                    <button type="button" class="close"
                            data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>-->
                    <h4 class="modal-title">
                        操作提示
                    </h4>
                </div>
                <div class="modal-body">
                    操作成功!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="javascript:window.location.reload();" >
                        确认
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- （Modal）用于操作失败提示 -->
    <div class="modal fade" id="opFail" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"
                            data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title">
                        操作提示
                    </h4>
                </div>
                <div class="modal-body">
                    操作失败，数据错误，请联系管理员!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">
                        确认
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- （Modal）用于至少选择一条提示 -->
    <div class="modal fade" id="selectAtLeastOne" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"
                            data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title">
                        操作提示
                    </h4>
                </div>
                <div class="modal-body">
                    请至少选择一条数据!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">
                        确认
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- （Modal）用于删除二次确认提示 -->
    <div class="modal fade" id="deleteConfirm" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"
                            data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title">
                        删除提示
                    </h4>
                </div>
                <div class="modal-body">
                    确认删除所选商品？
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="javascript:deleteBatch()">
                        确认
                    </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        取消
                    </button>
                </div>
            </div>
        </div>
    </div>


            <!--引入底部footer模板-->
            
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 0.0.1
    </div>
    <strong>Copyright &copy; 2015-2016 <a href="#">1fengou</a>.</strong> All rights
    reserved.
</footer>

            <!--引入控制边栏模板-->
            <!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
                <li>
                    <a href="javascript::;">
                        <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                            <p>Will be 23 on April 24th</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript::;">
                        <i class="menu-icon fa fa-user bg-yellow"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                            <p>New phone +1(800)555-1234</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript::;">
                        <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                            <p>nora@example.com</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript::;">
                        <i class="menu-icon fa fa-file-code-o bg-green"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                            <p>Execution time 5 seconds</p>
                        </div>
                    </a>
                </li>
            </ul>
            <!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
                <li>
                    <a href="javascript::;">
                        <h4 class="control-sidebar-subheading">
                            Custom Template Design
                            <span class="label label-danger pull-right">70%</span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript::;">
                        <h4 class="control-sidebar-subheading">
                            Update Resume
                            <span class="label label-success pull-right">95%</span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript::;">
                        <h4 class="control-sidebar-subheading">
                            Laravel Integration
                            <span class="label label-warning pull-right">50%</span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript::;">
                        <h4 class="control-sidebar-subheading">
                            Back End Framework
                            <span class="label label-primary pull-right">68%</span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                        </div>
                    </a>
                </li>
            </ul>
            <!-- /.control-sidebar-menu -->

        </div>
        <!-- /.tab-pane -->
        <!-- Stats tab content -->
        <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
        <!-- /.tab-pane -->
        <!-- Settings tab content -->
        <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
                <h3 class="control-sidebar-heading">General Settings</h3>

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Report panel usage
                        <input type="checkbox" class="pull-right" checked>
                    </label>

                    <p>
                        Some information about this general settings option
                    </p>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Allow mail redirect
                        <input type="checkbox" class="pull-right" checked>
                    </label>

                    <p>
                        Other sets of options are available
                    </p>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Expose author name in posts
                        <input type="checkbox" class="pull-right" checked>
                    </label>

                    <p>
                        Allow the user to show his name in blog posts
                    </p>
                </div>
                <!-- /.form-group -->

                <h3 class="control-sidebar-heading">Chat Settings</h3>

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Show me as online
                        <input type="checkbox" class="pull-right" checked>
                    </label>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Turn off notifications
                        <input type="checkbox" class="pull-right">
                    </label>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Delete chat history
                        <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                    </label>
                </div>
                <!-- /.form-group -->
            </form>
        </div>
        <!-- /.tab-pane -->
    </div>
</aside>
<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>

        </div>

        <!-- jQuery UI 1.11.4 -->
        <script src="/1fengou/Public/AdminLTE/plugins/jQueryUI/jquery-ui.min.js"></script>

        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- Bootstrap 3.3.5 -->
        <script src="/1fengou/Public/css/bootstrap/js/bootstrap.min.js"></script>



        <!-- Sparkline -->
        <script src="/1fengou/Public/AdminLTE/plugins/sparkline/jquery.sparkline.min.js"></script>
        <!-- jvectormap -->
        <script src="/1fengou/Public/AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="/1fengou/Public/AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="/1fengou/Public/AdminLTE/plugins/knob/jquery.knob.js"></script>
        <!-- daterangepicker -->
        <script src="/1fengou/Public/js/moment-2.10.2/moment.min.js"></script>
        <script src="/1fengou/Public/AdminLTE/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- datepicker -->
        <script src="/1fengou/Public/AdminLTE/plugins/datepicker/bootstrap-datepicker.js"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="/1fengou/Public/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
        <!-- Slimscroll -->
        <script src="/1fengou/Public/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="/1fengou/Public/AdminLTE/plugins/fastclick/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="/1fengou/Public/AdminLTE/dist/js/app.min.js"></script>

        

         <!--AdminLTE for demo purposes -->
        <script src="/1fengou/Public/AdminLTE/dist/js/demo.js"></script>
<!--        <script src="/1fengou/Public/AdminLTE/plugins/morris/morris.min.js"></script>
        AdminLTE dashboard demo (This is only for demo purposes)
        <script src="/1fengou/Public/AdminLTE/dist/js/pages/dashboard.js"></script>
        <script src="/1fengou/Public/js/raphael-2.1.0/raphael-min.js"></script>-->
    </body>
</html>
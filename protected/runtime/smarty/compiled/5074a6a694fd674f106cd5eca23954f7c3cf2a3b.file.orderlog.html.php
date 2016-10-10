<?php /* Smarty version Smarty-3.1.15, created on 2015-03-26 10:10:59
         compiled from "D:\work\express\src\protected\views\manage\orderlog.html" */ ?>
<?php /*%%SmartyHeaderCode:2202055136ab372d400-38274210%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5074a6a694fd674f106cd5eca23954f7c3cf2a3b' => 
    array (
      0 => 'D:\\work\\express\\src\\protected\\views\\manage\\orderlog.html',
      1 => 1427335796,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2202055136ab372d400-38274210',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'OrderLog' => 0,
    'or' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_55136ab3760095_04101132',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55136ab3760095_04101132')) {function content_55136ab3760095_04101132($_smarty_tpl) {?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>订单管理 - 商城管理中心</title>
<link rel="stylesheet" href="/style/admin/bootstrap.min.css">
<link rel="stylesheet" href="/style/admin/common.css">

<!--[if lt IE 9]>
<script src="/js/html5shiv.min.js"></script>
<script src="/js/respond.min.js"></script>
<![endif]-->


                <link type="text/css" rel="stylesheet" href="/style/datetimepicker.min.css"/>
        
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="row head">
            <div class="col-xs-2 logo"></div>
            <div class="col-xs-6"></div>
            <div class="col-xs-2"><a href="/">管理首页</a> 当前:admin</div>
            <div class="col-xs-2"><a href="/pwd">修改密码</a> <a href="/logout">退出</a></div>        </div>
    </div>
</div>
<div class="container-fluid">

    <div class="row">
        <div class="col-xs-2 sidebar">
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse6"><span class="glyphicon glyphicon-cog"></span> 订单管理</a>
                        </h4>
                    </div>
                    <div id="collapse6" class="panel-collapse collapse in">
                        <ul class="panel-body nav">
                            <li><a href="/manage/orders">订单列表</a></li>
                            <li><a href="/manage/account">用户列表</a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse7"><span class="glyphicon glyphicon-usd"></span> 财务管理</a>
                        </h4>
                    </div>
                    <div id="collapse7" class="panel-collapse collapse in">
                        <ul class="panel-body nav">
                            <li><a href="/finance">查看财务</a></li>
                            <li><a href="/finance?type=cancel">取消申请</a></li>
                            <li><a href="/finance?type=canceled">已取消订单</a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3"><span class="glyphicon glyphicon-user"></span> 礼金卡管理</a>
                        </h4>
                    </div>
                    <div id="collapse3" class="panel-collapse collapse in">
                        <ul class="panel-body nav">
                            <li><a href="/cardtype?stype=0">礼金卡套餐</a></li>
                            <li><a href="/giftcard/list">礼金卡列表</a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3"><span class="glyphicon glyphicon-compressed"></span> 优惠券管理</a>
                        </h4>
                    </div>
                    <div id="collapse3" class="panel-collapse collapse in">
                        <ul class="panel-body nav">
                            <li><a href="/cardtype?stype=1">优惠券代理</a></li>
                            <li><a href="/coupon/list">优惠券列表</a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3"><span class="glyphicon glyphicon-credit-card"></span> VIP卡管理</a>
                        </h4>
                    </div>
                    <div id="collapse3" class="panel-collapse collapse in">
                        <ul class="panel-body nav">
                            <li><a href="/cardtype?stype=2">vip卡管理</a></li>
                            <li><a href="/mcard/list">Vip卡列表</a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse5"><span class="glyphicon glyphicon-user"></span> 供应商管理</a>
                        </h4>
                    </div>
                    <div id="collapse5" class="panel-collapse collapse in">
                        <ul class="panel-body nav">
                            <li><a href="/support/add">添加供应商</a></li>
                            <li><a href="/support">供应商列表</a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse10"><span class="glyphicon glyphicon-user"></span> 物流公司管理</a>
                        </h4>
                    </div>
                    <div id="collapse10" class="panel-collapse collapse in">
                        <ul class="panel-body nav">
                            <li><a href="/express/add">添加物流公司</a></li>
                            <li><a href="/express">物流公司列表</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-10 col-xs-offset-2 main">
            <h4 class="page-header">订单管理</h4>
                        
                                    
<div class="navbar navbar-default navbar-static">
<ul class="nav navbar-nav">
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">全部订单 <span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
            <li><a href="/order">全部</a></li>
            <li class="divider"></li>
            <li><a href="/order?status=2">未拣货</a></li>
            <li class="divider"></li>
            <li><a href="/order?status=4">未检单</a></li>
            <li class="divider"></li>
            <li><a href="/order?status=6">未打包</a></li>
            <li class="divider"></li>
            <li><a href="/order?status=7">未出库</a></li>
            <li class="divider"></li>
            <li><a href="/order?status=8">已出库</a></li>
        </ul>
    </li>
</ul>

    <form class="navbar-form row" role="search" method="get">
        <select name="supplier_id" class="form-control">
            <option value="0">全部供应商</option>
                        <option value="1">EIP</option>
                        <option value="8">sfgfhjhb</option>
                        <option value="10">First Shopping</option>
                        <option value="12">First Shopping</option>
                        <option value="13">First Shopping</option>
                        <option value="14">First Shopping</option>
                        <option value="15">First Shopping</option>
                        <option value="16">First Shopping</option>
                        <option value="17">First Shopping</option>
                        <option value="18">Firstshopping</option>
                    </select>
        <select name="express_id" class="form-control">
            <option value="0">全部物流</option>
                        <option value="1" >方舟国际快递</option>
                        <option value="2" >TNT快递</option>
                        <option value="7" >aufirstexpress</option>
                        <option value="8" >长江国际快递</option>
                    </select>
        <input type="text" name="realname" class="form-control" placeholder="请输入收货人">
        <input type="text" name="order_sn" class="form-control" placeholder="请输入订单号" id="order_sn">
        <input type="text" name="begined" class="form-control datepicker" placeholder="开始日期" id="begined" value=''>
        <input type="text" name="ended" class="form-control datepicker" placeholder="结束日期" id="ended" value=''>
        <input type="hidden" name='status' value=''>
        <button type="submit" class="btn btn-default">查找</button>
        &nbsp;&nbsp;<a href="/upload/axoa.apk">配送客户端下载</a>
    </form>
</div>
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>操作</th>
            <th>备注</th>
            <th>操作者编码</th>
            <th>操作者</th>
            <th>操作时间</th>
   
        </tr>
    </thead>
    <tbody>
        <?php  $_smarty_tpl->tpl_vars['or'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['or']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['OrderLog']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['or']->key => $_smarty_tpl->tpl_vars['or']->value) {
$_smarty_tpl->tpl_vars['or']->_loop = true;
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['or']->value['action'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['or']->value['note'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['or']->value['admin_id'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['or']->value['admin_user'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['or']->value['add_time'];?>
</td>
            
        </tr>
        <?php } ?>
    </tbody>

</table>
<ul id="yw0" class="pagination"><li class="first hidden"><a href="/order">&lt;&lt; 首页</a></li>
<li class="previous hidden"><a href="/order">&lt; 前页</a></li>
<li class="page selected"><a href="/order">1</a></li>
<li class="page"><a href="/order?page=2">2</a></li>
<li class="page"><a href="/order?page=3">3</a></li>
<li class="page"><a href="/order?page=4">4</a></li>
<li class="page"><a href="/order?page=5">5</a></li>
<li class="page"><a href="/order?page=6">6</a></li>
<li class="page"><a href="/order?page=7">7</a></li>
<li class="page"><a href="/order?page=8">8</a></li>
<li class="page"><a href="/order?page=9">9</a></li>
<li class="next"><a href="/order?page=2">后页 &gt;</a></li>
<li class="last"><a href="/order?page=9">末页 &gt;&gt;</a></li></ul><div class="modal fade showorder" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

        </div>
    </div>
</div>

        </div>
    </div>

</div>
</body><?php }} ?>

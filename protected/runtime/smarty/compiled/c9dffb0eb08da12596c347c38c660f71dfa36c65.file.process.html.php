<?php /* Smarty version Smarty-3.1.15, created on 2015-05-13 10:58:04
         compiled from "D:\work\express\src\protected\views\manage\process.html" */ ?>
<?php /*%%SmartyHeaderCode:326985548898d549ce9-34558710%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c9dffb0eb08da12596c347c38c660f71dfa36c65' => 
    array (
      0 => 'D:\\work\\express\\src\\protected\\views\\manage\\process.html',
      1 => 1431485880,
      2 => 'file',
    ),
    '0ba14e16e61dc456a088d9d84f86e1524db73e6d' => 
    array (
      0 => 'D:\\work\\express\\src\\protected\\views\\layouts\\user.html',
      1 => 1431394170,
      2 => 'file',
    ),
    '64d4a865cb03171bf2f4f2acf52ecfd45a62d0ef' => 
    array (
      0 => 'D:\\work\\express\\src\\protected\\views\\layouts\\admin.html',
      1 => 1427792237,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '326985548898d549ce9-34558710',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5548898d601697_57512848',
  'variables' => 
  array (
    'val' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5548898d601697_57512848')) {function content_5548898d601697_57512848($_smarty_tpl) {?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="renderer" content="webkit">
<title>物流信息 - 商城管理中心</title>
<link rel="stylesheet" href="/style/bootstrap.min.css">
<link rel="stylesheet" href="/style/bootstrap.editable.css">
<link rel="stylesheet" href="/style/common.css">

<!--[if lt IE 9]>
<script src="/js/html5shiv.min.js"></script>
<script src="/js/respond.min.js"></script>
<![endif]-->


    <?php $_smarty_tpl->_capture_stack[0][] = array("cssfile", null, null); ob_start(); ?>
    
    <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
    <?php if (trim(Smarty::$_smarty_vars['capture']['cssfile'])!='') {?>
    <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = explode(',',trim(Smarty::$_smarty_vars['capture']['cssfile'])); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
    <link type="text/css" rel="stylesheet" href="/style/<?php echo $_smarty_tpl->tpl_vars['val']->value;?>
.css"/>
    <?php } ?>
    <?php }?>

</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="row head">
            <div class="col-xs-2 logo"></div>
            <div class="col-xs-6"></div>
            <?php if (Yii::app()->session['id']) {?><div class="col-xs-2"><a href="/manage/index">管理首页</a> 当前:<?php echo Yii::app()->session['name'];?>
</div>
            <div class="col-xs-2"><a href="/manage/pwd">修改密码</a> <a href="/logout">退出</a></div><?php }?>
        </div>
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
                        	<li><a href="/manage">物流下单</a></li>
                            <li><a href="/manage/orders">订单列表</a></li>
                            <li><a href="/manage/account">用户列表</a></li>
                            <li><a href="/manage/consigneeID">收件人信息列表</a></li>
                            <li><a href="/manage/news">新闻管理</a></li>
                        </ul>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="col-xs-10 col-xs-offset-2 main">
        	<h4 class="page-header">物流信息</h4>
            <?php $_smarty_tpl->tpl_vars["ok"] = new Smarty_variable(Yii::app()->user->getFlash("success"), null, 0);?>
            <?php if ($_smarty_tpl->tpl_vars['ok']->value) {?>
            <div class="alert alert-success" role="alert">
            	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><?php echo $_smarty_tpl->tpl_vars['ok']->value;?>

            </div>
            <?php }?>

            <?php $_smarty_tpl->tpl_vars["error"] = new Smarty_variable(Yii::app()->user->getFlash("error"), null, 0);?>
            <?php if ($_smarty_tpl->tpl_vars['error']->value) {?>
            <div class="alert alert-danger" role="alert">
            	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            	<?php if (is_array($_smarty_tpl->tpl_vars['error']->value)) {?>
            	<?php  $_smarty_tpl->tpl_vars['ei'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ei']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['error']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ei']->key => $_smarty_tpl->tpl_vars['ei']->value) {
$_smarty_tpl->tpl_vars['ei']->_loop = true;
?>
            	<?php  $_smarty_tpl->tpl_vars['e'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['e']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ei']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['e']->key => $_smarty_tpl->tpl_vars['e']->value) {
$_smarty_tpl->tpl_vars['e']->_loop = true;
?>
            	<p><?php echo $_smarty_tpl->tpl_vars['e']->value;?>
</p>
            	<?php } ?>
            	<?php } ?>
            	<?php } else { ?>
            	<?php echo $_smarty_tpl->tpl_vars['error']->value;?>

            	<?php }?>
            </div>
            <?php }?>
            

<div class="panel-body form-inline">
收货人姓名：<?php echo $_smarty_tpl->tpl_vars['Orders']->value['consignee_realname'];?>
 收货人联系电话：<?php echo $_smarty_tpl->tpl_vars['Orders']->value['consignee_mobile'];?>
 收货人邮编：<?php echo $_smarty_tpl->tpl_vars['Orders']->value['consignee_postcode'];?>
 收货人地址：<?php echo $_smarty_tpl->tpl_vars['Orders']->value['consignee_address'];?>
 <br>
用户-包裹重量：<?php echo $_smarty_tpl->tpl_vars['Orders']->value['user_weight'];?>
  运输实际重量：<?php echo $_smarty_tpl->tpl_vars['Orders']->value['shipping_weight'];?>
 订单价格：<?php echo $_smarty_tpl->tpl_vars['Orders']->value['amount'];?>
 备注： <?php echo $_smarty_tpl->tpl_vars['Orders']->value['note'];?>
  
</div>

<form method ='post' class='form-horizontal' id="form">
<?php if ($_smarty_tpl->tpl_vars['Orders']->value['shipping_status']==0) {?>
	<a href="/manage/orders">返回订单列表</a>
	<hr>
    <div class="">
    <button type="submit" class="btn btn-success pull-left">确认收件</button>
    </div>
<?php } elseif ($_smarty_tpl->tpl_vars['Orders']->value['shipping_status']==1) {?>
<a href="/manage/orders">返回订单列表</a>
	<hr>
    <div class="">
    <button type="submit" class="btn btn-success pull-left">完成打包</button>
    </div>
<?php } elseif ($_smarty_tpl->tpl_vars['Orders']->value['shipping_status']==2) {?>
<a href="/manage/orders">返回订单列表</a>
    <hr>
    <div class="">
    <button type="submit" class="btn btn-success pull-left">确认进入空运</button>
    </div>
<?php } elseif ($_smarty_tpl->tpl_vars['Orders']->value['shipping_status']==3) {?>
<a href="/manage/orders">返回订单列表</a>
    <hr>
    <div class="">
    <button type="submit" class="btn btn-success pull-left">确认到海关</button>
    </div>
<?php } elseif ($_smarty_tpl->tpl_vars['Orders']->value['shipping_status']==4||$_smarty_tpl->tpl_vars['Orders']->value['shipping_status']==5) {?>
<a href="/manage/orders">返回订单列表</a>

	<div class='form-group'>
		<label for="ems_sn"  class='col-md-2 control-label'>EMS单号：</label>
		<div class='col-md-4'>
			<input type="text" name = 'ems_sn' class="form-control" value="" placeholder="请输入快递单号。"
			data-bv-notempty="true"
            data-bv-notempty-message="名称必填"
            data-bv-stringlength="true"
            data-bv-stringlength-max="100"
            data-bv-stringlength-message="字符长度不能超过100位">
		</div>
	</div>
	<div class='form-group'>
		<div class='col-md-2 col-md-offset-2'>
			<button type="submit" class="btn btn-danger submit">已转EMS</button>
		</div>
	</div>


<?php } elseif ($_smarty_tpl->tpl_vars['Orders']->value['shipping_status']==6||$_smarty_tpl->tpl_vars['Orders']->value['shipping_status']==7) {?>
<a href="/manage/orders">返回订单列表</a>
    <hr>
    <div class="">
    <button type="submit" class="btn btn-success pull-left">确认收件</button>
    </div>
<?php } elseif ($_smarty_tpl->tpl_vars['Orders']->value['shipping_status']==8) {?>
<a href="/manage/orders">返回订单列表</a>
<hr>
</form>
<?php }?>



        </div>
	</div>

</div>
</body>
<script src="/js/jquery.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/bootstrap.editable.min.js"></script>

</html>
<?php }} ?>

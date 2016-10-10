<?php /* Smarty version Smarty-3.1.15, created on 2015-05-12 09:31:24
         compiled from "D:\work\express\src\protected\views\manage\index.html" */ ?>
<?php /*%%SmartyHeaderCode:2207655112c6eb33944-24511363%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1acac807531ee0c157b105f816f1c9a1c44148dd' => 
    array (
      0 => 'D:\\work\\express\\src\\protected\\views\\manage\\index.html',
      1 => 1431338696,
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
  'nocache_hash' => '2207655112c6eb33944-24511363',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_55112c6eb4eed3_16978285',
  'variables' => 
  array (
    'val' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55112c6eb4eed3_16978285')) {function content_55112c6eb4eed3_16978285($_smarty_tpl) {?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="renderer" content="webkit">
<title> - 商城管理中心</title>
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
        	<h4 class="page-header"></h4>
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
            
<h4 class="page-header">首页</h4>
                 

<form method ='post' class='form-horizontal' id="form">

	<div class='form-group'>
		<label for="order_sn"  class='col-md-2 control-label'>订单编码：</label>
		<div class='col-md-4'>
			<input type="text" name = 'order_sn' class="form-control" value="">
		</div>
	</div>
	<hr>
	<div class='form-group'>
		<label for="sender_realname"  class='col-md-2 control-label'>寄件人：</label>
		<div class='col-md-4'>
			<input type="text" name = 'sender_realname' class="form-control" value="">
		</div>
	</div>
	<div class='form-group'>
		<label for="sender_mobile"  class='col-md-2 control-label'>寄件人电话：</label>
		<div class='col-md-4'>
			<input type="text" name = 'sender_mobile' class="form-control" value="">
		</div>
	</div>
	<div class='form-group'>
		<label for="sender_postcode"  class='col-md-2 control-label'>寄件人邮编：</label>
		<div class='col-md-4'>
			<input type="text" name = 'sender_postcode' class="form-control" value="">
		</div>
	</div>
	<div class='form-group'>
		<label for="sender_address"  class='col-md-2 control-label'>寄件人地址：</label>
		<div class='col-md-4'>
			<input type="text" name = 'sender_address' class="form-control" value="">
		</div>
	</div>
	<hr>
	<div class='form-group'>
		<label for="consignee_realname"  class='col-md-2 control-label'>收件人姓名：</label>
		<div class='col-md-4'>
			<input type="text" name = 'consignee_realname' class="form-control" value="">
		</div>
	</div>
	<div class='form-group'>
		<label for="consignee_mobile"  class='col-md-2 control-label'>收件人电话：</label>
		<div class='col-md-4'>
			<input type="text" name = 'consignee_mobile' class="form-control" value="">
		</div>
	</div>
	<div class='form-group'>
		<label for="consignee_postcode"  class='col-md-2 control-label'>收件人邮编：</label>
		<div class='col-md-4'>
			<input type="text" name = 'consignee_postcode' class="form-control" value="">
		</div>
	</div>
	<div class='form-group'>
		<label for="consignee_address"  class='col-md-2 control-label'>收件人地址：</label>
		<div class='col-md-4'>
			<input type="text" name = 'consignee_address' class="form-control" value="">
		</div>
	</div>
	<hr>
	<div class='form-group'>
		<label for="user_weight"  class='col-md-2 control-label'>用户-包裹重量：</label>
		<div class='col-md-4'>
			<input type="text" name = 'user_weight' class="form-control" value="">
		</div>
	</div>
	
	<div class='form-group'>
		<label for="shipping_weight"  class='col-md-2 control-label'>运输实际重量：</label>
		<div class='col-md-4'>
			<input type="text" name = 'shipping_weight' class="form-control" value="">
		</div>
	</div>
	
	<div class='form-group'>
		<label for="amount"  class='col-md-2 control-label'>订单价格：</label>
		<div class='col-md-4'>
			<input type="text" name = 'amount' class="form-control" value="">
		</div>
	</div>
	
	<div class='form-group'>
		<label for="note"  class='col-md-2 control-label'>备注：</label>
		<div class='col-md-4'>
			<input type="text" name = 'note' class="form-control" value="">
		</div>
	</div>
	

	<div class='form-group'>
		<div class='col-md-2 col-md-offset-2'>
			<button type="submit" class="btn btn-danger submit">提交</button>
		</div>
	</div>
</form>


        </div>
	</div>

</div>
</body>
<script src="/js/jquery.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/bootstrap.editable.min.js"></script>

</html>
<?php }} ?>

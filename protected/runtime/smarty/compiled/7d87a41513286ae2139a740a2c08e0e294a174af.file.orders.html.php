<?php /* Smarty version Smarty-3.1.15, created on 2015-05-13 10:35:50
         compiled from "D:\work\express\src\protected\views\manage\orders.html" */ ?>
<?php /*%%SmartyHeaderCode:8583551130700b8a46-61398701%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7d87a41513286ae2139a740a2c08e0e294a174af' => 
    array (
      0 => 'D:\\work\\express\\src\\protected\\views\\manage\\orders.html',
      1 => 1431484546,
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
  'nocache_hash' => '8583551130700b8a46-61398701',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_551130700eb6d2_59668439',
  'variables' => 
  array (
    'val' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_551130700eb6d2_59668439')) {function content_551130700eb6d2_59668439($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\work\\express\\src\\protected\\vendor\\smarty\\plugins\\modifier.date_format.php';
?><!DOCTYPE html>
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
            
<h4 class="page-header">订单管理</h4>

<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>订单编码</th>
            <th>EMS编号</th>
            <th>寄件人</th>
            <th>寄件人电话</th>
            <th>寄件人邮编</th>
            <th>寄件人地址</th>
            <th>收件人姓名</th>
            <th>收件人电话</th>
            <th>收件人邮编</th>
            <th>收件人地址</th>
            <th>用户-包裹重量</th>
            <th>运输实际重量</th>
            <th>订单价格</th>
            <th>订单状态</th>
            <th>配送状态</th>
            <th>备注</th>
            <th>下单时间</th>
            <th>#</th>
        </tr>
    </thead>
    <tbody>
        <?php  $_smarty_tpl->tpl_vars['order'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['order']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['orders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['order']->key => $_smarty_tpl->tpl_vars['order']->value) {
$_smarty_tpl->tpl_vars['order']->_loop = true;
?>
        <tr>
            <td><!--<a href="/manage/orderGoods/<?php echo $_smarty_tpl->tpl_vars['order']->value['order_sn'];?>
"></a>--><?php echo $_smarty_tpl->tpl_vars['order']->value['order_sn'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['order']->value['ems_sn'];?>
</td>
            <td><!--<a href="/manage/sender/<?php echo $_smarty_tpl->tpl_vars['order']->value['sender_id'];?>
"></a>--><?php echo $_smarty_tpl->tpl_vars['order']->value['sender_realname'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['order']->value['sender_mobile'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['order']->value['sender_postcode'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['order']->value['sender_address'];?>
</td>
            <td><!--<a href="/manage/consignee/<?php echo $_smarty_tpl->tpl_vars['order']->value['consignee_id'];?>
"></a>--><?php echo $_smarty_tpl->tpl_vars['order']->value['consignee_realname'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['order']->value['consignee_mobile'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['order']->value['consignee_postcode'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['order']->value['consignee_address'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['order']->value['user_weight'];?>
 kg</td>
            <td><?php echo $_smarty_tpl->tpl_vars['order']->value['shipping_weight'];?>
 kg</td>
            <td>￥<?php echo $_smarty_tpl->tpl_vars['order']->value['amount'];?>
</td>
            <td><?php echo Yii::app()->params['order_status'][$_smarty_tpl->tpl_vars['order']->value['order_status']];?>
</td>
            <td><?php echo Yii::app()->params['shipping_status'][$_smarty_tpl->tpl_vars['order']->value['shipping_status']];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['order']->value['note'];?>
</td>
            <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['order']->value['add_time'],"%Y/%m/%d %H:%I:%S");?>
</td>
            <td><a href="/manage/process/<?php echo $_smarty_tpl->tpl_vars['order']->value['order_id'];?>
"><?php echo Yii::app()->params['order_do'][$_smarty_tpl->tpl_vars['order']->value['shipping_status']];?>
</a></td>
        </tr>
        <?php } ?>
    </tbody>

</table>
<?php $_smarty_tpl->tpl_vars["page"] = new Smarty_variable($_smarty_tpl->tpl_vars['this']->value->widget('application.widgets.WebPager',array('pages'=>$_smarty_tpl->tpl_vars['pages']->value)), null, 0);?>

<div class="modal fade showorder" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

        </div>
    </div>
</div>


        </div>
	</div>

</div>
</body>
<script src="/js/jquery.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/bootstrap.editable.min.js"></script>

</html>
<?php }} ?>

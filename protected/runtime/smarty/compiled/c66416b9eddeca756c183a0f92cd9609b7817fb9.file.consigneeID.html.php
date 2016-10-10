<?php /* Smarty version Smarty-3.1.15, created on 2015-05-13 15:03:23
         compiled from "D:\work\express\src\protected\views\manage\consigneeID.html" */ ?>
<?php /*%%SmartyHeaderCode:2625524bfbee8d833-45441097%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c66416b9eddeca756c183a0f92cd9609b7817fb9' => 
    array (
      0 => 'D:\\work\\express\\src\\protected\\views\\manage\\consigneeID.html',
      1 => 1431500593,
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
  'nocache_hash' => '2625524bfbee8d833-45441097',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5524bfbf0221e9_82725899',
  'variables' => 
  array (
    'val' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5524bfbf0221e9_82725899')) {function content_5524bfbf0221e9_82725899($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\work\\express\\src\\protected\\vendor\\smarty\\plugins\\modifier.date_format.php';
?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="renderer" content="webkit">
<title>收件人信息列表 - 商城管理中心</title>
<link rel="stylesheet" href="/style/bootstrap.min.css">
<link rel="stylesheet" href="/style/bootstrap.editable.css">
<link rel="stylesheet" href="/style/common.css">

<!--[if lt IE 9]>
<script src="/js/html5shiv.min.js"></script>
<script src="/js/respond.min.js"></script>
<![endif]-->


    <?php $_smarty_tpl->_capture_stack[0][] = array("cssfile", null, null); ob_start(); ?>
    datetimepicker.min
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
        	<h4 class="page-header">收件人信息列表</h4>
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
            
<div class="navbar navbar-default navbar-static">

    <form class="navbar-form row" role="search" method="get">
    
        <input type="text" name="realname" class="form-control" placeholder="请输入真实姓名" value="<?php echo $_smarty_tpl->tpl_vars['realname']->value;?>
" >
    	<input type="text" name="mobile" class="form-control" placeholder="请输入手机号码" value="<?php echo $_smarty_tpl->tpl_vars['mobile']->value;?>
">
        <input type="text" name="idcard" class="form-control" placeholder="请输入身份证号码" value="<?php if ($_smarty_tpl->tpl_vars['idcard']->value) {?><?php echo $_smarty_tpl->tpl_vars['idcard']->value;?>
<?php }?>">
        
        <button type="submit" class="btn btn-default">查找</button>
        
    </form>
</div>
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>收件人ID</th>
            <th>导出正面</th>
            <th>导出反面</th>
            <th>真实姓名</th>
            <th>手机号码</th>
            <th>身份证号码</th>
            <th>注册时间</th>
            <th>合并导出身份证</th>
            <th>#</th>
        </tr>
    </thead>
    <tbody>
    	<?php  $_smarty_tpl->tpl_vars['Con'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['Con']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Consignee']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['Con']->key => $_smarty_tpl->tpl_vars['Con']->value) {
$_smarty_tpl->tpl_vars['Con']->_loop = true;
?>
        <tr>
         <td><?php echo $_smarty_tpl->tpl_vars['Con']->value['consignee_id'];?>
</td>
         <td><a href="<?php echo Yii::app()->params['confirm'];?>
<?php echo $_smarty_tpl->tpl_vars['Con']->value['id_fg'];?>
" target="_blank">
         <img src="<?php echo Yii::app()->params['confirm'];?>
<?php echo $_smarty_tpl->tpl_vars['Con']->value['id_fg'];?>
" alt="" width="50px" height='50px' class="confirm" data-toggle="popover">
         	 </a></td>
         <td><a href="<?php echo Yii::app()->params['confirm'];?>
<?php echo $_smarty_tpl->tpl_vars['Con']->value['id_bg'];?>
" target="_blank">
         <img src="<?php echo Yii::app()->params['confirm'];?>
<?php echo $_smarty_tpl->tpl_vars['Con']->value['id_bg'];?>
" alt="" width="50px" height='50px' class="confirm" data-toggle="popover">
         	 </a></td>
         <td><?php echo $_smarty_tpl->tpl_vars['Con']->value['realname'];?>
</td>
         <td><?php echo $_smarty_tpl->tpl_vars['Con']->value['mobile'];?>
</td>
         <td><?php echo $_smarty_tpl->tpl_vars['Con']->value['idcard'];?>
</td>
         <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['Con']->value['add_time'],"%Y/%m/%d %H:%I:%S");?>
</td>
         <td><a href="/manage/mergerImg/<?php echo $_smarty_tpl->tpl_vars['Con']->value['consignee_id'];?>
" class="btn btn-default import" data-id="<?php echo $_smarty_tpl->tpl_vars['Con']->value['consignee_id'];?>
">导出身份证</a></td>
         <td><a href="/manage/delinfo/<?php echo $_smarty_tpl->tpl_vars['Con']->value['consignee_id'];?>
">删除</a></td>
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

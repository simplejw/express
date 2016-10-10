<?php /* Smarty version Smarty-3.1.15, created on 2015-05-06 10:17:37
         compiled from "D:\work\express\src\protected\views\site\register.html" */ ?>
<?php /*%%SmartyHeaderCode:3517551119c548cc76-88632727%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4d38b53aaa053a4a5a2130ae02e20b5555c11d60' => 
    array (
      0 => 'D:\\work\\express\\src\\protected\\views\\site\\register.html',
      1 => 1427079384,
      2 => 'file',
    ),
    'a20d8ce153226541c7843c992204c8b986b43513' => 
    array (
      0 => 'D:\\work\\express\\src\\protected\\views\\layouts\\site.html',
      1 => 1428737640,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3517551119c548cc76-88632727',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_551119c54fa284_73617183',
  'variables' => 
  array (
    'val' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_551119c54fa284_73617183')) {function content_551119c54fa284_73617183($_smarty_tpl) {?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>注册 - 澳洲第一快递</title>


    <?php $_smarty_tpl->_capture_stack[0][] = array("cssfile", null, null); ob_start(); ?>
    global,index
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
<div class="head w clearfix">
	<a href="/" class="logo fl mb10" tittle="澳洲第一快递">
	    <img src="style/logo.jpg">
	</a>
	<div class="fr fs16 bigfs mt50">
	<?php if (Yii::app()->session['uid']) {?><?php echo Yii::app()->session['name'];?>
, <a href="/logout">退出登录</a><?php } else { ?><a href="/register">会员注册</a> / <a href="/login">会员登录</a><?php }?>
	</div>
</div>
<div class="nav wout main_nav over_visi">
    <div class="w pr">
        <ul class="main_nav_a">
            <li>
                <a href="/" class="on index">首页</a>
            </li>
            <li>
                <a href="/uploadid" title="上传证件">上传证件</a>
            </li>
            <li>
                <a href="/guide" title="上传证件">邮寄指南</a>
            </li>
            <li>
                <a href="/" title="会员中心">会员中心</a>
            </li>
            <li>
                <a href="/" title="在线下单">在线下单</a>
            </li>
            <li class="m0">
                <a href="/" title="联系我们">联系我们</a>
            </li>
        </ul>
	</div>
</div>

<?php $_smarty_tpl->tpl_vars["error"] = new Smarty_variable(Yii::app()->user->getFlash("error"), null, 0);?>
<?php if ($_smarty_tpl->tpl_vars['error']->value) {?><p><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</p><?php }?>
<form action="" method="post">
<div class="regist_box w">
   <div class="regist_tit">会员注册</div>
   <div class="regist_form">
     <div class="regist_item">
         <span>邮箱注册: </span>
         <input class="form_txt" type="email" name="data[email]">
     </div>
    <div class="regist_item">
         <span>手机号码: </span>
         <input class="form_txt" type="text" name="data[mobile]">
    </div>
    <div class="regist_item">
         <span>密码: </span>
         <input class="form_txt" type="password" name="data[password]">
    </div>
    <div class="regist_item">
         <span>确认密码: </span>
         <input class="form_txt" type="password" name="data[apassword]">
    </div>
    <div class="regist_item mt30">
         <button class="regist_btn">注册<s></s></button>
         <a class="color_b ml20" href="#">已注册？</a>
    </div>
 </div>
</div>
</form>

<div class="tac mt100 mb20 gc9 wout">
        <p><a target="_blank" rel="nofollow" href="/">关于澳洲 </a>|
        <a target="_blank" rel="nofollow" href="/">联系我们 </a>|
        <a target="_blank" rel="nofollow" href="/">网站地图 </a>|
        <a target="_blank" rel="nofollow" href="/">服务条款 </a></p>
        <p>版权所有 Copyright
        <font clsaa="numfs">©</font>
        2015 AuFirstExpress 澳洲第一快递 All Right Reserved</p>
    </div>
</div>
</body>
<script src="http://static.axmall.com.au/js/lib/do.js"></script>


<script>

</script>

</html>
<?php }} ?>

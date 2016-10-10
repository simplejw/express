<?php /* Smarty version Smarty-3.1.15, created on 2015-05-18 10:52:03
         compiled from "D:\work\express\src\protected\views\site\upload.html" */ ?>
<?php /*%%SmartyHeaderCode:7005550fa5d02bd105-81616926%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cc2176ceb72d64dfb3490d12a4c6e21ec1a9a441' => 
    array (
      0 => 'D:\\work\\express\\src\\protected\\views\\site\\upload.html',
      1 => 1431912568,
      2 => 'file',
    ),
    'a20d8ce153226541c7843c992204c8b986b43513' => 
    array (
      0 => 'D:\\work\\express\\src\\protected\\views\\layouts\\site.html',
      1 => 1431498824,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7005550fa5d02bd105-81616926',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_550fa5d033a125_57341556',
  'variables' => 
  array (
    'val' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_550fa5d033a125_57341556')) {function content_550fa5d033a125_57341556($_smarty_tpl) {?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>上传身份证 - 澳洲第一快递</title>


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


<div class="row">
	<?php if (Yii::app()->user->hasFlash('error')) {?>
		<div class="alert alert-danger alert-dismissible fade in text-center" role="alert">
	      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
	     <?php echo Yii::app()->user->getFlash('error');?>

	    </div>
	<?php }?>
</div>

<div class="middle w clearfix">
	<form action="/track" method="post">
    	<input type="hidden" name="next" value="index"/>
	        <div class="goods fl ">
	            <div class="mt15 bigfs fs18 fw">货物追踪</div>
	            <div class="mt10">
	                <textarea name="date[track]"></textarea>
	            </div>
	            <div class="mt10">
	                <div class="fl gc6">
	                    <span>验证码：</span>
	                    <input type="text" name="date[captcha]" class="yzm" />
	                    <img src="/captcha" class="captcha_img"/>
	                </div>
	                <div class="fr">
	                    <button style="submit" class="btn">查询<s></s></button>
	                </div>
	            </div>
	            <div class="blank20"></div>
	            <div class="mt20" style="text-indent:2em;">
	            	您也可以将收件人身份证正面和反面照片直接发至我司专设邮箱：id@arkexpress.com.au（同一收件人只需上传一次）<br/>
邮件标题：您的运单号码和收件人姓名。<br/>

邮件附件：身份证正面照片（命名为：您的身份证号码-1）；身份证反面照片（命名为：您的身份证号码-2）。<br/>

身份证文件较大时，可能导致上传较慢，请您尽可能将身份证文件控制在500k以内，同一姓名订单，可以多单号一次上传，运单号用空格分开即可 例如 AFE00041320 AFE00041320
	            </div>
	        </div>
       </form> 
 <form action="/uploadid" method="post" id="uploadcard_form">   
	<div class="upload fr">
		<div class="mt20 bigfs fs18 fw">邮寄流程</div>
		<div class="line mt10"></div>
		<div class="mt20">
			<p>1、因国际物流，请务必提供身份证报关专用</p>
			<p>2、为保护隐私，证件图片自动添加水印，不会对您的身份信息做记录和保留 </p>
			<p>3、请务必按照本网页内图片事例上传收件人的二代身份证图片，保存清晰，横放，不符合规范的图片将影响包裹寄出，感谢您的配合</p>
		</div>
		<div class="mt30 clearfix" id="person_info">
			<div class="fl gc6 mr25 clearfix">
				<span>收件人：</span>
				<input type="text" class="sjr"  name="data[realname]"/>
			</div>
			<div class="fl mr25 gc6">
				<span>电话：</span>
				<input type="text"class="dh" name="data[mobile]"/>
			</div>
			<div class="fl mr25 gc6">
				<span>身份证号码：</span>
				<input type="text" class="sfz" name="data[idcard]" placeholder="长度不能超过18位" maxlength="18"/>
			</div>
		</div>
		<div class="mt20 foruploadcard">
			<div class="sc fl">
				<div class="mt10 fk" id="upload_fg_img">
				</div>
				<div class="tac mt5 pr uploadimg">
					<button class="btn"  type="button" id="upload_fg">上传身份证正面<s></s></button>
				</div>
				<p class="tal mt5">仅支持jpg、jpeg、png格式，文件小于2M</p>
			</div>
            <div class="sc fl ml70 mt10">
            	<img src="style/zm.jpg"/>
            </div>
		</div>
        <div class="mt20 foruploadcard">
			<div class="sc fl">
				<div class="mt10 fk" id="upload_bg_img">
				</div>
				<div class="tac mt5 pr uploadimg">
					<button class="btn"  type="button" id="upload_bg">上传身份证反面<s></s></button>
				</div>
				<p class="tal mt5">仅支持jpg、jpeg、png格式，文件小于2M</p>
			</div>
            <div class="sc fl ml70 mt15">
            	<img src="style/bm.jpg"/>
            </div>
		</div>
		<input type="hidden" value="" id="upload_fg_val" name="data[id_fg]"/>
		<input type="hidden" value="" id="upload_bg_val" name="data[id_bg]"/>
		<div>
            <button style="submit" id="idcard_submit" class="btn">提交<s></s></button>
        </div>
	</div>
</form>
</div>
<div id="mongolia-layer">
</div>
<div id="loading">
	<span></span>正在上传....
</div>

<div class="tac mt100 mb20 gc9 wout">
        <p><a target="_blank" rel="nofollow" href="/">关于澳洲 </a>|
        <a target="_blank" rel="nofollow" href="/">联系我们 </a>|
        <a target="_blank" rel="nofollow" href="/">网站地图 </a>|
        <a target="_blank" rel="nofollow" href="/">服务条款 </a>|
	<a href="http://m.kuaidi100.com" target="_blank">快递查询</a>
        版权所有 Copyright
        <font clsaa="numfs">©</font>
        2015 AuFirstExpress 澳洲第一快递 All Right Reserved</p>
    </div>
</div>
</body>
<script src="http://static.axmall.com.au/js/lib/do.js"></script>


<script src="/js/upload.js"></script>

</html>
<?php }} ?>

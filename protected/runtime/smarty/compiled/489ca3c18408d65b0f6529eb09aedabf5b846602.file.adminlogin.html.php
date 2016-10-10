<?php /* Smarty version Smarty-3.1.15, created on 2015-03-24 17:19:39
         compiled from "D:\work\express\src\protected\views\site\adminlogin.html" */ ?>
<?php /*%%SmartyHeaderCode:2354655112c2b8f6b02-83548494%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '489ca3c18408d65b0f6529eb09aedabf5b846602' => 
    array (
      0 => 'D:\\work\\express\\src\\protected\\views\\site\\adminlogin.html',
      1 => 1427186506,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2354655112c2b8f6b02-83548494',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_55112c2b915f03_59449303',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55112c2b915f03_59449303')) {function content_55112c2b915f03_59449303($_smarty_tpl) {?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>登录 - 商城管理中心</title>
<link rel="stylesheet" href="/style/admin/bootstrap.min.css">
<link rel="stylesheet" href="/style/admin/common.css">

<!--[if lt IE 9]>
<script src="/js/html5shiv.min.js"></script>
<script src="/js/respond.min.js"></script>
<![endif]-->


        
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="row head">
            <div class="col-xs-2 logo"></div>
            <div class="col-xs-6"></div>
                    </div>
    </div>
</div>
<div class="container-fluid">

<div class="container">
	<div class="page-header">
	  <h1>用户登录 </h1>
	</div>
	    	<form class="form-horizontal" role="form" method="post">
		<div class="form-group">
			<label for="username" class="col-sm-2 control-label">用户名</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" name="username" id="username">
			</div>
		</div>
		<div class="form-group">
			<label for="password" class="col-sm-2 control-label">密码</label>
			<div class="col-sm-4">
				<input type="password" class="form-control" id="password" name="password">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-4">
				<button type="submit" class="btn btn-danger">登录</button>
			</div>
		</div>
	</form>
</div>

</div>
</body>
<script src="/js/jquery.js"></script>
<script src="/js/bootstrap.min.js"></script>

</html><?php }} ?>

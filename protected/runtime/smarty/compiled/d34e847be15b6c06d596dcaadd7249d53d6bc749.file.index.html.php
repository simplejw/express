<?php /* Smarty version Smarty-3.1.15, created on 2016-08-30 10:39:13
         compiled from "D:\work\express\protected\views\site\index.html" */ ?>
<?php /*%%SmartyHeaderCode:2548957c4f1d11b1b16-39597576%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd34e847be15b6c06d596dcaadd7249d53d6bc749' => 
    array (
      0 => 'D:\\work\\express\\protected\\views\\site\\index.html',
      1 => 1431392399,
      2 => 'file',
    ),
    'd2ff9d2562ea390efbd6a28f0e995a3f931c46cf' => 
    array (
      0 => 'D:\\work\\express\\protected\\views\\layouts\\site.html',
      1 => 1431498824,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2548957c4f1d11b1b16-39597576',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'val' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_57c4f1d18f7323_83864702',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57c4f1d18f7323_83864702')) {function content_57c4f1d18f7323_83864702($_smarty_tpl) {?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>首页 - 澳洲第一快递</title>


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

<div class="banner w">
        <a>
            <img src="style/banner.jpg"/>
        </a>
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
				<?php  $_smarty_tpl->tpl_vars['da'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['da']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['da']->key => $_smarty_tpl->tpl_vars['da']->value) {
$_smarty_tpl->tpl_vars['da']->_loop = true;
?>
					<dl>
						<dt class="fw"> <?php echo $_smarty_tpl->tpl_vars['da']->value['title'];?>
 </dt>
						<dd> <?php echo $_smarty_tpl->tpl_vars['da']->value['content'];?>
 </dd>
					</dl>
				   <div class="blank10"></div>
				<?php } ?>
	        </div>  
       </form> 
        <div class="flow fr">
            <div class="mt15 bigfs fs18 fw">邮寄流程</div>
            <ul>
                <li>
                    <a href="/" target="_blank">
                        <img src="style/khxd.jpg"/>
                    </a>
                        <p>客户下单  >></p>
                </li>
                <li>
                    <a href="/" target="_blank">
                        <img src="style/jcdb.jpg"/>
                    </a>
                    <p>检查打包  >></p>
                </li>
                <li>
                    <a href="/" target="_blank">
                        <img src="style/wlps.jpg"/>
                    </a>
                    <p>物流配送  >></p>
                </li>
                <li>
                    <a href="/" target="_blank">
                        <img src="style/zghg.jpg"/>
                    </a>
                    <p>中国海关  >></p>
                </li>
                <li>
                    <a href="/" target="_blank">
                        <img src="style/zzgyz.jpg"/>
                    </a>
                    <p>转中国邮政  >></p>
                </li>、
                <li>
                    <a href="/" target="_blank">
                        <img src="style/khqs.jpg"/>
                    </a>
                    <p>客户签收  >></p>
                </li>
            </ul>
            <div class="blank-separator"></div>
           <h3 class="post_titl"><span class="bigfs">寄件须知 </span></h3>
           <p style="text-indent:2em; margin-top:10px;">
                <strong>申报要求</strong>
           </p>
           <ul style="margin-left:5em; height:250px;">
                <li style="list-style-type:disc;">邮寄一箱物品价值不超过人民币1000元，折算成澳币以实际汇率为准。</li>
                <li style="list-style-type:disc;">邮寄一箱物品总数不能超过20个，同一物品个数不能超过10个。</li>
                <li style="list-style-type:disc;">务必准确完整真实地提供内件货物的品牌、容量以及数量，这样可以提高清关速度。如果没有任何具体信息，那么货物的时效将会受到影响。</li>
                <li style="list-style-type:disc;">奶粉类（无论袋装或罐装）3件或3件以上，请务必与其他物品分开，单独邮寄。如2件奶粉以下可与其他物品同寄，并在填写快递面单时，在“内容详细说明”一栏写清物品的品牌，规格，容量，数量。</li>
                <li style="list-style-type:disc;">建议广大顾客，在你邮寄S-26与袋装奶粉时我们<span style="color:red;">建议您使用保鲜膜在外面裹上一圈</span>，再放入纸箱中，保证您的奶粉如产生爆罐/袋您的奶粉还是能正常食用。如你邮寄的是易碎物品，我们建议您先单独用袋子装起来，再放入箱子，保证易碎品破了不会将您其它物品弄脏。</li>
                <li style="list-style-type:disc;">在奶粉包装上我们<span style="color:red;">建议您单独用袋子装好在放入箱子</span>，以免产生爆罐（袋）使国内快递公司无法承运。</li>
          </ul><br />
          <p style="text-indent:2em;">
             <strong>货物打包规则</strong>
          </p>
          <ul style="margin-left:5em; height:250px;">
                <li style="list-style-type:disc;">邮寄一箱物品价值不超过人民币1000元，折算成澳币以实际汇率为准。</li>
                <li style="list-style-type:disc;">邮寄一箱物品总数不能超过20个，同一物品个数不能超过10个。</li>
                <li style="list-style-type:disc;">务必准确完整真实地提供内件货物的品牌、容量以及数量，这样可以提高清关速度。如果没有任何具体信息，那么货物的时效将会受到影响。</li>
                <li style="list-style-type:disc;">奶粉类（无论袋装或罐装）3件或3件以上，请务必与其他物品分开，单独邮寄。如2件奶粉以下可与其他物品同寄，并在填写快递面单时，在“内容详细说明”一栏写清物品的品牌，规格，容量，数量。</li>
                <li style="list-style-type:disc;">建议广大顾客，在你邮寄S-26与袋装奶粉时我们<span style="color:red;">建议您使用保鲜膜在外面裹上一圈</span>，再放入纸箱中，保证您的奶粉如产生爆罐/袋您的奶粉还是能正常食用。如你邮寄的是易碎物品，我们建议您先单独用袋子装起来，再放入箱子，保证易碎品破了不会将您其它物品弄脏。</li>
                <li style="list-style-type:disc;">在奶粉包装上我们<span style="color:red;">建议您单独用袋子装好在放入箱子</span>，以免产生爆罐（袋）使国内快递公司无法承运。</li>
        </ul><br />
         <p style="text-indent:2em;">                         
            <strong>邮寄行李要求</strong>
         </p>
         <p style="text-indent:2em; margin-left:2em;">
              总体重量没有限制,但是每件包裹请不要超过40公斤,25公斤以上，EMS不送货上门，收件人需持有效身份证件到指定EMS网点提货。如果您同时邮寄一定量的保健品和护肤品,请将这些产品另行包装与申报。
          </p>
          <p style="text-indent:2em;">
             <strong>邮寄电子产品要求</strong>            
         </p>
         <p style="padding-left:2em; margin-left:2em;">
            电子产品属于中国海关严格控制的进口物品, 是属于不予免税的物品。<br>
            我司暂不承运任何电子产品。<br>             
        </p>
         <p style="text-indent:2em;">
             <strong>邮寄化妆品、保健品、奶粉要求</strong>            
         </p>
         <p style="text-indent:2em; margin-left:2em;">
              建议奶粉是6罐一个包装,保健品一个包装不超过8公斤。<br>
          </p>
          <p style="text-indent:2em; margin-left:2em;">
              中国海关入境申报的课税的依据是货件的自身的申报价值。其原则性规定为
          </p>
          <ol style="margin-left:4em;">
            <li>境外邮递包裹价值不能超过1000元人民币,否则会转入贸易申报或者退运,除非这件邮递物品是一件而且整体不可分割。</li>
            <li>个人邮递物品免税额度是50元人民币。</li>
          </ol><br />
          <p style="text-indent:2em; margin-left:2em;">
             此外，理论上液体类别、粉末类别国内航空是不允许上飞机的，所以个别时候您的液体类、粉末类(奶粉)有可能被机场安检要求下线，这个时候第一快递可能在国内派送安排陆运的方式递送您的包裹。
          </p>
        </div>
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


<script>

</script>

</html>
<?php }} ?>

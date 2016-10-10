<?php /* Smarty version Smarty-3.1.15, created on 2015-05-07 13:22:52
         compiled from "D:\work\express\src\protected\views\site\guide.html" */ ?>
<?php /*%%SmartyHeaderCode:20190550fa5cc96b346-89121690%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ab63d389a4f25add3bccab887c4dada281c835a4' => 
    array (
      0 => 'D:\\work\\express\\src\\protected\\views\\site\\guide.html',
      1 => 1430976056,
      2 => 'file',
    ),
    'a20d8ce153226541c7843c992204c8b986b43513' => 
    array (
      0 => 'D:\\work\\express\\src\\protected\\views\\layouts\\site.html',
      1 => 1428737640,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20190550fa5cc96b346-89121690',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_550fa5cc9e8361_36686044',
  'variables' => 
  array (
    'val' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_550fa5cc9e8361_36686044')) {function content_550fa5cc9e8361_36686044($_smarty_tpl) {?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>邮寄指南 - 澳洲第一快递</title>


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
	                    <img src="/captcha"/>
	                </div>
	                <div class="fr">
	                    <button style="submit" class="btn">查询<s></s></button>
	                </div>
	            </div>
	        </div>
       </form> 
        
        <div class="flow fr mt30">
           <a name="s1"><h3 class="section-title " style="font-weight:bold;"><span class="bigfs">第一快递契约 </span></h3></a>
           <div class="color_7d">
              <p style="text-indent:2em;">
                <strong>1、［运单］本运单为第一快递运输业务专用，本运单的签署代表寄递运输协议的订立，发件人经在本运单正面签字确认或实际履行委托义务，即视为已明确理解和同意运单中所列各项条款，该面单正面内容及本契约对双方均具有约束力。</strong>
              </p>

              <p style="text-indent:2em;">
                <strong>2、［双方责任］承运人第一快递有限公司为客户提供专业，安全，快捷的寄递服务。发件人必须在运单上准确，详细地填写各项相关内容，并保证托运货物不属于以下范畴：危险品，易碎品，液态物品；信件和其他具有信件性质的物品；国家明文规定禁运的物品；有价证券，增值税发票，现金或首饰等贵重物品。如发件人对托寄物品自行包装，必须保证托寄物品包装妥善，令能安全运送。</strong>
                            
              </p>

              <p style="text-indent:2em;">
                <strong>3、［免责条款及承运人权利］如发生以下事项，承运人不承担任何赔偿责任：</strong>
              </p>
              <ol style="margin-left:6em;">
                  <li>因战争，暴乱，坠机，重大交通事故以及台风，洪水，地震等各类自然灾害造成的物品损毁以及遗失；</li>
                  <li>因为发件人填写的收件地址错误，字迹潦草，无法确认，或收件人地址变更等导致物品无法送达的；</li>
                  <li>发件人自行包装托寄物品，运达时发现物品遗失或损坏的；</li>
                  <li>发件人交寄的物品违反本契约第2条规定的；</li>
                  <li>本公司有权保留，拒绝及放弃运载任何人或任何公司之物品及对运载过程中之延误，均不做任何保证及承担相应的责任。</li>
              </ol>
              <br>
              <p style="text-indent:2em;">
                <strong>4、［轻抛，大体积物的重量计算］如托运物属于轻抛货品（即为体积大重量轻的货品），则以能容纳该货品的纸箱的规格作为计算重量的依据。具体计算公式为：货品重量（公斤数）＝纸箱长（厘米）x纸箱宽（厘米）x纸箱高（厘米）／4000。</strong>             
              </p>
              <p style="text-indent:2em;">
                <strong>5、［保险］基于国际运输的客观风险，为避免事后争执，特建议发件人向第一快递有限公司声明货品价值并按照货品价值的5％购买保险，即为在正常运费的基础之上，按照货品价值的5％支付保险费，托运货品价值的上限为AUD$2000，保险费应在办理物品交寄手续时当场支付，未支付保险费的视为未投保。</strong>
              </p>

              <p style="text-indent:2em;">
                <strong>6、［赔偿条款］</strong>
              </p>
              <ol style="margin-left:6em;">
                  <li>任何索赔均应在物品交寄后30天内（以此运单的签收日期为准）由发件人以书面的形式提出，同时必须出具本单收件人联原件及运费支付凭证，否则视为放弃索赔权；</li>
                  <li>对于投保货物之整票丢失，按照实际损失，在不超过货品价值金额的范围内赔偿；如果只是丢失其中某件，则按照平均重量承担有限的赔偿责任；</li>
                  <li>货物破损的状况不在保险及赔偿的范围内；</li>
                  <li>未投保的物品，如丢失，扣关，承运人最高赔偿每票不超过AUD$100。货物因运输延误而引起的间接经济损失，不在保险范围之内。</li>
              </ol>
              <br>
              <p style="text-indent:2em;">
                <strong>7、［留置权］如发生拖欠运费及相关费用，承运人有权留置承运的物品，直至发件人提供相应担保或付清欠款，由此产生的损失由收件人承担。</strong>
              </p>
                        
              <p style="text-indent:2em;">
                <strong>8、［异常状况的处理］在运输的过程中，若有关部门（如海关）对货物有异议，货物被扣留或惩罚，则均由发件人负责处理。发件人需提供有效的货物文件或相关部门的证件对货物的状况进行解释及说明，并承担由此给承运人带来的经济损失。</strong>
              </p>
              <p style="text-indent:2em;">
                <strong>9、［补充协议］发件人与承运人可以另行订立补充协议对本契约进行补充，修改。</strong>
              </p>
              <p style="text-indent:2em;">
                <strong>10、［解释权］第一快递有限公司保留对本契约的最终解释权。</strong>
              </p>
           </div>
           <a name="s2"><h3 class="section-title" style="font-weight:bold;"><span>面单填写要求 </span></h3></a>
           <p style="text-indent:2em;font-weight:bold;">
            请务必在每张快递单的“内容详细说明(Name &amp; Description of Content)”栏里写清楚该邮件中所有货物的：
          </p>
           <ol style="margin-left:6em;" type="a">
                <li>品牌（例：Karicare, Blackmores，Jurlique等）</li>
                <li>名称（例：奶粉，鱼油，草本再生精华等）</li>
                <li>含量（例：900g，180粒，100ml等）</li>
                <li>数量（例：6罐，2瓶等）</li>
           </ol><br />
           <p style="text-indent:2em;font-weight:bold;">
            若一箱货中有多种不同的物品，务必分别且详细列出各项物品的品牌，名称，含量及其数量，例：
          </p>
          <ol style="margin-left:6em;" type="a">
                  <li>Karicare奶粉 900g X 6罐&nbsp;</li>
                  <li>Caleetale 绵羊油 100g X 6瓶</li>
                  <li>Blackmores 鱼油 180粒 X 6瓶</li>
                  <li>Abcde 羊毛被 Queen Size X 1条 (棉被必须注明品牌和规格)</li>
                  <li>Jurlique 草本再生精华 100ml X 1瓶</li>
           </ol><br />
           <p style="text-indent:2em;font-weight:bold;">
            *注：请一定按照上述规则书写面单物品。若客人没有详细如实申报货物的品牌，名称，含量以及数量；那么，出现扣关等特殊情况时，责任由客人自行承担。
          </p><br />
          <a name="s3"><h3 class="section-title" style="font-weight:bold;"><span>打包要求 </span></h3></a>
          <p style="text-indent:2em;font-weight:bold;">
            关于物品的打包，您可以选择自行打包送至发货点，也可选择由我们公司负责打包(需收取包装费)。如果您选择自己打包,需注意以下事项：
          </p>
          <ol style="margin-left:6em;">
                <li>请用厚实的纸箱进行包装，如果箱子和托运物品间的空隙很大，请加入适当的填充物，诸如报纸，塑料泡沫等。</li>
                <li>请勿将禁止邮寄的物品装入包装箱，禁止邮寄物品的具体种类请参见禁运物品板块。</li>
                <li>请勿在一个包装箱里装入过多的物品，造成超重的状况。一般情况下，个人行李一个包装不超过40公斤（25公斤以上，EMS不送货上门，收件人需持有效身份证件自行到指定网点提货），保健品和化妆品一个包装不超过8公斤，电子产品一个包装不超过5公斤。</li>
                <li>您可以自己封箱，但请提供托运物品的详单，写明物品种类以及物品数量。物品种类及物品数量必须准确无误，如果在通关抽检中发现详单中的物品与实际物品不符，产生的一切后果自行负责，罚款在$200到$2000之间，第一快递保留最终解释权。</li>
           </ol><br />
           <a name="s4"><h3 class="section-title" style="font-weight:bold;"><span>禁运物品 </span></h3></a>
           <p style="text-indent:2em;font-weight:bold;">
            禁运物品包括：
          </p>
          <ol style="margin-left:6em;" type="1">
              <li>难以估算价值的有价证券及易丢失的贵重物品，如：提货单、核销单、护照、配额证、许可证、执照、私人证件、汇票、发票、本国或外国货币（现金）、金银饰物、人造首饰。</li>
              <li>易燃易爆、腐蚀性、毒性、强酸碱性和放射性的各种危险品，如：火柴、雷管、火药、爆竹、汽油、柴油、煤油、酒精（液体和固体）、硫酸、盐酸、硝酸、有 机溶剂、农药等化工产品。</li>
              <li>威胁航空飞行安全的物品，指在航空运输中，可能明显地危害人身健康、安全或对财产造成损害的物品或物质。 主要有以下几类：
                  <ol style="margin-left:2em;" type="A">
                      <li>爆炸品：如烟花爆竹、起爆引信等。</li>
                      <li>气体：如压缩气体、干冰、灭火器、蓄气筒(无排放装置，不能再充气的)、救生器(可自动膨胀的)等。</li>
                      <li>易燃液体：如油漆、汽油、酒精类、机油、樟脑油、发动机起动液、松节油、天拿水、胶水等。</li>
                      <li>易燃固体：自燃物质，遇水释放易燃气体的物质，如活性碳、钛粉、蓖麻制品、橡胶碎屑、安全火柴(盒擦的或片擦的)、干燥的白磷、干燥的黄磷、镁粉等。</li>
                      <li>氧化剂和有机过氧化物：如高锰酸钾。</li>
                      <li>毒性和传染性物品：如农药、锂电池、催泪弹等。</li>
                      <li>放射性物质。</li>
                      <li>腐蚀品：如蓄电池、碱性的电池液。</li>
                      <li>未加消磁防护包装的磁铁、磁钢等含强磁的制品。</li>
                  </ol>
              </li>
              <li>各类烈性毒药、麻醉药物和精神物品，如：砒霜、鸦片、吗啡、可卡因、海洛英、大麻等。</li>
              <li>国家法令禁止流通或寄运的物品，如：文物、武器、弹药、仿真武器等。</li>
              <li>含有反动、淫秽或有伤风化内容的报刊书籍、图片、宣传品、音像制品，激光视盘（VCD、DVD、LD）、计算机磁盘及光盘等。</li>
              <li>妨碍公共卫生的，如尸骨（包括已焚的尸骨）、未经硝制的兽皮、未经药制的兽骨等。</li>
              <li>动物、植物以及它们的标本。</li>
              <li>难以辨认成分的白色粉末。</li>
              <li>私人信函等。</li>
           </ol><br />
            <a name="s5"><h3 class="section-title" style="font-weight:bold;"><span>理赔条款 </span></h3></a>
            <p style="text-indent:2em;">
            <strong>保险及赔偿须知</strong>
            </p>
            <p style="text-indent:2em;">
            保险按照货品价值的5%支付保险费，托运物品价值的上限位AUD2,000，保险费应在办理物品交寄手续时当场支付，未支付保险费的视为未投保。
            </p>
            <p style="text-indent:2em;">
            保险保丢不保损。保险只赔偿物品价值，不包含运费。
           </p>
           <p style="text-indent:2em;">
            <strong>赔偿条款公告：</strong>
          </p>
          <ul style="margin-left:6em; height: 70px;">
              <li style="list-style-type:disc;">若客人收到货物时，外包装箱无破损，一概不予赔偿。</li>
              <li style="list-style-type:disc;">若因客人包装不妥善造成货物损坏，一概不予赔偿。（以货物包装箱内部照片为证）</li>
              <li style="list-style-type:disc;">客人在邮寄货物时，请务必保留有效的购物凭证（购物小票原件，复印件，照片，以及任何形式的有效的购物凭证均可）。保险金额必须在交付所寄物品的同时，同运费一起付清。</li>
          </ul><br />
          <p style="text-indent:2em;">
            未购买保险的物件，若寄件丢失，本公司将根据运单存档记录以及购物凭证进行相对应的赔偿,最高赔偿金额为每票货物AUD$100。理赔方法如下：
          </p>
          <ul style="margin-left:6em;">                                          
              <li style="list-style-type:disc;">1、保健品：每公斤以AUD$20(含运费)</li><br />
              <li style="list-style-type:disc;">2、6罐装奶粉一箱：AUD$100(含运费)</li><br />
              <li style="list-style-type:disc;">3、成人袋装奶粉:AUD$12/每袋（含运费）</li>
          </ul>
          <p style="text-indent:2em;">
            购买了保险的物件，在提供运单存档、购物小票凭证及保险凭证后，按实际损失在报价金额范围内协商赔偿。
          </p>
          <p style="text-indent:2em;">
            第一快递公司保留对本理赔条款的最终解释权。
          </p>
           <a name="s6"><h3 class="section-title" style="font-weight:bold;"><span>寄件须知 </span></h3></a>
           
          <p style="text-indent:2em;">
             <strong>货物打包规则</strong>
          </p>
          <ul style="margin-left:6em; height: 180px;">
              <li style="list-style-type:disc;">请尽量准确完整真实地提供内件货物的品牌、容量以及数量，这样可以提高清关速度。如果没有任何具体信息，那么货物的时效将会受到影响。</li>
              <li style="list-style-type:disc;">奶粉类（无论袋装或罐装）4件或4件以上，请务必与其他物品分开，单独邮寄。如4件奶粉以下可与其他物品同寄，并在填写快递面单时，在“内容详细说明”一栏写清物品的品牌，规格，容量，数量。</li>
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
              电子产品无论新旧，都会被征收关税。<br>
              电子产品征收关税的幅度是中国海关评估价值的20%-30%，您可以在邮递的时候委托我司代收。<br>
              第一快递要求每个包裹不能超过1件电子产品。
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

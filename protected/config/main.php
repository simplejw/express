<?php
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'EXPRESS',
	'timeZone' => 'Asia/ShangHai',
	'language' => 'zh_cn',
	'preload'=>array('log'),
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),
	'defaultController'=>'site/index',
	'components'=>array(
		'viewRenderer'=>array(
			'class'=>'application.extensions.yiiext.renderers.smarty.ESmartyViewRenderer',
			'fileExtension' => '.html',
		),
		'db'=>array(
			'connectionString' => 'mysql:host=;dbname=express',
			'schemaCachingDuration' => 3600,
			'emulatePrepare' => true,
			'enableParamLogging' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		'cache'=>array(
			'class'=>'system.caching.CApcCache',
		),
		'memcache' => array(
            'class' => 'system.caching.CMemCache',
            'hashKey' => false,
            'keyPrefix' => '',
			'servers' => array(
				array('host' => '', 'port' => 11211),
            ),
        ),
		 'request' => array(
        	'enableCsrfValidation' => false,
    	),
		'errorHandler'=>array(
			'errorAction'=>'site/error',
		),
		'urlManager'=>array(
			'showScriptName'=>false,
			'urlFormat'=>'path',
			'rules'=>array(
				'/' => 'site/index',
				'/track' => 'site/track',
				'/uploadid' => 'site/uploadid',
				'/guide' => 'site/guide',
				'/contact' => 'site/contact',
				'/register' => 'site/register',
				'/login' => 'site/login',
				'/logout' => 'site/logout',
				'/resetpwd' => 'site/resetpwd',
				'/captcha' => 'site/captcha',
				
				'/ajax/upload' => 'ajax/upload',
				'/site/ajaxup' => 'site/ajaxup',
				/* 用户后台 */
				'/account' => 'account/index',
				'/account/pwd' => 'account/pwd',
				'/account/sender' => 'account/sender',
				'/account/sender/done' => 'account/donesender',
				'/account/sender/del' => 'account/delsender',
				'/account/consignee' => 'account/consignee',
				'/account/consignee/done' => 'account/doneconsignee',
				'/account/consignee/del' => 'account/delconsignee',
				'/account/order' => 'account/order',
				'/account/order/add' => 'account/addorder',
				
				/* 管理后台 */
				'/manage' => 'manage/index',
				'/manage/login' => 'site/adminLogin',
				'/manage/edit/<account_id:\d+>'=>'manage/edit',
				'/manage/orderLog/<order_id:\d+>'=>'manage/orderLog',
				'/manage/orderGoods/<order_sn:\d+>'=>'manage/orderGoods',
				'/manage/consignee/<consignee_id:\d+>'=>'manage/consignee',
				'/manage/sender/<sender_id:\d+>'=>'manage/sender',
				'/manage/pwd' => 'manage/pwd',
				'/manage/user' => 'manage/user',
				'/manage/orders' => 'manage/orders',
				'/manage/process/<order_id:\d+>'=>'manage/process', //处理物流
				'/manage/delinfo/<order_id:\d+>'=>'manage/delinfo', //删除收件人信息
				
				'/manage/news' => 'manage/news',
				'/manage/addnews' => 'manage/addnews',
				'/manage/editNews/<news_id:\d+>' => 'manage/editNews',
				'/manage/delNews/<news_id:\d+>' => 'manage/delNews',				
				
				/*下载图片*/
				'/manage/mergerImg/<consignee_id:\d+>' => 'manage/mergerImg',
				'/manage/download/<consignee_id:\d+>'=>'manage/download',
				'/manage/downloadBG/<consignee_id:\d+>'=>'manage/downloadBG',
				
			),
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning,info',
				),
				array(
					 'class' => 'CWebLogRoute',
					 'levels' => 'profile,trace',
					 'categories'=>'system.db.*',
					 'showInFireBug'=>true,
				), 
			),
		),
	),
	'params'=>array(
		'allowtype' => array('jpg', 'gif', 'png', 'jpeg'),
		'hashkey' => '~`!*&$@#@2014!@#%',
		'split' => array(
							'forex' => 4.9,			//汇率
							'amount' => 1000,		//每包裹不能超过1000块
							'number' => 20,			//每包裹商品不能超过20个
							'same_number' => 10,	//每包裹同一商品不能超过10个
						),
						
		'confirm' => '', //订单身份确认信息
		
		'order_status' => array('0'=>'未提交', '1'=>'已提交', '2'=>'已确认', '3'=>'已取消'),
		
		'shipping_status' => array('0'=>'无状态', '1'=>'打包中', '2'=>'已打包', '3'=>'空运中', '4'=>'已到海关',
								   '5'=>'清关中', '6'=>'已转EMS', '7'=>'派送中', '8'=>'已收件'),
								   
		'order_do' => array(
			0 => '确认收件',
			1 => '完成打包',
			2 => '确认进入空运',
			3 => '确认到海关',
			4 => '填写EMS单号',
			5 => '填写EMS单号',
			6 => '确认收件',
			7 => '确认收件',
			8 => '查看订单'
		),
		
		'upload' => array(
						'allow' => array('jpg', 'gif', 'png', 'jpeg'),	//允许上传的文件类型
						'size' => '2',							//文件大小
					),
		'captcha' => array(
					'frequency' => 10,
					'width' => 70,
					'height' => 30,
					'padding' => 2,
					'offset' => -1,
					'colors' => array(0x2040A0, 0x8C0000, 0xB28500, 0x468C00),
				),
	),
);
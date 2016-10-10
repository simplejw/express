<?php
$yii=dirname(__FILE__).'/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

defined('YII_DEBUG') or define('YII_DEBUG',true);
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

define('PAGESIZE', 20);

require_once($yii);
$app = Yii::createWebApplication($config);
if (isset($_SERVER['HTTP_USER_AGENT']) && strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 6.0') === false) {
	$app->attachBehavior('WebBehavior', 'application.behavior.WebBehavior');
}

$app->run();
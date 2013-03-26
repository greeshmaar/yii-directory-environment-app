<?php
// set environment
require_once(dirname(__FILE__) . '/../common/extensions/yii-environment/Environment.php');
$env = new Environment();
//$env = new Environment('PRODUCTION'); //override mode

// set debug and trace level
defined('YII_DEBUG') or define('YII_DEBUG', $env->yiiDebug);
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', $env->yiiTraceLevel);

// run Yii app
//$env->showDebug(); // show produced environment configuration
require_once($env->yiiPath);
$env->runYiiStatics(); // like Yii::setPathOfAlias()

$appConfig = require 'protected/config/main.php';
$config = CMap::mergeArray($env->configWeb, $appConfig);
Yii::createWebApplication($config)->run();
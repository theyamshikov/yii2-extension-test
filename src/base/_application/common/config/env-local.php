<?php

use yii\helpers\ArrayHelper;
use yii2lab\test\helpers\TestHelper;

$config = [
	'url' => [
		'frontend' => 'http://example.com/',
		'backend' => 'http://admin.example.com/',
		'api' => 'http://api.example.com/',
	],
	'cookieValidationKey' => [
		'frontend' => 'bBXEWnH5ERCG7SF3wxtbotYxq3W-Op7B',
		'backend' => 'zbfqVR5PhdO3E8Xi7DB4aoxmxSstJ6aI',
	],
];

$forceConfig = [
	'project' => 'test',
	'mode' => [
		'debug' => true,
		'env' => 'dev',
	],
	'domain' => [
		'driver' => [
			'primary' => 'filedb',
			'slave' => 'ar',
		],
	],
];

$appConfig = TestHelper::loadConfig('common/config/env-local.php', '');
return ArrayHelper::merge($config, $appConfig, $forceConfig);

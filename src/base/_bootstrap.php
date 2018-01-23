<?php

use yii2lab\app\App;

$name = 'console';
$path = '../../../..';
defined('YII_ENV') OR define('YII_ENV', 'test');

require_once(realpath(__DIR__ . '/' . $path . '/yii2lab/yii2-app/src/App.php'));

App::init($name, 'vendor/yii2lab/yii2-test/src/base/_application');

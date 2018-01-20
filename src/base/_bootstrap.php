<?php

use yii2lab\app\App;

$name = 'console';
defined('YII_ENV') OR define('YII_ENV', 'test');

require_once(realpath(__DIR__ . '/../../../../yii2lab/yii2-app/src/App.php'));

App::init($name, 'vendor/yii2lab/yii2-app/tests/store/app/common/config');

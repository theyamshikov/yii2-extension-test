<?php

namespace yii2lab\test\helpers;

use yii\helpers\ArrayHelper;
use yii2lab\app\domain\helpers\Config;
use yii2lab\app\domain\helpers\Env;

class TestHelper {
	
	const DEFAULT_APPLICATION_PATH = 'vendor/yii2lab/yii2-app/tests/store/app';
	
	public static function loadTestConfig($config = [], $path = self::DEFAULT_APPLICATION_PATH) {
		Env::init($path);
		$definition = Env::get('config');
		$testConfig = Config::load($definition);
		return ArrayHelper::merge($testConfig, $config);
	}
	
}

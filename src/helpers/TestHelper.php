<?php

namespace yii2lab\test\helpers;

use yii2lab\app\domain\helpers\Config;
use yii2lab\app\domain\helpers\Env;
use yii2lab\helpers\yii\FileHelper;

class TestHelper {
	
	public static function replacePath($definition, $path) {
		$path = FileHelper::normalizePath($path);
		$path = self::trimPath($path);
		$filters = [];
		foreach($definition['filters'] as $filter) {
			$filter = self::filterItem($filter, $path);
			if($filter) {
				$filters[] = $filter;
			}
		}
		$definition['filters'] = $filters;
		return $definition;
	}
	
	public static function makeConfigFromPath($path) {
		$definition = Env::get('config');
		$definition = TestHelper::replacePath($definition, $path);
		$testConfig = Config::load($definition);
		return $testConfig;
	}
	
	private static function trimPath($path) {
		$path = FileHelper::trimRootPath($path);
		$commonDir = DS . 'config';
		if(strpos($path, $commonDir) !== false) {
			$path = substr($path, 0, - strlen($commonDir));
		}
		return $path;
	}
	
	private static function filterItem($filter, $path) {
		if(is_string($filter)) {
			return $filter;
		}
		if($filter['app'] == TEST_APPLICATION_DIR . DS . 'console') {
			return null;
		}
		if($filter['app'] == TEST_APPLICATION_DIR . DS . 'common') {
			$filter['app'] = $path;
		}
		return $filter;
	}
	
}

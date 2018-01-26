<?php

namespace yii2lab\test\helpers;

use yii2lab\app\domain\helpers\Config;
use yii2lab\app\domain\helpers\Env;
use yii2lab\helpers\yii\FileHelper;

class TestHelper {
	
	public static function loadEnvFromPath($path) {
		$config = require(ROOT_DIR . DS . TEST_APPLICATION_DIR . DS . 'common/config/env.php');
		//print_r($config);exit;
		$config['app'] = self::replacePath($config['app'], $path);
		$config['config'] = self::replacePath($config['config'], $path);
		//print_r($config);exit;
		return $config;
	}
	
	public static function loadConfigFromPath($path) {
		$definition = Env::get('config');
		$definition = self::replacePath($definition, $path);
		$testConfig = Config::load($definition);
		return $testConfig;
	}
	
	public static function loadConfig($name, $dir = TEST_APPLICATION_DIR) {
		$dir = FileHelper::trimRootPath($dir);
		$path = trim(ROOT_DIR . DS . $dir, DS);
		$baseConfig = @include($path . DS . $name);
		return $baseConfig;
	}
	
	private static function replacePath($definition, $path) {
		$path = FileHelper::normalizePath($path);
		$path = self::trimPath($path);
		$filters = [];
		foreach(['filters', 'commands'] as $type) {
			if(!empty($definition[$type])) {
				foreach($definition[$type] as $filter) {
					$filter = self::filterItem($filter, $path);
					if($filter) {
						$filters[] = $filter;
					}
				}
				$definition[$type] = $filters;
			}
		}
		return $definition;
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

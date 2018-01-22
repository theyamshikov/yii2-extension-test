<?php

namespace yii2lab\test\helpers;

use yii2lab\store\Store;

class DataHelper {
	
	public static function load($packageName, $filename, $defaultData = null) {
		$store = new Store('php');
		$configExpect = $store->load(self::getDataFilename($packageName, $filename));
		if(empty($configExpect)) {
			self::save($packageName, $filename, $defaultData);
			return $defaultData;
		}
		return $configExpect;
	}
	
	public static function save($packageName, $filename, $data) {
		$store = new Store('php');
		$store->save(self::getDataFilename($packageName, $filename), $data);
	}
	
	private static function getDataFilename($packageName, $filename) {
		return VENDOR_DIR . DS . $packageName . DS . 'tests' . DS . $filename;
	}
	
}

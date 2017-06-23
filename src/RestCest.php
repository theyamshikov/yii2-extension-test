<?php

namespace yii2lab\test;

use yii\helpers\ArrayHelper;

class RestCest
{
	protected $authId = null;
	public $format = [];
	
	const TYPE_DATE = 'string:date|null';
	const TYPE_STRING = 'string';
	const TYPE_STRING_OR_NULL = 'string|null';
	const TYPE_INTEGER = 'integer';
	const TYPE_INTEGER_OR_NULL = 'integer|null';
	const TYPE_BOOLEAN = 'boolean';
	const TYPE_BOOLEAN_OR_NULL = 'boolean|null';
	const TYPE_ARRAY = 'array';
	const TYPE_ARRAY_OR_NULL = 'array|null';
	
	public function _before($I) {
		$I->haveHttpHeader('language', 'xx');
		if(method_exists($this, '_fixtures')) {
			$fixtures = $this->_fixtures();
			$I->haveFixtures($fixtures);
		}
		$I->format = $this->format;
	}
	
}

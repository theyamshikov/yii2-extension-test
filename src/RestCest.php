<?php

namespace woop\test;

use yii\helpers\ArrayHelper;

class RestCest
{
	/* @var $I FunctionalTester */
	protected $authId = null;
	
	const TYPE_DATE = 'string:date|null';
	const TYPE_STRING = 'string';
	const TYPE_STRING_OR_NULL = 'string|null';
	const TYPE_INTEGER = 'integer';
	const TYPE_INTEGER_OR_NULL = 'integer|null';
	const TYPE_BOOLEAN = 'boolean';
	const TYPE_BOOLEAN_OR_NULL = 'boolean|null';
	const TYPE_ARRAY = 'array';
	const TYPE_ARRAY_OR_NULL = 'array|null';
	
	public function _before(FunctionalTester $I) {
		$I->haveHttpHeader('language', 'xx');
		if(method_exists($this, '_fixtures')) {
			$fixtures = $this->_fixtures();
			$I->haveFixtures($fixtures);
		}
		//$I->auth($this->authId);
		$I->format = $this->format;
	}
	
	/*protected function checkAccessAllowed($userList = null, $uri = null) {
		$uri = $uri ? $uri : $this->uri;
		foreach($userList as $user) {
			$this->auth($user);
			$this->I->sendGET($uri);
			$this->I->SeeResponseCodeIs(200);
		}
	}
	
	protected function checkAccessDenied($userList = null, $uri = null) {
		$uri = $uri ? $uri : $this->uri;
		foreach($userList as $user) {
			$token = $this->auth($user);
			$this->I->sendGET($uri);
			if($token) {
				$this->I->SeeResponseCodeIs(403);
			} else {
				$this->I->SeeResponseCodeIs(401);
			}
		}
	}*/
	
}

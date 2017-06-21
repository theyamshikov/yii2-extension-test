<?php

namespace woop\extension\test\traits;

use yii\helpers\ArrayHelper;
use woop\module\rest\models\Login;

trait FunctionalTesterTrait
{
	
	public $format;
	
	public function seeValidationError($message)
	{
		$this->see($message, '.help-block');
	}
	
	public function getResponseBody() {
		$body = $this->grabResponse();
		$body = \GuzzleHttp\json_decode($body);
		return ArrayHelper::toArray($body);
	}
	
	public function seeBody($expected = null, $existsOnly = false) {
		$response = $this->getResponseBody();
		if(!$existsOnly) {
			expect($response)->equals($expected);
		} else {
			if(is_array($expected)) {
				foreach($expected as $key => $value) {
					if(array_key_exists($key, $response)) {
						expect($response[$key])->equals($expected[$key]);
					}
				}
			}
		}
	}
	
	public function seeResponse($code = 200, $body = null, $existsOnly = false) {
		$this->SeeResponseCodeIs($code);
		if(!empty($this->format) && $code == 200) {
			$this->seeResponseMatchesJsonType($this->format);
		}
		if($code == 422) {
			$this->seeResponseMatchesJsonType([
				'field' => 'string',
				'message' => 'string',
			]);
		}
		if(!empty($body)) {
			$this->seeBody($body, $existsOnly);
		}
	}
	
	private function setAuth($login, $password) {
		$token = null;
		
		if(empty($login) || $login == 'guest') {
			$this->haveHttpHeader('Authorization', null);
			return false;
		}
		
		$identityClass = config('components.user.identityClass');
		$user = $identityClass::authentication($login, $password);
		
		$token = $user['auth_key'];
		
		$this->haveHttpHeader('Authorization', $token);
		return $token;
	}
	
	public function authAsRole($role = null) {
		$login = null;
		$password = null;
		if($role) {
			$user = Login::one(['role' => $role]);
			$login = $user['login'];
			$password = $user['password'];
		}
		return self::setAuth($login, $password);
	}
	
	public function auth($login = null, $password = null) {
		if(empty($password)) {
			$user = Login::one($login);
			$password = $user['password'];
		}
		return self::setAuth($login, $password);
	}
	
	public function dontSeeValidationError($message)
	{
		$this->dontSee($message, '.help-block');
	}
}

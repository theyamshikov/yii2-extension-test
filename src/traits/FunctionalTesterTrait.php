<?php

namespace yii2lab\test\traits;

use Yii;
use yii\helpers\ArrayHelper;
use yii2lab\test\models\Login;
use Codeception\Util\HttpCode;

trait FunctionalTesterTrait
{
	
	public $format;
	
	public function seeValidationError($message)
	{
		$this->see($message, '.help-block');
	}

	public function seeListCount($value) {
		$body = $this->getResponseBody();
		expect($value)->equals(count($body));
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
	
	public function seeUnprocessableEntity($body = null) {
		$this->seeResponseCodeIs(HttpCode::UNPROCESSABLE_ENTITY);
		if(!empty($body)) {
			$this->seeBody($body);
		} else {
			$this->seeResponseMatchesJsonType([
				'field' => 'string',
				'message' => 'string',
			]);
		}
	}

	public function dontSeeResponseJsonFields($fields) {
		foreach($fields as $field) {
			$this->dontSeeResponseJsonMatchesJsonPath('$.' . $field);
		}
	}

	private function setAuth($login, $password) {
		$token = null;
		
		if(empty($login) || $login == 'guest') {
			$this->haveHttpHeader('Authorization', null);
			return false;
		}
		
		/* $identityClass = config('components.user.identityClass');
		$user = $identityClass::authentication($login, $password);
		$token = $user['auth_key']; */
		
		$this->sendPOST('auth', [
			'login' => $login,
			'password' => $password,
		]);
		$user = $this->getResponseBody();
		$token = $user['token'];
		
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

<?php

namespace yii2lab\test\traits;

use Yii;
use yii2mod\helpers\ArrayHelper;use yii2lab\test\models\Login;
use Codeception\Util\HttpCode;

trait FunctionalTesterTrait
{
	
	public $format;
	public $password = 'Wwwqqq111';
	
	public function seeValidationError($message)
	{
		$this->see($message, '.help-block');
	}

	public function seeListCount($value) {
		$body = $this->getResponseBody();
		expect($value)->equals(count($body));
	}
	
	public function seeSort($first, $last, $key = null) {
		$this->seeItem($first, 'first', $key);
		$this->seeItem($last, 'last', $key);
	}
	
	public function seeItem($expect, $id, $key = null) {
		$body = $this->getResponseBody();
		if($id == 'first') {
			$item = ArrayHelper::first($body);
		} elseif($id == 'last') {
			$item = ArrayHelper::last($body);
		} else {
			$item = $body[$id];
		}
		$value = ArrayHelper::getValue($item, $key);
		expect($expect)->equals($value);
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

	protected function fieldsOnly($expected, $item) {
		$diff = array_diff(array_keys($item), $expected);
		expect($diff)->equals([]);
		$diff = array_diff($expected, array_keys($item));
		expect($diff)->equals([]);
	}

	public function seeResponseJsonFieldsOnly($fields) {
		$response = $this->getResponseBody();
		if(ArrayHelper::isIndexed($response)) {
			foreach($response as $item) {
				$this->fieldsOnly($fields, $item);
			}
		} else {
			$this->fieldsOnly($fields, $response);
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
			$user = $loginList = Yii::$app->account->test->getOneByRole($role);
			$login = $user->login;
			$password = $this->password;
		}
		return self::setAuth($login, $password);
	}
	
	public function auth($login = null, $password = null) {
		if(empty($password)) {
			$password = $this->password;
		}
		return self::setAuth($login, $password);
	}
	
	public function dontSeeValidationError($message)
	{
		$this->dontSee($message, '.help-block');
	}
}

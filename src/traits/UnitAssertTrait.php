<?php

namespace yii2lab\test\traits;

use PHPUnit\Framework\Constraint\IsType;
use yii\helpers\ArrayHelper;
use yii2lab\domain\BaseEntity;
use yii2lab\domain\exceptions\UnprocessableEntityHttpException;

trait UnitAssertTrait
{
	
	public function assertEntity(array $expect, BaseEntity $entity) {
		$this->assertArraySubset($expect, $entity->toArray());
	}
	
	public function assertCollection(array $expect, array $collection) {
		foreach($expect as $key => $expectItem) {
			$entity = $collection[$key];
			$expectItem = ArrayHelper::toArray($expectItem);
			$this->assertEntity($expectItem, $entity);
		}
	}
	
	public function assertIsCollection(array $collection) {
		$this->assertInternalType(isType::TYPE_ARRAY, $collection);
		foreach($collection as $entity) {
			$this->assertIsEntity($entity);
		}
	}
	
	public function assertIsEntity($entity) {
		expect($entity instanceof BaseEntity)->true();
	}
	
	public function assertUnprocessableEntityHttpException($messages, UnprocessableEntityHttpException $e) {
		$errors = $e->getErrors();
		foreach($errors as $error) {
			$field = $error['field'];
			if(isset($messages[$field])) {
				expect($messages[$field])->equals($error['message']);
				return;
			}
		}
		expect(false)->true();
	}
	
	public function assertEntityFormat(array $expect, BaseEntity $entity, $isStrict = true) {
		foreach($expect as $field => $type) {
			if($isStrict) {
				expect($entity)->hasAttribute($field);
			}
			if($isStrict || property_exists($entity, $field)) {
				$value = $entity->{$field};
				$this->assertInternalType($type, $value);
			}
		}
	}
	
	public function assertCollectionFormat(array $expect, array $collection, $isStrict = true) {
		$this->assertIsCollection($collection);
		foreach($collection as $entity) {
			$this->assertEntityFormat($expect, $entity, $isStrict);
		}
	}
	
}

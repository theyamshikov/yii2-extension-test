<?php

namespace yii2lab\test\traits;

use Throwable;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;
use yii2lab\domain\BaseEntity;
use yii2lab\domain\data\EntityCollection;
use yii2lab\domain\exceptions\UnprocessableEntityHttpException;
use yii2module\error\domain\helpers\UnProcessibleHelper;

trait UnitAssertTrait
{
	
	public function assertBad($data = true) {
		//$this->assertEmpty($data);
		$this->assertTrue(false);
	}
	
	public function assertPagination(array $expect, Pagination $pagination) {
		$p = [
			'offset' => $pagination->offset,
			'page' => $pagination->page,
			'limit' => $pagination->limit,
			'pageSize' => $pagination->pageSize,
		];
		
		$this->assertArraySubset($expect, $p);
	}
	
	public function assertUnprocessableEntityExceptionMessage(array $expect, UnprocessableEntityHttpException $exception) {
		$array = UnProcessibleHelper::assoc2indexed($exception->getErrors());
		$this->assertEquals($expect, $array);
	}
	
	public function assertExceptionMessage(string $expect, Throwable $exception) {
		$this->assertEquals($expect, $exception->getMessage());
	}

    public function assertExceptionMessageRegexp(string $expect, Throwable $exception) {
        $this->assertRegExp($expect, $exception->getMessage());
    }

	public function assertExceptionCode(int $expect, Throwable $exception) {
		$this->assertEquals($expect, $exception->getCode());
	}
	
	public function assertEntity(array $expect, BaseEntity $entity, $isStrict = false) {
		if($isStrict) {
			$this->assertEquals($expect, $entity->toArray());
		} else {
			$this->assertArraySubset($expect, $entity->toArray());
		}
	}
	
	public function assertCollectionByFieldEquals(array $expect, array $collection, $count = null) {
		if(is_integer($count)) {
			$this->assertCount($count, $collection);
		}
		if(empty($collection)) {
			return;
		}
		foreach($collection as $entity) {
			foreach($expect as $name => $value) {
				$isEqual = $entity->{$name} == $value;
				$this->assertTrue($isEqual);
			}
		}
	}
	
	public function assertCollection(array $expect, array $collection, $isStrict = false) {
		if(empty($collection) && empty($expect)) {
			return;
		}
		foreach($expect as $key => $expectItem) {
			$entity = $collection[$key];
			$expectItem = ArrayHelper::toArray($expectItem);
			$this->assertEntity($expectItem, $entity);
		}
		if($isStrict) {
			$this->assertCount(count($expect), $collection);
		}
	}
	
	public function assertIsCollection(EntityCollection $collection, $class = BaseEntity::class) {
		//$this->assertInternalType(isType::TYPE_ARRAY, $collection);
		foreach($collection as $entity) {
			$this->assertIsEntity($entity, $class);
		}
	}
	
	public function assertIsEntity($entity, $class = BaseEntity::class) {
		$this->assertTrue($entity instanceof $class);
	}
	
	public function assertUnprocessableEntityHttpException($messages, UnprocessableEntityHttpException $e) {
		$errors = $e->getErrors();
		foreach($errors as $error) {
			$field = $error['field'];
			if(isset($messages[$field])) {
				$this->assertEquals($messages[$field], $error['message']);
				return;
			}
		}
		$this->assertTrue(false);
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
	
	public function assertCollectionFormat(array $expect, $collection, $isStrict = true) {
		$this->assertIsCollection($collection);
		foreach($collection as $entity) {
			$this->assertEntityFormat($expect, $entity, $isStrict);
		}
	}
	
}

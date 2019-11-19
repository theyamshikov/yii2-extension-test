<?php

namespace yii2lab\test\traits;


use PHPUnit\Framework\Constraint\IsType;
use Throwable;

use yii\data\Pagination;
use yii\helpers\ArrayHelper;
use yii2lab\domain\BaseEntity;
use yii2lab\domain\data\EntityCollection;
use yii2lab\domain\exceptions\UnprocessableEntityHttpException;
use yii2lab\extension\common\enums\RegexpPatternEnum;
use yii2lab\extension\common\helpers\UrlHelper;
use yii2lab\test\helpers\TestHelper;
use yii2module\error\domain\helpers\UnProcessibleHelper;

trait UnitAssertTrait
{
	
	public function assertUrl(array $expected, $actual) {
		$parsedUrl = UrlHelper::parse($actual);
		$this->assertArraySubset($expected, $parsedUrl);
	}
	
	
	public function assertBase64String($actual) {
		$this->assertRegExp(RegexpPatternEnum::BASE_64_REQUIRED, $actual);
	}
	
	public function assertHexString($actual) {
		$this->assertRegExp(RegexpPatternEnum::HEX_REQUIRED, $actual);
	}
	
	public function assertStringLength($length, $actual) {
		$lengthRange = ArrayHelper::toArray($length);
		$lengthExp = implode(',', $lengthRange);
		$this->assertRegExp('#^[\s\S]{' . $lengthExp . '}$#', $actual);
	}
	
	public function assertStringFormat($charExp, $actual) {
		$this->assertRegExp('#^[' . $charExp . ']+$#', $actual);
	}
	
	public function assertNice() {
		$this->assertTrue(true);
	}
	
	public function assertBad($fakeParam = null) {
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
	
	// crutch for linux and windows
	private function normalizeArrayForNewLines(array $data) {
		foreach($data as $k => $item) {
			if(is_string($item)) {
				$data[$k] = str_replace(["\r\n", "\n\r", "\r"], "\n", $item);
			} elseif(is_array($item)) {
				$data[$k] = $this->normalizeArrayForNewLines($item);
			}
		}
		return $data;
	}
	
	public function assertEntity(array $expect, BaseEntity $entity, $isStrict = false) {
		$expect = $this->normalizeArrayForNewLines($expect);
		$entityData = $this->normalizeArrayForNewLines($entity->toArray());
		if($isStrict) {
			$this->assertEquals($expect, $entityData);
		} else {
			TestHelper::assertArraySubset($expect, $entityData);
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
		if(empty($collection) || empty($expect)) {
			$this->assertBad();
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
			if($isStrict && !$entity->hasProperty($field)) {
				$this->assertTrue(false, 'Attribute not exists in entity!');
			}
			if($isStrict || property_exists($entity, $field)) {
				$value = $entity->{$field};
				try {
					$this->assertTypeAggregator($type, $value);
				} catch (UnprocessableEntityHttpException $e) {
					$this->assertTrue(false, $e->getMessage());
				}
			}
		}
	}


	private function assertTypeAggregator($type, $value){
		if(empty($value)){
			$this->assertNice();
			return;
		}


		switch ($type){
			case IsType::TYPE_ARRAY :
				$this->assertIsArray($value);
				break;
			case IsType::TYPE_BOOL :
				$this->assertIsBool($value);
				break;
			case IsType::TYPE_FLOAT :
				$this->assertIsFloat($value);
				break;
			case IsType::TYPE_INT:
				$this->assertIsInt($value);
				break;
			case IsType::TYPE_NUMERIC :
				$this->assertIsNumeric($value);
				break;
			case IsType::TYPE_OBJECT :
				$this->assertIsObject($value);
				break;
			case IsType::TYPE_RESOURCE :
				$this->assertIsResource($value);
				break;
			case IsType::TYPE_STRING :
				$this->assertIsString($value);
				break;
			case IsType::TYPE_SCALAR :
				$this->assertIsScalar($value);
				break;
			case IsType::TYPE_CALLABLE :
				$this->assertIsCallable($value);
				break;
			case IsType::TYPE_ITERABLE :
				$this->assertIsIterable($value);
				break;
			default:
				try{
					$object = new $type();
					if($value instanceof $object){
						$this->assertNice();
					}
				} catch (\InvalidArgumentException $e){
					throw new UnprocessableEntityHttpException("assertTypeAggregator didnt find this type - $type ", 1 );
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

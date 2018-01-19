<?php

namespace yii2lab\test\traits;

use yii2lab\domain\BaseEntity;

trait UnitAssertTrait
{
	
	public function assertEntity(array $expect, BaseEntity $entity) {
		$this->assertArraySubset($expect, $entity->toArray());
	}
	
	public function assertCollection(array $expect, array $collection) {
		$expect = array_values($expect);
		$collection = array_values($collection);
		foreach($collection as $key => $entity) {
			$this->assertEntity($expect[$key], $entity);
		}
	}
	
	public function assertIsCollection(array $collection) {
		foreach($collection as $entity) {
			expect(true)->equals($entity instanceof BaseEntity);
		}
	}
	
}

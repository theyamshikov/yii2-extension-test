<?php

namespace yii2lab\test\traits;

use yii\helpers\ArrayHelper;
use yii2lab\domain\BaseEntity;

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
		foreach($collection as $entity) {
			expect(true)->equals($entity instanceof BaseEntity);
		}
	}
	
}

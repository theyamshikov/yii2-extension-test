<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class _create_service_info_table
 * 
 * @package 
 */
class m170803_095420_create_service_info_table extends Migration {

	public $table = '{{%service_info}}';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->integer(),
			'service_name' => $this->string(50),
			'name' => $this->string(),
			'parent_id' => $this->integer(),
			'merchant_id' => $this->integer(),
			'status' => $this->integer(),
			'modify_date' => $this->timestamp()->defaultValue(null),
			'type' => $this->integer(),
			'template' => $this->string(100),
			'is_simple' => $this->boolean(),
		];
	}

	public function afterCreate()
	{
		
	}

}
<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class _create_service_template_field_table
 * 
 * @package 
 */
class m170803_095440_create_service_template_field_table extends Migration {

	public $table = '{{%service_template_field}}';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->integer(),
			'service_id' => $this->integer(),
			'name' => $this->string(45),
			'title' => $this->string(45),
			'type' => $this->string(255),
			'hidden' => $this->boolean(),
			'editable' => $this->boolean(),
		];
	}

	public function afterCreate()
	{
		
	}

}
<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class _create_service_field_translation_table
 * 
 * @package 
 */
class m170803_095400_create_service_field_translation_table extends Migration {

	public $table = '{{%service_field_translation}}';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->integer()->notNull(),
			'service_field_id' => $this->integer(),
			'language' => $this->string(),
			'value' => $this->string(),
			'button_value' => $this->string(),
			'hint_value' => $this->string(),
		];
	}

	public function afterCreate()
	{
		
	}

}
<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class _create_validation_message_translation_table
 * 
 * @package 
 */
class _create_validation_message_translation_table extends Migration {

	public $table = '{{%validation_message_translation}}';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->integer()->notNull(),
			'validation_id' => $this->integer()->notNull(),
			'language' => $this->string(),
			'message' => $this->string(),
		];
	}

	public function afterCreate()
	{
		
	}

}
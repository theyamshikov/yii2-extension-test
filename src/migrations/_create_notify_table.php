<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class _create_notify_table
 * 
 * @package 
 */
class _create_notify_table extends Migration {

	public $table = '{{%notify}}';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->primaryKey()->notNull(),
			'type' => $this->string(255),
			'subject' => $this->string(255),
			'message' => $this->string(),
			'address' => $this->string(255),
			'created_at' => $this->timestamp()->defaultValue(null),
		];
	}

	public function afterCreate()
	{
		
	}

}
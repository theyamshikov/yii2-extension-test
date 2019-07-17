<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class _create_support_feedback_table
 * 
 * @package 
 */
class _create_support_feedback_table extends Migration {

	public $table = '{{%support_feedback}}';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->primaryKey()->notNull(),
			'version' => $this->integer(),
			'title' => $this->string(255),
			'text' => $this->string(),
			'created_at' => $this->timestamp()->defaultValue(null),
		];
	}

	public function afterCreate()
	{
		
	}

}
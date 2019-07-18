<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class _create_favorite_table
 * 
 * @package 
 */
class m170803_095240_create_favorite_table extends Migration {

	public $table = '{{%favorite}}';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'favorite_id' => $this->primaryKey()->notNull(),
			'user_id' => $this->integer(),
			'billinginfo' => $this->array(),
			'amount' => $this->string(),
			'name' => $this->string(128)->notNull(),
			'status' => $this->integer()->notNull()->defaultValue(1),
			'type' => $this->integer()->notNull()->defaultValue(1),
			'position' => $this->integer()->notNull()->defaultValue(1),
			'update_time' => $this->timestamp()->defaultValue(null)->notNull()->defaultValue(1970-01-01 00:00:00),
			'create_time' => $this->timestamp()->defaultValue(null)->notNull()->defaultValue(now()),
			'is_processed' => $this->boolean(),
		];
	}

	public function afterCreate()
	{
		
	}

}
<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class _create_consultations_table
 * 
 * @package 
 */
class m170803_095200_create_consultations_table extends Migration {

	public $table = '{{%consultations}}';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->primaryKey()->notNull(),
			'login' => $this->string(255),
			'last_visited_time' => $this->timestamp()->defaultValue(null)->notNull()->defaultValue(now()),
			'consultant' => $this->string(255),
			'date' => $this->timestamp()->defaultValue(null)->defaultValue(now()),
			'status' => $this->integer()->notNull()->defaultValue(1),
			'session_id' => $this->string(50),
			'cookies_key' => $this->string(32),
			'group_id' => $this->integer()->notNull(),
			'is_processed' => $this->boolean(),
		];
	}

	public function afterCreate()
	{
		
	}

}
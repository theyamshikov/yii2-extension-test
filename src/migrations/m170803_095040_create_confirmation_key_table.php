<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class _create_confirmation_key_table
 * 
 * @package 
 */
class m170803_095040_create_confirmation_key_table extends Migration {

	public $table = '{{%confirmation_key}}';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'email' => $this->string(100)->notNull(),
			'key' => $this->string(45)->notNull(),
			'timestamp' => $this->timestamp()->defaultValue(null)->notNull(),
			'login' => $this->string(25)->notNull(),
			'status' => $this->integer()->notNull(),
		];
	}

	public function afterCreate()
	{
		
	}

}
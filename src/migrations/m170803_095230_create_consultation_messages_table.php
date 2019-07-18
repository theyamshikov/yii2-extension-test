<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class _create_consultation_messages_table
 * 
 * @package 
 */
class m170803_095230_create_consultation_messages_table extends Migration {

	public $table = '{{%consultation_messages}}';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->primaryKey()->notNull(),
			'consultation_id' => $this->integer()->notNull(),
			'sender' => $this->string(255)->notNull(),
			'sender_name' => $this->string(255)->notNull(),
			'sender_type' => $this->integer()->notNull(),
			'sender_ip' => $this->string(15)->notNull(),
			'content' => $this->string(5000)->notNull(),
			'datetime' => $this->timestamp()->defaultValue(null)->notNull()->defaultValue('now()'),
			'status' => $this->integer()->notNull(),
			'is_processed' => $this->boolean(),
		];
	}

	public function afterCreate()
	{
		$this->myAddForeignKey(
			'consultation_id',
			'{{%consultations}}',
			'id',
			'CASCADE',
			'CASCADE'
		);
	}

}
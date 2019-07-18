<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class _create_recurrent_operations_table
 * 
 * @package 
 */
class m170803_095380_create_recurrent_operations_table extends Migration {

	public $table = '{{%recurrent_operations}}';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->primaryKey()->notNull(),
			'operation_data' => $this->string()->notNull(),
			'task_id' => $this->integer()->notNull(),
			'operation_id' => $this->integer()->notNull(),
			'ttl' => $this->integer()->notNull()->defaultValue(99),
			'card_id' => $this->integer()->notNull(),
		];
	}

	public function afterCreate()
	{
		$this->myAddForeignKey(
			'task_id',
			'{{%recurrent_task_manager}}',
			'id',
			'CASCADE',
			'CASCADE'
		);
	}

}
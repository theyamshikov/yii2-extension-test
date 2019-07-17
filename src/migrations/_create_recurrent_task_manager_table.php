<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class _create_recurrent_task_manager_table
 * 
 * @package 
 */
class _create_recurrent_task_manager_table extends Migration {

	public $table = '{{%recurrent_task_manager}}';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->primaryKey()->notNull(),
			'date_of_creation' => $this->timestamp()->defaultValue(null)->notNull(),
			'date_of_status_change' => $this->timestamp()->defaultValue(null),
			'status' => $this->integer()->notNull(),
			'payment_id' => $this->integer(),
		];
	}

	public function afterCreate()
	{
		$this->myAddForeignKey(
			'payment_id',
			'{{%payments_requrent}}',
			'id',
			'CASCADE',
			'CASCADE'
		);
	}

}
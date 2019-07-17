<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class _create_email_receipt_table
 * 
 * @package 
 */
class _create_email_receipt_table extends Migration {

	public $table = '{{%email_receipt}}';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->primaryKey()->notNull(),
			'operation_id' => $this->integer()->notNull(),
			'status' => $this->integer()->notNull(),
			'target' => $this->string()->notNull(),
			'sent_date' => $this->timestamp()->defaultValue(null),
		];
	}

	public function afterCreate()
	{
		
	}

}
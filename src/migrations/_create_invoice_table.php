<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class _create_invoice_table
 * 
 * @package 
 */
class _create_invoice_table extends Migration {

	public $table = '{{%invoice}}';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'invoice_id' => $this->integer()->notNull(),
			'merchant_id' => $this->integer()->notNull(),
			'merchant_name' => $this->string(100),
			'user_id' => $this->integer(),
			'operation_id' => $this->integer()->notNull(),
			'reference_id' => $this->string(100)->notNull(),
			'request_url' => $this->string(2048),
			'back_url' => $this->string(2048),
			'add_info' => $this->string(),
			'amount' => $this->string(),
			'key' => $this->string(45),
			'type' => $this->string(45),
			'status' => $this->integer()->notNull(),
			'option' => $this->integer()->notNull(),
			'user_email' => $this->string(100),
			'user_phone' => $this->string(20),
			'acquiring_access' => $this->integer()->notNull(),
			'service_id' => $this->integer(),
		];
	}

	public function afterCreate()
	{
		
	}

}
<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class _create_payment_history_table
 * 
 * @package 
 */
class m170803_095350_create_payment_history_table extends Migration {

	public $table = '{{%payment_history}}';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->primaryKey()->notNull(),
			'account' => $this->string(200)->notNull(),
			'amount' => $this->integer()->notNull(),
			'pay_with' => $this->integer()->notNull(),
			'service_id' => $this->integer()->notNull(),
			'date' => $this->timestamp()->defaultValue(null)->notNull(),
			'login' => $this->string(200)->notNull(),
			'debt' => $this->double()->notNull(),
		];
	}

	public function afterCreate()
	{
		
	}

}
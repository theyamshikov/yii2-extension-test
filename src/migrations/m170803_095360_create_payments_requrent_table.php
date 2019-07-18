<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class _create_payments_requrent_table
 * 
 * @package 
 */
class m170803_095360_create_payments_requrent_table extends Migration {

	public $table = '{{%payments_requrent}}';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->primaryKey()->notNull(),
			'account' => $this->string(200)->notNull(),
			'amount' => $this->integer()->notNull(),
			'card_id' => $this->integer()->notNull(),
			'pay_with' => $this->integer()->notNull(),
			'service_id' => $this->integer()->notNull(),
			'login' => $this->string(200)->notNull(),
			'disabled' => $this->integer()->notNull(),
		];
	}

	public function afterCreate()
	{
		
	}

}
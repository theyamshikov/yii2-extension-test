<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class _create_partner_payment_table
 * 
 * @package 
 */
class m170803_095310_create_partner_payment_table extends Migration {

	public $table = '{{%partner_payment}}';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->primaryKey()->notNull(),
			'partner_id' => $this->integer()->notNull(),
			'acquiring_type' => $this->string(),
			'acquiring_linked_type' => $this->string(),
			'terminal_cash_in' => $this->integer(),
			'terminal_cash_out' => $this->integer(),
			'recharge_frame' => $this->string(),
			'recharge_linking' => $this->string(),
			'recharge_cvv' => $this->string(),
		];
	}

	public function afterCreate()
	{
		$this->myAddForeignKey(
			'partner_id',
			'{{%partner_info}}',
			'id',
			'CASCADE',
			'CASCADE'
		);
	}

}
<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class _create_partner_contacts_table
 * 
 * @package 
 */
class _create_partner_contacts_table extends Migration {

	public $table = '{{%partner_contacts}}';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->primaryKey()->notNull(),
			'partner_id' => $this->integer()->notNull(),
			'mail_sender_name' => $this->string(),
			'sms_protocol_type' => $this->string(),
			'sms_sender_name' => $this->string(),
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
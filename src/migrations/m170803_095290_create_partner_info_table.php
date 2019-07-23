<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class _create_partner_info_table
 * 
 * @package 
 */
class m170803_095290_create_partner_info_table extends Migration {

	public $table = '{{%partner_info}}';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->primaryKey()->notNull(),
			'name' => $this->string()->notNull(),
			'country_id' => $this->integer()->notNull(),
			'partner_login' => $this->string(),
			'prefix' => $this->string(),
			'subject_type' => $this->integer(),
			'parent' => $this->string(),
		];
	}

	public function afterCreate()
	{
		$this->myAddForeignKey(
			'country_id',
			'{{%country}}',
			'code',
			'CASCADE',
			'CASCADE'
		);
	}

}
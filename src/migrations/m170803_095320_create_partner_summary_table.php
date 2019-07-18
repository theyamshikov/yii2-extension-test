<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class _create_partner_summary_table
 * 
 * @package 
 */
class m170803_095320_create_partner_summary_table extends Migration {

	public $table = '{{%partner_summary}}';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->primaryKey()->notNull(),
			'partner_id' => $this->integer()->notNull(),
			'category_group_id' => $this->integer(),
			'category_root' => $this->integer(),
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
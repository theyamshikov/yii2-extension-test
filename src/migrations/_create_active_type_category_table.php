<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class _create_active_type_category_table
 * 
 * @package 
 */
class _create_active_type_category_table extends Migration {

	public $table = '{{%active_type_category}}';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->primaryKey()->notNull(),
			'active_id' => $this->integer()->notNull(),
			'category_id' => $this->integer()->notNull(),
		];
	}

	public function afterCreate()
	{
		$this->myAddForeignKey(
			'active_id',
			'{{%active}}',
			'id',
			'CASCADE',
			'CASCADE'
		);
		$this->myAddForeignKey(
			'category_id',
			'{{%active_category}}',
			'id',
			'CASCADE',
			'CASCADE'
		);
	}

}
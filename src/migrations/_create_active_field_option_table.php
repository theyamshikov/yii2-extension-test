<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class _create_active_field_option_table
 * 
 * @package 
 */
class _create_active_field_option_table extends Migration {

	public $table = '{{%active_field_option}}';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->primaryKey()->notNull(),
			'field_id' => $this->integer()->notNull()->comment('ID поля'),
			'key' => $this->string(255)->notNull(),
			'title' => $this->string(255)->notNull(),
		];
	}

	public function afterCreate()
	{
		$this->myAddForeignKey(
			'field_id',
			'{{%active_field}}',
			'id',
			'CASCADE',
			'CASCADE'
		);
	}

}
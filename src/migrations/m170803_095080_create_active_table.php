<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class _create_active_table
 * 
 * @package 
 */
class m170803_095080_create_active_table extends Migration {

	public $table = '{{%active}}';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->primaryKey()->notNull(),
			'parent_id' => $this->integer()->comment('ID родительского типа актива'),
			'title' => $this->string(255)->notNull(),
			'handler_id' => $this->integer(),
		];
	}

	public function afterCreate()
	{
		$this->myAddForeignKey(
			'parent_id',
			'{{%active}}',
			'id',
			'CASCADE',
			'CASCADE'
		);
	}

}
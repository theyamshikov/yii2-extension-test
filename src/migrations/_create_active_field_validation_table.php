<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class _create_active_field_validation_table
 * 
 * @package 
 */
class _create_active_field_validation_table extends Migration {

	public $table = '{{%active_field_validation}}';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->primaryKey()->notNull(),
			'field_id' => $this->integer()->notNull()->comment('ID поля'),
			'type' => $this->string(255)->notNull()->comment('Метод'),
			'rules' => $this->string(255)->comment('Массив правил'),
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
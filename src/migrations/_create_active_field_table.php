<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class _create_active_field_table
 * 
 * @package 
 */
class _create_active_field_table extends Migration {

	public $table = '{{%active_field}}';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->primaryKey()->notNull(),
			'name' => $this->string(255)->notNull(),
			'title' => $this->string(255)->notNull(),
			'active_id' => $this->integer()->notNull()->comment('ID типа актива'),
			'type' => $this->string(255)->notNull()->comment('Тип значения'),
			'sort' => $this->integer()->comment('Позиция'),
			'is_hidden' => $this->integer()->notNull()->comment('Не рендерить поле'),
			'is_has_button' => $this->integer()->notNull()->comment('Имеет ли кнопку'),
			'is_readonly' => $this->integer()->notNull()->comment('Только для чтения'),
			'mask' => $this->string(255)->comment('Маска строки'),
			'is_visible' => $this->integer()->comment('Скрыть поле'),
			'priority' => $this->integer(),
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
	}

}
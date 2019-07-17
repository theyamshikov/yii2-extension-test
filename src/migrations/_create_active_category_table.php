<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class _create_active_category_table
 * 
 * @package 
 */
class _create_active_category_table extends Migration {

	public $table = '{{%active_category}}';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->primaryKey()->notNull(),
			'title' => $this->string(255)->notNull(),
			'description' => $this->string(255),
			'logo' => $this->string(255),
			'position' => $this->integer(),
		];
	}

	public function afterCreate()
	{
		
	}

}
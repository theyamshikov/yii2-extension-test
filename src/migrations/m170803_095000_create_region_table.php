<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class _create_region_table
 * 
 * @package 
 */
class m170803_095000_create_region_table extends Migration {

	public $table = '{{%region}}';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->primaryKey()->notNull(),
			'country_id' => $this->integer(),
			'title' => $this->string(255),
			'date_change' => $this->timestamp()->defaultValue(null),
		];
	}

	public function afterCreate()
	{
		
	}

}
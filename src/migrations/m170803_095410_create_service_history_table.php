<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class _create_service_history_table
 * 
 * @package 
 */
class m170803_095410_create_service_history_table extends Migration {

	public $table = '{{%service_history}}';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->integer()->notNull(),
			'date_modify' => $this->timestamp()->defaultValue(null),
			'category_id' => $this->integer(),
		];
	}

	public function afterCreate()
	{
		
	}

}
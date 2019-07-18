<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class _create_test_table
 * 
 * @package 
 */
class m170803_095510_create_test_table extends Migration {

	public $table = '{{%test}}';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->primaryKey()->notNull(),
			'tes' => $this->string(),
		];
	}

	public function afterCreate()
	{
		
	}

}
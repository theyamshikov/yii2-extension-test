<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class _create_currency_table
 * 
 * @package 
 */
class m170803_095020_create_currency_table extends Migration {

	public $table = '{{%currency}}';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'code' => $this->primaryKey()->notNull(),
			'symb_def' => $this->string(3),
			'name_cur' => $this->string(45),
			'descr' => $this->string(255),
		];
	}

	public function afterCreate()
	{
		
	}

}
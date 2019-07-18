<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class _create_bank_code_table
 * 
 * @package 
 */
class m170803_095070_create_bank_code_table extends Migration {

	public $table = '{{%bank_code}}';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->primaryKey()->notNull(),
			'code' => $this->integer(),
			'bik' => $this->string(),
			'name' => $this->string(),
			'bin' => $this->string(),
			'picture' => $this->string(50),
		];
	}

	public function afterCreate()
	{
		
	}

}
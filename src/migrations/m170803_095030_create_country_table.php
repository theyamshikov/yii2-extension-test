<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class _create_country_table
 * 
 * @package 
 */
class m170803_095030_create_country_table extends Migration {

	public $table = '{{%country}}';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'code' => $this->primaryKey()->notNull(),
			'name_short' => $this->string(50),
			'name_full' => $this->string(255),
			'symb_def2' => $this->string(2),
			'symb_def3' => $this->string(3),
			'code_curr' => $this->integer(),
			'date_change' => $this->timestamp()->defaultValue(null),
		];
	}

	public function afterCreate()
	{
		
	}

}
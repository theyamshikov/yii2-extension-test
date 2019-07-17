<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class _create_user_car_table
 * 
 * @package 
 */
class _create_user_car_table extends Migration {

	public $table = '{{%user_car}}';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'login' => $this->primaryKey(16)->notNull(),
			'gov_number' => $this->string(255)->comment('Гос. номер'),
			'document_number' => $this->string(255)->comment('Номер тех. паспорта'),
		];
	}

	public function afterCreate()
	{
		
	}

}
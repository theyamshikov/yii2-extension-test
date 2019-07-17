<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class _create_partner_info_foreign_table
 * 
 * @package 
 */
class _create_partner_info_foreign_table extends Migration {

	public $table = '{{%partner_info_foreign}}';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->integer(),
			'name' => $this->string(255),
			'country_id' => $this->integer(),
			'partner_login' => $this->string(255),
			'prefix' => $this->string(255),
			'acquiring_type' => $this->string(255),
			'acquiring_linked_type' => $this->string(255),
			'terminal_cash_in' => $this->integer(),
			'terminal_cash_out' => $this->integer(),
			'subject_type' => $this->integer(),
		];
	}

	public function afterCreate()
	{
		
	}

}
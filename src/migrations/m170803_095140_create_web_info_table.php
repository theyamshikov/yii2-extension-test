<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class _create_web_info_table
 * 
 * @package 
 */
class m170803_095140_create_web_info_table extends Migration {

	public $table = '{{%web_info}}';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'service_name' => $this->string(50),
			'description' => $this->text(),
			'choice_service_text' => $this->text(),
			'picture' => $this->text(),
			'pic_prefix' => $this->string(50),
			'background' => $this->string(50),
			'instruction' => $this->text(),
			'contacts' => $this->text(),
			'tariff' => $this->text(),
			'commission_info' => $this->text(),
			'priority' => $this->integer(),
		];
	}

	public function afterCreate()
	{
		
	}

}
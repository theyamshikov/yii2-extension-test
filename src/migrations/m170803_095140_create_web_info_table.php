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
			'description' => $this->string(),
			'choice_service_text' => $this->string(),
			'picture' => $this->string(),
			'pic_prefix' => $this->string(50),
			'background' => $this->string(50),
			'instruction' => $this->string(),
			'contacts' => $this->string(),
			'tariff' => $this->string(),
			'commission_info' => $this->string(),
			'priority' => $this->integer(),
		];
	}

	public function afterCreate()
	{
		
	}

}
<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class _create_merchant_info_table
 * 
 * @package 
 */
class m170803_095260_create_merchant_info_table extends Migration {

	public $table = '{{%merchant_info}}';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'service_name' => $this->string(50),
			'merchant_name' => $this->string(255),
			'description_company' => $this->string(),
			'site' => $this->string(),
			'merchant_id' => $this->integer(),
		];
	}

	public function afterCreate()
	{
		
	}

}
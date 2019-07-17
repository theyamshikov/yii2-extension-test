<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class _create_subject_services_table
 * 
 * @package 
 */
class _create_subject_services_table extends Migration {

	public $table = '{{%subject_services}}';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->integer()->notNull(),
			'subject_id' => $this->integer(),
			'service_id' => $this->integer(),
			'active' => $this->boolean(),
			'show_sms_send' => $this->boolean(),
			'commission_info' => $this->string(),
			'limit_info' => $this->string(),
			'description' => $this->string(),
			'description_company' => $this->string(),
			'tariff' => $this->string(),
			'contacts' => $this->string(),
			'instruction' => $this->string(),
		];
	}

	public function afterCreate()
	{
		
	}

}
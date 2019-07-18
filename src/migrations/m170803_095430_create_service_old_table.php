<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class _create_service_old_table
 * 
 * @package 
 */
class m170803_095430_create_service_old_table extends Migration {

	public $table = '{{%service_old}}';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'service_id' => $this->primaryKey()->notNull(),
			'service_name' => $this->string(50),
			'parent_id' => $this->integer(),
			'merchant' => $this->string(255),
			'name' => $this->string(),
			'title' => $this->string(),
			'description' => $this->string(),
			'description_company' => $this->string(),
			'choice_service_text' => $this->string(),
			'site' => $this->string(),
			'picture' => $this->string(),
			'pic_prefix' => $this->string(50),
			'background' => $this->string(50),
			'library_date' => $this->timestamp()->defaultValue(null),
			'instruction' => $this->string(),
			'contacts' => $this->string(),
			'services_more' => $this->string(),
			'tariff' => $this->string(),
			'min_sum' => $this->string(),
			'max_sum' => $this->string(),
			'enrollment_time' => $this->string(),
			'fast_input' => $this->string(),
			'commission_info' => $this->string(),
			'status' => $this->integer(),
			'modify_date' => $this->timestamp()->defaultValue(null),
			'priority' => $this->integer(),
			'type' => $this->integer(),
			'info' => $this->string(),
			'acquiring_access' => $this->integer()->defaultValue(1),
			'template' => $this->string(100),
			'synonyms' => $this->string(255),
			'fields' => $this->string(4096),
			'subtitle' => $this->string(255),
			'subtitle_projects' => $this->integer(),
			'sms_confirmation' => $this->integer(),
		];
	}

	public function afterCreate()
	{
		
	}

}
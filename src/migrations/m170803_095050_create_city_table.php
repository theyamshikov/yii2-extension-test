<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class _create_city_table
 * 
 * @package 
 */
class m170803_095050_create_city_table extends Migration {

	public $table = '{{%city}}';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->integer()->notNull(),
			'id_country' => $this->integer(),
			'region_id' => $this->integer(),
			'city_name' => $this->string(255),
			'position' => $this->integer(),
			'status' => $this->integer()->notNull(),
			'date_change' => $this->timestamp()->defaultValue(null)->notNull(),
			'logo' => $this->string(128),
		];
	}

	public function afterCreate()
	{
		
	}

}
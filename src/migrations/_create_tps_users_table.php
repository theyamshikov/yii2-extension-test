<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class _create_tps_users_table
 * 
 * @package 
 */
class _create_tps_users_table extends Migration {

	public $table = '{{%tps_users}}';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->integer(),
			'login' => $this->string(255),
			'fcm_token' => $this->string(),
		];
	}

	public function afterCreate()
	{
		
	}

}
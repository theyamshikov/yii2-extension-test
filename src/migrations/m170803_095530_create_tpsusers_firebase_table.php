<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class _create_tpsusers_firebase_table
 * 
 * @package 
 */
class m170803_095530_create_tpsusers_firebase_table extends Migration {

	public $table = '{{%tpsusers_firebase}}';

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
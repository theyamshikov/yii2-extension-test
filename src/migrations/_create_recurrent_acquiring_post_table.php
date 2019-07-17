<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class _create_recurrent_acquiring_post_table
 * 
 * @package 
 */
class _create_recurrent_acquiring_post_table extends Migration {

	public $table = '{{%recurrent_acquiring_post}}';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->primaryKey()->notNull(),
			'request_dt' => $this->timestamp()->defaultValue(null)->notNull(),
			'post_data' => $this->string()->notNull(),
		];
	}

	public function afterCreate()
	{
		
	}

}
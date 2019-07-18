<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class _create_consultation_message_id_table
 * 
 * @package 
 */
class m170803_095220_create_consultation_message_id_table extends Migration {

	public $table = '{{%consultation_message_id}}';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->integer()->notNull(),
		];
	}

	public function afterCreate()
	{
		
	}

}
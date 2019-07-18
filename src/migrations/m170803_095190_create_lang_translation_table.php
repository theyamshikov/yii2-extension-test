<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class _create_lang_translation_table
 * 
 * @package 
 */
class m170803_095190_create_lang_translation_table extends Migration {

	public $table = '{{%lang_translation}}';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->integer()->notNull(),
			'table' => $this->string(64)->notNull(),
			'field' => $this->string(64)->notNull(),
			'key' => $this->string(64)->notNull(),
			'language' => $this->string()->notNull(),
			'value' => $this->string()->notNull(),
		];
	}

	public function afterCreate()
	{
		
	}

}
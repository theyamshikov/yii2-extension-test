<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class _create_news_table
 * 
 * @package 
 */
class m170803_095270_create_news_table extends Migration {

	public $table = '{{%news}}';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->integer()->notNull(),
			'service_id' => $this->integer()->notNull(),
			'title' => $this->string()->notNull(),
			'description_short' => $this->string(),
			'description_full' => $this->string(),
			'image' => $this->string(),
			'button_text' => $this->string(),
			'date_from' => $this->timestamp()->defaultValue(null),
			'date_to' => $this->timestamp()->defaultValue(null),
		];
	}

	public function afterCreate()
	{
		
	}

}
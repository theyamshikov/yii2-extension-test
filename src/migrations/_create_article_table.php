<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class _create_article_table
 * 
 * @package 
 */
class _create_article_table extends Migration {

	public $table = '{{%article}}';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->primaryKey()->notNull(),
			'name' => $this->string(32),
			'title' => $this->string(255),
			'content' => $this->string(),
			'is_deleted' => $this->integer(),
			'updated_at' => $this->timestamp()->defaultValue(null),
			'created_at' => $this->timestamp()->defaultValue(null),
		];
	}

	public function afterCreate()
	{
		
	}

}
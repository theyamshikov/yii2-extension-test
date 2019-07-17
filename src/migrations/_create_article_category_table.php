<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class _create_article_category_table
 * 
 * @package 
 */
class _create_article_category_table extends Migration {

	public $table = '{{%article_category}}';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->primaryKey()->notNull(),
			'title' => $this->string(128),
		];
	}

	public function afterCreate()
	{
		
	}

}
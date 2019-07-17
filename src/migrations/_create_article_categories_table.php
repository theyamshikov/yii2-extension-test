<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class _create_article_categories_table
 * 
 * @package 
 */
class _create_article_categories_table extends Migration {

	public $table = '{{%article_categories}}';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'article_id' => $this->integer(),
			'category_id' => $this->integer(),
		];
	}

	public function afterCreate()
	{
		$this->myAddForeignKey(
			'article_id',
			'{{%article}}',
			'id',
			'CASCADE',
			'CASCADE'
		);
		$this->myAddForeignKey(
			'category_id',
			'{{%article_category}}',
			'id',
			'CASCADE',
			'CASCADE'
		);
	}

}
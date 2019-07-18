<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class _create_category_translations_table
 * 
 * @package 
 */
class m170803_095060_create_category_translations_table extends Migration {

	public $table = '{{%category_translations}}';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->integer(),
			'parent_id' => $this->integer(),
			'name' => $this->string(),
			'title' => $this->string(),
			'position' => $this->integer(),
			'picture' => $this->string(),
			'pic_white' => $this->string(),
			'background' => $this->string(50),
			'modify_date' => $this->timestamp()->defaultValue(null),
			'description' => $this->string(),
			'banners_html' => $this->string(),
			'banners_locale' => $this->string(255),
			'new' => $this->boolean(),
			'group_id' => $this->integer(),
			'synonyms' => $this->string(),
			'status' => $this->integer(),
			'language' => $this->string(),
		];
	}

	public function afterCreate()
	{
		
	}

}
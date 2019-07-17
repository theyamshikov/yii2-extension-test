<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class _create_consultations_comments_table
 * 
 * @package 
 */
class _create_consultations_comments_table extends Migration {

	public $table = '{{%consultations_comments}}';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->primaryKey()->notNull(),
			'consultation_id' => $this->integer(),
			'user' => $this->string(255),
			'text' => $this->string(500),
			'is_processed' => $this->boolean(),
		];
	}

	public function afterCreate()
	{
		$this->myAddForeignKey(
			'consultation_id',
			'{{%consultations}}',
			'id',
			'CASCADE',
			'CASCADE'
		);
	}

}
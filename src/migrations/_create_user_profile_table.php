<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class _create_user_profile_table
 * 
 * @package 
 */
class _create_user_profile_table extends Migration {

	public $table = '{{%user_profile}}';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'login' => $this->primaryKey(16)->notNull(),
			'first_name' => $this->string(128)->comment('Имя'),
			'last_name' => $this->string(128)->comment('Фамилия'),
			'iin' => $this->string(128)->comment('ИИН'),
			'birth_date' => $this->string()->comment('Дата рождения'),
			'sex' => $this->integer()->comment('пол (0: муж, 1: жен)'),
			'avatar' => $this->string()->comment('Аватар'),
		];
	}

	public function afterCreate()
	{
		
	}

}
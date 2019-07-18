<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class _create_user_active_table
 * 
 * @package 
 */
class m200803_095460_create_user_active_table extends Migration {

	public $table = '{{%user_active}}';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->primaryKey()->notNull(),
			'user_id' => $this->integer()->notNull()->comment('ID пользователя'),
			'active_id' => $this->integer()->notNull()->comment('ID типа актива'),
			'provider_id' => $this->integer()->notNull()->comment('ID провайдера актива'),
			'currency_code' => $this->integer()->notNull()->comment('Валюта'),
			'amount' => $this->double()->notNull()->comment('Итоговая сумма'),
			'data' => $this->string(255)->notNull()->comment('Массив значений полей'),
			'is_hidden' => $this->boolean(),
		];
	}

	public function afterCreate()
	{

		$this->myAddForeignKey(
			'provider_id',
			'{{%bank_provider}}',
			'id',
			'CASCADE',
			'CASCADE'
		);
	}

}
<?php

use yii2lab\db\domain\db\MigrationCreateTable as Migration;

/**
 * Class _create_partner_summary_foreign_table
 * 
 * @package 
 */
class _create_partner_summary_foreign_table extends Migration {

	public $table = '{{%partner_summary_foreign}}';

	/**
	 * @inheritdoc
	 */
	public function getColumns()
	{
		return [
			'id' => $this->integer(),
			'partner_prefix_id' => $this->integer(),
			'category_group_id' => $this->integer(),
			'recharge_frame' => $this->string(255),
			'recharge_linking' => $this->string(255),
			'recharge_cvv' => $this->string(255),
		];
	}

	public function afterCreate()
	{
		
	}

}
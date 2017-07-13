<?php

class m170712_210251_create_table_code extends CDbMigration
{
	public function safeUp()
	{
		$this->createTable('tbl_code', [
			'id' => 'pk',
			'code' => 'varchar(45) NULL DEFAULT NULL',
			'comment' => 'varchar(255)',
			'createdAt' => 'TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
		]);
	}

	public function safeDown()
	{
		$this->dropTable('tbl_code');
	}
}
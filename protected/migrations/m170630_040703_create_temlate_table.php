<?php

class m170630_040703_create_temlate_table extends CDbMigration
{
	public function safeUp()
	{
		$this->createTable('tbl_template', [
			'id' => 'pk',
			'key' => 'VARCHAR(50)',
			'content' => 'TEXT',
			'comment' => 'varchar(255)',
			'updatedAt' => 'TIMESTAMP NULL',
			'subject' => 'VARCHAR(200)',
			'position' => 'INT NOT NULL DEFAULT 0'
		]);
	}

	public function safeDown()
	{
		$this->dropTable('tbl_template');
	}
}
<?php

class m170727_041751_alter_table_code extends CDbMigration
{
	public function safeUp()
	{
		$this->addColumn('tbl_code', 'type', 'INT NOT NULL DEFAULT 1');
	}

	public function safeDown()
	{
		$this->dropColumn('tbl_code', 'type');
	}
}
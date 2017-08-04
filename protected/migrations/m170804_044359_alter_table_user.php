<?php

class m170804_044359_alter_table_user extends CDbMigration
{
	public function safeUp()
	{
		$this->addColumn('tbl_user', 'hidden', 'INT NOT NULL DEFAULT 0');
	}

	public function safeDown()
	{
		$this->dropColumn('tbl_user', 'hidden');
	}
}
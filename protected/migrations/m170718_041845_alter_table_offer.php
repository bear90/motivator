<?php

class m170718_041845_alter_table_offer extends CDbMigration
{
	public function safeUp()
	{
		$this->addColumn('tbl_offer', 'sort', 'INT NOT NULL DEFAULT 0');
	}

	public function safeDown()
	{
		$this->dropColumn('tbl_offer', 'sort');
	}
}
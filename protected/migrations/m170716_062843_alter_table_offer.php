<?php

class m170716_062843_alter_table_offer extends CDbMigration
{
	public function safeUp()
	{
		$this->addColumn('tbl_offer', 'type', 'INT NOT NULL DEFAULT 0');
	}

	public function safeDown()
	{
		$this->dropColumn('tbl_offer', 'type');
	}
	
}
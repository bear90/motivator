<?php

class m170731_203737_alter_table_task extends CDbMigration
{
	public function safeUp()
	{
		$this->addColumn('tbl_task', 'planPrice', 'varchar(255) NOT NULL DEFAULT ""');
	}

	public function safeDown()
	{
		$this->dropColumn('tbl_task', 'planPrice');
	}
}
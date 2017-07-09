<?php

class m170709_063431_alter_table_task_add_prolong_date extends CDbMigration
{
	public function safeUp()
	{
		$this->addColumn('tbl_task', 'prolongationDate', 'TIMESTAMP NULL DEFAULT NULL');
	}

	public function safeDown()
	{
		$this->dropColumn('tbl_task', 'prolongationDate');
	}
}
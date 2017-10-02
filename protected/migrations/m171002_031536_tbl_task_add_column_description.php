<?php

class m171002_031536_tbl_task_add_column_description extends CDbMigration
{
	public function safeUp()
	{
		$this->addColumn('tbl_task', 'description', 'VARCHAR(255) DEFAULT ""');
	}

	public function safeDown()
	{
		$this->dropColumn('tbl_task', 'description');
	}
	
}
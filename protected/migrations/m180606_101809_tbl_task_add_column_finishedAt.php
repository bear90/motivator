<?php

class m180606_101809_tbl_task_add_column_finishedAt extends CDbMigration
{
	public function safeUp()
	{
		$this->addColumn('tbl_task', 'finishedAt', 'TIMESTAMP NULL AFTER startedAt');
	}

	public function safeDown()
	{
		$this->dropColumn('tbl_task', 'finishedAt');
	}
}
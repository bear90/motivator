<?php

class m170625_141628_alter_task_table extends CDbMigration
{
	public function safeUp()
	{
		$this->addColumn('tbl_task', 'generalPrice', 'DECIMAL(15,2) NULL DEFAULT NULL');
		$this->addColumn('tbl_task', 'earlyPrice', 'DECIMAL(15,2) NULL DEFAULT NULL');
		$this->addColumn('tbl_task', 'lastMinPrice', 'DECIMAL(15,2) NULL DEFAULT NULL');
	}

	public function safeDown()
	{
		$this->dropColumn('tbl_task', 'generalPrice');
		$this->dropColumn('tbl_task', 'earlyPrice');
		$this->dropColumn('tbl_task', 'lastMinPrice');
	}
}
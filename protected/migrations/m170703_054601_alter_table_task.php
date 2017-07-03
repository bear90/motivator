<?php

class m170703_054601_alter_table_task extends CDbMigration
{
	public function safeUp()
	{
		$this->addColumn('tbl_task', 'userId', 'INT NOT NULL');

		$this->addForeignKey('FK_tbl_task_userId', 'tbl_task', ['userId'], 'tbl_user', ['id'], 
			'CASCADE', 
			'CASCADE');
	}

	public function safeDown()
	{
		$this->dropColumn('tbl_task', 'userId');
	}

}
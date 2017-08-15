<?php

class m170815_040552_alter_table_task extends CDbMigration
{
	public function up()
	{
		$this->addColumn('tbl_offer', 'touragentId', 'INT DEFAULT Null after taskId');
	}

	public function down()
	{
		$this->dropColumn('tbl_offer', 'touragentId');
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}
<?php

class m170802_043109_alter_table_code extends CDbMigration
{
	public function up()
	{
		$this->addColumn('tbl_code', 'hidden', 'INT NOT NULL DEFAULT 0');
	}

	public function down()
	{
		$this->dropColumn('tbl_code', 'hidden');
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
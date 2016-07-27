<?php

class m160727_155245_alter_table_template extends CDbMigration
{
	public function up()
	{
		$this->addColumn('template', 'subject', 'VARCHAR(200)');
	}

	public function down()
	{
		$this->dropColumn('template', 'subject');
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
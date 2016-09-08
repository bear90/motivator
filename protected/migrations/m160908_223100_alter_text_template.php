<?php

class m160908_223100_alter_text_template extends CDbMigration
{
	public function up()
	{
		$this->addColumn('text', 'position', 'INT NOT NULL DEFAULT 0');
		$this->addColumn('template', 'position', 'INT NOT NULL DEFAULT 0');
	}

	public function down()
	{
		$this->dropColumn('text', 'position');
		$this->dropColumn('template', 'position');
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
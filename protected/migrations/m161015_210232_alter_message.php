<?php

class m161015_210232_alter_message extends CDbMigration
{
	public function up()
	{
		$this->addColumn('message', 'deleted', 'TINYINT(1) DEFAULT 0');
	}

	public function down()
	{
		$this->dropColumn('message', 'deleted');
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
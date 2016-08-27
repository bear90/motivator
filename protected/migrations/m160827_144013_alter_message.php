<?php

class m160827_144013_alter_message extends CDbMigration
{
	public function up()
	{
		$this->addColumn('message', 'viewed', 'TINYINT(1) DEFAULT 0');
	}

	public function down()
	{
		$this->dropColumn('message', 'viewed');
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
<?php

class m161119_220804_alter_touragents extends CDbMigration
{
	public function up()
	{
		$this->addColumn('touragents', 'status', 'TINYINT(1) NOT NULL DEFAULT 1');
	}

	public function down()
	{
		$this->dropColumn('touragents', 'status');
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
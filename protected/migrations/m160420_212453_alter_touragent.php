<?php

class m160420_212453_alter_touragent extends CDbMigration
{
	public function up()
	{
		$this->addColumn('touragents', 'account', 'INT DEFAULT 0');
	}

	public function down()
	{
		$this->dropColumn('touragents', 'account');
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
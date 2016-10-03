<?php

class m161003_200642_alter_touragents extends CDbMigration
{
	public function up()
	{
		$this->alterColumn('touragents', 'account', 'DECIMAL(15,2) DEFAULT 0');
	}

	public function down()
	{
		$this->alterColumn('touragents', 'account', 'INT DEFAULT 0');
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
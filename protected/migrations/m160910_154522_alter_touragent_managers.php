<?php

class m160910_154522_alter_touragent_managers extends CDbMigration
{
	public function up()
	{
		$this->addColumn('touragent_managers', 'bonusFactor', 'DECIMAL(15,2) NOT NULL DEFAULT 0');
	}

	public function down()
	{
		$this->dropColumn('touragent_managers', 'bonusFactor');
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
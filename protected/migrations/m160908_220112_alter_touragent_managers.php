<?php

class m160908_220112_alter_touragent_managers extends CDbMigration
{
	public function up()
	{
		$this->addColumn('touragent_managers', 'bonus', 'DECIMAL(15,2) NOT NULL DEFAULT 0');
	}

	public function down()
	{
		$this->dropColumn('touragent_managers', 'bonus');
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
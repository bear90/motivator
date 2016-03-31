<?php

class m160331_213624_alert_user extends CDbMigration
{
	public function up()
	{
		$this->addColumn('users', 'firstLogin', 'TIMESTAMP NULL');
		$this->addColumn('users', 'lastLogin', 'TIMESTAMP NULL');
	}

	public function down()
	{
		$this->dropColumn('users', 'firstLogin');
		$this->dropColumn('users', 'lastLogin');
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
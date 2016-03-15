<?php

class m160315_220046_alert_touragents extends CDbMigration
{
	public function up()
	{
		$this->addColumn('touragents', 'userId', 'INT');
		$this->addForeignKey('FK_touragents_userId', 'touragents', array('userId'), 'users', array('id'));
	}

	public function down()
	{
		$this->dropColumn('touragents', 'userId');
		$this->dropForeignKey('FK_touragents_userId', 'touragents');
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